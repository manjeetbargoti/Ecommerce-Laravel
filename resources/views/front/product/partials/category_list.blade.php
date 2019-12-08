<div class="">
    <div class="product-page-heading ">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center">
                <li>
                    <div style="display: block;"><a class="" href="#">PRODUCTS</a></div>
                </li>
            </ul>
        </div>
    </div>

    <div class="product-page-content">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center">
                @foreach($productcategory as $pcat)
                <li>
                    <span style="display: block;"><a class=""
                            href="{{ url('/category/'.$pcat->name.'/products/') }}">{{ $pcat->name }}</a></span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="space"></div>
    </div>
</div>