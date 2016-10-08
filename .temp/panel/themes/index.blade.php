@extends('layouts.main')

@section('title')
    {{lang('Themes')}}
@stop

@section('content')
    <h3><i class="fa fa-pencil"></i> {{lang('Themes')}}</h3>
    <a href="{{url('admin/theme/install')}}" class="btn btn-success"><i class="fa fa-upload"></i> {{lang('Upload')}}</a>
    <div class="row" style="margin-top:20px;">
        @foreach(\App\Models\Theme::get() as $theme)
            <div class="col-sm-2">
                <div class="panel panel-invert">
                    <div class="panel-heading">
                        <div class="panel-title">{{$theme->name}} </div>
                        @if(\App\Models\Theme::count()>1)
                            <a href="{{url('admin/theme/'.$theme->id.'/uninstall')}}"
                               class="btn btn-danger pull-right btn-xs" style="margin-top:10px;;"><i
                                        class="fa fa-trash-o"></i> {{lang('Uninstall')}}</a>
                        @endif
                    </div>
                    <div class="panel-body" style="padding: 0px;">
                        <img src="{{asset('themes/'.$theme->name.'/index.png')}}"
                             style="padding: 0px;margin: 0px;max-width:100%;" alt=""/>
                    </div>
                    <div class="panel-footer">
                        @if(option('theme')!=$theme->id)
                            <a href="{{url('admin/theme/'.$theme->id.'/activate')}}" class="btn btn-success btn-sm "><i
                                        class="fa fa-check"></i> {{lang('Activate')}}</a>
                        @else
                            <a href="{{url('admin/theme/'.$theme->id.'/activate')}}"
                               class="btn btn-success btn-sm disabled"><i
                                        class="fa fa-check"></i> {{lang('Activated')}}</a>
                        @endif
                        <a href="{{url('admin/theme/'.$theme->id)}}" class="btn btn-info btn-sm pull-right"><i
                                    class="fa fa-wrench"></i> {{lang('Options')}}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop