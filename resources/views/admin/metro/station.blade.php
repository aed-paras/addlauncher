@extends('layouts.admin') 

@section('metro_active') active @endsection

@section('content')
	@include('plugins.admin-heading', ['title' => 'Metro Stations'])
    <nav class="blue lighten-1">
        <div class="container">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ url('admin/metro') }}" class="breadcrumb"> Metro</a>
                    <a href="{{ url('admin/metro/city') }}" class="breadcrumb"> {{ $current_line->metro_city->name }}</a>
                    <a href="{{ url('admin/metro/line/'.$current_line->metro_city->id) }}" class="breadcrumb"> {{ $current_line->name }}</a>
                    <a class="breadcrumb"> Stations</a>
                </div>
            </div>
        </div>
    </nav>

	<div class="container">
		<br>
		<h5>Add Metro Station</h5>
		<div class="row">
			<form action="{{ url('admin/metro/station') }}" method="post" class="col s12">
				{{ csrf_field() }}
                <input type="hidden" name="line_id" value="{{ $current_line->id }}">
				<div class="row">
					<div class="input-field col s12">
						<input id="station_name" type="text" class="validate" name="name" maxlength="255" autofocus="on" required>
						<label for="station_name">Metro station Name</label>
						<button type="submit" class="btn blue lighten-2 waves-effect waves-light"><i class="material-icons left">add</i>Add Station</button>
					</div>
				</div>
			</form>
		</div>
		<br>
		<h5>List of metro station</h5>
		<table class="highlight">
			<thead>
				<tr>
					<th data-field="id">#ID</th>
					<th data-field="name">Name</th>
					<th data-field="action" class="right"></th>
				</tr>
			</thead>
			<tbody>
			@forelse ($stations as $station)
				<tr class="station_row" id="station_row_{{$station->id}}">
					<td>{{ $station->id }}</td>
					<td class="station-name">{{ $station->name }}</td>
					<td class="right">
						<a href="{{ url('admin/metro/panel/'.$station->id) }}" class="waves-effect waves-light btn blue lighten-2">View Panels</a>
						<a href="#edit_modal" class="waves-effect waves-light btn yellow darken-3 edit-btn" data-id="{{$station->id}}">Edit</a>
						{{-- <a href="#" class="waves-effect waves-light btn yellow darken-4">Hide</a> --}}
						<a class="waves-effect waves-light btn red delete-btn" data-id="{{$station->id}}">Delete</a>
					</td>
				</tr>
			@empty
				<tr>
					<td class="center no_data" colspan="4">
						There are no metro stations yet!
					</td>
				</tr>
			@endforelse
			</tbody>
		</table>

	</div>

	<!-- Modal Structure -->
	<div id="edit_modal" class="modal">
        <form action="{{ url('/admin/station/') }}" method="post" class="col s12">
            <div class="modal-content">
                <h4>Edit Metro station Data</h4>
                <div>Changing <span id="edit_name"></span></div>
                <div class="row">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="station_new_name_input" type="text" class="validate" name="name" maxlength="255" placeholder="">
                            <label for="station_new_name_input">New Name</label>
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
    <script src="{{ asset('js/admin/metro/station.js') }}"></script>
@endsection
