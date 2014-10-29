@extends('layouts.default')
@section('content')
	<!-- AFTERHEADER -->
        <div id="outerafterheader">
            <div class="container">
                <div class="row">
                    <div id="afterheader" class="twelve columns">
                        <h1 class="pagetitle nodesc">Nosotros</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- END AFTERHEADER -->

        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div id="maincontainer">
        	<div class="container">
                <div class="row">
                	<section id="maincontent">

                       	<section id="content"  class="eight columns positionleft">
                        	<div class="page articlecontainer">
                                <div class="pageimg">
                                    <img src="images/content/pic.jpg" alt="pic" />
                                </div>
                                <article class="entry-content">
                                    <h2>Acerca de nosotros</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam ligula arcu, sed congue diam placerat at. Maecenas nec vestibulum nulla, et elementum libero. Morbi tempor metus ut mi lobortis euismod. Vestibulum nec metus neque. Praesent pharetra dapibus nulla, vel sagittis neque.</p>
                                    <p>In hac habitasse platea dictumst. Mauris dignissim rutrum massa eu laoreet. Fusce egestas felis ac nunc scelerisque egestas. Cras feugiat posuere sapien, nec malesuada enim tincidunt non. Nullam vitae egestas mauris. Maecenas non rutrum augue. Proin a elementum libero, id sodales neque. Proin et consequat eros. Nulla facilisi. Etiam in dapibus turpis. Donec iaculis tellus sit amet est tincidunt volutpat.</p>
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis aliquet est nec nunc tincidunt eleifend. Sed semper nulla nunc, ut tempus justo venenatis in. Proin non lorem ultricies massa tempor porttitor. Pellentesque ac pretium mauris, volutpat aliquam lacus. Suspendisse vel arcu nibh.</p>
                                    <blockquote>Morbi pellentesque, ante ut tristique dictum, quam nibh ornare<br /> sapien, sed porta lacus justo eget massa. Mauris ullamcorper<br /> imperdiet tellus, sit amet cursus diam vestibulum id.</blockquote>
                                    <div class="separator"></div>
                                    <h2>Nuestra experiencia</h2>
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis aliquet est nec nunc tincidunt eleifend. Sed semper nulla nunc, ut tempus justo venenatis in. Proin non lorem ultricies massa tempor porttitor. Pellentesque ac pretium mauris, volutpat aliquam lacus. Suspendisse vel arcu nibh.</p>
                                    <ul class="listarrow">
                                    <li>Mauris faucibus volutpat est, et pellentesque nibh cursus sed.</li>
                                    <li>Vestibulum in urna odio, mattis dapibus felis.</li>
                                    <li>Nam sed neque metus, ac ullamcorper massa.</li>
                                    <li>Duis non odio ac dui tempus hendrerit.</li>
                                    </ul>
                                </article>
                            </div>
                        </section><!-- content -->

                        <aside id="sidebar" class="four columns positionright">
							<div class="widget-area">
	                            <ul>
	                                <li class="widget-container widget_hover">
	                                    <h2 class="widget-title">Información</h2>
	                                    <div class="textwidget">Detalles adicionales</div>
	                                </li>
	                                @include('layouts.partials._random-products')
	                                {{--@include('layouts.partials.tags')--}}
	                            </ul>
							</div>
						</aside><!-- sidebar -->
					</section>
				</div>
			</div>
		</div>
	</div>
<!-- END MAIN CONTENT -->
@stop
