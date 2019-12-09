<div class="">
    <div class="product-page-heading ">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center product-supplier">
                <li class="active">
                    <div style="display: block;"><a class="" href="#">PRODUCTS</a></div>
                </li>
                <li class="">
                    <div style="display: block;"><a class="" href="#">SUPPLIERS</a></div>
                </li>
            </ul>
        </div>
    </div>

    <div class="product-page-content">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center">
                @foreach($productcategory as $pcat)
                <li class="">
                    <span style="display: block;"><a class=""
                            href="{{ url('/category/'.$pcat->name.'/products/') }}">{{ $pcat->name }}</a></span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="space"></div>
    </div>
</div>