@extends('layouts.main')

@section('title')
    {{lang('Categories')}}
@stop

@section('content')
    <a href="{{url('admin/category/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> {{lang('New Category')}}</a>
    <table id="table" class="table table-hover table-condensed table-bordered">
        <thead>
        <tr>
            <th class="col-md-3">{{lang('Name')}}</th>
            <th class="col-md-7">{{lang('Description')}}</th>
            <th class="col-md-2"></th>
        </tr>
        </thead>
        <tbody>
        @if(!count($categories))
            <tr>
                <td></td>
                <td>{{lang('There are no categories')}}</td>
                <td></td>
            </tr>
        @endif
        @foreach($categories as $category)

            <tr>
                <td style="vertical-align: middle;text-align: center;">
                    <a href="#" style="font-size:14px;font-weight: bold;">
                        {{$category->name}}
                    </a>
                </td>
                <td style="vertical-align: middle;text-align:center;">
                    <a href="#" style="font-size:14px;font-weight: bold;">
                        {{$category->description}}
                    </a>
                </td>
                <td style="vertical-align: middle;text-align: center;">
                    @if(can('category.edit'))
                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-green btn-sm"><i
                                    class="fa fa-pencil"></i> {{lang('Edit')}}</a>
                    @endif
                    @if(can('category.delete'))
                        {!! Form::open(['url' => 'admin/category/'.$category->id, 'method' => 'delete', 'id' =>
                        'deleteForm'.$category->id, 'style' => 'display:none']) !!}
                        {!! Form::close() !!}
                        <a href="#" class="btn btn-red btn-sm" onclick="$('#deleteForm{{$category->id}}').submit()"><i
                                    class="fa fa-trash-o"></i> {{lang('Delete')}}</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script>
        $('#table').dataTable({
            "columns": [
                null,
                null,
                {"orderable": false}
            ]
        });
    </script>
@stop