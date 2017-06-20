@extends('layouts.admin') 

@section('metro_active') active @endsection 
@section('metro_cities_active') active @endsection 


@section('content')
	@include('plugins.admin-heading', ['title' => 'Metro Cities'])
    <nav class="blue lighten-1">
        <div class="container">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ url('admin/metro') }}" class="breadcrumb"> Metro</a>
                    <a class="breadcrumb"> Cities</a>
                </div>
            </div>
        </div>
    </nav>

	<div class="container">
		<br>
		<h5>Add City</h5>
		<div class="row">
			<form action="" method="post" class="col s12">
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s12">
						<input id="city_name" type="text" class="validate" name="name" maxlength="255" autofocus="on" required>
						<label for="city_name">City Name</label>
						<button type="submit" class="btn blue lighten-2 waves-effect waves-light"><i class="material-icons left">add</i>Add City</button>
					</div>
				</div>
			</form>
		</div>
		<br>
		<h5>List of metro cities</h5>
		<table class="highlight">
			<thead>
				<tr>
					<th data-field="id">#ID</th>
					<th data-field="name">Name</th>
					<th data-field="action" class="right"></th>
				</tr>
			</thead>
			<tbody>
			@forelse ($cities as $city)
				<tr class="city_row" id="city_row_{{$city->id}}">
					<td>{{ $city->id }}</td>
					<td class="city-name">{{ $city->name }}</td>
					<td class="right">
						<a href="{{ url('admin/metro/line/'.$city->id) }}" class="waves-effect waves-light btn blue lighten-2">View Metro Lines</a>
						<a href="#edit_modal" class="waves-effect waves-light btn yellow darken-3 edit-btn" data-id="{{$city->id}}">Edit</a>
						{{-- <a href="#" class="waves-effect waves-light btn yellow darken-4">Hide</a> --}}
						<a class="waves-effect waves-light btn red delete-btn" data-id="{{$city->id}}">Delete</a>
					</td>
				</tr>
			@empty
				<tr>
					<td class="center no_data" colspan="4">
						There are no cities yet!
					</td>
				</tr>
			@endforelse
			</tbody>
		</table>

	</div>

	<!-- Modal Structure -->
	<div id="edit_modal" class="modal">
		<form action="{{ url('/admin/city') }}" method="post" class="col s12">
			<div class="modal-content">
				<h4>Edit City Data</h4>
				<div>Changing <span id="edit_name"></span></div>
				<div class="row">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="row">
						<div class="input-field col s12">
							<input id="city_new_name_input" type="text" class="validate" name="name" maxlength="255" placeholder="">
							<label for="city_new_name_input">New Name</label>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Change</button>
			</div>
		</form>
	</div>

@endsection

@section('custom_scripts')
    <script src="{{ asset('js/admin/metro/city.js') }}"></script>
@endsection
