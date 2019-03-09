<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li>
                <a href="{{ route('users.index') }}">
                <i class="fa fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>