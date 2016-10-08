<div id="orderable">
    @forelse($widgets as $widget)
        <div class="alert alert-success" widget-id="{{$widget->id}}"><span class="handle" style="cursor:pointer"><i
                        class="fa fa-arrows-alt"></i></span>
            {{$widget->snippet->name}} <a href="#" class="btn btn-danger btn-xs pull-right btn-delete" widget-id="{{$widget->id}}"><i
                        class="fa fa-times"></i></a></div>
    @empty
        <div class="alert alert-danger">{!! lang('There are no widgets in this sidebar') !!}</div>
    @endforelse
</div>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $("#orderable").sortable({
        stop: function () {
            var arr = {};
            var i = 1;
            $(".alert-success").each(function(){
                i++;
                arr[$(this).attr("widget-id")] = i;
            });
            $.get('{{url("admin/widget/reorder")}}', {order: JSON.stringify(arr)}, function(){
                toastr.success("Successfully reordered widgets");
            });
        }
    });
    $(".btn-delete").click(function(){
        var alert = $(this).parent();
        $.get('{{url("admin/widget/delete")}}', {widget_id: $(this).attr('widget-id')}, function(){
          toastr.success("Successfully deleted a widget");
            alert.fadeOut();
        });
    });
</script>