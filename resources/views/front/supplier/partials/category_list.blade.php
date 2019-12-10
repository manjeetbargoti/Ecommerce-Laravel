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
                <li>
                    <span style="display: block;"><a class=""
                            href="{{ url('/category/'.$sc->name.'/suppliers') }}">{{ $sc->name }}</a></span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>