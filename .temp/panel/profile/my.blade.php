@extends('layouts.main')

@section('title')
    {{lang('My Profile')}}
@stop

@section('content')
    {!!Form::open(['url' => 'admin/changeAvatar', 'id' => 'avatar_form', 'files' => true])!!}
    <input type="file" style="display:none" name="avatar" id="file"/>
    {!!Form::close()!!}
    <div class="profile-env">

        <header class="row">

            <div class="col-sm-2">

                <a href="#" class="profile-picture">
                    @if(\Auth::user()->avatar!="")
                        <img src="{{url('media/profile/'.\Auth::user()->id.'/'.\Auth::user()->avatar)}}"
                             style="border:1px solid #303641" class="img-responsive img-circle" id="change"/>
                    @else
                        <img src="{{url('media/profile/profile.png')}}" class="img-responsive img-circle" id="change"/>
                    @endif
                </a>

            </div>

            <div class="col-sm-7">

                <ul class="profile-info-sections">
                    <li>
                        <div class="profile-name">
                            <strong>
                                <a href="#">{{\Auth::user()->username}}</a>
                                <a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip"
                                   data-placement="top" data-original-title="Online"></a>
                            </strong>
                            <span><a href="#">{{\Auth::user()->group->name}}</a></span>
                        </div>
                    </li>

                    <li>
                        <div class="profile-stat">
                            <h3>{{\Auth::user()->posts()->count()}}</h3>
                            <span><a href="#">{{lang('Posts')}}</a></span>
                        </div>
                    </li>

                    <li>
                        <div class="profile-stat">
                            <h3>{{\Auth::user()->comments()->count()}}</h3>
                            <span><a href="#">{{lang('Comments')}}</a></span>
                        </div>
                    </li>
                </ul>

            </div>

        </header>

        <section class="profile-info-tabs">

            <div class="row">

                <div class="col-sm-offset-2 col-sm-10">

                    <ul class="user-details">
                        <li>
                            <a href="#">
                                <i class="entypo-mail"></i>
                                {{\Auth::user()->email}}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-location"></i>
                                <span field="location">
                                 {{\Auth::user()->location}}
                                </span>
                                <a href="#" id="edit_location" style="color:green;"><i class="fa fa-pencil"></i></a>
                                <input type="text" name="location" style="display:none"/>
                                <a href="#" id="update_location" style="display: none"><i class="fa fa-save"></i></a>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-suitcase"></i>
                                {{lang('Works as')}}
                                <span field="job">
                                 {{\Auth::user()->job}}
                                </span>
                                <a href="#" id="edit_job" style="color:green;"><i class="fa fa-pencil"></i></a>
                                <input type="text" name="job" style="display:none"/>
                                <a href="#" id="update_job" style="display: none"><i class="fa fa-save"></i></a>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-bullhorn"></i>
                                <span field="description">
                                {{\Auth::user()->description}}
                                </span>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>

        </section>


        <section class="profile-feed">

            <form class="profile-post-form" method="post">
                <textarea class="form-control autogrow" placeholder="{{lang('Description')}}" id="description"
                          style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;">{{\Auth::user()->description}}</textarea>

                <div class="form-options">
                    <div class="post-submit">
                        <button type="button" class="btn btn-primary"
                                id="update_description">{{lang('Update')}}</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@stop

@section('js')
    <script>
        function update_field(field, value) {
            $.post('{{url('admin/updateDescription')}}', {
                _token: '{{csrf_token()}}',
                field: field,
                value: value
            }, function (done) {
                toastr.success('{{lang('Field successfully updated')}}');
            });
        }
        $("#change").click(function () {
            $("#file").click();
        });
        $("#file").change(function () {
            $("#avatar_form").submit();
        });
        $("#update_description").click(function () {
            update_field("description", $("#description").val());
            $("span[field=description]").text($("#description").val());
        });
        $("#edit_location").click(function () {
            $("#update_location").show();
            $(this).hide();
            $("input[name=location]").show();
        });
        $("#update_location").click(function () {
            update_field("location", $("input[name=location]").val());
            $(this).hide();
            $("input[name=location]").hide();
            $("#edit_location").show();
            $("span[field=location]").text($("input[name=location]").val());
        });
        $("#edit_job").click(function () {
            $("#update_job").show();
            $(this).hide();
            $("input[name=job]").show();
        });
        $("#update_job").click(function () {
            update_field("job", $("input[name=job]").val());
            $(this).hide();
            $("input[name=job]").hide();
            $("#edit_job").show();
            $("span[field=job]").text($("input[name=job]").val());
        });
    </script>
@stop