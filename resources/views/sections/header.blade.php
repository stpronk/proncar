<header class="masthead text-white text-center{{ isset($content['logo']) ? '' : ' d-none d-md-block' }}">
    @if(isset($content['overlay']))
        <div class="overlay"></div>
    @endif
    @if (isset($content['logo']))
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    {{--                <h3></h3>--}}
                    <img class="mb-6 " width="100%" height="auto" alt="{{ $content['alt'] ?? '' }}" src="{{ $content['src'] ?? '' }}">
                </div>
            </div>
        </div>
    @endif
</header>