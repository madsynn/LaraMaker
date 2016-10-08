@extends('layouts.main')

@section('title')
    {{lang('Edit Email List')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center"><i class="fa fa-envelope-o"></i> {{lang('Edit Email List')}}</h3>
            {!!Form::open(['url' => 'admin/campaign/list/'.$list->id])!!}
            <strong>{{lang('Name')}}</strong>
            <input class="form-control" type="text" name="name" value="{{$list->name}}"/>
            <br/>
            <button type="submit" class="btn btn-primary"><i
                        class="fa fa-save"></i> {{lang('Save')}}</button>
            <br/>
            <br/>
            <strong>{{lang('E-mails')}}</strong> <a href="#" id="add_all_user_emails"
                                                    class="btn btn-success btn-xs"><i
                        class="fa fa-group"></i> {{lang("Add existing users' emails")}}</a>

            <div class="row">
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" id="add_email"/>
                        <span class="input-group-addon" id="add_email_button"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
            <div id="emails"></div>
            {!!Form::close()!!}
        </div>
    </div>
@stop

@section('modals')
    <div class="modal fade" id="modal_with_user_emails">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{lang("Add existing users' emails")}}</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach(\App\Models\User::where('id','<>',\Auth::user()->id)->get() as $user)
                            <li><input type="checkbox" class="user-checkbox" user-id="{{$user->id}}"
                                       value="{{$user->email}}"/> {{$user->email}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_emails_button">{{lang('Add')}}</button>
                </div>
            </div>
        </div>
        @stop

        @section('js')
            <script>
                $("form").keypress(function (e) {
                    if (e.keyCode == 13) e.preventDefault();
                });
                function load_mails() {
                    $.get('{{url("admin/campaign/list/".$list->id."/getEmails")}}', function (data) {
                        $("#emails").html(data);
                    });
                }
                function validate_email(email) {
                    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                    return re.test(email);
                }
                function addEmail(email) {
                    $.get('{{url("admin/campaign/list/".$list->id."/email/add")}}', {email: email}, function (data) {
                        if (data[0] == "warning") {
                            toastr.warning(data[1]);
                        } else {
                            toastr.success(data[1]);
                        }
                        load_mails();
                    });
                }
                load_mails();
                $("#add_email_button").click(function () {
                    if (validate_email($("#add_email").val())) {
                        addEmail($("#add_email").val());
                    } else {
                        toastr.error("{{lang('Invalid E-mail')}}");
                    }
                });
                $("#add_email").keypress(function (e) {
                    if (e.keyCode == 13) {
                        if (validate_email($("#add_email").val())) {
                            addEmail($("#add_email").val());
                        } else {
                            toastr.error("{{lang('Invalid E-mail')}}");
                        }
                    }
                });
                $("#add_all_user_emails").click(function () {
                    $("#modal_with_user_emails").modal('show');
                });
                $("#add_emails_button").click(function () {
                    var emails = [];
                    $(".user-checkbox:checked").each(function () {
                        emails.push($(this).val());
                    });
                    $.get('{{url("admin/campaign/list/".$list->id.'/importEmails')}}', {emails: emails}, function () {
                        toastr.success('{{lang('Successfully added the selected e-mails')}}');
                        $("#modal_with_user_emails").modal('hide');
                        load_mails();
                    });
                });
            </script>
@stop
