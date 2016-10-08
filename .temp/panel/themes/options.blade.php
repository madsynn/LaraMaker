@extends('layouts.main')

@section('title')
    {{$theme->name}} | {{lang('Options')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => 'admin/theme/'.$theme->id]) !!}
            @foreach($theme->options as $option)
                <strong>{{$option->name}}</strong><br>
                @if($option->type == "media")
                    <input type="hidden" id="media_input_{{$option->id}}" name="keys[{{$option->key}}]"/>
                    <a class="btn btn-primary" data-toggle="modal"
                       href="#media_{{$option->id}}">{{lang('Select an image')}}</a><br/>
                    <img src="{{$option->value!=""?asset($option->value):asset('panel/assets/images/preview.png')}}"
                         id="preview_{{$option->id}}" class="img-rounded" width="310" height="160"
                         style="background-color: #eee;"/>
                @endif
                @if($option->type == "string")
                    <input type="text" value="{{$option->value}}" name="keys[{{$option->key}}]" class="form-control"/>
                @endif
                @if($option->type == "text")
                    <textarea name="keys[{{$option->key}}]" class="form-control">{{$option->value}}</textarea>
                @endif
                <hr/>
            @endforeach
            <br/>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{lang('Save')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('modals')
    @foreach($theme->options()->where('type','media')->get() as $option)
        {!!media_modal('media_'.$option->id, 'media_input_'.$option->id, lang('Select Image'), "preview_".$option->id, $option->value )!!}
    @endforeach
@stop