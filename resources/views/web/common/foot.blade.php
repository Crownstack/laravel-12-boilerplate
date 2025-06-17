<!-- Loading JS Files -->
@foreach ($jsFiles as $jsFile)
    @php
        $externalJs = strpos($jsFile, 'http');
    @endphp
    @if ($externalJs === false)
        @php
            $lastModified = \Illuminate\Support\Facades\File::lastModified(public_path("{$jsFile}"));
        @endphp
        <script src="{{$jsFile}}?h={{$lastModified}}"></script>
    @else
        <script src="{{$jsFile}}"></script>
    @endif
@endforeach
