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
@include('layouts.header')
    <section class="call-to-action bg-white">
        <div class="container">
            <div class="row no-gutters">

                <div class="col-12 row text-center">
                    <h2 class="col-12 mb-4 text-center">Contact us!</h2>
                </div>

                <form class="form-group col-12 font-weight-bold px-4 mb-6">
                    <div class="form-group row">
                        <label class="col-form-label col-12" for="email" type="email">E-mail Address</label>
                        <input class="form-control col-12" name="email" id="email" type="email" value="" placeholder="">
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-12" for="phone" type="text">Phone number</label>
                        <input class="form-control col-12" name="phone" id="phone" type="text" value="" placeholder="">
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-12" for="name" type="text">Name</label>
                        <input class="form-control col-12" name="name" id="name" type="text" value="" placeholder="">
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-12" for="subject" type="text">Subject</label>
                        <input class="form-control col-12" name="subject" id="subject" type="text" value="" placeholder="">
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-12" for="message">Message</label>
                        <textarea class="form-control col-12" name="message" id="subject" type="text" rows="8"></textarea>
                    </div>

                    <div class="form-group row">
                        <button class="btn btn-block btn-primary btn-lg col-12" type="submit">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

<section class="features-icons text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h2 class="mb-5">Also follow us on social media!</h2>
                <div class="col-xl-8 mx-auto">
                    <div class="row">
                        <div class="col-6">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                <a class="text-decoration-none features-icons-icon d-flex" href="https://www.facebook.com/Proncar-468839900135515/" target="_blank">
                                    <i class="icon-social-facebook m-auto text-primary"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                <a class="text-decoration-none features-icons-icon d-flex" href="https://www.instagram.com/proncar_zoetermeer/" target="_blank">
                                    <i class="icon-social-instagram m-auto text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="company-info">
    <!-- todo -->
</section>

<!-- Footer -->
@include('layouts.footer')

</body>
</html>
