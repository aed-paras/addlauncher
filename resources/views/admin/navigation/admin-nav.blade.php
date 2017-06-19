<header>
	<div class="container">
		<a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only btn-floating red lighten-2">
			<i class="material-icons">menu</i>
		</a>
	</div>
	<ul id="nav-mobile" class="side-nav fixed">
		<li>
			<div class="userView">
				<div class="background">
					<img src="{{ asset('images/navbg.png') }}">
				</div>
				<a id="logo-container" href="{{ url('/admin') }}" class="brand-logo">
					<img src="{{ asset('images/logo-big.png') }}" alt="ADD Launcher Logo" width="90%">
				</a>
				<span class="white-text name">{{ Auth::user()->name }}</span>
				<span class="white-text email">{{ Auth::user()->email }}</span>
			</div>
		</li>
		<li class="bold @yield('dashboard_active') "><a href="{{ url('/admin/dashboard') }}" class="waves-effect waves-teal">Dashboard</a></li>
		<li class="bold @yield('users_active')"><a href="{{ url('/admin/users') }}" class="waves-effect waves-teal">Users</a></li>
		<li class="bold @yield('orders_active')"><a href="{{ url('/admin/orders') }}" class="waves-effect waves-teal">Orders</a></li>
		<li class="bold @yield('categories_active')"><a href="{{ url('/admin/categories') }}" class="waves-effect waves-teal">Categories</a></li>
		<li class="divider"></li>
		<ul class="collapsible collapsible-accordion">
			<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Airport</a>
				<div class="collapsible-body">
					<ul>
						<li class="@yield('airport_cities_active')"><a href="{{ url('/admin/airport/cities') }}">Cities</a></li>
						<li class="@yield('airport_stations_active')"><a href="{{ url('/admin/airport/stations') }}">Stations</a></li>
						<li class="@yield('airport_area_active')"><a href="{{ url('/admin/airport/area') }}">Area</a></li>
						<li class="@yield('airport_panel_types_active')"><a href="{{ url('/admin/airport/panel_types') }}">Panel Types</a></li>
						<li class="@yield('airport_panels_active')"><a href="{{ url('/admin/airport/panels') }}">Panels</a></li>
					</ul>
				</div>
			</li>
			<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Metro</a>
				<div class="collapsible-body">
					<ul>
						<li class="@yield('metro_cities_active')"><a href="{{ url('/admin/metro/cities') }}">Cities</a></li>
						<li class="@yield('metro_lines_active')"><a href="{{ url('/admin/metro/lines') }}">Lines</a></li>
						<li class="@yield('metro_stations_active')"><a href="{{ url('/admin/metro/stations') }}">Stations</a></li>
						<li class="@yield('metro_area_active')"><a href="{{ url('/admin/metro/area') }}">Area</a></li>
						<li class="@yield('metro_panel_types_active')"><a href="{{ url('/admin/metro/panel_types') }}">Panel Types</a></li>
						<li class="@yield('metro_panels_active')"><a href="{{ url('/admin/metro/panels') }}">Panels</a></li>
					</ul>
				</div>
			</li>
			<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Outdoor</a>
				<div class="collapsible-body">
					<ul>
						<li class="@yield('outdoor_cities_active')"><a href="{{ url('/admin/outdoor/cities') }}">Cities</a></li>
						<li class="@yield('outdoor_locations_active')"><a href="{{ url('/admin/outdoor/locations') }}">Locations</a></li>
						<li class="@yield('outdoor_area_active')"><a href="{{ url('/admin/outdoor/area') }}">Area</a></li>
						<li class="@yield('outdoor_panel_types_active')"><a href="{{ url('/admin/outdoor/panel_types') }}">Panel Types</a></li>
						<li class="@yield('outdoor_panels_active')"><a href="{{ url('/admin/outdoor/panels') }}">Panels</a></li>
					</ul>
				</div>
			</li>
			<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Shopping Malls</a>
				<div class="collapsible-body">
					<ul>
						<li class="@yield('shopping_mall_cities_active')"><a href="{{ url('/admin/shopping_mall/cities') }}">Cities</a></li>
						<li class="@yield('shopping_mall_locations_active')"><a href="{{ url('/admin/shopping_mall/locations') }}">Locations</a></li>
						<li class="@yield('shopping_mall_shopping_malls_active')"><a href="{{ url('/admin/shopping_mall/shopping_mall') }}">Shopping Malls</a></li>
						<li class="@yield('shopping_mall_area_active')"><a href="{{ url('/admin/shopping_mall/area') }}">Area</a></li>
						<li class="@yield('shopping_mall_panel_types_active')"><a href="{{ url('/admin/shopping_mall/panel_types') }}">Panel Types</a></li>
						<li class="@yield('shopping_mall_panels_active')"><a href="{{ url('/admin/shopping_mall/panels') }}">Panels</a></li>
					</ul>
				</div>
			</li>
		</ul>
		<li class="divider"></li>
		<li class="bold @yield('settings_active')"><a href="/admin/settings">Settings</a></li>
		<li class="bold">
			<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
				Logout
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
			{{-- <a href="{{ url('/admin/') }}" class="waves-effect waves-teal">Log out</a> --}}
		</li>
	</ul>
</header>

{{-- <ul id="slide-out" class="side-nav fixed">
	<li>
		<div class="userView">
			<div class="background">
				<img src="images/office.jpg">
			</div>
			<a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
			<a href="#!email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
		</div>
	</li>
	<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
	<li><a href="#!">Second Link</a></li>
	<li><div class="divider"></div></li>
	<li><a class="subheader">Subheader</a></li>
	<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul> --}}

