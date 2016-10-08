@extends('layouts.main')

@section('title')
    {{lang('Galleries')}}
@stop

@section('content')
    <h3><i class="fa fa-image"></i> {{lang('Galleries')}}</h3>
    <a href="{{url('admin/gallery/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> {{lang('Create')}}</a>
    <div class="row">
        @forelse($galleries as $gallery)
            <div class="col-sm-3" style="text-align:center;">
                <h4><a href="{{url('admin/gallery/'.$gallery->id.'/edit')}}">{{$gallery->name}}</a><a
                            href="{{url('admin/gallery/'.$gallery->id.'/delete')}}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a></h4>
                <p>{{$gallery->description}}</p>
            </div>
        @empty
            <h3 align="center">{{lang('There are no galleries')}}</h3>
        @endforelse
    </div>
@stop