<ul id="main-menu" class="">
    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
    <!-- Search Bar -->
    <li class="{{Route::getCurrentRoute()->getPath()=='admin/dashboard'?'active':''}}">
        <a href="{{url('admin/dashboard')}}">
            <i class="fa fa-dashboard"></i>
            <span>{{lang('Dashboard')}}</span>
        </a>
    </li>
    @if(can('media.see.all') || can('media.see.own'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/media' || Route::getCurrentRoute()->getPath() == 'admin/gallery'?'active':''}} has-sub">
            <a href="#">
                <i class="fa fa-image"></i>
                <span>{{lang('Media')}}</span>
            </a>
            <ul>
                <li>
                    <a href="{{url('admin/media')}}">
                        <i class="fa fa-image"></i>
                        <span>{{lang('Media')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/gallery')}}">
                        <i class="fa fa-image"></i>
                        <span>{{lang('Galleries')}}</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(can('comments.see.all') || can('comments.see.own'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/comment'?'active':''}}">
            <a href="{{url('admin/comment')}}">
                <i class="fa fa-comments"></i>
                <span>{{lang('Comments')}}</span>
            </a>
        </li>
    @endif
    @if(can('users.access'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/user'?'active':''}}">
            <a href="{{url('admin/user')}}">
                <i class="fa fa-user"></i>
                <span>{{lang('Users')}}</span>
            </a>
        </li>
    @endif
    @if(can('category.see.all') || can('category.see.own'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/post'?'active':''}}">
            <a href="{{url('admin/post')}}">
                <i class="fa fa-comments"></i>
                <span>{{lang('Posts')}}</span>
            </a>
        </li>
    @endif
    @if(can('campaigns.access'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/campaigns'?'active':''}} has-sub">
            <a href="{{url('admin/campaigns')}}">
                <i class="fa fa-envelope"></i>
                <span>{{lang('E-mail Campaigns')}}</span>
            </a>
            <ul>
                <li><a href="{{url('admin/campaigns')}}">
                        <i class="fa fa-envelope"></i>
                        <span>{{lang('E-mail Campaigns')}}</span>
                    </a></li>
                <li><a href="{{url('admin/campaigns/lists')}}">
                        <i class="fa fa-group"></i>
                        <span>{{lang('E-mail Lists')}}</span>
                    </a></li>
            </ul>
        </li>
    @endif
    @if(can('visitors.access'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/visitors'?'active':''}}">
            <a href="{{url('admin/visitors')}}">
                <i class="fa fa-eye"></i>
                <span>{{lang('Visitors')}}</span>
            </a>
        </li>
    @endif

    @if(can('category.see'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/category'?'active':''}}">
            <a href="{{url('admin/category')}}">
                <i class="fa fa-folder-o"></i>
                <span>{{lang('Categories')}}</span>
            </a>
        </li>
    @endif
    @if(can('page.see'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/page'?'active':''}} has-sub">
            <a href="{{url('admin/page')}}">
                <i class="fa fa-file"></i>
                <span>{{lang('Pages')}}</span>
            </a>
            <ul>
                <li><a href="{{url('admin/page')}}"><i class="fa fa-list-ul"></i> {{lang('All Pages')}}</a></li>
                <li><a href="{{url('admin/page/layout')}}"><i class="fa fa-pencil"></i> {{lang('Edit Page Layout')}}</a>
                </li>
            </ul>
        </li>
    @endif
    @if(can('menu.manage'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/menu'?'active':''}}">
            <a href="{{url('admin/menu')}}">
                <i class="fa fa-list-ul"></i>
                <span>{{lang('Menu')}}</span>
            </a>
        </li>
    @endif
    @if(can('group.see'))
        <li class="{{Route::getCurrentRoute()->getPath()=='admin/groups'?'active':''}}">
            <a href="{{url('admin/group')}}">
                <i class="fa fa-group"></i>
                <span>{{lang('Groups')}}</span>
            </a>
        </li>
    @endif
    @if(can('plugins.access'))
        <li class="{{substr(Route::getCurrentRoute()->getPath(),0,12)=='admin/plugin'?'active':''}} has-sub">
            <a href="{{url('admin/plugin')}}">
                <i class="fa fa-plug"></i>
                <span>{{lang('Plugins')}}</span>
            </a>
            <ul>
                <li>
                    <a href="{{url('admin/plugin')}}">
                        <i class="fa fa-plug"></i>
                        <span>{{lang('Plugins')}}</span>
                    </a>
                </li>
                @foreach(\App\Models\Plugin::where('is_enabled',1)->get() as $plugin)
                    @if(\File::exists(plugin_path($plugin->name)."/App/Views/Admin/index.blade.php"))
                        <li>
                            <a href="{{url('admin/plugin/'.$plugin->name.'/settings')}}"><i
                                        class="fa fa-wrench"></i> {{$plugin->fullname}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    @endif
    @if(can('widgets.access'))
        <li class="{{substr(Route::getCurrentRoute()->getPath(),0,12)=='admin/widget'?'active':''}}">
            <a href="{{url('admin/widget')}}">
                <i class="fa fa-list-ul"></i>
                <span>{{lang('Widgets')}}</span>
            </a>
        </li>
    @endif
    @if(can('themes.access'))
        <li class="{{substr(Route::getCurrentRoute()->getPath(),0,12)=='admin/themes'?'active':''}}">
            <a href="{{url('admin/themes')}}">
                <i class="fa fa-pencil"></i>
                <span>{{lang('Themes')}}</span>
            </a>
        </li>
    @endif
    @if(can('ban.create') || can('ban.delete'))
        <li class="{{substr(Route::getCurrentRoute()->getPath(),0,9)=='admin/ban'?'active':''}}">
            <a href="{{url('admin/bans')}}">
                <i class="fa fa-ban"></i>
                <span>{{lang('Bans')}}</span>
            </a>
        </li>
    @endif
    @if(can('settings.access'))
        <li class="{{substr(Route::getCurrentRoute()->getPath(),0,14)=='admin/settings'?'active':''}}">
            <a href="{{url('admin/settings')}}">
                <i class="fa fa-wrench"></i>
                <span>{{lang('Settings')}}</span>
            </a>
        </li>
    @endif
    @if(can('settings.access'))
        <li class="{{substr(Route::getCurrentRoute()->getPath(),0,18)=='admin/translations'?'active':''}}">
            <a href="{{url('admin/translations')}}">
                <i class="fa fa-flag"></i>
                <span>{{lang('Translations')}}</span>
            </a>
        </li>
    @endif
    <li class="{{substr(Route::getCurrentRoute()->getPath(),0,16)=='admin/appearance'?'active':''}}">
        <a href="{{url('admin/appearance')}}">
            <i class="fa fa-pencil"></i>
            <span>{{lang('Panel Appearance')}}</span>
        </a>
    </li>
    @if(can('analytics.access'))
        <li class="{{substr(Route::getCurrentRoute()->getPath(),0,15)=='admin/analytics'?'active':''}}">
            <a href="{{url('admin/analytics')}}">
                <i class="fa fa-eye"></i>
                <span>Google Analytics</span>
            </a>
        </li>
    @endif
    <li>
        <a href="{{url('/')}}">
            <i class="fa fa-sign-out"></i>
            <span>{{lang('Back To The Site')}}</span>
        </a>
    </li>
</ul>