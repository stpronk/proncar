<nav class="navbar navbar-expand-md navbar-light bg-light static-top shadow-sm">
    <div class="container">
        <a class="nav navbar-brand" href="{{ route('welcome') }}">
            <img width="auto" height="30px" src="images/Logo_web_transparant.png">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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


            </ul>
        </div>
    </div>
</nav>


@if(Auth::check())
<nav class="navbar navbar-expand-md navbar-light bg-dark sticky-top-top shadow-sm py-0 h-auto">
<div class="container">

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">

            @if(isset($editable))
                <li class="nav-item px-1">
                    <a class="nav-link" href="{{ route($editable.'.edit') }}">
                        <i class="icon-pencil text-primary"></i>
                    </a>
                </li>
            @endif

            <li class="nav-item px-1">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="icon-settings text-primary"></i>
                </a>
            </li>


            <li class="nav-item px-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link btn btn-link" type="submit">
                        <i class="icon-logout text-primary"></i>
                    </button>
                </form>
            </li>
    </ul>
</div>
</nav>
@endif