@extends('layouts.main')

@section('title')
    {{lang('My Profile')}}
@stop

@section('content')
    <div class="profile-env">

        <header class="row">

            <div class="col-sm-2">

                <a href="#" class="profile-picture">
                    @if($user->avatar!="")
                        <img src="{{url('media/profile/'.$user->id.'/'.$user->avatar)}}"
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
                                <a href="#">{{$user->username}}</a>
                            </strong>
                            <span><a href="#">{{$user->group->name}}</a></span>
                        </div>
                    </li>

                    <li>
                        <div class="profile-stat">
                            <h3>{{$user->posts()->count()}}</h3>
                            <span><a href="#">{{lang('Posts')}}</a></span>
                        </div>
                    </li>

                    <li>
                        <div class="profile-stat">
                            <h3>{{$user->comments()->count()}}</h3>
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
                                {{$user->email}}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-location"></i>
                                <span field="location">
                                 {{$user->location}}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-suitcase"></i>
                                {{lang('Works as')}}
                                <span field="job">
                                 {{$user->job}}
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-bullhorn"></i>
                                <span field="description">
                                {{$user->description}}
                                </span>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>

        </section>
    </div>
@stop
