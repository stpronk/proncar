<section class="showcase">
    <div class="container-fluid p-0">
        @foreach ($content['items'] as $item)
            @if($loop->iteration  % 2 == 0)
                <div class="row no-gutters">
                    <div class="col-lg-6 text-white showcase-img background-cover"
                         style="background: url('{{ $item['image'] }}') no-repeat center center;"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>{{ $item['head'] }}</h2>
                        <p class="lead mb-0">{{ $item['body'] }}</p>
                        <div class="mt-4 mr-auto">
                            <a href="{{ route($item['route_key']) }}">
                                <button class="btn btn-lg btn-primary font-weight-bold">{{ $item['route_name'] }}</button>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img background-cover"
                         style="background: url('{{ $item['image'] }}') no-repeat center center;"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>{{ $item['head'] }}</h2>
                        <p class="lead mb-0">{{ $item['body'] }}</p>
                        <div class="mt-4 mr-auto">
                            <a href="{{ route($item['route_key']) }}">
                                <button class="btn btn-lg btn-primary font-weight-bold">{{ $item['route_name'] }}</button>
                            </a>
                        </div>
                    </div>
                </div>

            @endif
        @endforeach
    </div>
</section>