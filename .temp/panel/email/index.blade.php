@extends('layouts.main')

@section('title')
    {{lang('E-mail Campaigns')}}
@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet"
          href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css"/>
@stop

@section('content')
    <h3><i class="fa fa-envelope"></i> {{lang('E-mail Campaigns')}}</h3>
    <a href="{{url('admin/campaign/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> {{lang('Add New')}}
    </a>
    <div class="table-responsive" style="margin-top:30px;">
        <table id="table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="col-md-7">{{lang('Name')}}</th>
                <th class="col-md-1">{{lang('Created At')}}</th>
                <th class="col-md-1"></th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\EmailCampaign::get() as $campaign)
                <tr>
                    <td>{{$campaign->name}}</td>
                    <td>{{$campaign->created_at}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{url('admin/campaign/'.$campaign->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('admin/campaign/'.$campaign->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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