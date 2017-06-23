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
                    <a href="{{ url('admin/metro/area') }}" class="breadcrumb"> {{ $area->name }}</a>
                    <a class="breadcrumb"> Edit Area</a>
                </div>
            </div>
        </div>
    </nav>

	<div class="container">
		<br>

		<div class="fixed-action-btn">
			<a href="{{ url('admin/metro/area/') }}" class="btn-floating red btn-large"><i class="fa fa-angle-left"></i></a>
		</div>

		<h5>Edit {{ $area->name }}</h5>
        
        <div class="row">
            <div class="col s12">
                <form action="{{ url('admin/metro/area/'.$area->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="area_name" type="text" class="validate" name="name" maxlength="255" autofocus="on" value="{{ $area->name }}" placeholder="" required>
                            <label for="area_name">Metro area Name</label>
                        </div>
                        <div class="input-field col s12">
                            <h6>Description (optional):</h6>
                            <textarea name="description" class="tinymce">
                                {!! $area->description !!}
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

