<header class="masthead text-white text-center{{ isset($content['logo']) ? '' : ' d-none d-md-block' }}">
    @if(isset($content['overlay']))
        <div class="overlay"></div>
    @endif
    @if(isset($content['logo']))
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <img class="mb-6 header-image" alt="{{ $content['alt'] ?? '' }}" src="{{ $content['src'] ?? '' }}">
                </div>
            </div>
        </div>
    @endif
</header>