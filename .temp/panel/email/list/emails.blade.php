<ul>
    @forelse($campaign->emails as $email)
        <li>
            {{$email->email}} <a href="#" class="delete-email" email-id="{{$email->id}}"><i
                        class="fa fa-trash-o"></i></a>
        </li>
    @empty
        <li>{{lang('Empty')}}</li>
    @endforelse
</ul>

<script>
    $(".delete-email").click(function () {
        var email = $(this);
        var email_id = $(this).attr("email-id");
        $.get('{{url("admin/campaign/list/emailDelete")}}', {email_id: email_id}, function (data) {
            email.parent().hide();
            toastr.success("{{lang('Successfully removed this e-mail from the list')}}");
        });
    });
</script>