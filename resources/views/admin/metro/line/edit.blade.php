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
                    <a href="{{ url('admin/metro/city') }}" class="breadcrumb"> {{ $line->metro_city->name }}</a>
                    <a href="{{ url('admin/metro/line/'.$line->metro_city->id) }}" class="breadcrumb"> {{ $line->name }}</a>
                    <a class="breadcrumb"> Edit line</a>
                </div>
            </div>
        </div>
    </nav>

	<div class="container">
		<br>

		<div class="fixed-action-btn">
			<a href="{{ url('admin/metro/line/'.$line->metro_city->id) }}" class="btn-floating red btn-large"><i class="fa fa-angle-left"></i></a>
		</div>

		<h5>Edit {{ $line->name }}</h5>
        
        <div class="row">
            <div class="col s12">
                <form action="{{ url('admin/metro/line/'.$line->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="line_name" type="text" class="validate" name="name" maxlength="255" autofocus="on" value="{{ $line->name }}" placeholder="" required>
                            <label for="line_name">Metro line Name</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <select name="city_id" id="city_select" required>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" id="city_id_{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <label>Metro City</label>
                        </div>
                        <div class="input-field col s12">
                            <h6>Description (optional):</h6>
                            <textarea name="description" class="tinymce">
                                {!! $line->description !!}
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

@section('custom_scripts')
    <script>
        $('#city_id_{{ $line->metro_city->id }}').prop('selected', true);
        $('select').material_select();
    </script>
@endsection

