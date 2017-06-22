@extends('layouts.admin') 

@section('metro_active') active @endsection

@section('content')
	@include('plugins.admin-heading', ['title' => 'Metro Panels'])
	<nav class="blue lighten-1">
		<div class="container">
			<div class="nav-wrapper">
				<div class="col s12">
					<a href="{{ url('admin/metro') }}" class="breadcrumb"> Metro</a>
					<a href="{{ url('admin/metro/city') }}" class="breadcrumb"> {{ $station->metro_line->metro_city->name }}</a>
					<a href="{{ url('admin/metro/line'.$station->metro_line->metro_city->id) }}" class="breadcrumb"> {{ $station->metro_line->name }}</a>
					<a href="{{ url('admin/metro/station/'.$station->metro_line->id) }}" class="breadcrumb"> {{ $station->name }}</a>
					<a class="breadcrumb"> Create Panel</a>
				</div>
			</div>
		</div>
	</nav>

	<a href="{{ url('/admin/metro/panel/'.$station->id) }}" class="btn-floating btn-large waves-effect waves-light red bottom-right-btn"><i class="fa fa-angle-left"></i></a>

	<div class="container">
		<br>
		<h5>Add Metro Panels</h5>
		@if($areas->isEmpty())
			<div class="row padding-20 red white-text lighten-1">
				<div class="col s12">
					You need to add areas for metro first! <a href="{{ url('admin/metro/area') }}" class="btn blue right">Add Areas</a>
				</div>
			</div>
		@endif
		@if($panel_types->isEmpty())
			<div class="row padding-20 red white-text lighten-1">
				<div class="col s12">
					You need to add panel types for metro first! <a href="{{ url('admin/metro/panel_type') }}" class="btn blue right">Add Panel Types</a>
				</div>
			</div>
		@endif

		@if(!$areas->isEmpty() && !$panel_types->isEmpty())

		<div class="row">

			<form class="col s12" action="{{ url('/admin/panel/') }}" method="POST" enctype="multipart/form-data">
				@if (count($errors) > 0)
					<div class="red white-text padding-20">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				{{ csrf_field() }}
				<input type="hidden" name="station_id" value="{{ $station->id }}">

				<div class="row">
					<div class="input-field col s12">
						<input id="ad_code" type="text" class="validate" required>
						<label for="ad_code">Ad Code</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s6">
						<select name="area_id" required>
							<option value="" disabled selected>Choose your option</option>
							@foreach($areas as $area)
								<option value="{{ $area->id }}">{{ $area->name }}</option>
							@endforeach
						</select>
						<label>Area/Location</label>
					</div>
					<div class="input-field col s6">
						<select name="panel_type_id" required>
							<option value="" disabled selected>Choose your option</option>
							@foreach($panel_types as $panel_type)
								<option value="{{ $panel_type->id }}">{{ $panel_type->name }}</option>
							@endforeach
						</select>
						<label>Panel Types</label>
					</div>
				</div>
				<br>
				<h6>Panel Size</h6>
				<div class="row">
					<div class="input-field col s6">
						<input id="width" type="number" class="validate" step="any" required>
						<label for="width">Width</label>
					</div>
					<div class="input-field col s6">
						<input id="height" type="number" class="validate" step="any" required>
						<label for="height">Height</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input id="units" type="number" class="validate" required>
						<label for="units">Units</label>
					</div>
					<div class="input-field col s6">
						<input id="available_units" type="number" class="validate" required>
						<label for="available_units">Available Units</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<textarea id="textarea1" class="materialize-textarea" name="description"></textarea>
						<label for="textarea1">Description</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input id="charges" type="number" class="validate" required step="any">
						<label for="charges">Charges per Month</label>
					</div>
					<div class="input-field col s6">
						<input id="actual_charges" type="number" class="validate" required step="any">
						<label for="actual_charges">Actual Charges per month</label>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="file-field input-field col s12">
						<div class="btn">
							<span>File</span>
							<input type="file" name="image_file" accept="image/*" data-max-size="2048" required>
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload Panel Image">
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col s12">
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;Save Panel</button>
					</div>
				</div>

			</form>
		</div>
		@endif
	</div>

@endsection

@section('custom_scripts')
	<script>
		$('select').material_select();
	</script>
	<script src="{{ asset('js/admin/metro/panel_create.js') }}"></script>
@endsection
