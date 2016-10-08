@extends('layouts.main')

@section('title')
    {{$media->path}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-8">
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-wrench"></i> {{lang("File's Properties")}}</h3>
                </div>
                <div class="panel-body">
                    <strong>{{lang('Mime Type')}}: {{$media->mime_type}}</strong><br>
                    <strong>{{lang('File Size')}}: {{round($media->file_size/(1024*1024))}} MB</strong><br>
                    <strong>{{lang('Uploaded At')}}: {{$media->created_at}}</strong>
                </div>
            </div>
        </div>
    </div>
@stop