<div id="particles-js"></div>
<div class="" style="position:relative;">
    <div class="product-page-heading ">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center product-supplier">
                <li class="active">
                    <div style="display: block;"><a class="" href="{{ url('/product/categories') }}">PRODUCTS</a></div>
                </li>
                <li class="">
                    <div style="display: block;"><a class="" href="{{ url('/supplier/categories') }}">SUPPLIERS</a></div>
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
        <div class="menu-destination-prehome" style="padding-top: 7em;">
            <ul class="list-unstyled text-center">
                <li class="">
                    <span style="display: block;"><a class=""
                            href="{{ url('/vvv-lux/products/') }}" style="font-size: 3em !important;">VVV LUXURY</a></span>
                </li>
            </ul>
        </div>
        <div class="space2"></div>
    </div>
</div>
