@extends('layouts.main')

@section('title')
    {{lang('Add New Language')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => 'admin/language/']) !!}
            <strong>{{lang('Name')}}</strong>
            <input type="text" class="form-control" name="name" value="{{\Request::old('name')}}"/>
            <hr/>
            <h4 align="center">{{lang('Translations')}}</h4>
            @foreach(\App\Models\Language::find(option('language'))->translations()->where('post_id', 0)->where('page_id',0)->where('category_id',0)->where('menu_item_id',0)->get() as $tr)
                <strong>{{$tr->key}}</strong>
                <input class="form-control tr" type="text" name="translations[{{$tr->key}}]"
                       value="{{\Request::old('translations.'.$tr->нещ)?\Request::old('translations.'.$tr->key):$tr->value}}"/>
            @endforeach
            <br/>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{lang('Update')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

