@extends('layouts.main')

@section('title')
    {{lang('Installed Plugins')}}
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('panel/assets/js/switchery/switchery.css')}}"/>
@stop


@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="{{url('admin/plugin/upload')}}" class="btn btn-primary"><i
                        class="fa fa-upload"></i> {{lang('Upload')}}</a>
            @foreach(\App\Models\Plugin::get() as $plugin)
                <div class="member-entry">
                    <div class="row">
                        <div class="col-sm-10">
                            <a href="extra-timeline.html" class="member-img">
                                <img src="{{$plugin->img}}" class="img-rounded">
                                <i class="entypo-forward"></i>
                            </a>

                            <div class="member-details">
                                <h4>
                                    <a href="#">{{$plugin->fullname}}</a>
                                </h4>

                                <div class="row info-list">
                                    <div class="col-sm-4">
                                        {{$plugin->description}}
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{url('admin/plugin/'.$plugin->name.'/uninstall')}}"
                                           class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash-o"></i> {{lang('Uninstall')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="pull-right">
                                <input type="checkbox"
                                       class="js-switch plugin-btn" {{$plugin->is_enabled?"checked":""}}
                                       p-id="{{$plugin->id}}"/>
                                <strong class="state-plugin-{{$plugin->id}}">
                                    @if($plugin->is_enabled)
                                        <strong>{{lang('Enabled')}}</strong>
                                    @else
                                        <strong>{{lang('Disabled')}}</strong>
                                    @endif
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('panel/assets/js/switchery/switchery.js')}}"></script>
    <script>
        var elems = document.getElementsByClassName('js-switch');
        for (var i = 0; i < elems.length; i++) {
            var elem = elems[i];
            var init = new Switchery(elem);
            elem.onchange = function () {
                var p_id = this.getAttribute("p-id");
                var enabled = false;
                if (elem.checked) {
                    enabled = true;
                }
                if (enabled) {
                    $(".state-plugin-" + p_id).html("{{lang('Enabled')}}");
                } else {
                    $(".state-plugin-" + p_id).html("{{lang('Disabled')}}");
                }
                $.get('{{url("admin/plugin/switch")}}', {enabled: enabled, plugin_id: p_id}, function (data) {
                    toastr.success(data);
                });
            };
        }
    </script>
@stop