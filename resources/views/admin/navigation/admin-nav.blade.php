<header>
	<a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only btn-floating red lighten-2 mobile-menu-open-btn">
		<i class="material-icons">menu</i>
	</a>
	<ul id="nav-mobile" class="side-nav fixed">
		<li>
			<div class="userView">
				<div class="background">
					<img src="{{ asset('images/navbg.png') }}">
				</div>
				<a id="logo-container" href="{{ url('/admin') }}" class="brand-logo">
					<img src="{{ asset('images/logo-big-light.png') }}" alt="ADD Launcher Logo" width="90%">
				</a>
				<span class="white-text name">{{ Auth::user()->name }}</span>
				<span class="white-text email">{{ Auth::user()->email }}</span>
			</div>
		</li>
		<li class="bold @yield('dashboard_active') "><a href="{{ url('/admin/dashboard') }}" class="waves-effect waves-teal"><i class="material-icons">dashboard</i>Dashboard</a></li>
		<li class="bold @yield('users_active')"><a href="{{ url('/admin/users') }}" class="waves-effect waves-teal"><i class="material-icons">perm_identity</i>Users</a></li>
		<li class="bold @yield('categories_active')"><a href="{{ url('/admin/categories') }}" class="waves-effect waves-teal"><i class="material-icons">view_module</i>Categories</a></li>
		<li class="bold @yield('orders_active')"><a href="{{ url('/admin/orders') }}" class="waves-effect waves-teal"><i class="material-icons">toc</i>Orders</a></li>
		<li class="divider"></li>
		<li class="no-padding">
			<ul class="collapsible collapsible-accordion">
				<li class="bold @yield('airpot_active')"><a class="collapsible-header  waves-effect waves-teal"><i class="fa fa-paper-plane"></i>Airport</a>
					<div class="collapsible-body">
						<ul>
							<li class="@yield('airport_cities_active')"><a href="{{ url('/admin/airport/city') }}"><i class="material-icons">trending_flat</i>Cities</a></li>
							<li class="@yield('airport_stations_active')"><a href="{{ url('/admin/airport/station') }}"><i class="material-icons">trending_flat</i>Stations</a></li>
							<li class="@yield('airport_area_active')"><a href="{{ url('/admin/airport/area') }}"><i class="material-icons">trending_flat</i>Area</a></li>
							<li class="@yield('airport_panel_types_active')"><a href="{{ url('/admin/airport/panel_type') }}"><i class="material-icons">trending_flat</i>Panel Types</a></li>
							<li class="@yield('airport_panels_active')"><a href="{{ url('/admin/airport/panel') }}"><i class="material-icons">trending_flat</i>Panels</a></li>
						</ul>
					</div>
				</li>
				<li class="bold @yield('metro_active')"><a class="collapsible-header  waves-effect waves-teal"><i class="fa fa-subway"></i>Metro</a>
					<div class="collapsible-body">
						<ul>
							<li class="@yield('metro_cities_active')"><a href="{{ url('/admin/metro/city') }}"><i class="material-icons">trending_flat</i>Cities</a></li>
							<li class="@yield('metro_lines_active')"><a href="{{ url('/admin/metro/line') }}"><i class="material-icons">trending_flat</i>Lines</a></li>
							<li class="@yield('metro_stations_active')"><a href="{{ url('/admin/metro/station') }}"><i class="material-icons">trending_flat</i>Stations</a></li>
							<li class="@yield('metro_area_active')"><a href="{{ url('/admin/metro/area') }}"><i class="material-icons">trending_flat</i>Area</a></li>
							<li class="@yield('metro_panel_types_active')"><a href="{{ url('/admin/metro/panel_type') }}"><i class="material-icons">trending_flat</i>Panel Types</a></li>
							<li class="@yield('metro_panels_active')"><a href="{{ url('/admin/metro/panel') }}"><i class="material-icons">trending_flat</i>Panels</a></li>
						</ul>
					</div>
				</li>
				<li class="bold @yield('outdoor_active')"><a class="collapsible-header  waves-effect waves-teal"><i class="fa fa-road"></i>Outdoor</a>
					<div class="collapsible-body">
						<ul>
							<li class="@yield('outdoor_cities_active')"><a href="{{ url('/admin/outdoor/city') }}"><i class="material-icons">trending_flat</i>Cities</a></li>
							<li class="@yield('outdoor_locations_active')"><a href="{{ url('/admin/outdoor/location') }}"><i class="material-icons">trending_flat</i>Locations</a></li>
							<li class="@yield('outdoor_area_active')"><a href="{{ url('/admin/outdoor/area') }}"><i class="material-icons">trending_flat</i>Area</a></li>
							<li class="@yield('outdoor_panel_types_active')"><a href="{{ url('/admin/outdoor/panel_type') }}"><i class="material-icons">trending_flat</i>Panel Types</a></li>
							<li class="@yield('outdoor_panels_active')"><a href="{{ url('/admin/outdoor/panel') }}"><i class="material-icons">trending_flat</i>Panels</a></li>
						</ul>
					</div>
				</li>
				<li class="bold @yield('shopping_mall_active')"><a class="collapsible-header  waves-effect waves-teal"><i class="fa fa-building"></i>Shopping Malls</a>
					<div class="collapsible-body">
						<ul>
							<li class="@yield('shopping_mall_cities_active')"><a href="{{ url('/admin/shopping_mall/city') }}"><i class="material-icons">trending_flat</i>Cities</a></li>
							<li class="@yield('shopping_mall_locations_active')"><a href="{{ url('/admin/shopping_mall/location') }}"><i class="material-icons">trending_flat</i>Locations</a></li>
							<li class="@yield('shopping_mall_shopping_malls_active')"><a href="{{ url('/admin/shopping_mall/shopping_mall') }}"><i class="material-icons">trending_flat</i>Shopping Malls</a></li>
							<li class="@yield('shopping_mall_area_active')"><a href="{{ url('/admin/shopping_mall/area') }}"><i class="material-icons">trending_flat</i>Area</a></li>
							<li class="@yield('shopping_mall_panel_types_active')"><a href="{{ url('/admin/shopping_mall/panel_type') }}"><i class="material-icons">trending_flat</i>Panel Types</a></li>
							<li class="@yield('shopping_mall_panels_active')"><a href="{{ url('/admin/shopping_mall/panel') }}"><i class="material-icons">trending_flat</i>Panels</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</li>		
		<li class="divider"></li>
		<li class="bold @yield('settings_active')"><a href="/admin/settings"><i class="material-icons">settings</i>Settings</a></li>
		<li class="bold">
			<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
				<i class="material-icons">power_settings_new</i>Logout
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

