<header class="masthead text-white text-center{{ isset($logo) ? '' : ' d-none d-md-block' }}">
    <div class="overlay"></div>
    @if ($logo ?? false)
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <img class="mb-6 header-image" src="images/Logo_web_transparant.png">
            </div>
        </div>
    </div>
    @endif
</header>