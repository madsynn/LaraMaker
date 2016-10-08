<script src="{{asset('panel/assets/js/jqueryform/jquery.form.js')}}"></script>
<?php $snippet = \App\Models\Snippet::find(\Request::input('snippet_id')); ?>
{!! Form::open(['url' => 'admin/snippet/'.$snippet->id, 'id' => 'ajaxForm'])!!}
<input type="hidden" name="col" value="{{$col}}"/>
<div id="errors">
</div>
@if(is_array($snippet->params()))
    @foreach($snippet->params() as $name => $param)

        @if($param["type"] == "string")
            <strong>{{$param["name"]}}</strong>
            <input class="form-control" type="text" maxlength="255" name="{{$name}}" value="{{$values?$values[$name]:""}}"/>
        @endif
        @if($param["type"] == "text")
            <br/>
            <strong>{{$param["name"]}}</strong>
            <textarea name="{{$name}}" class="form-control">{{$values?$values[$name]:""}}</textarea>
        @endif
        <br>
        @if($param["type"] == "media")
            <input type="hidden" id="media_id_{{$snippet->id}}" name="{{$name}}"/>
            <a class="btn btn-primary" style="border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;"
               data-toggle="modal" href="#input_modal">{{lang('Select an image')}}</a>
            <img id="preview" src="{{$values?$values[$name]:asset('panel/assets/images/preview.png')}}" class="img-rounded"
                 style="display: block;border-top-left-radius: 0px;border: 2px solid #303641;margin-top:-2px;"
                 height="160"
                 width="320"/>
            {!!media_modal("input_modal","media_id_".$snippet->id,"Choose an image","preview")!!}
        @endif
    @endforeach
@endif
<br>
<button type="submit" class="btn btn-primary">{{lang('Create')}}</button>
{!! Form::close() !!}
<script>
    var options = {
        success: function (data) {
            if (data != "ok") {
                $("#errors").html("");
                for (var i = 0; i < data.length; i++) {
                    $("#errors").append("<div class='alert alert-danger' style='padding:3px'><i class='fa fa-warning'></i> " + data[i] + "</div>");
                }
            } else {
                $("#modal_snippets").modal('hide');
                load_rows();
            }
        }
    };
    $('#ajaxForm').ajaxForm(options);
</script>


