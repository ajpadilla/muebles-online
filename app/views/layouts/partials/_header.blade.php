ç<!-- HEADER -->
<div id="outerheader">
	<div id="headercontainer">
		<div class="container">
			<header id="top">

				<div id="logo">
					<a href="index.html"><img src="{{asset('images/logo_18654.png')}}" alt=""/></a>
				</div>

				<section id="navigation">
					<nav id="nav-wrap">
						<ul id="topnav" class="sf-menu">
							<li class="current"><a href="index.html">Inicio<span>Pagina Principal</span></a></li>
							<li><a href="accommodation.html">Catalogo<span>Nuestros productos</span></a></li>
							<li><a href="facilities.html">Empresa<span>Conoce la empresa</span></a></li>
							<li><a href="gallery.html">Donde estamos<span>Como localizarnos</span></a></li>
							<li><a href="blog.html">Contacto<span>Direccion y email</span></a></li>
							<li>{{ link_to_route('register_user_path', '<span>Registrarse</span>') }}</li>
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