@extends('layouts.main')

@section('title')
    {{lang('Pages')}}
@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet"
          href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css"/>
@stop

@section('content')
    <div class="btn-group">
        @if(can('page.create'))
            <a href="{{url('admin/page/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> {{lang('New Page')}}
            </a>
        @endif
        <a href="{{url('admin/page/layout')}}" class="btn btn-primary"><i class="fa fa-pencil"></i> {{lang('Edit Page Layout')}}</a>
    </div>
    {!!Form::open(['url'=> 'admin/page/import', 'id' => 'import_txt_form', 'files' => true])!!}
    <input type="file" id="import_file" name="txt" style="display: none"/>
    {!!Form::close()!!}
    <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="col-md-1"></th>
                <th class="col-md-6">{{lang('Name')}}</th>
                <th class="col-md-1">{{lang('Hits')}}</th>
                <th class="col-md-1">{{lang('Author')}}</th>
                <th class="col-md-2"></th>
            </tr>
            </thead>
            <tbody>
            @if(!count($pages))
                <tr>
                    <td></td>
                    <td><strong>{{lang('There are no pages')}}</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
            @foreach($pages as $page)
                <tr>
                    <td style="text-align:center;">
                        <input type="checkbox" name="mass[]" value="{{$page->id}}"/>
                    </td>
                    <td>
                        <a href="{{url('admin/page/'.$page->id.'/edit')}}" style="font-size:14px;font-weight: bold;">
                            {{$page->getCol("page_","name", 'page_id')}}
                        </a>
                    </td>
                    <td>
                        {{$page->hits}}
                    </td>
                    <td>
                        {{$page->creator->username}}
                    </td>
                    <td>
                        @if(\App\Models\Page::canEdit($page, "author", "page"))
                            <a href="{{url('admin/page/'.$page->id.'/edit')}}" class="btn btn-green btn-sm"><i
                                        class="fa fa-pencil"></i> {{lang('Edit')}}</a>
                        @endif
                        @if(\App\Models\Page::canDelete($page, "author", "page"))
                            <a href="#" class="btn btn-red btn-sm" onclick="$('#deleteForm{{$page->id}}').submit()"><i
                                        class="fa fa-trash-o"></i> {{lang('Delete')}}</a>
                            {!! Form::open(['url' => 'admin/page/'.$page->id, 'method' => 'delete', 'id' =>
                            'deleteForm'.$page->id]) !!} {!! Form::close()
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
            @if(can('page.mass_delete'))
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
                stringUrl = stringUrl + "&page[]=" + $(this).val();
            });
            if (num > 0) {
                $("#massBox").show();
            } else {
                $("#massBox").hide();
            }
            return stringUrl;
        }

        $("#export_txt").click(function () {
            var url = "{{url('admin/page/export/txt')}}";
            var params = checkBox();
            url += params;
            window.location = url;
        });

        $("#export_csv").click(function () {
            var url = "{{url('admin/page/export/csv')}}";
            var params = checkBox();
            url += params;
            window.location = url;
        });

        $("#delete").click(function () {
            var url = "{{url('admin/page/deleteMass')}}";
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