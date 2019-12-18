@extends('layouts.front.front_design')
@section('content')

<div class="product-page-heading">
    <div class="container">
        <h2>{{ $pageData->name }}</h2>
        <div class="page_content row" style="padding-top: 2em;">
            <div class="col-sm-6">
                <form action="{{ url('/contact') }}" method="POST" class="EnquiryForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" id="FullName" class="form-control mb-2" placeholder="Full Name"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="EmailAddress" class="form-control mb-2"
                            placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" id="PhoneNumber" class="form-control mb-2"
                            placeholder="Phone number" required>
                    </div>
                    <div class="form-group">
                        <textarea name="query_message" id="QueryMessage" cols="30" rows="5" class="form-control"
                            placeholder="Query..." required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-info btn-md" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-info btn-md pull-right">Submit
                            Query</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                {!! $pageData->content !!}
            </div>
        </div>
        <div class="contact_page_map" style="padding-top: 2em; padding-bottom: 10em;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d902.3331514949289!2d55.28335022919859!3d25.225719998992684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f42ee8879e54b%3A0x18c04cc22bfbd904!2sConrad%20Dubai!5e0!3m2!1sen!2sae!4v1576395104983!5m2!1sen!2sae"
                width="100%" height="450" frameborder="1" style="border:1px solid #f2f2f2;"
                allowfullscreen="1"></iframe>
        </div>
    </div>
</div>

@endsection