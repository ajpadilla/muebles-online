<!-- HEADER -->
<div id="outerheader">
	<div id="headercontainer">
		<div class="container">
			<header id="top">
				<div id="logo">
					<a href="{{ route('home') }}"><img src="{{asset('images/logo_18654.png')}}" alt=""/></a>
				</div>

                <section id="navigation">
                    <nav id="nav-wrap">
                        <ul id="topnav" class="sf-menu">
							<li @if( route ('home') == $currentRoute) class="current" @endif><a href="{{ route('home') }}">Inicio<span>Pagina Principal</span></a></li>
							<li @if( route ('catalogo_path') == $currentRoute) class="current" @endif><a href="{{ route('catalogo_path') }}">Catálogo{{--<span>Nuestros productos</span>--}}</a></li>
							<li @if( URL::to ('/').'acerca' == $currentRoute) class="current" @endif><a href="/acerca">Empresa<span>Conoce la empresa</span></a></li>
							<li @if( URL::to ('/').'ubicacion' == $currentRoute) class="current" @endif><a href="/ubicacion">Donde estamos<span>Como localizarnos</span></a></li>
							<li @if( route ('contact_path') == $currentRoute) class="current" @endif><a href="{{ route('contact_path') }}">Contacto<span>Direccion y email</span></a></li>
                            @if (!$currentUser)
                                <li @if(route('register_user_path') == $currentRoute) class="current" @endif><a href="{{ route('register_user_path') }}">Registrarse<span></span></a></li>
                                <li @if(route('login_path') == $currentRoute) class="current" @endif><a href="{{ route('login_path') }}">Ingresar<span></span></a></li>
                            @else
                                <li><a href="#">{{ Auth::user()->nombre; }}</a></li>
                                <li><a href="{{ route('logout_path') }}">Salir<span></span></a></li>
                            @endif
						</ul><!-- topnav -->
						<select id="selectNav" class="tinynav tinynav1">
							<option @if(route('home') == $currentRoute) selected="selected" @endif value="{{ route('home') }}">Inicio</option>
							<option @if(route('catalogo_path') == $currentRoute) selected="selected" @endif value="{{ route('catalogo_path') }}">Catálogo</option>
							<option @if( URL::to ('/').'acerca' == $currentRoute) class="current" @endif value="/acerca">Empresa</option>
							<option @if( URL::to ('/').'ubicacion' == $currentRoute) class="current" @endif value="/ubicacion">Donde estamos</option>
							<option @if(route('contact_path') == $currentRoute) selected="selected" @endif value="{{ route('contact_path') }}">Contacto</option>
							@if (!$currentUser)
								<option @if(route('register_user_path') == $currentRoute) selected="selected" @endif value="{{ route('register_user_path') }}">Registrarse</option>
								<option @if(route('login_path') == $currentRoute) selected="selected" @endif value="{{ route('login_path') }}">Ingresar</option>
							@else
								<option value="#">{{ Auth::user()->nombres; }}</option>
								<option value="{{ route('logout_path') }}">Salir</option>
							@endif
						</select>
						<div class="clear"></div>
					</nav><!-- nav -->
				</section>
				<div class="clear"></div>
			</header>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- END HEADER -->