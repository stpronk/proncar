<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

<!-- Navigation -->
@include('layouts.navbar')

<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                {{--                <h3></h3>--}}
                <img class="mb-6 " width="100%" height="auto" src="images/Logo_web_transparant.png">
            </div>
        </div>
    </div>
</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-wrench m-auto text-primary"></i>
                    </div>
                    <h3>Repairs</h3>
                    <p class="lead mb-0">For repair and maintenance you are at the right address.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-energy m-auto text-primary"></i>
                    </div>
                    <h3>Performance</h3>
                    <p class="lead mb-0">We will get everything out of your car that it has!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-chemistry m-auto text-primary"></i>
                    </div>
                    <h3>Style</h3>
                    <p class="lead mb-0">Give your own touch to your car and be unique.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Showcases -->
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters">

            <div class="col-lg-6 order-lg-2 text-white showcase-img background-cover"
                 style="background: url('images/bg-showcase-1.jpg') no-repeat center center;"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>With what can we help you?</h2>
                <p class="lead mb-0">We do a lot in terms of improving and repairing your car. Do you need something specifik or just want to look
                    what we have in store for you. See it here!</p>
                <div class="mt-4 mr-auto">
                    <a href="{{ route('activities') }}">
                        <button class="btn btn-lg btn-primary font-weight-bold">Activities</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 text-white showcase-img background-cover"
                 style="background: url('images/bg-showcase-2.jpg') no-repeat center center;"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>We did a lot!</h2>
                <p class="lead mb-0">We did all type of cars, want to see what we all did? Or do you want to take a look around?</p>
                <div class="mt-4 mr-auto">
                    <a href="{{ route('portfolio') }}">
                        <button class="btn btn-lg btn-primary">Portfolio</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="call-to-action text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-4">Follow us on social media or contact us!</h2>
{{--                <a class="mx-auto" href="{{ route('contact') }}">--}}
{{--                    <button class="btn btn-lg btn-primary">Click here!</button>--}}
{{--                </a>--}}
                <div class="row">
                    <div class="col-4 ">
                        <img height="100px" width="auto" src="/images/facebook.svg" class="float-right">
                    </div>
                    <div class="col-4">
                        <img height="100px" width="auto" src="/images/instagram.svg">
                    </div>
                    <div class="col-4">
                        <img height="100px" width="auto" src="/images/mail.svg" class="float-left">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
@include('layouts.footer')
</body>
</html>
