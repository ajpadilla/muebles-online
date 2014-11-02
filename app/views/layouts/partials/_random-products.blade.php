<li class="widget-container">
    <h2 class="widget-title">Más Productos</h2>
    <ul class="rp-widget">
        @foreach($products as $product)
        <li>
			@if($product->hasPhotos())
                <a href="{{ route('products.show', [$product->id, $product->getFirstPhoto()->id]) }}">
                    <img alt="{{ $product->nombre }}" class="frame mini-photo" src="{{ asset($product->getFirstPhoto()->path . $product->getFirstPhoto()->filename) }}">
                </a>
            @endif
            <h3><a href="{{ route('products.show', [$product->id, $product->getFirstPhoto()->id]) }}">{{ $product->codigo }}</a></h3>
            <span class="smalldate">{{ $product->nombre }}</span>
            <span class="smalldate">{{ $product->medidas }}</span>
            <span class="clear"></span>
        </li>
        @endforeach
    </ul>
</li>