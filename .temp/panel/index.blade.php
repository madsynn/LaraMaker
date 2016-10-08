@extends('layouts.main')

@section('title')
    {{lang('Dashboard')}}
@stop

@section('content')
    @if(can('dashboard.access'))
        <div class="row">
            <div class="col-sm-3">
                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="{{\App\Models\User::count()}}" data-postfix=""
                         data-duration="1500" data-delay="0">
                        0
                    </div>
                    <h3>{{lang('Registered users')}}</h3>

                    <p>{{lang('In our website')}}</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-comment"></i></div>
                    <div class="num" data-start="0" data-end="{{\App\Models\Post::count()}}" data-postfix=""
                         data-duration="1500"
                         data-delay="600">0
                    </div>
                    <h3>{{lang('Posts')}}</h3>

                    <p>{{lang('so far in our database')}}</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-database"></i></div>
                    <div class="num" data-start="0" data-end="{{\App\Models\Page::count()}}" data-postfix=""
                         data-duration="1500"
                         data-delay="1200">0
                    </div>
                    <h3>{{lang('Pages')}}</h3>

                    <p>{{lang('exist in our website.')}}</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-rss"></i></div>
                    <div class="num" data-start="0" data-end="{{\App\Models\Comment::count()}}" data-postfix=""
                         data-duration="1500"
                         data-delay="1800">0
                    </div>
                    <h3>{{lang('Comments')}}</h3>

                    <p>{{lang('on our site at the moment')}}</p>
                </div>
            </div>
        </div>
    @else
    @endif
    <div class="row">
        <div class="col-sm-4">
            @if(can('dashboard.access'))
                <div id="os_usage" style="height: 300px"></div>
            @endif
        </div>
        <div class="col-sm-4">
            @if(can('dashboard.access'))
                <div id="browser_usage" style="height: 300px"></div>
            @endif
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="fa fa-list-ul"></i> <a href="{{url('admin/mytasks')}}">{{lang('My Tasks')}}</a> <a
                                href="{{url('admin/task/create')}}" class="btn btn-success btn-xs"
                                style="color:#FFF;"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="panel-body" style="padding:0px;">
                    <table class="table table-striped table-condenser" style="margin: 0px;">
                        @forelse($tasks as $task)
                            <tr>
                                <td {!!$task->is_finished?'style="text-decoration: line-through"':''!!}>{{$task->title}}  {!!$task->is_finished?'':'<a href="'.url('admin/task/'.$task->id.'/finished').'"><i class="fa fa-check"></i></a>'!!}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>{{lang('You do not have any tasks')}}</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="tile-block" id="todo_tasks">
                <div class="tile-header">
                    <i class="entypo-list"></i>
                    <a href="#">
                        {{lang('Latest Posts')}}
                        <span>{{lang('List of latest post in the website')}}</span>
                    </a>
                </div>
                <div class="tile-content">
                    <ul class="todo-list">
                        @forelse($latest_posts as $post)
                            <li>
                                <div class="checkbox checkbox-replace color-white neon-cb-replacement">
                                    <?php
                                    $perm = "post.edit.all";
                                    if ($post->created_by == Auth::user()->id) $perm = "post.edit.own";
                                    ?>
                                    @if(can($perm))
                                        <a href="{{url('admin/post/'.$post->id.'/edit')}}"
                                           class="btn btn-success btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endif
                                    <label>{{post_title($post)}}</label>
                                </div>
                            </li>
                        @empty
                            <li>
                                <div class="checkbox checkbox-replace color-white neon-cb-replacement">
                                    <a href="#" class="btn btn-red btn-xs disabled"><i
                                                class="fa fa-check-circle"></i></a>
                                    <label>{{lang('There are no posts in the website')}}</label>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
                @if($latest_posts->count()==5)
                    @if(\App\Models\Post::count()>5)
                        <div class="tile-footer">
                            <a href="{{url('admin/post')}}">{{lang('View all posts')}}</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        @if(can('dashboard.page_views'))
            <div class="col-sm-4">
                <div class="panel panel-primary panel-table">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>{{lang('Pages Statistics')}}</h3>
                            <span>{{lang('Page Views statistics')}}</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>{{lang('Page Name')}}</th>
                                <th>{{lang('Hits')}}</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($page_stats as $page)
                                <tr>
                                    <td>{{$page->getCol("page_","name", 'page_id')}}</td>
                                    <td>{{$page->hits}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        @if(can('dashboard.quick_post'))
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-comment"></i> {{lang('Quick Post')}}</div>
                    </div>
                    <div class="panel-body">
                        {!!Form::open(['url' => 'admin/post/quick', 'id' => 'quick-form'])!!}
                        <a href="#media_modal" class="btn btn-primary btn-xs" style="margin:10px 0px;"
                           data-toggle="modal"><i
                                    class="fa fa-picture-o"></i> {{lang('Set Featured Image')}}</a><br>
                        <input type="hidden" id="media_input" name="featured_image"/>
                        <input type="hidden" id="draft" name="draft" value="0"/>
                        <strong>{{lang('Title')}}</strong>
                        <input class="form-control" type="text" name="title"/>
                        <strong>{{lang('Text')}}</strong>
                        <textarea class="form-control" name="content" style="resize:none"></textarea>
                        <strong>{{lang('Tags')}}</strong>
                        <textarea name="tags" class="form-control" rows="1" style="resize: none"></textarea>
                        <hr/>
                        <a href="#" id="save_as_draft" class="btn btn-info btn-icon btn-sm">
                            {{lang('Save as draft')}}
                            <i class="fa fa-save"></i>
                        </a>
                        <a href="#" id="publish" class="btn btn-green btn-icon btn-sm pull-right">
                            {{lang('Publish')}}
                            <i class="fa fa-bullhorn"></i>
                        </a>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop

@section('modals')
    {!!media_modal('media_modal', 'media_input', lang('Select Image'), "0", \Request::input('featured_image') )!!}
@stop

@section('js')
    <script src="{{url('panel/assets')}}/js/rickshaw/vendor/d3.v3.js"></script>
    <script src="{{url('panel/assets')}}/js/rickshaw/rickshaw.min.js"></script>
    <script src="{{url('panel/assets')}}/js/raphael-min.js"></script>
    <script src="{{url('panel/assets')}}/js/morris.min.js"></script>
    <script>
        $("#save_as_draft").click(function () {
            $("#draft").val(1);
            $("#quick-form").submit();
        });
        $("#publish").click(function () {
            $("#draft").val(0);
            $("#quick-form").submit();
        });
        var url = '{{url('/')}}';
    </script>
    <script src="{{url('panel/assets')}}/js/neon-charts.js"></script>
@stop