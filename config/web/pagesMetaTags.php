<?php

$wwwHostname = env('WWW_HOSTNAME');
$websiteLogo = "{$wwwHostname}/media/common/images/logo.png";

return [
    'indexPage' => [
        'sitemap' => [
            'loc' => '/',
            'lastmod' => '2025-05-01',
            'changefreq' => 'monthly',
            'priority' => '1.0'
        ],
        'metaTags' => [
            'title' => [
                'content' => "Home",
            ],
            'og:title' => [
                'content' => "Home",
            ],
            'og:description' => [
                'content' => "",
            ],
            'og:image' => [
                'url' => $websiteLogo,
            ],
            'og:url' => [
                'url' => '',
            ],
            'og:type' => [
                'content' => "website",
            ],
            'twitter:card' => [
                'content' => "summary_large_image",
            ],
            'twitter:title' => [
                'content' => "Home Page",
            ],
            'twitter:description' => [
                'content' => "",
            ],
            'twitter:image' => [
                'url' => $websiteLogo,
            ],
        ],
    ]
];
