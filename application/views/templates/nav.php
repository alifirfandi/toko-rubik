<nav class="main_nav">
    <ul>
        <li><a href="<?php if ($this->session->userdata('role')) {
                            echo site_url('member');
                        } else {
                            echo site_url();
                        } ?>">Home</a></li>
        <li><a href="<?= site_url("contact") ?>">Contact</a></li>
    </ul>
</nav>
<div class="header_extra ml-auto">
    <div class="shopping_cart">
        <?php if ($this->session->userdata('role') == 3) : ?>
            <a href="<?= site_url("booked") ?>">
                <div><i class="material-icons">bookmark</i> <span class="d-none d-md-inline">Booked</span> <span>(<?= $this->session->userdata('dataBooked') ?>)</span></div>
            </a>
            &emsp;
            <a href="<?= site_url("auth/logout") ?>">
                <div>Logout</div>
            </a>
        <?php else : ?>
            <a href="<?= site_url("login") ?>">
                <div>Login</div>
            </a>
        <?php endif; ?>
    </div>
    <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
</div>