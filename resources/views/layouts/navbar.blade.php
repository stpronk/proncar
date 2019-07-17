<nav class="navbar navbar-expand-md navbar-light bg-light static-top shadow-sm">
    <div class="container">
        <a class="nav navbar-brand" href="{{ route('welcome') }}" >
            <img width="auto" height="30px" src="images/Logo_web_transparant.png">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                @foreach($items as $key => $values)
                    <li class="nav-item p-2">
                        <a class="{{ $values['class'] ?? 'nav-link' }}" href="{{ route($values['url']) }}">{{ $values['name'] }}</a>
                    </li>
                @endforeach

                @if(Auth::check())
                    <li class="nav-item p-2">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <i class="icon-wrench text-primary"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
