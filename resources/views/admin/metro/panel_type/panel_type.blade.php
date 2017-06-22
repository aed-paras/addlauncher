@extends('layouts.admin') 

@section('metro_active') active @endsection 

@section('content')
	@include('plugins.admin-heading', ['title' => 'Metro Panel Types'])
    <nav class="blue lighten-1">
        <div class="container">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ url('admin/metro') }}" class="breadcrumb"> Metro</a>
                    <a class="breadcrumb"> Panel Types</a>
                </div>
            </div>
        </div>
    </nav>

	<div class="container">
		<br>
		<h5>Add Metro Panel Type</h5>
		<div class="row">
			<form action="{{ url('admin/metro/panel_type') }}" method="post" class="col s12">
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s12">
						<input id="panel_type_name" type="text" class="validate" name="name" maxlength="255" autofocus="on" required>
						<label for="panel_type_name">Panel Type Name</label>
						<button type="submit" class="btn blue lighten-2 waves-effect waves-light"><i class="material-icons left">add</i>Add Panel Type</button>
					</div>
				</div>
			</form>
		</div>
		<br>
		<h5>List of metro panel types</h5>
		<table class="highlight">
			<thead>
				<tr>
					<th data-field="id">#ID</th>
					<th data-field="name">Name</th>
					<th data-field="action" class="right-align"></th>
				</tr>
			</thead>
			<tbody>
			@forelse ($panel_types as $panel_type)
				<tr class="panel_type_row" id="panel_type_row_{{$panel_type->id}}">
					<td>{{ $panel_type->id }}</td>
					<td class="panel_type-name">{{ $panel_type->name }}</td>
					<td class="right-align">
						<a href="#edit_modal" class="waves-effect waves-light btn yellow darken-3 edit-btn" data-id="{{$panel_type->id}}">Edit</a>
						<a class="waves-effect waves-light btn red delete-btn" data-id="{{$panel_type->id}}">Delete</a>
					</td>
				</tr>
			@empty
				<tr>
					<td class="center no_data grey-text" colspan="4">
						<i class="material-icons">not_interested</i>
						<br>
						There are no panel types yet!
					</td>
				</tr>
			@endforelse
			</tbody>
		</table>

	</div>

	<!-- Modal Structure -->
	<div id="edit_modal" class="modal">
		<form action="{{ url('/admin/panel_type') }}" method="post" class="col s12">
			<div class="modal-content">
				<h4>Edit Panel Type</h4>
				<div>Changing <span id="edit_name"></span></div>
				<div class="row">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="row">
						<div class="input-field col s12">
							<input id="panel_type_new_name_input" type="text" class="validate" name="name" maxlength="255" placeholder="">
							<label for="panel_type_new_name_input">New Name</label>
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
    <script src="{{ asset('js/admin/metro/panel_type.js') }}"></script>
@endsection
