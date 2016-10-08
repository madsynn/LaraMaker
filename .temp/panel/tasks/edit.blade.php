@extends('layouts.main')

@section('title')
    {{lang('Edit a task')}}
@stop

@section('content')
    <link rel="stylesheet" href="{{asset('panel/assets/js/jquery-ui/jquery-ui.min.css')}}"/>
    <h3 class="text-center">{{lang('Edit a task')}}</h3>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!!Form::open(['url' => 'admin/task/'.$task->id.'/edit'])!!}
            <strong>{{lang('Title')}}</strong>
            <input type="text" name="title" class="form-control" value="{{$task->title}}"/>
            <strong>{{lang('Description')}}</strong>
            <textarea class="form-control" rows="7" name="description">{{$task->description}}</textarea>
            <strong>{{lang('Date')}}</strong>
            <input type="text" name="date" class="form-control" value="{{date("m/d/Y", $task->date)}}"/>
            <br/>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{lang('Update')}}</button>
            {!!Form::close()!!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('panel/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
        $("input[name=date]").datepicker({
            minDate: '+0'
        });
    </script>
@stop