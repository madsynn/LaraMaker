@extends('layouts.main')

@section('title')
    {{lang('Settings')}}
@stop

@section('content')
    <h3 align="center"><i class="fa fa-wrench"></i> {{lang('Settings')}}</h3>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => 'admin/settings']) !!}
            @foreach(\App\Models\Option::where('editable',1)->get() as $option)
                <strong>{{$option->name}}</strong>
                @if($option->type == "string")
                    <input class="form-control" type="text" name="keys[{{$option->key}}]" value="{{$option->value}}"/>
                @endif
                @if($option->type == "select")
                    <select name="keys[{{$option->key}}]" class="form-control">
                        @foreach($langs as $lang)
                            <option value="{{$lang->id}}" {{$option->value==$lang->id?"selected":""}}>{{$lang->name}}</option>
                        @endforeach
                    </select>
                @endif
                @if($option->type == "bool")
                    <select name="keys[{{$option->key}}]" class="form-control">
                            <option value="1" {{$option->value==1?"selected":""}}>Yes</option>
                            <option value="0" {{$option->value==0?"selected":""}}>No</option>
                    </select>
                @endif
            @endforeach
            <br/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{lang('Save')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop