@extends('layouts.main')

@section('title')
    {{lang('Translations')}}
@stop

@section('content')
    <h3><i class="fa fa-flag"></i> {{lang('Translations')}}</h3>
    <a href="{{url('admin/language/create')}}" class="btn btn-success"><i
                class="fa fa-plus"></i> {{lang('Add New Language')}}</a>
    <table id="table" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th class="col-md-8">{{lang('Name')}}</th>
            <th class="col-md-2">{{lang('Is Primary')}}</th>
            <th class="col-md-2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($languages as $lang)
            <tr>
                <td style="vertical-align: middle;">{{$lang->name}}</td>
                <td style="vertical-align: middle;">{!!$lang->id==option('language')?lang('Yes'):(lang('No').' <a
                            href="'.url('admin/language/'.$lang->id.'/primary').'" class="btn btn-success btn-xs"><i
                                class="fa fa-check"></i> '.lang('Make Primary').'</a>')!!}
                </td>
                <td style="vertical-align: middle;">
                    @if(can('language.delete') && $lang->id!=option('language'))
                        <a href="{{url('admin/language/'.$lang->id.'/delete')}}" class="btn btn-danger"><i
                                    class="fa fa-times"></i> {{lang('Delete')}}</a>
                    @endif
                    @if(can('language.edit'))
                        <a href="{{url('admin/language/'.$lang->id.'/edit')}}" class="btn btn-success"><i
                                    class="fa fa-pencil"></i> {{lang('Edit')}}</a>
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