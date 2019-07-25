<div class="dropdown">
    <img src="<?= htmlentities($user->avatar) ?>" alt="user avatar" class="rounded dropdown-toggle" style="height: 40px;cursor: pointer;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?=site_url('home/settings#my-account')?>">My account</a>
        <a class="dropdown-item" href="<?=site_url('home/plans')?>">Memberships</a>
        <a class="dropdown-item" href="<?=site_url('home/settings')?>">Settings</a>
        <a class="dropdown-item" href="<?=site_url('auth/logout')?>">Logout</a>
    </div>
</div>
