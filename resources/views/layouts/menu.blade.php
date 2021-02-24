<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" @if(request()->path() == 'dashboard') class="nav-link active"
       @else  class="nav-link" @endif>
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li @if(request()->path() == 'users') class="nav-item has-treeview menu-open"
    @elseif(request()->path() == 'customers') class="nav-item has-treeview menu-open"
    @else  class="nav-item has-treeview" @endif>
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>
            Management
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('users')}}" @if(request()->path() == 'users') class="nav-link active"
               @else  class="nav-link" @endif>
                <i class="fas fa-users nav-icon"></i>
                <p>User Management</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('customers')}}" @if(request()->path() == 'customers') class="nav-link active"
               @else  class="nav-link" @endif>
                <i class="fas fa-users nav-icon"></i>
                <p>Customer Management</p>
            </a>
        </li>
    </ul>
</li>
<li
    @if(request()->path() == 'vm/requirement_classify') class="nav-item has-treeview menu-open"
    @elseif(request()->path() == 'vm/sizing') class="nav-item has-treeview menu-open"
    @elseif(request()->path() == 'vm/change_proposal') class="nav-item has-treeview menu-open"
    @else class="nav-item has-treeview" @endif
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
        <li class="nav-item">
            <a href="{{route('vm.sizing')}}" @if(request()->path() == 'vm/sizing') class="nav-link active"
               @else  class="nav-link" @endif>
                <i class="fas fa-hat-cowboy-side nav-icon"></i>
                <p>Sizing</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('vm.change_proposal')}}" @if(request()->path() == 'vm/change_proposal') class="nav-link active"
               @else  class="nav-link" @endif>
                <i class="fas fa-hat-cowboy-side nav-icon"></i>
                <p>Config Change Proposal</p>
            </a>
        </li>
    </ul>
</li>
