<div id="particles-js"></div>
<div style="position: relative;">
    <div class="product-page-heading">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center product-supplier">
                <li class="">
                    <div style="display: block;"><a class="" href="{{ url('/product/categories') }}">PRODUCTS</a></div>
                </li>
                <li class="active">
                    <div style="display: block;"><a class="" href="{{ url('/supplier/categories') }}">SUPPLIERS</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="product-page-content">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center">
                @foreach($suppliercategory as $sc)
                <li class="{{ (request()->is('category/'.$sc->name.'/*')) ? 'active':'' }}">
                    <span style="display: block;"><a class=""
                            href="{{ url('/category/'.$sc->name.'/suppliers') }}">{{ $sc->name }}</a></span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="menu-destination-prehome" style="padding-top: 7em;">
        <ul class="list-unstyled text-center">
            <li class="">
                <span style="display: block;"><a class="" href="{{ url('/vvv-lux/products/') }}"
                        style="font-size: 3em !important;color: #fff;">VVV LUXURY</a></span>
            </li>
        </ul>
    </div>
    <div class="space"></div>
</div>
<!-- <div class="space"></div> -->