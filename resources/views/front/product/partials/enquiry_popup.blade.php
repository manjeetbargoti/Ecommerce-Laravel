<!-- Modal -->
<div class="modal fade" id="EnquiryPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $prod->product_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/category/'.$pcat->name.'/products/') }}" method="POST" class="EnquiryForm">
        @csrf
            <div class="form-group">
                <input type="text" name="name" id="FullName" class="form-control mb-2" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="EmailAddress" class="form-control mb-2" placeholder="Email Address">
            </div>
            <div class="form-group">
                <input type="tel" name="phone" id="PhoneNumber" class="form-control mb-2" placeholder="Phone number">
            </div>
            <div class="form-group d-none">
                <input type="text" name="product_id" id="ProductId" class="form-control mb-2" placeholder="Product ID" value="{{ $prod->id }}">
            </div>
            <div class="form-group d-none">
                <input type="text" name="product_type" id="ProductType" class="form-control mb-2" placeholder="Product Type" value="{{ $prod->is_premium }}">
            </div>
            <div class="form-group">
                <textarea name="location" id="Location" cols="30" rows="2" class="form-control" placeholder="Location"></textarea>
            </div>
            <div class="form-group">
                <textarea name="query_message" id="QueryMessage" cols="30" rows="5" class="form-control" placeholder="Query..."></textarea>
            </div>
            <div class="form-group">
                <input type="checkbox" name="terms" id="Terms" class="form-control mb-2"> Accept Terms and Conditions.
            </div>
            <div class="form-group">
                <button type="reset" class="btn btn-warning" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary pull-right">Submit Query</button>
            </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>