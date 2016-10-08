@extends('layouts.main')

@section('title')
    {{lang('New Email Campaign')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center"><i class="fa fa-envelope-o"></i> {{lang('New Email Campaign')}}</h3>
            {!!Form::open(['url' => 'admin/campaign', 'id' => 'form'])!!}
            <input type="hidden" id="to_be_sent" name="to_be_sent" value="0"/>
            <strong>{{lang('Name')}}</strong>
            <input class="form-control" type="text" name="name" value="{{\Request::old('name')}}"/>
            <strong>{{lang('Subject')}}</strong>
            <input class="form-control" type="text" name="subject" value="{{\Request::old('subject')}}"/>
            <strong>{{lang('Sender Name')}}</strong>
            <input class="form-control" type="text" name="sender_name" value="{{\Request::old('name')}}"/>
            <strong>{{lang('Sender Email')}}</strong>
            <input class="form-control" type="text" name="sender_email" value="{{\Request::old('email')}}"/>
            <strong>{{lang('Send To')}}</strong>
            <small>{{lang('Choose a list')}}</small>
            @if(!\App\Models\EmailCampaignList::count())
                {{lang('You do not have any e-mail lists')}} <a href="{{url('admin/campaign/list/create')}}">{{lang('Create')}}</a>
            @endif
            <select name="to" class="form-control">
                @forelse(\App\Models\EmailCampaignList::get() as $list)
                    <option value="{{$list->id}}">{{$list->name}}</option>
                @empty
                    <option value="">{{lang('You do not have any e-mail lists')}}</option>
                @endforelse
            </select>
            <strong>{{lang('Content')}}</strong>
            <textarea name="content" id="editor"></textarea><br/><br/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{lang("Save")}}
            </button>
            <a href="#" id="send" class="btn btn-primary pull-right"><i
                        class="fa fa-mail-forward"></i> {{lang("Save And Send")}}
            </a>
            {!!Form::close()!!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('panel/assets/js/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('editor');
        $("#send").click(function () {
            $("#to_be_sent").val(1);
            $("#form").submit();
        });
    </script>
@stop