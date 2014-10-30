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
							<li @if( route ('home') == $currentRoute) class="current" @endif><a href="{{ route('home') }}">Inicio<span>Pagina Principal</span></a></li>
							<li @if( route ('products.index') == $currentRoute) class="current" @endif><a href="{{ route('products.index') }}">Catálogo{{--<span>Nuestros productos</span>--}}</a></li>
							<li @if( URL::to ('/').'acerca' == $currentRoute) class="current" @endif><a href="{{ route('about_path') }}">Empresa<span>Conoce la empresa</span></a></li>
							<li @if( URL::to ('/').'ubicacion' == $currentRoute) class="current" @endif><a href="{{ route('address_path') }}">Donde estamos<span>Como localizarnos</span></a></li>
							<li @if( route ('contact_path') == $currentRoute) class="current" @endif><a href="{{ route('contact_path') }}">Contacto<span>Direccion y email</span></a></li>
                            @if (!$currentUser)
                                <li @if(route('register_user_path') == $currentRoute) class="current" @endif><a href="{{ route('register_user_path') }}">Registrarse<span></span></a></li>
                                <li @if(route('login_path') == $currentRoute) class="current" @endif><a href="{{ route('login_path') }}">Ingresar<span></span></a></li>
                            @else
                                @if($currentUser->isAdmin())
                                    <li><a href="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->nombre; }}</a></li>
                                    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                                @else
                                    <li><a href="#">{{ Auth::user()->nombre; }}</a></li>
                                @endif
                                <li><a href="{{ route('logout_path') }}">Salir<span></span></a></li>
                            @endif
						</ul><!-- topnav -->
						<select id="selectNav" class="tinynav tinynav1">
							<option @if(route('home') == $currentRoute) selected="selected" @endif value="{{ route('home') }}">Inicio</option>
							<option @if(route('products.index') == $currentRoute) selected="selected" @endif value="{{ route('products.index') }}">Catálogo</option>
							<option @if( URL::to ('/').'acerca' == $currentRoute) class="current" @endif value="{{ route('about_path') }}">Empresa</option>
							<option @if( URL::to ('/').'ubicacion' == $currentRoute) class="current" @endif value="{{ route('address_path') }}">Donde estamos</option>
							<option @if(route('contact_path') == $currentRoute) selected="selected" @endif value="{{ route('contact_path') }}">Contacto</option>
							@if (!$currentUser)
								<option @if(route('register_user_path') == $currentRoute) selected="selected" @endif value="{{ route('register_user_path') }}">Registrarse</option>
								<option @if(route('login_path') == $currentRoute) selected="selected" @endif value="{{ route('login_path') }}">Ingresar</option>
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
				</section>
			</header>
		</div>
		<div class="clear"></div>
		<div class="row">
			<article>
                @include('flash::message');
            </article>
		</div>
		<div class="row">
			<section class="eight columns"></section>
			<section class="four columns">
				{{ Form::open(['route' => 'filtered_products_path', 'method' => 'get']) }}
					<div class="four columns">
						{{ Form::text('filter_word', null, ['size' => '25', 'class' => 'text-input', 'placeholder' => 'Busqueda']) }}
					</div>
					<div class="four columns">
						{{ Form::submit('>', ['class' => 'button']) }}
					</div>
				{{ Form::close() }}
			</section>
		</div>
	</div>
</div>
<!-- END HEADER -->