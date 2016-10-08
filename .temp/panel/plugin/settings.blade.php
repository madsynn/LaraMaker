@extends('layouts.main')

@section('title')
    {{$plugin->fullname}}
@stop

@section('content')
    <?php \View::addLocation(plugin_path($plugin->name) . "/App/Views"); ?>
    @include('Admin.index')
@stop