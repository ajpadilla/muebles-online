@extends('layouts.default')

@section('content')
<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h1 class="pagetitle nodesc">{{ $product->nombre }}</h1>
            </div>
        </div>
    </div>
</div>
    <!-- MAIN CONTENT -->
<div id="outermain">
    <div id="maincontainer">
        <div class="container">
            <div class="row">
                <section id="maincontent">
                     <section class="eight columns positionleft" id="content">
                        <article>
                            <div class="articlecontainer">
                                <div class="flexslider" id="roomslider">
                                     <ul class="slides">
                                        <?php $i=0; ?>
                                        @foreach($product->photos as $photo)
                                            @if($i==0)
	                                            <li style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;" class="flex-active-slide">
	                                            <?php $i=1; ?>
	                                        @else
	                                            <li style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;" class="">
	                                        @endif
												<img alt="{{ $photo->filename }}" src="{{ asset($photo->path . $photo->filename) }}">
	                                        </li>
                                        @endforeach
                                     </ul>
                                     <div class="clear"></div>
                                <ul class="flex-direction-nav"><li><a href="#" class="flex-prev">Anterior</a></li><li><a href="#" class="flex-next">Siguiente</a></li></ul></div>

                                <div class="entry-content">
                                    <p>{{ $product->descripcion }}</p>
                                    <h2>Detalles</h2>
                                    <ul class="listborder">
                                        <li><strong>Modelo: </strong><em>{{ $product->modelo }}</em></li>
                                        <li><strong>Medidas: </strong><em>{{ $product->medidas }}</em></li>
                                        <li><strong>Lacado: </strong><em>{{ $product->lacado }}</em></li>
                                        <li><strong>Precio del Lacado: </strong><em>{{ $product->precio_lacado }}</em></li>
                                        <li><strong>Pulimento: </strong><em>{{ $product->pulimento }}</em></li>
                                        <li><strong>Precio del Pulimento: </strong><em>{{ $product->precio_pulimento }}</em></li>
                                    </ul>

                                    <ul class="line">
                                        <li>
                                        <div class="price">€{{ number_format($product->precio, 2, ',', '.') }}{{--<span>/night</span>--}}</div>
                                        </li>
                                        <li><a href="#" class="button">Realizar pedido</a></li>
                                    </ul>
                                </div>

                                <div class="clear"></div>
                            </div>
                        </article><!-- end post -->

                    </section><!-- content -->

                    <aside class="four columns positionright" id="sidebar">
						<div class="widget-area">
                        <ul>
                            <li class="widget-container widget_hover">
                                <h2 class="widget-title">Information</h2>
                                <div class="textwidget">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam ligula arcu, sed congue diam placerat at. Maecenas nec vestibulum nulla, et elementum.</div>
                            </li>
                            <li class="widget-container">
                                <h2 class="widget-title">Latest Post</h2>
                                <ul class="rp-widget">
                                    <li>
                                        <img alt="" class="frame" src="{{ asset('images/content/small-img1.jpg') }}">
                                        <h3><a href="single.html">Lorem ipsum dolor sit amet</a></h3>
                                        <span class="smalldate">July 12, 2013</span>
                                        <span class="clear"></span>
                                    </li>
                                    <li>
                                        <img alt="" class="frame" src="{{ asset('images/content/small-img2.jpg') }}">
                                        <h3><a href="single.html">Praesent et eros scelerisque</a></h3>
                                        <span class="smalldate">July 12, 2013</span>
                                        <span class="clear"></span>
                                    </li>
                                    <li>
                                        <img alt="" class="frame" src="{{ asset('images/content/small-img3.jpg') }}">
                                        <h3><a href="single.html">Nunc vel lectus quis velit tempus</a></h3>
                                        <span class="smalldate">July 12, 2013</span>
                                        <span class="clear"></span>
                                    </li>
                                </ul>
                            </li>
                            <li class="widget-container widget_tag_cloud">
                                <h3 class="widget-title">Tags</h3>
                                <div class="tagcloud">
                                    <a href="#">aside</a>
                                    <a href="#">audio</a>
                                    <a href="#">blog</a>
                                    <a href="#">design</a>
                                    <a href="#">gallery</a>
                                    <a href="#">image</a>
                                    <a href="#">link</a>
                                    <a href="#">quote</a>
                                    <a href="#">video</a>
                                </div>
                                <div class="clear"></div>
                            </li>
                        </ul>
                        </div>
                    </aside><!-- sidebar -->

                </section>
            </div>
        </div>
    </div>
</div>
@stop