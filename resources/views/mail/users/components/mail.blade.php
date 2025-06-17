@php
    $wwwHostname = env('WWW_HOSTNAME');

    if ($showFooter) {
        $bodyCssFooterAdjust = 'border-radius:20px 20px 0px 0px;margin:100px auto 0px auto;';
    } else {
        $bodyCssFooterAdjust = 'border-radius:20px;margin:100px auto;';
    }
@endphp

<html lang='en'>
    <body style="background:#f9f9f9;font-family:Arial;font-size:16px;margin:40px auto;">
        <div style="{{ $bodyCssFooterAdjust }}background:#ffffff;padding:20px 60px 60px 60px;min-width:400px;max-width:600px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <div style="text-align:center;margin-bottom:40px;">
                <a href="{{ $wwwHostname }}" title="Click to visit our website" target="_blank">
                    <img
                    src="{{$wwwHostname}}/media/common/images/logo.png"
                    alt="{{ config('web.company.name') }}"
                    style="height:50px;width:auto;">
                </a>
            </div>

            <div>
                @if($showHeader)
                    @include('mail.users.components.header')
                @endif
            </div>

            <div>
                @include("mail.users.{$viewToRender}")
            </div>

        </div>
        @if($showFooter)
            <div style="background:#f2f2f2;border-radius:0px 0px 20px 20px;margin:0px auto 40px auto;padding:15px 60px;min-width:400px;max-width:600px;box-shadow: rgba(100, 100, 111, 0.2) 0px 15px 29px 0px;">
                @include('mail.users.components.footer')
            </div>
        @endif
    </body>
</html>
