@extends('layouts.main')

@section('title')
    {{lang('Groups')}}
@stop

@section('content')
    @if(can('group.create'))
        <a style="margin-bottom: 20px;" href="{{url('admin/group/create')}}" class="btn btn-info"><i
                    class="fa fa-plus"></i> {{lang('New Group')}}
        </a>
    @endif
    <table id="table" class="table table-bordered">
        <thead>
        <tr>
            <th class="col-md-10">{{lang('Name')}}</th>
            <th class="col-md-2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <td style="vertical-align: middle;font-weight: bold;"><i class="fa fa-user"></i> {{$group->name}}</td>
                <td>
                    @if(can('group.edit'))
                        <a href="{{url('admin/group/'.$group->id.'/edit')}}" class="btn btn-green btn-sm"><i
                                    class="fa fa-pencil"></i> {{lang('Edit')}}</a>
                    @endif
                    @if(count($groups)>1)
                            @if(can('group.delete'))
                                <a href="#" class="btn btn-red btn-sm" onclick="$('#deleteForm{{$group->id}}').submit()"><i
                                            class="fa fa-trash-o"></i> {{lang('Delete')}}</a>
                                {!! Form::open(['url' => 'admin/group/'.$group->id, 'method' => 'delete', 'id' =>
                                'deleteForm'.$group->id]) !!} {!! Form::close()
                                !!}
                            @endif
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
                {"orderable": false}
            ]
        });
    </script>
@stop