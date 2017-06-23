@extends('layouts.admin') 

@section('metro_active') active @endsection 

@section('head_import_scripts')
	@include('plugins.tiny-mce')
@endsection

@section('content')
	@include('plugins.admin-heading', ['title' => 'Metro Lines'])
    <nav class="blue lighten-1">
        <div class="container">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ url('admin/metro') }}" class="breadcrumb"> Metro</a>
                    <a href="{{ url('admin/metro/city') }}" class="breadcrumb"> {{ $city->name }}</a>
                    <a class="breadcrumb"> Lines</a>
                </div>
            </div>
        </div>
    </nav>

	<div class="container">
		<br>

		@include('plugins.add_btn')

		@include('plugins.validation_error')

		<h5>List of metro lines</h5>
		<table class="highlight">
			<thead>
				<tr>
					<th data-field="id">#ID</th>
					<th data-field="name">Name</th>
					<th data-field="action" class="right-align"></th>
				</tr>
			</thead>
			<tbody>
			@forelse ($lines as $line)
				<tr class="line_row" id="line_row_{{$line->id}}">
					<td>{{ $line->id }}</td>
					<td class="line-name"><a href="#view_modal" data-id="{{ $line->id }}">{{ $line->name }}</a></td>
					<td class="right-align">
						<a href="{{ url('admin/metro/station/'.$line->id) }}" class="waves-effect waves-light btn blue lighten-2">View Stations</a>
						<a href="{{ url('admin/metro/line/edit/'.$line->id) }}" class="waves-effect waves-light btn yellow darken-3">Edit</a>
						<a class="waves-effect waves-light btn red delete-btn" data-id="{{$line->id}}">Delete</a>
					</td>
				</tr>
			@empty
				<tr>
					<td class="center no_data grey-text" colspan="4">
						<i class="material-icons">not_interested</i>
						<br>
						There are no metro lines yet!
					</td>
				</tr>
			@endforelse
			</tbody>
		</table>

	</div>
	
	<!-- Add Modal Structure -->
	<div id="add_modal" class="modal modal-fixed-footer">
        <form action="{{ url('/admin/metro/line/') }}" method="post" class="col s12">
            <div class="modal-content">
                <h4>Add Metro Line</h4>
				{{ csrf_field() }}
				<input type="hidden" name="city_id" value="{{ $city->id }}">
				<div class="row">
					<div class="input-field col s12">
						<input id="line_name" type="text" class="validate" name="name" maxlength="255" required>
						<label for="line_name">Metro Line Name</label>
					</div>
					<div class="input-field col s12">
						<h6>Description (optional):</h6>
						<textarea name="description" class="tinymce"></textarea>
					</div>
				</div>
			</div>
            <div class="modal-footer">
				<button type="submit" class="btn-flat lighten-2 waves-effect waves-light"><i class="material-icons left">add</i>Add Line</button>
            </div>
        </form>
	</div>

	<!-- View Modal Structure -->
	<div id="view_modal" class="modal modal-fixed-footer">
		<div class="modal-content">
			<a href="" class="btn-flat right waves-effect waves-light view_modal_edit_btn"><i class="material-icons left">mode_edit</i>Edit</a>
			<h4>Line: <span id="view_name"></span>,  <span id="view_city">{{ $city->name }}</span></h4>
			<div class="divider"></div>
			<br>
			<div><strong>Description:</strong>
				<br>
				<span id="view_description"></span>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn-flat lighten-2 waves-effect waves-light modal-close">Close</button>
		</div>
	</div>

@endsection

@section('custom_scripts')
	<script>
		$('.delete-btn').click(function () {
			var self = $(this);
			var id = self.data('id');
			$.ajax({
				url: baseurl + "/admin/metro/line/" + id,
				method: 'DELETE',
				data: { '_token': csrf }
			}).done(function () {
				$("#line_row_" + id).slideUp();
				deleteNotification();
			});

		});

		$('.line-name a').click(function () {
			var id = $(this).data('id');
			var line_name = $(this).text();
			$('#view_name').text(line_name);
			$('.view_modal_edit_btn').attr('href', baseurl + '/admin/metro/line/edit/' + id);
			$.get(baseurl + '/admin/metro/line/description/' + id, {}, function (data) {
				$('#view_description').html(data);
			});
		});
	</script>
@endsection
