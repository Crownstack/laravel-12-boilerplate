<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($urls as $url)
        <url>
            <loc>{{ $url['loc'] }}</loc>
            <priority>{{ $url['priority'] }}</priority>
            <changefreq>{{ $url['changefreq'] }}</changefreq>
            <lastmod>{{ $url['lastmod'] }}</lastmod>
        </url>
    @endforeach
</urlset>