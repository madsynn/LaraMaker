@extends('layouts.main')

@section('title')
    {{$title}}
@stop



@section('css')
    {!! HTML::style('panel/assets/js/switchery/switchery.css') !!}
@stop


@section('content')
    {!! Form::open(['url' => $form_url, 'method' => $form_method]) !!}
    <div class="row">
        <div class="col-sm-2 post-save-changes">
            <button type="submit" class="btn btn-green btn-lg btn-block btn-icon">
                {{lang('Continue')}}
                <i class="entypo-check"></i>
            </button>
        </div>
        <div class="col-sm-10">
            @if(\App\Models\Language::count()> 1)
                <div class="input-group">
                <span class="input-group-addon" data-toggle="modal" href="#translations-modal-name"><i
                            class="fa fa-globe"></i> {{lang('Translate')}}</span>
                    <input class="form-control" type="text" name="lang_name[{{option('language')}}]"
                           placeholder="{{lang('Page Name')}}"
                           value="{{$values?$post->translations()->where('column', 'name')->where('lang_id',option('language'))->first()->value:\Request::old('lang_name')[option('language')]}}"/>
                </div>
            @else
                <input class="form-control" type="text" name="lang_name[{{option('language')}}]"
                       placeholder="{{lang('Post Title')}}"
                       value="{{$values?$post->translations()->where('column', 'name')->where('lang_id',option('language'))->first()->value:\Request::old('lang_name')[option('language')]}}"/>
            @endif
        </div>
    </div>
    <div class="row" style="margin-top:30px;">
        <div class="col-sm-3">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <input type="checkbox" class="js-switch" id="protected"
                                   name="protected" {{$input->get('protected')?"checked":""}}/>
                            {{lang('Protection Settings')}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="protection_box" style="{{$input->get('protected')?"":"display:none"}}">
                        <strong>{{lang('Select Groups That Can Access The Page')}}</strong>
                        <select name="groups[]" class="form-control"
                                multiple {{\App\Models\Group::count()<1?"disabled":""}}>
                            @if(\App\Models\Group::count()<1)
                                <option value="0">{{lang('There are no groups!')}}</option>
                            @else
                                @foreach(\App\Models\Group::get() as $group)
                                    <option value="{{$group->id}}" {{is_array($input->get('groups'))?(in_array($group->id, $input->get('groups'))?"selected":""):""}}>{{$group->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            {{lang('Custom Meta Keywords')}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <textarea name="custom_keywords" class="form-control" style="resize: none;" rows="4"
                              maxlength="255"></textarea>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            {{lang('Custom Meta Description')}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <textarea name="custom_description" class="form-control" style="resize: none;" rows="4"
                              maxlength="255"></textarea>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">{{lang('Page Function')}}</div>
                </div>
                <div class="panel-body">
                    <select name="page_role" class="form-control">
                        <option value="0">Normal Page</option>
                        @foreach(\App\Models\PageRole::get() as $role)
                            <option value="{{$role->id}}">{!! $role->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    {!! HTML::script('panel/assets/js/switchery/switchery.js') !!}
    <script>
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem);
        var protected = document.getElementById('protected');
        protected.onchange = function () {
            if (protected.checked) {
                $("#protection_box").show();
            } else {
                $("#protection_box").hide();
            }
        };
    </script>
@stop

@section('modals')
    {!! translations_modal('translations-modal-name','name','lang_name',$values?$post:"",$values) !!}
    <div class="modal fade" id="add_row">
        <div class="modal-dialog" style="width:60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop
