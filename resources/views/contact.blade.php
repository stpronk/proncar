<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
@include('layouts.navbar')

<!-- Masthead -->
<header class="masthead text-white text-center" style="padding-top: 7rem; padding-bottom: 7rem">
    <div class="overlay"></div>
</header>

<section>
    <section class="call-to-action bg-light">
        <div class="container">
            <div class="row no-gutters">

                <div class="col-12 row text-center">
                    <div class="col-md-3"></div>
                    <h2 class="col-md-9 col-12 mb-4 text-center">Contact us!</h2>
                </div>

                <form class="form-group col-12 text-left text-md-right px-4">
                    <div class="form-group row">
                        <label class="col-form-label col-12 col-md-3" for="email" type="email">E-mail Address</label>
                        <input class="form-control col-12 col-md-9" name="email" id="email" type="email" value="" placeholder="">
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-12 col-md-3" for="phone" type="text">Phone number</label>
                        <input class="form-control col-12 col-md-9" name="phone" id="phone" type="text" value="" placeholder="">
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-12 col-md-3" for="name" type="text">Name</label>
                        <input class="form-control col-12 col-md-9" name="name" id="name" type="text" value="" placeholder="">
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-12 col-md-3" for="subject" type="text">Subject</label>
                        <input class="form-control col-12 col-md-9" name="subject" id="subject" type="text" value="" placeholder="">
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-12 col-md-3" for="message">Message</label>
                        <textarea class="form-control col-12 col-md-9" name="message" id="subject" type="text" rows="8"></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <button class="btn btn-block btn-primary btn-lg col-md-9 col-12" type="submit">Send</button>
                    </div>

                </form>
                <div class="col-12 text-center">
                    <div class="row">
                        <div class="col-md-3 d-sm-none d-md-block"></div>
                        <div class="col-md-9 col-12">
                            <div class="row">
                                <div class="col-6">
                                    <img height="100px" width="auto" src="/images/facebook.svg" class="float-right">
                                </div>
                                <div class="col-6">
                                    <img height="100px" width="auto" src="/images/instagram.svg" class="float-left">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Footer -->
@include('layouts.footer')

</body>
</html>
