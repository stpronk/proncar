<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            @foreach($content['items'] as $item)
                <div class="col-lg-{{ 12 / $content['item_count'] }}">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 text-center">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-{{ $item['icon'] }} m-auto text-primary"></i>
                        </div>
                        <h3>{{ $item['head'] }}</h3>
                        <p class="lead mb-0">{{ $item['body'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>