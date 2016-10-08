<script src="{{asset('panel/assets/js/jqueryform/jquery.form.js')}}"></script>
<script src="{{asset('panel/assets/js/tinymce/tinymce.min.js')}}"></script>
<?php
if (!$values) $snippet = \App\Models\Snippet::find(\Request::input('snippet_id'));
if ($col) {
    if ($values)
        $url = 'admin/snippet/' . $snippet->id . '/update';
    else
        $url = 'admin/snippet/' . $snippet->id;;
} else {
    $url = 'admin/widget/' . $snippet->id . '/' . $position . '/save';
}
?>
{!! Form::open(['url' => $url, 'id' => 'ajaxForm'])!!}
<input type="hidden" name="col" value="{{$col}}"/>
<div id="errors">
</div>
<?php
if ($values) {
    $params = $snippet->parent_snippet->params();
} else {
    $params = $snippet->params();
}
?>
@if(is_array($params))
    @foreach($params as $name => $param)

        @if($param["type"] == "string")
            <strong>{{$param["name"]}}</strong>
            <input class="form-control" type="text" maxlength="255" name="{{$name}}"
                   value="{{$values?$values[$name]:""}}"/>
        @endif
        @if($param["type"] == "text")
            <br/>
            <strong>{{$param["name"]}}</strong>
            <textarea name="{{$name}}" class="form-control">{{$values?$values[$name]:""}}</textarea>
        @endif
        @if($param["type"] == "editor")
            <br/>
            <strong>{{$param["name"]}}</strong>
            <textarea id="editor_{{$snippet->id}}_{{$name}}" name="{{$name}}">{!!$values?$values[$name]:""!!}</textarea>
            <script>
                tinymce.init({
                    selector: "#editor_{{$snippet->id}}_{{$name}}"
                });
            </script>
        @endif
        @if($param["type"] == "media")
            <br>
            <input type="hidden" id="media_id_{{$name}}_{{$snippet->id}}" value="{{$values?$values[$name]:""}}"
                   name="{{$name}}"/>
            <a class="btn btn-primary select-image"
               style="border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;"
               data-toggle="modal" href="#input_modal_{{$name}}_{{$snippet->id}}">{{lang('Select an image')}}</a>
            <img id="preview_{{$name}}_{{$snippet->id}}"
                 src="{{$values?url(get_media_path($values[$name])):asset('panel/assets/images/preview.png')}}"
                 class="img-rounded"
                 style="display: block;border-top-left-radius: 0px;border: 2px solid #303641;margin-top:-2px;"
                 height="160"
                 width="320"/>
            {!!media_modal("input_modal_".$name."_".$snippet->id,"media_id_".$name."_".$snippet->id,"Choose an image","preview_".$name."_".$snippet->id)!!}
        @endif
        @if($param["type"] == "gallery")
            <strong>{{$param['name']}}</strong>
            <select name="{{$name}}" class="form-control">
                @forelse(\App\Models\Gallery::get() as $gallery)
                    <option value="{{$gallery->id}}">{{$gallery->name}}</option>
                @empty
                    <option value="">{{lang('There are no galleries')}}</option>
                @endforelse
            </select>
        @endif
    @endforeach
@endif
<br>
<button type="submit" class="btn btn-primary">{{$values?lang('Update'):lang('Create')}}</button>
{!! Form::close() !!}
@if($col!=0)
    <script>
        function success() {
            $("#modal_snippets").modal('hide');
            $("#edit_snippet").modal('hide');
            load_rows();
        }
    </script>
@else
    <script>
        function success() {
            $("#modal_snippets").modal('hide');
            $("#edit_snippet").modal('hide');
            console.log('{{$position}}');
            load_widgets('{{$position}}');
        }
    </script>
@endif
<script>
    var options = {
        success: function (data) {
            if (data != "ok") {
                $("#errors").html("");
                for (var i = 0; i < data.length; i++) {
                    $("#errors").append("<div class='alert alert-danger' style='padding:3px'><i class='fa fa-warning'></i> " + data[i] + "</div>");
                }
            } else {
                success();
            }
        }
    };
    $('#ajaxForm').ajaxForm(options);
</script>


