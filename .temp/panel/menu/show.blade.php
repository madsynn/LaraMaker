<?php
$menu = \App\Models\Menu::find(\Request::input('id'));
?>
@if($menu!=null)
    {!! buildMenu($menu->items) !!}
@endif