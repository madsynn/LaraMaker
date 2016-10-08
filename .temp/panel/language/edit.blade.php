@extends('layouts.main')

@section('title')
    {{$language->name}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => 'admin/language/'.$language->id,'method' => 'put']) !!}
            <strong>{{lang('Name')}}</strong>
            <input type="text" class="form-control" name="name" value="{{$language->name}}"/>
            <hr/>
            <h4 align="center">{{lang('Translations')}}</h4>
        @foreach($language->translations()->where('post_id', 0)->where('page_id',0)->where('category_id',0)->where('menu_item_id',0)->get() as $tr)
                <strong>{{$tr->key}}</strong>
                <input class="form-control tr" type="text" tr-id="{{$tr->id}}"
                       value="{{$tr->value}}"/>
            @endforeach
            <br/>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{lang('Update')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script>
        $(".tr").keypress(function () {
            $(this).attr("name", "translations[" + $(this).attr("tr-id") + "]");
        });
    </script>
@stop