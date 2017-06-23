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
                    <a href="{{ url('admin/metro/city') }}" class="breadcrumb"> {{ $station->metro_line->metro_city->name }}</a>
                    <a href="{{ url('admin/metro/line/'.$station->metro_line->metro_city->id) }}" class="breadcrumb"> {{ $station->metro_line->name }}</a>
                    <a href="{{ url('admin/metro/line/'.$station->metro_line->id) }}" class="breadcrumb"> {{ $station->metro_line->name }}</a>
                    <a class="breadcrumb"> Edit station</a>
                </div>
            </div>
        </div>
    </nav>

	<div class="container">
		<br>

		<div class="fixed-action-btn">
			<a href="{{ url('admin/metro/station/'.$station->metro_line->id) }}" class="btn-floating red btn-large"><i class="fa fa-angle-left"></i></a>
		</div>

		<h5>Edit {{ $station->name }}</h5>
        
        <div class="row">
            <div class="col s12">
                <form action="{{ url('admin/metro/station/'.$station->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="line_id" value="{{ $station->metro_line->id }}">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="station_name" type="text" class="validate" name="name" maxlength="255" autofocus="on" value="{{ $station->name }}" placeholder="" required>
                            <label for="station_name">Metro station Name</label>
                        </div>
                        <div class="input-field col s12">
                            <h6>Description (optional):</h6>
                            <textarea name="description" class="tinymce">
                                {!! $station->description !!}
                            </textarea>
                        </div>
                        <div class="input-field col s12 right-align">
                            <button type="submit" class="btn blue lighten-2 waves-effect waves-light">Save Changes</button>
                        </div>
    				</div>

                </form>
            </div>
        </div>
        

	</div>
	

@endsection
