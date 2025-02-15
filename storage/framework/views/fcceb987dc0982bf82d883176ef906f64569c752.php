<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                <a href="<?php echo e(url('/home')); ?>" class="waves-effect"><i class="fa fa-tachometer-alt fa-fw" aria-hidden="true"></i>Dashboard</a>
            </li>
            <li>
                <a href="<?php echo e(url('/transactions')); ?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Transactions</a>
            </li>
            <li>
                <a href="<?php echo e(url('/users')); ?>" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>System Users</a>
            </li>
            <li>
                <a href="<?php echo e(url('/logs')); ?>" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i>Transaction Logs</a>
            </li>
            <li>
                <a href="<?php echo e(url('/logout')); ?>" class="waves-effect"><i class="fa fa-power-off fa-fw" aria-hidden="true"></i>Logout</a>
            </li>

        </ul>
    </div>
    
</div>