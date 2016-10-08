@extends('layouts.main')

@section('title')
    {{$title}}
@stop


@section('css')
    {!! HTML::style('panel/assets/js/switchery/switchery.css') !!}
@stop

@section('content')
    {!! Form::open(['url' => $form_url, 'method' => $form_method]) !!}
    <input type="hidden" name="featured_image" id="media_input" value="{{$input->get('featured_image')}}"/>
    <div class="row">
        <div class="col-sm-2 post-save-changes">
            <button type="submit" class="btn btn-green btn-lg btn-block btn-icon">
                {{$btn_submit_text}}
                <i class="entypo-check"></i>
            </button>
        </div>
        <div class="col-sm-10">
            @if(\App\Models\Language::count()> 1)
                <div class="input-group">
                <span class="input-group-addon" data-toggle="modal" href="#translations-modal-title"><i
                            class="fa fa-globe"></i> {{lang('Translate')}}</span>
                    <input class="form-control" type="text" name="lang_title[{{option('language')}}]"
                           placeholder="{{lang('Post Title')}}"
                           value="{{$values?$post->translations()->where('column', 'title')->where('lang_id',option('language'))->first()->value:\Request::old('lang_title')[option('language')]}}"/>
                </div>
            @else
                <input class="form-control" type="text" name="lang_title[{{option('language')}}]"
                       placeholder="{{lang('Post Title')}}"
                       value="{{$values?$post->translations()->where('column', 'title')->where('lang_id',option('language'))->first()->value:\Request::old('lang_title')[option('language')]}}"/>

            @endif
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                              data-toggle="tab">{{\App\Models\Language::find(option('language'))->name}}</a>
                    </li>
                    @foreach(\App\Models\Language::where('id','<>',option('language'))->get() as $lang)
                        <li role="presentation"><a href="#lang{{$lang->id}}" aria-controls="lang{{$lang->id}}"
                                                   role="tab"
                                                   data-toggle="tab">{{$lang->name}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <textarea class="form-control" rows="18" name="lang_content[{{option('language')}}]"
                                  id="lang_content"></textarea>
                    </div>
                    @foreach(\App\Models\Language::where('id','<>',option('language'))->get() as $lang)
                        <div role="tabpanel" class="tab-pane" id="lang{{$lang->id}}">
                            <textarea class="form-control" rows="18" name="lang_content[{{$lang->id}}]"
                                      id="lang_content{{$lang->id}}"></textarea>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{lang('Featured Image')}}
                    </div>
                </div>
                <div class="panel-body">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;"
                             data-trigger="fileinput">
                            @if($input->get('featured_image')==0)
                                <img src="{{asset('panel/assets/images/preview.png')}}"
                                     id="preview">
                            @else
                                <img src="{{\App\Models\Media::path($input->get('featured_image'))}}"
                                     id="preview">
                            @endif
                        </div>
                        <div>
                            <a class="btn btn-primary" data-toggle="modal"
                               href="#media_modal">{{lang('Select Image')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{lang('Categories')}}
                    </div>
                </div>
                <div class="panel-body">
                    <select multiple="multiple"
                            name="categories[]" {{\App\Models\Category::count()<1?"disabled":""}}
                            class="form-control multi-select">
                        @if(\App\Models\Category::count()<1)
                            <option value="0">{{lang('There are no categories!')}}</option>
                        @else
                            @foreach(\App\Models\Category::get() as $category)
                                <option value="{{$category->id}}" {{is_array($input->get('categories'))?(in_array($category->id,$input->get("categories"))?"selected":""):""}}>{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
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
                        <strong>{{lang('Select Groups That Can Access The Post')}}</strong>
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
                        <i class="fa fa-bullhorn"></i> {{lang('Publish')}}
                    </div>
                </div>
                <div class="panel-body">
                    <select name="status" class="form-control" id="p_status">
                        <option value="p">{{lang('Publish')}}</option>
                        <option value="d" {{$values?($post->draft?'selected':''):(\Request::old('status')=='d'?'selected':'')}}>{{lang('Draft')}}</option>
                        <option value="s" {{$values?($post->scheduled?'selected':''):(\Request::old('status')=='s'?'selected':'')}}>{{lang('Scheduled')}}</option>
                    </select>

                    <div id="s"
                         style="{{$values?($post->scheduled?'':'display: none'):(\Request::old('status')=='s'?'':'display: none')}}">
                        <strong>{{lang('From')}}</strong>
                        <input type="text" class="form-control" id="date_from" name="from"
                               value="{{date("m/d/Y", $values?$post->publishing_date:\Request::old('date_from'))}}"/>
                        <strong>{{lang('To')}}</strong>
                        <input type="text" class="form-control" id="date_to" name="to"
                               value="{{date("m/d/Y", $values?$post->publishing_date_to:\Request::old('date_to'))}}"/>
                    </div>
                    <div id="d" style="display: none"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="col-sm-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{lang('Tags')}}
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <p>{{lang('Add Tags - Separated by commas')}}</p>
                    <input type="text" value="{{$values?$tags_string:$input->get('tags')}}" class="form-control"
                           name="tags"/>
                </div>
            </div>
        </div>
    </div>
@stop


@section('modals')
    {!!media_modal('media_modal', 'media_input', lang('Select Image'), "preview", $input->get('featured_image') )!!}
    {!!translations_modal('translations-modal-title', 'title', 'lang_title', $values?$post:"", $values);!!}
@stop

@section('js')
    {!! Form::close() !!}
    {!! HTML::script('panel/assets/js/switchery/switchery.js') !!}
    {!! HTML::script('panel/assets/js/ckeditor/ckeditor.js') !!}
    <?php $text = $values ? $post->translations()->where('column', 'content')->where('lang_id', option('language'))->first()->value : \Request::old('lang_content')[option('language')];?>
    <script>
        CKEDITOR.replace("lang_content");
        CKEDITOR.instances.lang_content.setData('{!! str_replace(["\r","\n"],"", $text) !!}');
    </script>
    @foreach(\App\Models\Language::where('id','<>',option('language'))->get() as $lang)
        <?php $text = $values ? $post->translations()->where('column', 'content')->where('lang_id', $lang->id)->first()->value : \Request::old('lang_content')[$lang->id];?>
        <script>
            CKEDITOR.replace("lang_content{{$lang->id}}");
            CKEDITOR.instances.lang_content{{$lang->id}}.setData('{!! str_replace(["\r","\n"],"", $text) !!}');
        </script>
    @endforeach
    <script>
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem);
        $("#date").datepicker({
            minDate: "+0d",
            dateFormat: 'yy-mm-dd'
        });
        $("#p_status").change(function () {
            var t_id = $(this).val();
            $("#s, #d").hide();
            $("#" + t_id).show();
        });
        var protected = document.getElementById('protected');
        protected.onchange = function () {
            if (protected.checked) {
                $("#protection_box").show();
            } else {
                $("#protection_box").hide();
            }
        };
        $("#date_from").datepicker({
            minDate: +0,
            onClose: function (selectedDate) {
                $("#date_to").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#date_to").datepicker({
            minDate: +0,
            onClose: function (selectedDate) {
                $("#date_from").datepicker("option", "maxDate", selectedDate);
            }
        });
    </script>
@stop