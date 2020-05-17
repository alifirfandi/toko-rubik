<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand">
                <b>
                    <img src="<?= base_url("assets/icon/icon.png") ?>" width="50" alt="homepage" class="dark-logo" />
                </b>
                <span>
                    <img src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/images/logo-text.png") ?>" alt="homepage" class="dark-logo" />
                </span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="<?= site_url("auth/logout") ?>"><i class="mdi mdi-logout"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li <?php if (isset($dashboard))    echo "class='active'"; ?>> <a class="waves-effect waves-dark" href="<?= site_url("dashboard") ?>" aria-expanded="false"><i class="mdi mdi-chart-pie"></i> <span class="hide-menu">Dashboard</span> </a></li>
                <li <?php if (isset($cashier))      echo "class='active'"; ?>> <a class="waves-effect waves-dark" href="<?= site_url("dashboard/cashier") ?>" aria-expanded="false"><i class="mdi mdi-calculator"></i> <span class="hide-menu">Cashier</span> </a></li>
                <li <?php if (isset($transactions)) echo "class='active'"; ?>> <a class="waves-effect waves-dark" href="<?= site_url("dashboard/transactions") ?>" aria-expanded="false"><i class="mdi mdi-table"></i> <span class="hide-menu">Transactions</span> </a></li>
                <?php if ($this->session->userdata('role') == 1) : ?>
                    <li <?php if (isset($product))  echo "class='active'"; ?>> <a class="waves-effect waves-dark" href="<?= site_url("dashboard/products") ?>" aria-expanded="false"><i class="mdi mdi-package-variant-closed"></i> <span class="hide-menu">Products</span> </a></li>
                    <li <?php if (isset($references))   echo "class='active'"; ?>> <a class="waves-effect waves-dark" href="<?= site_url("dashboard/references") ?>" aria-expanded="false"><i class="mdi mdi-key-change"></i> <span class="hide-menu">References</span> </a></li>
                <?php endif; ?>
                <li <?php if (isset($users))        echo "class='active'"; ?>> <a class="waves-effect waves-dark" href="<?php $url = "dashboard" ; if($this->session->userdata('role') == 2) $url = "cashier"; echo site_url("$url/users") ?>" aria-expanded="false"><i class="mdi mdi-account"></i> <span class="hide-menu">Users</span> </a></li>
                <li <?php if (isset($inbox))        echo "class='active'"; ?>> <a class="waves-effect waves-dark" href="<?= site_url("dashboard/inbox") ?>" aria-expanded="false"><i class="mdi mdi-forum"></i> <span class="hide-menu">Inbox</span> </a></li>
            </ul>
        </nav>
    </div>
</aside>