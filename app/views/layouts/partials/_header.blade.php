<!-- HEADER -->
<div id="outerheader">
	<div id="headercontainer">
		<div class="container">
			<header id="top">
				<div id="logo">
					<a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt=""/></a>
				</div>

                <section id="navigation">
                    <nav id="nav-wrap">
                        <ul id="topnav" class="sf-menu">
							<li @if( 'home' == $currentRoute) class="current" @endif><a href="{{ route('home') }}">Inicio<span>Pagina Principal</span></a></li>
							<li @if( 'products.index' == $currentRoute) class="current" @endif><a href="{{ route('products.index') }}">Catálogo{{--<span>Nuestros productos</span>--}}</a></li>
							<li @if( 'about_path' == $currentRoute) class="current" @endif><a href="{{ route('about_path') }}">Empresa<span>Conoce la empresa</span></a></li>
							<li @if( 'address_path' == $currentRoute) class="current" @endif><a href="{{ route('address_path') }}">Donde estamos<span>Como localizarnos</span></a></li>
							<li @if( 'contact_path' == $currentRoute) class="current" @endif><a href="{{ route('contact_path') }}">Contacto<span>Direccion y email</span></a></li>
							<li>
								@if (!$currentUser)
								<a href="#">
									Cuenta
									<span>Cuenta de Usuario</span>
								</a>
								@else
	                                @if($currentUser->isAdmin())
	                                    <a href="{{ route('users.show', $currentUser->id) }}">{{ $currentUser->nombre; }}</a>
	                                @else
	                                    <a href="#">{{ Auth::user()->nombre; }}</a>
	                                @endif
								@endif
								<span class="sf-sub-indicator"> »</span>
								<ul class="sub-menu" style="float: none; width: 10em; display: none; visibility: hidden;">
		                            @if (!$currentUser)
		                                <li @if('register_user_path' == $currentRoute) class="current" @endif><a href="{{ route('register_user_path') }}">Registrarse<span></span></a></li>
		                                <li @if('login_path' == $currentRoute) class="current" @endif><a href="{{ route('login_path') }}">Ingresar<span></span></a></li>
		                            @else
		                                @if($currentUser->isAdmin())
		                                    <li style="white-space: normal; float: left; width: 100%;"><a href="{{ route('users.index') }}">Usuarios</a></li>
		                                    <li style="white-space: normal; float: left; width: 100%;"><a href="{{ route('facturas.index') }}">Pedidos</a></li>
		                                @else
		                                    <li style="white-space: normal; float: left; width: 100%;"><a href="{{ route('facturas.index') }}">Mis Pedidos</a></li>
		                                @endif
		                                <li style="white-space: normal; float: left; width: 100%;"><a href="{{ route('logout_path') }}">Salir<span></span></a></li>
		                            @endif
                                </ul>
							</li>
						</ul><!-- topnav -->
						<select id="selectNav" class="tinynav tinynav1">
							<option @if('home' == $currentRoute) selected="selected" @endif value="{{ route('home') }}">Inicio</option>
							<option @if('products.index' == $currentRoute) selected="selected" @endif value="{{ route('products.index') }}">Catálogo</option>
							<option @if('about_path' == $currentRoute) class="current" @endif value="{{ route('about_path') }}">Empresa</option>
							<option @if('address_path' == $currentRoute) class="current" @endif value="{{ route('address_path') }}">Donde estamos</option>
							<option @if('contact_path' == $currentRoute) selected="selected" @endif value="{{ route('contact_path') }}">Contacto</option>
							@if (!$currentUser)
								<option @if('register_user_path' == $currentRoute) selected="selected" @endif value="{{ route('register_user_path') }}">Registrarse</option>
								<option @if('login_path' == $currentRoute) selected="selected" @endif value="{{ route('login_path') }}">Ingresar</option>
							@else
								@if($currentUser->isAdmin())
									<option value="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->nombre; }}</option>
									<option value="{{ route('users.index') }}">Usuarios</option>
								@else
									<option value="#">{{ Auth::user()->nombre; }}</option>
								@endif
								<option value="{{ route('logout_path') }}">Salir</option>
							@endif
						</select>
						<div class="clear"></div>
					</nav><!-- nav -->
					<br/>
					<div class="row">
						<section class="seven columns">
							<div class="eight columns"></div>
							<div class="four columns">
                                <a class="sub-menu-own" href="{{ route('register_user_path') }}">Registrarse<span></span></a>
                                <a class="sub-menu-own" href="{{ route('login_path') }}">Ingresar<span></span></a>
                            </div>
						</section>
						<section class="five columns">
							{{ Form::open(['route' => 'filtered_products_path', 'id' => 'filterForm']) }}
								<div class="ten columns">
									{{ Form::text('filter_word', null, ['class' => 't ext-input', 'style' => 'font-size: 20px; width: 9em', 'placeholder' => 'Busqueda', 'id' => 'filter_word']) }}
								</div>
								<div class="two columns">
									{{ Form::submit('>', ['class' => 'button', 'style' => 'font-size: 20px; padding: 16px;']) }}
								</div>
							{{ Form::close() }}
						</section>
					</div>
				</section>
			</header>
		</div>
		<div class="clear"></div>
		<div class="row">
			<article>
                @include('flash::message');
            </article>
		</div>

	</div>
</div>
<!-- END HEADER -->