<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
@if (!empty($company['themeColor']))
    <meta name='theme-color' content="{{$company['themeColor']}}">
@endif
<link rel="shortcut icon" href="/favicon.png" type="image/png">
<link rel="apple-touch-icon" href="/favicon.png" type="image/png">


<!-- Loading Page's SEO and Meta Tags -->
@if (!empty($pageData['metaTags']))
    @foreach ($pageData['metaTags'] as $tagName => $tagInfo)
        @switch ($tagName)
            @case('title')
                <title>{{$tagInfo['content']}} | {{$company['titelSuffix']}}</title>
                @break
            @case('og:title')
            @case('og:description')
            @case('og:type')
            @case('twitter:card')
            @case('twitter:title')
            @case('twitter:description')
                <meta name="{{ $tagName }}" content="{{ $tagInfo['content'] }}" />
                @break
            @case('og:image')
            @case('og:url')
            @case('twitter:image')
                <meta name="{{ $tagName }}" content="{{ $tagInfo['url'] }}" />
                @break
            @case('structured_data')
                <script type="application/ld+json">@json($tagInfo['content'], JSON_UNESCAPED_SLASHES)</script>
                @break
        @endswitch
    @endforeach
@endif


<!-- Loading fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans&display=swap" rel="stylesheet">

<!-- Loading CSS Files -->
@foreach ($cssFiles as $cssFile)
    @php
        $externalCss = strpos($cssFile, 'http');
    @endphp
    @if ($externalCss === false)
        @php
            $lastModified = \Illuminate\Support\Facades\File::lastModified(public_path("{$cssFile}"));
        @endphp
        <link href="{{$cssFile}}?h={{$lastModified}}" rel="stylesheet">
    @else
        <link href="{{$cssFile}}" rel="stylesheet">
    @endif
@endforeach
