@extends('layouts.main')

@section('title')
    {{lang('Menu')}}
@stop


@section('content')
    <script src="{{asset('panel/assets/js/jquery.nestable.js')}}"></script>
    <link rel="stylesheet" href="{{asset('panel/assets/css/jquery-nestable.css')}}"/>
    <link rel="stylesheet" href="{{asset('panel/assets/js/switchery/switchery.css')}}"/>
    <h3><i class="fa fa-list-ul"></i> {{lang('Menu')}}</h3>
    <a class="btn btn-primary" data-toggle="modal" href="#add_new_menu"><i class="fa fa-plus"></i> {{lang('Add New')}}
    </a>
    <div class="row" style="margin-top:20px;">
        <div class="col-sm-3">
            {!! Form::open(['url' => 'admin/menu/page/add', 'method' => 'POST', 'id' => 'page_form']) !!}
            <input type="hidden" id="menu_id" name="menu_id"/>
            <input type="hidden" id="type" value="page" name="type"/>

            <div class="panel panel-invert">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="btn-group">
                            <a href="#" class="btn btn-success btn-sm" id="edit_menu"><i
                                        class="fa fa-pencil"></i> {{lang('Edit')}}</a>
                            <a href="#" class="btn btn-danger btn-sm" id="delete_menu"><i
                                        class="fa fa-times"></i> {{lang('Delete')}}</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <center>
                        <div class="btn-group" id="chooser">
                            <a href="#" class="btn btn-success btn-icon" disabled div-toggle="page_box">Page <i
                                        class="fa fa-file"></i></a>
                            <a href="#" class="btn btn-red btn-icon" div-toggle="category_box">Category <i
                                        class="fa fa-folder"></i></a>
                            <a href="#" class="btn btn-blue btn-icon" div-toggle="custom_box">Custom <i
                                        class="fa fa-wrench"></i></a>
                        </div>
                    </center>
                    <div id="page_box">
                        <strong>{{lang('Page')}}</strong>
                        <select name="page" class="form-control" id="select_page">
                            @foreach(\App\Models\Page::get() as $page)
                                <option value="{{$page->id}}">{{$page->getCol("page_","name", 'page_id')}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="category_box" style="display:none;">
                        <strong>{{lang('Category')}}</strong>
                        <select name="category" class="form-control" id="select_category">
                            @foreach(\App\Models\Category::get() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="custom_box" style="display:none;">
                        <strong>{{lang('Custom URL')}}</strong>
                        <input type="text" class="form-control" name="custom_url" id="custom_url" placeholder="URL"/>
                    </div>
                    <br/>
                    <strong>{{lang('Label')}}</strong>

                    <div class="input-group">
                        <input type="text" name="page_name[{{option('language')}}]"
                               class="form-control translatable-page-input"
                               id="page_label"/>
                        <span class="input-group-addon" id="translate_page" style="cursor:pointer;color:#39414E;"><i
                                    class="fa fa-globe"></i> Translate</span>
                    </div>
                    <div id="translations_page_box" style="display:none">
                        @foreach($langs as $lang)
                            <strong>{{$lang->name}}</strong>
                            <input type="text" name="page_name[{{$lang->id}}]"
                                   class="form-control translatable-page-input"
                                   id="page_label"/>
                        @endforeach
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class="btn btn-success pull-right" id="add_page"><i
                                        class="fa fa-plus"></i> {{lang('Add')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-sm-9">
            <div class="tabs-vertical-env">
                <ul class="nav tabs-vertical right-aligned menu-listing"><!-- available classes "right-aligned" -->
                    @foreach($menus as $menu)
                        <li menu-id="{{$menu->id}}" {!!$menu->is_primary?"class='active'":''!!}><a
                                    href="#menu_id_{{$menu->id}}"
                                    data-toggle="tab">{{$menu->name}} {!!$menu->is_primary?"[Primary]":''!!}</a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($menus as $menu)
                        <div class="tab-pane {!!$menu->is_primary?" active":''!!}" id="menu_id_{{$menu->id}}">
                            <div class="dd dd-{{$menu->id}}" id="nestable2">
                                <ol class="dd-list load_menu" menu-id="{{$menu->id}}">
                                </ol>
                            </div>
                            <script>
                                $('.dd-{{$menu->id}}').nestable({maxDepth:2}).on('change', function () {
                                    $.get('{{url("admin/menu/reorder")}}', {
                                        order: JSON.stringify($('.dd-{{$menu->id}}').nestable('serialize')),
                                        menu_id: $(this).attr("menu-id")
                                    }, function (data) {
                                        toastr.info(data);
                                    });
                                });
                            </script>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

@section('modals')
    <div class="modal fade" id="add_new_menu">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url' => 'admin/menu', 'id' => 'new_menu_form']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{'Add New'}}</h4>
                </div>
                <div class="modal-body">
                    <strong>{{lang('Name')}}</strong>
                    <input class="form-control" type="text" name="name" placeholder="Menu Name" id="new_menu_name"/>
                    <br/>
                    <label>
                        <input type="checkbox" name="is_primary" class="js-switch"/> {{lang('Primary')}}
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{lang('Create')}}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('panel/assets/js/jqueryform/jquery.form.js')}}"></script>
    <script src="{{asset('panel/assets/js/switchery/switchery.js')}}"></script>
    <script>
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem);
        function reload_menu() {
            // TO RELOAD THE MENU IN THE RIGHT PART
        }
        function set_text(type) {
            if (type == "page") {
                $("#page_label").val($("#select_page option:selected").text());
            }
            if (type == "category") {
                $("#page_label").val($("#select_category option:selected").text());
            }
            if (type == "custom") {
                $("#page_label").val("Link");
            }
        }
        function setValueToAll() {
            $(".translatable-page-input").each(function () {
                $(this).val($("#page_label").val());
            });
        }

        function validateURL(textval) {
            var urlregex = new RegExp(
                    "^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
            return urlregex.test(textval);
        }

        function validate() {
            if ($("#type").val() == "custom") {
                if (!validateURL($("#custom_url").val())) {
                    toastr.error("The URL must be a valid URL!");
                    return false;
                }

            }
        }


        function load_menu() {
            $(".load_menu").each(function () {
                var lm = $(this);
                $.get('{{url("admin/view/get/0")}}', {name: "menu.show", id: lm.attr('menu-id')}, function (data) {
                    lm.html(data);
                });
            });
        }
        set_text('page');
        setValueToAll();
        $("#chooser a").click(function () {
            var t_type = "page";
            if ($(this).attr("div-toggle") == "page_box") {
                set_text("page");
            }
            if ($(this).attr("div-toggle") == "category_box") {
                t_type = "category";
                set_text("category");
            }
            if ($(this).attr("div-toggle") == "custom_box") {
                t_type = "custom";
                set_text("custom");
            }
            $(this).parent().find('a').each(function () {
                $(this).removeAttr("disabled");
                $("#" + $(this).attr("div-toggle")).hide();
            });
            $(this).attr("disabled", "disabled");
            $("#" + $(this).attr("div-toggle")).show();
            $("#type").val(t_type);
        });
        $("#select_page").change(function () {
            set_text("page");
            setValueToAll();
        });
        $("#select_category").change(function () {
            set_text("category");
            setValueToAll();
        });
        $("#add_page").click(function () {

            $("#page_form").ajaxSubmit({
                beforeSubmit: validate,
                success: function (data) {
                    toastr.success(data);
                    load_menu();
                }
            });
        });
        $("#translate_page").click(function () {
            $("#translations_page_box").fadeIn();
        });
        $(document).ready(function () {
            $("#menu_id").val($(".menu-listing li.active").attr("menu-id"));
        });
        $(".menu-listing li").click(function () {
            setTimeout(function () {
                $("#menu_id").val($(".menu-listing li.active").attr("menu-id"));
            }, 300);
        });
        load_menu();
        $("#new_menu_form").ajaxForm({
            beforeSubmit: function () {
                if ($("#new_menu_name").val().length < 1) {
                    toastr.error("The name field is required");
                    return false;
                } else {
                    return true;
                }
            },
            success: function (data) {
                if (data[0] == 'error') {
                    toastr.error(data[1]);
                } else {
                    toastr.success(data[1]);
                    $("#add_new_menu").modal('hide');
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            }
        });
        $("#delete_menu").click(function () {
            $.get('{{url("admin/menu/delete")}}', {menu_id: $("#menu_id").val()}, function (data) {
                toastr.success(data);
                setTimeout('location.reload()', 400);
            });
        });
        $("#edit_menu").click(function () {
            window.location = '{{url('admin/menu')}}/' + $("#menu_id").val() + '/edit';
        });
    </script>

@stop