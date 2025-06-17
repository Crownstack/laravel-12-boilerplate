<div id="footer" class="container-fluid text-center">
    <div class="row subscribe-wrapper">
        <div class="col-12 heading">
            icon here
        </div>
        <div class="col-12 heading tc-white fw-700 fs-30">Let's stay in touch</div>
        <div class="col-12 sub-heading tc-orange-2 fs-24 tm-20">Subscribe to our mailing list to get the update to your email.</div>
        <div class="col-12 cta tm-20">
            <form>
                <input type="email" v-model="subscribe.email" placeholder="Enter your email address" />
                <button @click.prevent="subscribeForm" class="btn orange-2 tc-white tc-white-oh fs-30 b-radius-100"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

    <div class="row social-wrapper tm-80">
        <ul class="m-0">
            @foreach ($company['social'] as $social => $info)
                <li class="d-inline-block">
                    <a href="{{$info['link']}}" target="_blank" title="Visit {{$info['title']}}" class="hp-5">
                        <img src ="/media/common/images/social-circle-{{$social}}.png" alt="{{$info['title']}}" style="width:56px;" />
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="row tm-20 fs-14 justify-content-center tc-white">
        ©{{ date('Y') }} {{$company['name']}}. All rights reserved.
    </div>
</div>