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
							<li class="current"><a href="{{ route('home') }}">Inicio<span>Pagina Principal</span></a></li>
							<li><a href="{{ route('catalogo_path') }}">Catalogo<span>Nuestros productos</span></a></li>
							<li><a href="/acerca">Empresa<span>Conoce la empresa</span></a></li>
							<li><a href="/ubicacion">Donde estamos<span>Como localizarnos</span></a></li>
							<li><a href="{{ route('contact_path') }}">Contacto<span>Direccion y email</span></a></li>
                            @if (!$currentUser)
                                <li><a href="{{ route('register_user_path') }}">Registrarse<span></span></a></li>
                                <li><a href="{{ route('login_path') }}">Ingresar<span></span></a></li>
                            @else
                                <li><a href="#">{{ Auth::user()->nombres; }}</a></li>
                                <li><a href="{{ route('logout_path') }}">Salir<span></span></a></li>
                            @endif
						</ul><!-- topnav -->
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