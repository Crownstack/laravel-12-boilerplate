<?php

namespace App\Http\Controllers\V1\Web;

use Illuminate\Support\Facades\Route;

class WebController extends \App\Http\Controllers\V1\V1Controller
{
    /** Resources folder name where all the blade files are present */
    protected string $resourcesFolder = 'web';

    /** Array containing list of CSS files to be loaded for a page */
    protected array $cssFiles = [
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css',      // Bootstrap CSS
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css',    // Font Awesome CSS
        '/media/common/css/common.css'
    ];

    /** Array containing list of JS files to be loaded for a page */
    protected array $jsFiles = [
        'https://unpkg.com/vue@3/dist/vue.global.js',                                   // Vue JS
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js', // Bootstrap JS
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js',      // Font Awesome JS
        'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js',                         // Axios JS
        '/media/www/js/common.js'
    ];

    /** Array containing list of values to be rendered on front-end as hidden inputs */
    protected array $hiddenData = [];

    /** Array containing list of views to load when rendering a page */
    protected array $views = [];

    /** Array containing data a page requires to render */
    protected array $pageData = [
        'metaTags' => [
            'title' => [
                'content' => '',        // Value of <title> tag
            ],
            'og:title' => [
                'content' => '',
            ],
            'og:description' => [
                'content' => '',
            ],
            'og:image' => [
                'url' => '',
            ],
            'og:url' => [
                'url' => '',
            ],
            'og:type' => [
                'content' => '',
            ],
            'twitter:card' => [
                'content' => '',
            ],
            'twitter:title' => [
                'content' => '',
            ],
            'twitter:description' => [
                'content' => '',
            ],
            'twitter:image' => [
                'url' => '',
            ],
        ],
        'header' => [
            'show' => true,
        ],
        'footer' => [
            'show' => true,
        ]
    ];

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $currentRoute = Route::currentRouteName();
        $this->pageData['company'] = config("web.company");
        $this->pageData['metaTags'] = config("web.pagesMetaTags.{$currentRoute}.metaTags", []);
        $this->pageData['metaTags']['og:url']['url'] = url()->current();
        $this->hiddenData = [
            'apiBaseUrl' => env('API_HOSTNAME'),
        ];
    }


    /**
     * Render a page with the given view, data, CSS and JS files.
     *
     * @return \Illuminate\View\View
     */
    protected function renderPage()
    {
        return view("{$this->resourcesFolder}.page", [
            'company' => $this->pageData['company'],
            'metaTags' => $this->pageData['metaTags'],
            'cssFiles' => $this->cssFiles,
            'jsFiles' => $this->jsFiles,
            'pageData' => $this->pageData,
            'hiddenData' => $this->hiddenData,
            'views' => $this->views,
        ]);
    }

    /**
     * Renders the error page.
     *
     * @param int $errorType
     * @return \Illuminate\View\View
     */
    protected function renderErrorPage(int $errorType = 404)
    {
        $this->pageData['metaTags']['title']['content'] = "Page not found";
        $this->views = ["errors.{$errorType}"];
        $this->renderPage();
    }
}
