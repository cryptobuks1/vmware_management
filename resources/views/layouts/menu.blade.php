<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" @if(request()->path() == 'dashboard') class="nav-link active"
       @else  class="nav-link" @endif>
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li @if(request()->path() == 'users') class="nav-item has-treeview menu-open"
    @else  class="nav-item has-treeview" @endif>
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>
            User Management
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('users')}}" @if(request()->path() == 'users') class="nav-link active"
               @else  class="nav-link" @endif>
                <i class="fas fa-users nav-icon"></i>
                <p>User List</p>
            </a>
        </li>
    </ul>
</li>
<li
    @if(request()->path() == 'vm/requirement_classify') class="nav-item has-treeview menu-open"
    @else  class="nav-item has-treeview" @endif
>
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-server"></i>
        <p>
            Virtual Machine
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('vm.requirement_classify')}}" @if(request()->path() == 'vm/requirement_classify') class="nav-link active"
               @else  class="nav-link" @endif>
                <i class="fas fa-glasses nav-icon"></i>
                <p>Requirement Classify</p>
            </a>
        </li>
    </ul>
</li>
