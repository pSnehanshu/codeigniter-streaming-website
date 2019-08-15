<style>
    .tabs a:hover {
        text-decoration: none;
    }

    .tabs li {
        list-style-type: none;
        display: inline-block;
        padding: 10px;
        border: solid 1px #555;
        margin: 0px;
    }

    .tabs li:hover {
        background-color: #ccc;
        color: #000;
    }

    .active-tab {
        background-color: #555;
    }

    .active-tab a,
    .active-tab {
        color: #ddd;
    }
</style>

<div class="w3-panel">
    <ul class="tabs">
        <a href="<?= site_url('admin/dashboard') ?>">
            <li class="<?= $active == 'dashboard' ? 'active-tab' : '' ?>">Dashboard</li>
        </a>
        <a href="<?= site_url('admin/videos') ?>">
            <li class="<?= $active == 'videos' ? 'active-tab' : '' ?>">Videos</li>
        </a>
        <a href="<?= site_url('admin/shows') ?>">
            <li class="<?= $active == 'shows' ? 'active-tab' : '' ?>">Shows</li>
        </a>
        <a href="<?= site_url('admin/users') ?>">
            <li class="<?= $active == 'users' ? 'active-tab' : '' ?>">Users</li>
        </a>
        <a href="<?= site_url('admin/payments') ?>">
            <li class="<?= $active == 'payments' ? 'active-tab' : '' ?>">Payments</li>
        </a>
    </ul>
</div>