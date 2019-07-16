<header class="masthead text-white text-center{{ isset($logo) ? '' : ' d-sm-none' }}">
    <div class="overlay"></div>
    @if ($logo ?? false)
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                {{--                <h3></h3>--}}
                <img class="mb-6 " width="100%" height="auto" src="images/Logo_web_transparant.png">
            </div>
        </div>
    </div>
    @endif
</header>