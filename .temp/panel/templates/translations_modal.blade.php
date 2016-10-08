<div class="modal fade" id="{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{lang('Translate')}}</h4>
            </div>
            <div class="modal-body">
                @foreach($langs as $lang)
                    <div class="input-group">
                            <span class="input-group-addon">
                                {{$lang->name}}
                            </span>
                        <input class="form-control" type="text" name="{{$old_name}}[{{$lang->id}}]"
                               id="tr-{{$column.$lang->id}}"
                               value="{{$values?$post->translations()->where('lang_id',$lang->id)->first()->value:\Request::old($old_name)[$lang->id]}}"/>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                        id="continue">{{lang('Continue')}}</button>
            </div>
        </div>
    </div>
</div>
