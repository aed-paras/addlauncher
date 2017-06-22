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
                    <a class="breadcrumb"> Panels</a>
                </div>
            </div>
        </div>
    </nav>

    <a href="{{ url('/admin/metro/panel/create/'.$station->id) }}" class="btn-floating btn-large waves-effect waves-light red bottom-right-btn"><i class="material-icons">add</i></a>

	<div class="container">
		<br>
		<h5>List of metro panels</h5>
		<table class="highlight">
			<thead>
				<tr>
					<th data-field="id">#ID</th>
                    <th>Ad Code</th>
                    <th>Area</th>
                    <th>Panel Type</th>
                    <th>Size</th>
                    <th>Units</th>
                    <th>Available</th>
                    <th>Charges</th>
                    <th>Discounted</th>
					<th data-field="action" class="right-align"></th>
				</tr>
			</thead>
			<tbody>
			@forelse ($panels as $panel)
				<tr class="panel_row" id="panel_row_{{$panel->id}}">
					<td>{{ $panel->id }}</td>

                    <td>{{ $panel->ad_code }}</td>
                    <td>{{ $panel->metro_area->name }}</td>
                    <td>{{ $panel->metro_panel_type->name }}</td>
                    <td>{{ $panel->width }} Ft. {{ $panel->height }} Ft.</td>
                    <td>{{ $panel->units }}</td>
                    <td>{{ $panel->available }}</td>
                    <td>{{ $panel->charges }}</td>
                    <td>{{ $panel->actual_charges }}</td>
                    
					<td class="right-align">
						<a href="#view_modal" class="waves-effect waves-light btn blue lighten-2">View Panel info</a>
						<a href="#edit_modal" class="waves-effect waves-light btn yellow darken-3 edit-btn" data-id="{{$panel->id}}">Edit</a>
						<a href="#" class="waves-effect waves-light btn red lighten-4">Hide</a>
						<a class="waves-effect waves-light btn red delete-btn" data-id="{{$panel->id}}">Delete</a>
					</td>
				</tr>
			@empty
				<tr>
					<td class="center no_data grey-text" colspan="10">
						<i class="material-icons">not_interested</i>
						<br>
						There are no metro panels yet!
					</td>
				</tr>
			@endforelse
			</tbody>
		</table>

	</div>

@endsection

@section('custom_scripts')
    <script src="{{ asset('js/admin/metro/panel.js') }}"></script>
@endsection
