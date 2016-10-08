<style>
    .block {
        background-color: #333;
        border-radius: 5px;
        text-align: center;
        margin: 5px 0px;
        color:#eee;
        width: 100%;
        cursor: pointer;
    }

    .block:hover {
        background-color: #777;
        color: #FFF;
    }
</style>
<div class="row">
    @foreach($snippets as $snippet)
        <div class="col-sm-3">
            <div class="block snippet-choose" snippet-id="{{$snippet->id}}">
                <i class="fa fa-arrows-alt"></i> {{$snippet->name}}
            </div>
        </div>
    @endforeach
</div>
<script>
    $(".snippet-choose").click(function () {
        var snippet_id = $(this).attr("snippet-id");
        $.get('{{url("admin/view/get")}}', {
            name: 'snippet',
            snippet_id: snippet_id,
            values: 0,
            col: '{{$col}}'
        }, function (data) {
            $("#modal_snippets .modal-body").html(data);
        });
    });
</script>