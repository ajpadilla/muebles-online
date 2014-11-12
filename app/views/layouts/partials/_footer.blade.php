<footer id="footer">
            <!-- FOOTER SIDEBAR -->
            <div id="outerfootersidebar">
                <div id="footersidebarcontainer">
                    <div class="container">
                        <div class="row">

                            <div id="copyright" class="three columns">
                                <a href="index.html" title="grandhotel"><img src="{{asset('images/logo_18654.png')}}" alt=""></a>
                                <div class="copyrighttext">
                                    © 2014 Desarrollada por	<a href="http://www.presentatenlaweb.com/" title="">presentatenlaweb.com</a>.
                                </div>
                            </div>

                            <div id="footersidebar" class="nine columns">
                                <div id="footcol1" class="three columns">
                                    <ul>
                                        <li class="widget-container">
                                            <h2 class="widget-title">Productos</h2>
                                            <ul>
                                            @foreach($products as $product)
                                                <li>
                                                    <a href="{{ route('products.show', [$product->id, $product->getFirstPhoto()->id]) }}">
                                                        {{ $product->nombre }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        	</ul>
                                        </li>
                                    </ul>
                                </div>
                                <div id="footcol2" class="six columns">
                                    <ul>
                                        <li class="widget-container">
                                            <h2 class="widget-title">Dónde ubicarnos</h2>
                                            <ul>
                                                Aquí los detalles de la dirección
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div id="footcol4" class="three columns">
                                    <ul>
                                        <li class="widget-container">
                                            <h2 class="widget-title">Enlaces de Interés</h2>
                                            <ul>
                                                <li><a href="{{ route('products.index') }}">Catálogo</a></li>
                                                <li><a href="{{ route('about_path') }}">Nuestra Empresa</a></li>
                                                <li><a href="{{ route('address_path') }}">Donde estamos</a></li>
                                                <li><a href="{{ route('contact_path') }}">Contacto</a></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FOOTER SIDEBAR -->

        </footer>