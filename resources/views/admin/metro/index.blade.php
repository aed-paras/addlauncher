@extends('layouts.admin') 

@section('metro_active') active @endsection 

@section('content')
	@include('plugins.admin-heading', ['title' => 'Metro Dashboard'])
    <br>
    <br>
	<div class="container">

        <div class="row">
        
                <a href="{{ url('admin/metro/city') }}" class="btn waves-effect waves-light">Cities</a>

                <a href="{{ url('admin/metro/area') }}" class="btn waves-effect waves-light">Area</a>

                <a href="{{ url('admin/metro/panel_types') }}" class="btn waves-effect waves-light">Panel Types</a>

        </div>

	</div>

@endsection

@section('custom_scripts')
    <script src="{{ asset('js/admin/metro/city.js') }}"></script>
@endsection
