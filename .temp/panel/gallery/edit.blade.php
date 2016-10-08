@extends('layouts.main')

@section('title')
    {{$gallery->name}}
@stop

@section('content')
    {!!Form::open(['url' => 'admin/gallery/'.$gallery->id, 'method' => 'put', 'id' => 'editGalleryForm'])!!}
    <input type="hidden" id="medias" name="medias"/>
    <strong>{{lang('Name')}}</strong>
    <input class="form-control" type="text" name="name" value="{{$gallery->name}}"/>
    <strong>{{lang('Description')}}</strong>
    <textarea name="description" rows="10" class="form-control">{{$gallery->description}}</textarea>
    <strong>{{lang('Images')}}</strong><br>
    <div class="row">
        @foreach(\App\Models\Media::get() as $media)
            <div class="col-sm-1">
                <div class="panel panel-inverse">
                    <div class="panel-body" style="padding: 0px;;">
                        <img src="{{url('media/'.$media->uploaded_by.'/'.$media->id.'/'.$media->path)}}"
                             class="img-responsive" style="height:100px;width:auto;"
                             media-id="{{$media->id}}" is-selected="0"/>
                    </div>
                    <div class="panel-footer" style="padding: 0px;">
                        <a href="#" class="btn btn-success btn-xs btn-block select-image"
                           media-id="{{$media->id}}"
                           is-selected="0"><i
                                    class="fa fa-circle-o"></i> {{lang('Select')}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="#" id="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> {{lang('Save')}}</a>

    {!!Form::close()!!}
@stop

@section('modals')

@stop

@section('js')
    <script>
        var selected = '{!!$selected!!}';
        var normal = JSON.parse(selected);
        $(".select-image").each(function () {
            if (normal.indexOf($(this).attr("media-id")) != -1) {
                $(this).attr("is-selected", 1);
                $(this).html('<i class="fa fa-times"></i> Remove');
                $(this).removeClass("btn-success");
                $(this).addClass("btn-danger");
            }
        });
        $(".select-image").click(function () {
            if ($(this).attr("is-selected") == 1) {
                $(this).attr("is-selected", 0);
                $(this).html('<i class="fa fa-circle-o"></i> Select');
                $(this).addClass("btn-success");
                $(this).removeClass("btn-danger");
                var ind = normal.indexOf($(this).attr("media-id"));
                if (ind > -1)
                    normal.splice(ind, 1);
            } else {
                $(this).attr("is-selected", 1);
                $(this).removeClass("btn-success");
                $(this).addClass("btn-danger");
                $(this).html('<i class="fa fa-times"></i> Remove');
                normal.push($(this).attr('media-id'));
            }
        });
        $("#submit").click(function () {
            $("#medias").val(JSON.stringify(normal));
            $("#editGalleryForm").submit();
        });
    </script>
@stop