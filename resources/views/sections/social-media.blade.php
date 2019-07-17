<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-5">{{ $content['head'] }}</h2>
                <div class="col-xl-9 mx-auto">
                    <div class="row">
                        @foreach($content['items'] as $item)
                            <div class="col-{{ 12 / $content['item_count'] }}">
                                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                    <a class="text-decoration-none features-icons-icon d-flex" href="{{ $item['href'] }}" target="_blank">
                                        <i class="icon-{{ $item['icon'] }} m-auto text-primary"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(isset($content['contact']))
                        <div class="row">
                            <div class="col-md-11 mx-auto mt-5">
                                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                    <a class="text-decoration-none d-flex text-center" href="{{ route($content['contact']['route']) }}">
                                        <button class="btn btn-lg btn-outline-primary w-100">{{ $content['contact']['head'] }}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>