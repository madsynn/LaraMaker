<?php $c = \App\Models\MenuItem::where('menu_id', $item->menu_id)->where('parent_id', $item->id)->count(); ?>
<li class='dd-item' data-id='{{$item->id}}'>
    <div class='dd-handle'>
        @if($item->type == '1')
            <i class="fa fa-file"></i>
        @endif
        @if($item->type == '2')
            <i class="fa fa-folder"></i>
        @endif
        @if($item->type == '3')
            <i class="fa fa-wrench"></i>
        @endif

        {{$item->getCol('menu_item_', 'name', 'menu_item_id', null)}}

    <a href="#" class="pull-right dd-nodrag" style="color:#FFF" id="delete_item_{{$item->id}}" item-id="{{$item->id}}"><i class="fa fa-trash-o"></i> {!! lang('Delete') !!}</a>
    </div>
@if ($c > 0)
        <ol class='dd-list'>
            {!!buildMenu($items, $item->id)!!}
        </ol>
    @endif
</li>
<script>
    $("#delete_item_{{$item->id}}").click(function(){
        var item = $(this).parent().parent();
        $.get('{{url('admin/menu/item/delete')}}', {id:$(this).attr("item-id")}, function(data){
            toastr.success(data);
            setTimeout('load_menu()', 100);
            item.fadeOut();
        });
    });
</script>