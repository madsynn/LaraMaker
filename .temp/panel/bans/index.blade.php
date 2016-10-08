@extends('layouts.main')

@section('title')
    {{lang('Bans')}}
@stop

@section('content')
    <h3><i class="fa fa-ban"></i> {{lang('Bans')}}</h3>
    <a href="{{url('admin/ban/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> {{lang('Create')}}</a>

    <div class="table-responsive" style="margin-top:20px;">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <td>{{lang('Ip')}} / {{lang('User')}}</td>
                <td>{{lang('From')}}</td>
                <td>{{lang('To')}}</td>
                <td>{{lang('Options')}}</td>
            </tr>
            </thead>
            <tbody>
            @forelse($bans as $ban)
                <tr>
                    <td>{{$ban->user_id!=''?$ban->user->username:$ban->ip}}</td>
                    <td>{{$ban->forever?lang('Forever'):date("Y-m-d", $ban->from)}}</td>
                    <td>{{$ban->forever?lang('Forever'):date("Y-m-d", $ban->to)}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{url('admin/ban/'.$ban->id.'/delete')}}" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">{{lang('There are no bans')}}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@stop