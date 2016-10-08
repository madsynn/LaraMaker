<hr/>
<?php $page = \App\Models\Page::find($page); ?>
<div id="rows_area">
    @foreach($page->rows()->orderBy('order','ASC')->get() as $row)
        <div class="row row-p" row-id="{{$row->id}}" style="border:1px dashed #000;padding: 5px;margin-bottom:10px;">
            <div class="col-sm-1">
                <div class="btn-group">
                    <a href="#" class="btn btn-primary btn-sm disabled"><i class="fa fa-arrows-alt"></i></a>
                    <a href="#" class="btn btn-danger btn-sm delete-row" row-id="{{$row->id}}"><i
                                class="fa fa-trash-o"></i></a>
                </div>
            </div>
            <div class="col-sm-11">
                <div class="row">
                    @foreach($row->columns()->orderBy('order','ASC')->get() as $col)
                        <div class="col-sm-{{$col->width}}">
                            <div class="panel panel-primary">
                                <div class="panel-body" style="background-color: #eee;min-height: 150px;"
                                     col-id="{{$col->id}}">
                                    <a href="#" col-id="{{$col->id}}" col-width="{{$col->width}}"
                                       class="label label-success add_s"
                                            >Add +</a>
                                    @foreach($col->getSnippets() as $snippet)
                                        <div class="outer-snippet" snippet-id="{{$snippet->id}}" id="{{$snippet->id}}"
                                             style="border: 1px dashed #000;padding: 10px;margin-bottom:10px;">
                                            <div class="btn-group">
                                                <a href="#" snippet-id="{{$snippet->id}}" col-id="{{$col->id}}"
                                                   class="btn btn-success btn-xs snippet-edit" col-id="{{$col->id}}"
                                                   style="border-left:1px solid #000;border-top:1px solid #000;margin-bottom: -1px;"><i
                                                            class="fa fa-pencil"></i></a>
                                                <a href="#" snippet-id="{{$snippet->id}}"
                                                   class="btn btn-danger btn-xs snippet-delete"
                                                   style="border-right:1px solid #000;border-top:1px solid #000;margin-bottom: -1px;"><i
                                                            class="fa fa-times"></i></a>
                                            </div>
                                            <div class="snippet">
                                                {{$snippet->parent_snippet->name}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(".delete-row").click(function () {
        var row_id = $(this).attr("row-id");
        var row = $(this);
        $.get('{{url("admin/row/delete")}}', {id: row_id}, function () {
            row.parent().parent().parent().hide();
        });
    });
    $("#rows_area").sortable({
        items: ".row-p",
        stop: function (event, ui) {
            var i = 0;
            var arr = [];
            $(this).find(".row-p").each(function () {
                arr[i] = $(this).attr("row-id");
                i++;
            });
            $.post('{{url("admin/row/reorder")}}', {
                order: JSON.stringify(arr),
                _token: '{{csrf_token()}}'
            });
        }
    });
    $(".panel-body").sortable({
        items: ".outer-snippet",
        stop: function (event, ui) {
            var col_id = $(this).attr("col-id");
            var i = 0;
            var arr = [];
            $(this).find(".outer-snippet").each(function () {
                arr[i] = $(this).attr("snippet-id");
                i++;
            });
            $.post('{{url("admin/snippet")}}/' + col_id + "/reorder", {
                order: JSON.stringify(arr),
                _token: '{{csrf_token()}}'
            });
            console.log(arr);
        }
    });
    $(".choose-snippet").click(function () {
        var col_id = $(this).attr("col-id");
        $("#choose_snippet").modal('toggle');
        $.get('{{url("admin/view/get")}}', {name: 'snippets_select'}, function (data) {
            $("#choose_snippet .modal-body").html(data);
        });
    });
    $(".add_s").click(function () {
        var col = $(this).attr("col-id");
        var width = $(this).attr("col-width");
        $("#modal_snippets").modal('toggle');
        $.get('{{url("admin/snippets")}}', {width: width, col_id: col}, function (data) {
            $("#modal_snippets .modal-body").html(data);
        });
    });
    $(".snippet-edit").click(function () {
        var snippet_modal = $("#edit_snippet");
        snippet_modal.modal('show');
        var snippet_id = $(this).attr("snippet-id");
        var col_id = $(this).attr("col-id");
        $.get('{{url('admin/snippet/load/edit')}}', {snippet_id: snippet_id, col: col_id}, function (data) {
            snippet_modal.find('.modal-body').html(data);
        });
    });
    $(".snippet-delete").click(function () {
        var snippet_id = $(this).attr("snippet-id");
        var snipp = $(this);
        $.get('{{url('admin/snippet/delete')}}', {snippet_id: snippet_id}, function (data) {
            snipp.parent().parent().hide();
        });
    });
</script>
