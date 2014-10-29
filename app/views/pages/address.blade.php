@extends('layouts.default')

@section('content')
<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h1 class="pagetitle nodesc">Ubicación</h1>
            </div>
        </div>
    </div>
</div>

<div id="outermain">
    <div id="maincontainer">
        <div class="container">
            <div class="row">
                <section id="maincontent">

                    <section id="content" class="eight columns positionleft">
                        <div class="page articlecontainer">
                            <div class="pageimg">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12334.42205784078!2d-0.404736!3d39.387805!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x116d082a310e849e!2sGrupo+Dos+Dise%C3%B1os+Auxiliares!5e0!3m2!1ses-419!2sve!4v1414603075626" width="800" height="600" frameborder="0" style="border:0"></iframe>
                            </div>
                        </div>
                    </section><!-- content -->

                    <aside id="sidebar" class="four columns positionright">
						<div class="widget-area">
	                        <ul>
	                            <li class="widget-container widget_hover">
	                                <h2 class="widget-title">Detalles de la dirección</h2>
	                                <div class="textwidget">Aquí los detalles</div>
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
@stop

