<?php

namespace App\Http\Controllers\V1\Web;

use App\Models\Main\Blog;
use Illuminate\Support\Facades\Validator;

class StaticPageController extends \App\Http\Controllers\V1\Web\WebController
{
    /**
     * Renders the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->pageData['blogs'] = [];
        $this->views = ["index"];
        return $this->renderPage();
    }

    /**
     * Renders the sitemap.xml page.
     *
     * @return \Illuminate\View\View
     */
    public function sitemap()
    {
        $staticPages = config('web.pagesMetaTags');
        $wwwHostname = env('WWW_HOSTNAME');
        $urls = array_map( function ($page) use ($wwwHostname) {
            $page['sitemap']['loc'] = "{$wwwHostname}{$page['sitemap']['loc']}";
            return $page['sitemap'];
        }, $staticPages);

        $viewContent = view('web.sitemap', ['urls' => $urls])->render();

        return response($viewContent)->header('Content-Type', 'text/xml');
    }
}
