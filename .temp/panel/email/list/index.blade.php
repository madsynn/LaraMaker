@extends('layouts.main')

@section('title')
    {{lang('E-mail Lists')}}
@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet"
          href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css"/>
@stop

@section('content')
    <h3><i class="fa fa-group"></i> {{lang('E-mail Lists')}}</h3>
    <a href="{{url('admin/campaign/list/create')}}" class="btn btn-primary"><i
                class="fa fa-plus"></i> {{lang('Add New')}}</a>
    <div class="table-responsive" style="margin-top:30px;">
        <table id="table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="col-md-7">{{lang('Name')}}</th>
                <th class="col-md-1">{{lang('Created At')}}</th>
                <th class="col-md-2"></th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\EmailCampaignList::get() as $list)
                <tr>
                    <td>{{$list->name}}</td>
                    <td>{{$list->created_at}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{url('admin/campaign/list/'.$list->id.'/edit')}}"
                               class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> {{lang('Edit')}}</a>
                            <a href="{{url('admin/campaign/list/'.$list->id.'/delete')}}" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash-o"></i> {{lang('Delete')}}</a>
                            <a href="{{url('admin/campaign/list/'.$list->id.'/copy')}}" class="btn btn-info btn-sm"><i
                                        class="fa fa-copy"></i> {{lang('Duplicate')}}</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
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