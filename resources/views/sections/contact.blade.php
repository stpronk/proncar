<section class="contact-form bg-white">
    <div class="container">
        <div class="row no-gutters">

            <div class="col-12 row">
                <h2 class="col-12 mb-4 text-center text-primary">Contact us!</h2>
            </div>

            <form class="form-group col-12 font-weight-bold px-4 mb-6" method="post" action="{{ route($content['action']) }}">
                @csrf
                @method($content['method'])

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