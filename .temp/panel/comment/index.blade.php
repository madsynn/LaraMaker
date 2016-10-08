@extends('layouts.main')

@section('title')
    {{lang('Comments')}}
@stop

@section('content')
    <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="col-md-2">{{lang('Status')}}</th>
                <th class="col-md-3">{{lang('Post')}}</th>
                <th class="col-md-4">{{lang('Content')}}</th>
                <th class="col-md-3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>
                        <strong>{{$comment->status==0?lang('Unapproved'):($comment->status==2?lang('Rejected'):lang('Approved'))}}</strong>
                        @if(($comment->status==0 || $comment->status == 2) && can('comment.mod'))
                            <div class="btn-group">
                                <a href="{{url('admin/comment/'.$comment->id.'/m/1')}}"
                                   class="btn btn-success btn-sm"><i
                                            class="fa fa-check"></i> {{lang('Accept')}}</a>
                                @if($comment->status == 0)
                                    <a href="{{url('admin/comment/'.$comment->id.'/m/0')}}"
                                       class="btn btn-danger btn-sm"><i
                                                class="fa fa-times"></i> {{lang('Reject')}}</a>
                                @endif
                            </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{url('post/'.$comment->post->id)}}">{{$comment->post->getCol('post_','title', 'post_id')}}</a>
                    </td>
                    <td>{{substr($comment->comment,0,150).(strlen($comment->comment)>150?"...":"")}}</td>
                    <td>
                        @if(can('comment.delete') || $comment->by == \Auth::user()->id)
                            <a href="{{url('admin/comment/'.$comment->id.'/edit')}}" class="btn btn-success"><i
                                        class="fa fa-trash-o"></i> {{lang('Edit')}}</a>
                        @endif
                        @if(can('comment.edit') || $comment->by == \Auth::user()->id)
                            <a href="{{url('admin/comment/'.$comment->id.'/delete')}}" class="btn btn-danger"><i
                                        class="fa fa-trash-o"></i> {{lang('Delete')}}</a>
                        @endif
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
                null,
                {"orderable": false}

            ]
        });
    </script>
@stop