@extends('layouts.main')

@section('title')
    {{lang('Posts')}}
@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet"
          href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css"/>
@stop

@section('content')
    <div class="btn-group">
        @if(can('post.create'))
            <a href="{{url('admin/post/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> {{lang('New Post')}}
            </a>
        @endif
        @if(can('post.import'))
            <a href="#" class="btn btn-success" id="import_txt"><i
                        class="fa fa-save"></i> {{lang('Import From File')}} [.impf]
            </a>
        @endif
    </div>
    {!!Form::open(['url'=> 'admin/post/import', 'id' => 'import_txt_form', 'files' => true])!!}
    <input type="file" id="import_file" name="txt" style="display: none"/>
    {!!Form::close()!!}
    <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="col-md-1"></th>
                <th class="col-md-5">{{lang('Title')}}</th>
                <th class="col-md-1">{{lang('Author')}}</th>
                <th class="col-md-1">{{lang('Categories')}}</th>
                <th class="col-md-1">{{lang('Tags')}}</th>
                <th class="col-md-1">{{lang('Created At')}}</th>
                <th class="col-md-2"></th>
            </tr>
            </thead>
            <tbody>
            @if(!count($posts))
                <tr>
                    <td></td>
                    <td><strong>{{lang('There are no posts')}}</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
            @foreach($posts as $post)
                <tr {!!$post->draft?"class='warning'":""!!}>
                    <td style="text-align:center;">
                        <input type="checkbox" name="mass[]" value="{{$post->id}}"/>
                    </td>
                    <td>
                        <a href="{{url('admin/post/'.$post->id.'/edit')}}" style="font-size:14px;font-weight: bold;">
                            @if($post->draft)
                                <i class="fa fa-save"></i>
                            @endif
                            {{$post->getCol('post_','title', 'post_id')}}
                        </a>
                    </td>
                    <td>
                        <a href="{{url('user/'.$post->author->id)}}">{{$post->author->username}}</a>
                    </td>
                    <td>
                        @foreach($post->categories as $category)
                            <a href="{{url('admin/category/'.$category->id)}}">{{$category->name}}</a>,
                        @endforeach
                    </td>
                    <td>
                        @foreach($post->tags as $tag)
                            {{$tag->name}},
                        @endforeach
                    </td>
                    <td>{{date("Y-m-d H:i:s" ,$post->creation_date)}}</td>
                    <td>
                        @if(\App\Models\Post::canEdit($post, "created_by", "post"))
                            <a href="{{url('admin/post/'.$post->id.'/edit')}}" class="btn btn-green btn-sm"><i
                                        class="fa fa-pencil"></i> {{lang('Edit')}}</a>
                        @endif
                        @if(\App\Models\Post::canDelete($post, "created_by", "post"))
                            <a href="#" class="btn btn-red btn-sm" onclick="$('#deleteForm{{$post->id}}').submit()"><i
                                        class="fa fa-trash-o"></i> {{lang('Delete')}}</a>
                            {!! Form::open(['url' => 'admin/post/'.$post->id, 'method' => 'delete', 'id' =>
                            'deleteForm'.$post->id]) !!} {!! Form::close()
                            !!}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="massBox" style="display: none">
        <div class="btn-group">
            @if(can('post.mass_export.impf'))
                <a href="#" class="btn btn-green" id="export_txt"><i class="fa fa-file"></i> {{lang('Export')}} Impf</a>
            @endif
            @if(can('post.mass_export.csv'))
                <a href="#" class="btn btn-info" id="export_csv"><i class="fa fa-table"></i> {{lang('Export')}} CSV</a>
            @endif
            @if(can('post.mass_delete'))
                <a href="#" class="btn btn-red" id="delete"><i class="fa fa-trash-o"></i> Delete</a>
            @endif
        </div>
    </div>
@stop

@section('js')

    <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script>
        $('#table').dataTable({
            "columns": [
                {"orderable": false},
                null,
                null,
                null,
                null,
                null,
                {"orderable": false}

            ]
        });
    </script>

    <script>
        $("input:checkbox[name='mass[]']").click(function () {
            checkBox();
        });

        function checkBox() {
            var stringUrl = "?";
            var num = 0;
            $("input:checkbox[name='mass[]']:checked").each(function () {
                num++;
                stringUrl = stringUrl + "&post[]=" + $(this).val();
            });
            if (num > 0) {
                $("#massBox").show();
            } else {
                $("#massBox").hide();
            }
            return stringUrl;
        }

        $("#export_txt").click(function () {
            var url = "{{url('admin/post/export/impf')}}";
            var params = checkBox();
            url += params;
            window.location = url;
        });

        $("#export_csv").click(function () {
            var url = "{{url('admin/post/export/csv')}}";
            var params = checkBox();
            url += params;
            window.location = url;
        });

        $("#delete").click(function () {
            var url = "{{url('admin/post/deleteMass')}}";
            var params = checkBox();
            url += params;
            window.location = url;
        });

        $("#import_txt").click(function () {
            $("#import_file").click();
        });

        $("#import_file").change(function () {
            $("#import_txt_form").submit();
        });
    </script>
@stop