@extends('layouts.main')

@section('title')
    {{lang('My Tasks')}}
@stop

@section('content')
    <h3 class="text-center"><i class="fa fa-list-ul"></i> {{lang('My Tasks')}}</h3>
    <a href="{{url('admin/task/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> {{lang('Add New')}}</a>
    <div class="table-responsive" style="margin-top:20px;">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>{{lang('Title')}}</th>
                <th>{{lang('Description')}}</th>
                <th>{{lang('Date')}}</th>
                <th>{{lang('Options')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td class="col-sm-6" {!!$task->is_finished?'style="text-decoration: line-through"':''!!}>{{$task->title}} {!!$task->is_finished?'':'<a href="'.url('admin/task/'.$task->id.'/finished').'"><i class="fa fa-check"></i> '.lang('Mark as finished').'</a>'!!}</td>
                    <td class="col-sm-4">{{$task->description}}</td>
                    <td class="col-sm-1">{{date("Y-m-d",$task->date)}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{url('admin/task/'.$task->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('admin/task/'.$task->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            {{lang('You do not have any tasks')}}
                        </td>
                    </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@stop