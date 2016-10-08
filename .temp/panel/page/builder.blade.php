@extends('layouts.main')

@section('title')
    Page Builder
@stop


@section('css')
    {!! HTML::style('panel/assets/js/switchery/switchery.css') !!}
@stop


@section('content')
    <h3 align="center"><i class="fa fa-truck"></i> {{lang('Page Builder')}}</h3>
    <div class="row">
        <div class="col-sm-12">
            <a id="add_row_btn" class="btn btn-green" data-toggle="modal" href="#add_row"><i
                        class="fa fa-plus"></i> Add New Row</a>

            <div id="page_builder">
            </div>
        </div>
    </div>
@stop


@section('modals')
    <div class="modal fade" id="choose_snippet">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    Modal body ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_row">
        <div class="modal-dialog" style="width:60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_snippet">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{lang('Snippet Edit')}}</h4>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        function load_rows() {
            $("#page_builder").html("");
            $.get('{{url("admin/view/get")}}', {name: 'rows', page: '{{$page->id}}'}, function (data) {
                $("#page_builder").html(data);
            });
        }
        $("#add_row_btn").click(function () {
            $.get('{{url("admin/view/get")}}', {name: 'rows_layout', page: '{{$page->id}}'}, function (data) {
                $("#add_row .modal-body").html(data);
            });
        });
        load_rows();
    </script>
    <!-- THE END OF THE PAGE -->
    {!! Form::close() !!}
@stop