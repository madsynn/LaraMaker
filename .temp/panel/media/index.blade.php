@extends('layouts.main')

@section('title')
    {{lang('Media')}}
@stop


@section('content')
    <style>
        .box {
            background-color: #eee;
            border: 1px solid #777;
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 10px;
        }
    </style>
    @if(can('media.upload'))
        <a href="#" class="btn btn-green" onclick="$('#file').click()"><i class="fa fa-upload"></i> {{lang('Upload')}}
        </a>
    @endif
    <div class="row" style="margin-top: 20px;">
        @foreach($media_files as $file)
            <div class="col-sm-2">
                <div class="box" id="box{{$file->id}}"
                     style="background-image: url('{{url('media/'.$file->uploaded_by.'/'.$file->id.'/'.$file->path)}}')">
                </div>
                <div class="btn-group" style="margin-left:10px;">
                    @if(can('media.delete.all'))
                        {!! Form::open(['url' => 'admin/media/'.$file->id, 'style' => 'display:inline', 'method' =>
                        'delete']) !!}
                        <button type="submit" class="btn btn-red btn-xs" style="border-top-right-radius: 0px;">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        {!! Form::close() !!}
                    @else
                        @if(can('media.delete.own') && $file->uploaded_by == \Auth::user()->id)
                            {!! Form::open(['url' => 'admin/media/'.$file->id, 'style' => 'display:inline', 'method' =>
                            'delete']) !!}
                            <button type="submit" class="btn btn-red btn-xs" style="border-top-right-radius: 0px;">
                                <i class="fa fa-trash-o"></i>
                            </button>
                            {!! Form::close() !!}
                        @endif
                    @endif
                    @if(can('media.edit.all'))
                        <a href="{{url('admin/media/'.$file->id.'/edit')}}" class="btn btn-green btn-xs"
                           style="border-top-left-radius: 0px;">
                            <i class="fa fa-pencil"></i>
                        </a>

                    @else
                        @if(can('media.edit.own') && $file->uploaded_by == \Auth::user()->id)
                            <a href="{{url('admin/media/'.$file->id.'/edit')}}" class="btn btn-green btn-xs"
                               style="border-top-left-radius: 0px;">
                                <i class="fa fa-pencil"></i>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
            <script>
                var width = $("#box{{$file->id}}").width();
                $("#box{{$file->id}}").css("height", width);
                $("#box{{$file->id}}").css("background-size", "100%");
            </script>
        @endforeach
    </div>

    @if(can('media.upload'))
        {!! Form::open(['url' => 'admin/media', 'files' => true, 'id' => 'file_form']) !!}
        <input type="file" name="uploads[]" style="display:none;" id="file" multiple/>
        {!! Form::close() !!}
    @endif
@stop


@section('js')
    <script>
        function load_page() {
            $.get('{{url('admin/media/load')}}', function (data) {
                $("#area").html(data);
            });
        }
    </script>
    @if(can('media.upload'))
        <script>
            $("#file").change(function () {
                $("#file_form").submit();
            });
        </script>
    @endif
@stop