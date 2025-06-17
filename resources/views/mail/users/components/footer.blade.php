

<div style="font-size:14px;color:#444;">
    <p>Warm regards,</p>
    <p>Team {{ config('web.company.name') }}</p>

    <p style="margin-top:30px;">Got questions? Need something? We're all ears! <a style="text-decoration:underline;color:#fe802b;font-weight:700;" href="{{ $wwwHostname }}/get-in-touch" target="_blank" title="Click to get in touch with us">Get in touch</a> with our team. Let's talk!</p>

    <p style="margin-top:30px;padding:20px 0px;">
        <span style="float:left;">{{ date('Y') }} © {{ config('web.company.name') }}</span>
        <span style="float:right;">
            @foreach (config('web.company.social') as $type => $info)
                <span style="display:inline;padding-left:10px;height:24px;width:24px;">
                    <a
                    href="{{ $info['link'] }}"
                    title="Visit {{ $info['title'] }}"
                    target="_blank"
                    style="text-decoration:none;height:inherit;width:inherit;">
                        <img
                            src="{{ $wwwHostname }}/media/common/images/social-black-white-{{ $type }}.png"
                            alt="{{ $info['title'] }}"
                            style="height:inherit;width:inherit;">
                    </a>
                </span>
            @endforeach
        </span>
    </p>
</div>