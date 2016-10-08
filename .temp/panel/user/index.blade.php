@extends('layouts.main')

@section('title')
    {{lang('Users')}}
@stop

@section('content')
    <h3><i class="fa fa-user"></i> {{lang('Users')}}</h3>
    @foreach($users as $user)
        <div class="member-entry">
            <a href="{{url('admin/profile/'.$user->profile)}}" class="member-img">
                <img src="{{$user->avatar!=""?asset('media/profile/'.$user->id.'/'.$user->avatar):asset('media/profile/profile.png')}}"
                     class="img-rounded">
            </a>

            <div class="member-details">
                <h4>
                    <a href="{{url('user/'.$user->username)}}">{{$user->username}}</a>
                    @if(can('user.edit'))
                        <a href="{{url('admin/user/'.$user->id.'/edit')}}" class="btn btn-success btn-xs"><i
                                    class="fa fa-pencil"></i></a>
                    @endif
                    @if(can('user.delete') && $user->id!=\Auth::user()->id)
                        <a href="{{url('admin/user/'.$user->id.'/delete')}}" class="btn btn-danger btn-xs"><i
                                    class="fa fa-times"></i></a>
                    @endif
                </h4>

                <div class="row info-list">
                    <div class="col-sm-4">
                        <i class="entypo-briefcase"></i>
                        {{$user->group->name}}<br><br>
                        <i class="fa fa-comments"></i>
                        <a href="#">{{$user->posts()->count()}} {{lang('Posts')}}</a><br><br>
                        <i class="fa fa-comments"></i>
                        <a href="#">{{$user->comments()->count()}} {{lang('Comments')}}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop