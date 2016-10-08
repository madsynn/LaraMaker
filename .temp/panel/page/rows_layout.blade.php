<?php $page = \App\Models\Page::find($page); ?>
<h3 align="center">Choose Layout</h3>
<div class="row row-choose-layout" style="padding-top:20px;" layout="8:4">
    <div class="col-sm-8">
        <div class="well">
            <h1 align="center">2</h1>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
</div>
<div class="row row-choose-layout" style="padding-top:20px;" layout="4:8">
    <div class="col-sm-4">
        <div class="well">
            <h1 align="center">2</h1>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
</div>
<div class="row row-choose-layout" style="padding-top:20px;" layout="6:6">
    <div class="col-sm-6">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
</div>
<div class="row row-choose-layout" style="padding-top:20px;" layout="9:3">
    <div class="col-sm-9">
        <div class="well">
            <h1 align="center">3</h1>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
</div>
<div class="row row-choose-layout" style="padding-top:20px;" layout="3:9">
    <div class="col-sm-3">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="well">
            <h1 align="center">3</h1>
        </div>
    </div>
</div>
<div class="row row-choose-layout" style="padding-top:20px;" layout="12">
    <div class="col-sm-12">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
</div>
<div class="row row-choose-layout" style="padding-top:20px;" layout="3:3:3:3">
    <div class="col-sm-3">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
</div>
<div class="row row-choose-layout" style="padding-top:20px;" layout="4:4:4">
    <div class="col-sm-4">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <h1 align="center">1</h1>
        </div>
    </div>
</div>
<script>
    $(".row-choose-layout").hover(function () {
        $(".row").css("background-color", "");
        $(this).css("background-color", "#777");
    });
    $(".row-choose-layout").click(function () {
        $.get('{{url("admin/page/".$page->id."/row/create")}}', {layout: $(this).attr("layout")}, function () {
            load_rows();
            $('#add_row').modal('hide');
        });
    });
</script>