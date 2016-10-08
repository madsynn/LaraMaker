@extends('layouts.main')

@section('title')
    {{lang('Edit Page Layout')}}
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('panel/assets/js/switchery/switchery.css')}}"/>
    <style>
        .layout {
            background-color: #eee;
            width: 100%;
            border: 1px solid #777;
            padding: 5px;
            min-height: 150px;
        }

        .n-active-box {
            border: 1px dashed #002240;
            background-color: #8fa9c3;
            color: #FFF;
            min-height: 40px;
        }

        .active-box {
            background-color: rgba(7, 198, 29, 0.64);
            min-height: 40px;
            border: 1px dashed green;
        }

        .l-navbar {
            height: 40px;
            border: 1px dashed #002240;
            background-color: #8fa9c3;
            color: #FFF;

        }

        .l-navbar.active {
            background-color: rgba(7, 198, 29, 0.64);
            border: 1px dashed green;
        }

        .l-navbar select {
            background-color: #373E4A;
            border: none;
            width: 150px;
            height: 19px;
            color: #FFF;
            font-size: 14px;
        }

        .l-navbar option {
            background-color: #373E4A;
        }
    </style>
@stop

@section('content')
    <h3><i class="fa fa-pencil"></i> {{lang('Edit Page Layout')}}</h3>
    <div style="margin-top:50px;">
        <strong>{{lang('Full Width')}}</strong>
        <div class="row" style="margin-top:20px;">
            <div class="{!! option('full_page_layout')?"col-sm-12":"col-sm-8 col-sm-offset-2" !!}">
                <div class="layout">
                    <div class="l-navbar {!! option('navbar_show')?"active":"" !!}" id="navbar-box">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 style="padding: 0px;margin:5px 0px;color:#FFF;">
                                    <input type="checkbox" class="js-switch js-switch-navbar"
                                           id="navbar" {!! option('navbar_show')?"checked":"" !!}/>
                                    {{lang('Navigation Bar')}}</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="pull-right">
                                    {{--<strong>Menu:</strong><br>--}}
                                    {{--<select name="navigation_menu" id="nav_menu">--}}
                                    {{--@forelse(\App\Models\Menu::get() as $menu)--}}
                                    {{--<option value="{{$menu->id}}">{{$menu->name}}</option>--}}
                                    {{--@empty--}}
                                    {{--<option value="0">{{lang('There are no menus')}}</option>--}}
                                    {{--@endforelse--}}
                                    {{--</select>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="{!! option('left_sidebar_show')?"":"n-" !!}active-box" id="left_sidebar" style="margin-top:30px;height:200px;">
                                <h3 style="padding: 0px;margin:5px 0px;color:#FFF;text-align:center">
                                    <input type="checkbox" class="js-switch js-switch-left-widget"
                                           id="left-widget" {!! option('left_sidebar_show')?"checked":"" !!}/>
                                    {{lang('Left Sidebar')}}</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 align="center" style="margin-top:50px;"><i class="fa fa-info"></i> Here goes the content of the page builder</h3>
                        </div>
                        <div class="col-md-3">
                            <div class="{!! option('right_sidebar_show')?"":"n-" !!}active-box" style="margin-top:30px;height:200px;" id="right_sidebar">
                                <h3 style="padding: 0px;margin:5px 0px;color:#FFF;text-align:center">
                                    <input type="checkbox" class="js-switch js-switch-right-widget"
                                           id="right-widget" {!! option('right_sidebar_show')?"checked":"" !!}/>
                                    {{lang('Right Sidebar')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('panel/assets/js/switchery/switchery.js')}}"></script>
    <script>
        var elem = document.querySelector('.js-switch-layout');
        var navbar = document.querySelector('.js-switch-navbar');
        var leftWidget = document.querySelector('.js-switch-left-widget');
        var rightWidget = document.querySelector('.js-switch-right-widget');
        var leftWidgetInit = new Switchery(leftWidget);
        var rightWidgetInit = new Switchery(rightWidget);
        var layout = new Switchery(elem);
        var navbarInit = new Switchery(navbar);
        navbar.onchange = function () {
            var word, v;
            if (navbar.checked) {
                v = 1;
                word = "enabled";
                $("#navbar-box").attr("class", "l-navbar active");
            } else {
                v = 0;
                word = "disabled";
                $("#navbar-box").attr("class", "l-navbar");
            }
            $.post('{{url("admin/page/layout")}}', {
                name: "navbar_show",
                value: v,
                _token: '{{csrf_token()}}'
            }, function () {
                toastr.success("Successfully " + word + " navigation menu!");
            });
        };
        elem.onchange = function () {
            var width = "col-sm-12";
            var val;
            if (elem.checked) {
                val = 1;
                width = "col-sm-12";
            } else {
                val = 0;
                width = "col-sm-8 col-sm-offset-2";
            }
            $.post('{{url("admin/page/layout")}}', {
                name: "full_page_layout",
                value: val,
                _token: '{{csrf_token()}}'
            }, function () {
                toastr.success("Successfully changed page's layout!");
                $(".layout").parent().attr("class", width);
            });
        };
        leftWidget.onchange = function () {
            var word, v;
            if (leftWidget.checked) {
                v = 1;
                word = "enabled";
                $("#left_sidebar").attr("class", "active-box");
            } else {
                v = 0;
                word = "disabled";
                $("#left_sidebar").attr("class", "n-active-box");
            }
            $.post('{{url("admin/page/layout")}}', {
                name: "left_sidebar_show",
                value: v,
                _token: '{{csrf_token()}}'
            }, function () {
                toastr.success("Successfully " + word + " the left sidebar!");
            });
        };
        rightWidget.onchange = function () {
            var word, v;
            if (rightWidget.checked) {
                v = 1;
                word = "enabled";
                $("#right_sidebar").attr("class", "active-box");
            } else {
                v = 0;
                word = "disabled";
                $("#right_sidebar").attr("class", "n-active-box");
            }
            $.post('{{url("admin/page/layout")}}', {
                name: "right_sidebar_show",
                value: v,
                _token: '{{csrf_token()}}'
            }, function () {
                toastr.success("Successfully " + word + " the right sidebar!");
            });
        };
        $("#nav_menu").change(function () {
            //$.post('{{url("admin/page/layout")}}', {name: "navigation_menu_id", _token: '{{csrf_token()}}'}, function(){
            //  toastr.success("Successfully changed navbar's menu!");
            // })
        });
    </script>
@stop