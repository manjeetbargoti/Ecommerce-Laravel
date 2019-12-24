<div class="container ">

    <div class="navbar navbar-expand-lg navbar-dark  fixed-bottom menubar-bottom">
        <div class="container">
            <a href="{{ url('/about-us') }}" class=" d-none d-md-block d-lg-block">ABOUT</a>
            <a href="{{ url('/terms-conditions') }}" class=" d-none d-md-block d-lg-block">TERMS</a>
            <a href="#" class="fa fa-facebook"></a>
            <a href="https://www.instagram.com/vvv.lux" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="https://twitter.com/VvvLux" target="_blank" class="fa fa-twitter"></a>
            <a href="https://www.youtube.com/channel/UChnUwJv_t3Nq-v7wqmQ7heQ" target="_blank"
                class="fa fa-youtube"></a>
            <div class="collapse navbar-collapse" id="">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item newsletter">
                        <p>Receive Valuable Offers</p>
                    </li>
                </ul>
                <form action="{{ url('/subscribe/form/') }}" method="post">
                    @csrf
                    <div class="input-group newsletter-input">
                        <input type="text" name="email" class="form-control newsletter-email"
                            placeholder="Please enter your email" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"
                                style="font-size:14px; border-color:#222;background:#67d5ae;color:#fff; border-radius: 0;">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="modal fade bd-example-modal-lg" id="TermCondition" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terms & Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! config('app.terms') !!}
            </div>
        </div>
    </div>
</div>



<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center ">
        <small>{!! config('app.copyright') !!}</small>
    </div>
</footer>