@extends('layouts.main')

@section('title')
    {!! lang('Widgets') !!}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-invert">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-list-ul"></i> {{lang('Left Sidebar')}}</div>
                    <div class="pull-right"><a class="btn btn-success btn-sm" id="left_w_t" data-toggle="modal"
                                               href="#add_widget">{{lang('Add')}}</a></div>
                </div>
                <div class="panel-body" id="left_box">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-invert">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-list-ul"></i> {{lang('Right Sidebar')}}</div>
                    <div class="pull-right"><a class="btn btn-success btn-sm" id="right_w_t" data-toggle="modal"
                                               href="#add_widget">{{lang('Add')}}</a></div>
                </div>
                <div class="panel-body" id="right_box">
                </div>
            </div>
        </div>
    </div>
@stop

@section('modals')
    <div class="modal fade" id="add_widget">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{lang('Add')}}</h4>
                </div>
                <div class="modal-body">
                    @foreach(\App\Models\Snippet::where('is_widget',1)->get() as $widget)
                        <a href="#" class="btn btn-success btn-block widget-btn"
                           widget-id="{{$widget->id}}">{{$widget->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_snippets">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{lang('Add Widget')}}</h4>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script>
        function load_widgets(position) {
            $.get('{{url('admin/widget/show')}}', {position: position}, function (data) {
                if (position == "1") {
                    $("#right_box").html(data);
                } else {
                    $("#left_box").html(data);
                }
            });
        }
        load_widgets(0);
        load_widgets(1);
        var pos_to_add = 0;
        $("#left_w_t").click(function () {
            pos_to_add = 0;
        });
        $("#right_w_t").click(function () {
            pos_to_add = 1;
        });
        $(".widget-btn").click(function () {
            var widget_id = $(this).attr("widget-id");
            $("#add_widget").modal('hide');
            $.get('{{url("admin/view/get")}}', {
                name: 'snippet',
                snippet_id: widget_id,
                values: 0,
                position: pos_to_add,
                col: 0
            }, function (data) {
                $("#modal_snippets").modal('show');
                $("#modal_snippets .modal-body").html(data);
            });
            {{--$.post('{{url("admin/widget")}}', {--}}
            {{--widget_id: widget_id,--}}
            {{--_token: '{{csrf_token()}}',--}}
            {{--widget: pos_to_add--}}
            {{--}, function () {--}}

            {{--});--}}
        });
    </script>
@stop