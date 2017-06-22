@extends('layouts.admin') 

@section('metro_active') active @endsection 

@section('content')
	@include('plugins.admin-heading', ['title' => 'Metro Areas'])
    <nav class="blue lighten-1">
        <div class="container">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ url('admin/metro') }}" class="breadcrumb"> Metro</a>
                    <a class="breadcrumb"> Area</a>
                </div>
            </div>
        </div>
    </nav>

	<div class="container">
		<br>
		<h5>Add Metro Area</h5>
		<div class="row">
			<form action="{{ url('admin/metro/area') }}" method="post" class="col s12">
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s12">
						<input id="area_name" type="text" class="validate" name="name" maxlength="255" autofocus="on" required>
						<label for="area_name">Area Name</label>
						<button type="submit" class="btn blue lighten-2 waves-effect waves-light"><i class="material-icons left">add</i>Add Area</button>
					</div>
				</div>
			</form>
		</div>
		<br>
		<h5>List of metro areas</h5>
		<table class="highlight">
			<thead>
				<tr>
					<th data-field="id">#ID</th>
					<th data-field="name">Name</th>
					<th data-field="action" class="right-align"></th>
				</tr>
			</thead>
			<tbody>
			@forelse ($areas as $area)
				<tr class="area_row" id="area_row_{{$area->id}}">
					<td>{{ $area->id }}</td>
					<td class="area-name">{{ $area->name }}</td>
					<td class="right-align">
						<a href="#edit_modal" class="waves-effect waves-light btn yellow darken-3 edit-btn" data-id="{{$area->id}}">Edit</a>
						<a class="waves-effect waves-light btn red delete-btn" data-id="{{$area->id}}">Delete</a>
					</td>
				</tr>
			@empty
				<tr>
					<td class="center no_data grey-text" colspan="4">
						<i class="material-icons">not_interested</i>
						<br>
						There are no areas yet!
					</td>
				</tr>
			@endforelse
			</tbody>
		</table>

	</div>

	<!-- Modal Structure -->
	<div id="edit_modal" class="modal">
		<form action="{{ url('/admin/area') }}" method="post" class="col s12">
			<div class="modal-content">
				<h4>Edit Area</h4>
				<div>Changing <span id="edit_name"></span></div>
				<div class="row">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="row">
						<div class="input-field col s12">
							<input id="area_new_name_input" type="text" class="validate" name="name" maxlength="255" placeholder="">
							<label for="area_new_name_input">New Name</label>
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
    <script src="{{ asset('js/admin/metro/area.js') }}"></script>
@endsection
