<li class="widget-container">
    <h2 class="widget-title">Más Productos</h2>
    <ul class="rp-widget">
        @foreach($products as $product)
        <li>
			@if($product->hasPhotos())
                <img alt="{{ $product->nombre }}" class="frame mini-photo" src="{{ asset($product->getFirstPhoto()->path . $product->getFirstPhoto()->filename) }}">
            @endif
            <h3><a href="{{ route('products.show', $product->id) }}">{{ $product->nombre }}</a></h3>
            <span class="clear"></span>
        </li>
        @endforeach
    </ul>
</li>