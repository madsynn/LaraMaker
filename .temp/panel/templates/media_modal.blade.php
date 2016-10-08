<style>
    .image-box {
        width: 80px;
        height: 80px;
        background-size: 100%;
        background-position: center;
        cursor: pointer;
        border: 1px solid #777;
        background-repeat: no-repeat;

    }
</style>
<div class="modal fade" id="{!! $modal_id !!}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{!! $title !!}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach(\App\Models\Media::get() as $media)
                        <div class="col-xs-2">
                            @if($selected_img_id==$media->id)
                                <div class="image-box" id="{{$modal_id}}_{{$media->id}}_box" media-id="{{$media->id}}"
                                     src="{{asset('media/'.$media->uploaded_by.'/'.$media->id.'/'.$media->path)}}"
                                     style="border:2px solid #000;"></div>
                            @else
                                <div class="image-box" id="{{$modal_id}}_{{$media->id}}_box" media-id="{{$media->id}}"
                                     src="{{asset('media/'.$media->uploaded_by.'/'.$media->id.'/'.$media->path)}}"></div>
                            @endif
                            <script>
                                $("#{{$modal_id}}_{{$media->id}}_box").css("background-image", "url({{asset('media/'.$media->uploaded_by.'/'.$media->id.'/'.$media->path)}})");
                            </script>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#{{$modal_id}} .image-box").click(function () {
        $("#{{$modal_id}} .image-box").css("border", "1ps solid #777");
        $("#{{$input_id}}").val($(this).attr("media-id"));
        $(this).css("border", "2px solid #000");
        $("#{{$modal_id}}").modal("hide");
        @if($img_preview_id!='0')
        $("#{{$img_preview_id}}").attr("src", $(this).attr("src"));
        @endif


    });
</script>
