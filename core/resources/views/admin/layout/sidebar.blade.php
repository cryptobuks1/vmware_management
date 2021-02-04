<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" class="img-circle" src="{{asset('assets/admin/img/'.Auth::guard('admin')->user()->image)}}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::guard('admin')->user()->name }} </p>
            <p class="app-sidebar__user-designation">{{ Auth::guard('admin')->user()->username }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item @if(request()->path() == 'admin/home') active @endif" href="{{url('admin/home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview @if(request()->path() == 'admin/active/users' || request()->route()->getName() == 'user.view') is-expanded
                            @elseif(request()->path() == 'admin/deactive/users') is-expanded
                            @elseif(request()->path() == 'admin/sms/verified/users') is-expanded
                            @elseif(request()->path() == 'admin/all/users') is-expanded
                            @elseif(request()->path() == 'admin/email/verified/users') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label"> Manage Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/all/users' || request()->route()->getName() == 'user.view') active @endif" href="{{ route('all.user')  }}"><i class="icon fa fa-users"></i> All Users </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/active/users') active @endif" href="{{ route('active.user')  }}"><i class="icon fa fa-check"></i> Active Users </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/deactive/users') active @endif" href="{{ route('deactive.user')  }}"><i class="icon fa fa-ban"></i>Banned Users </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/email/verified/users') active @endif" href="{{ route('total.email.verified')  }}"><i class="icon fa fa-envelope"></i>Email Unverified Users </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/sms/verified/users') active @endif" href="{{ route('total.sms.verified')  }}"><i class="icon fa fa-phone"></i>Sms Unverified Users </a></li>
            </ul>
        </li>
    </ul>
</aside>
