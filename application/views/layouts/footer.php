</main>
<!-- main end -->

<div style="height: 100px; padding: 70px;"></div>

<!-- FOOTER -->
<footer class="mt-auto">
    <div class="container">
        <p>
            &copy; <?= date('Y') ?>, Lendou Group &middot;
            <a href="<?= site_url('home/page/privacy') ?>">Privacy</a> &middot;
            <a href="<?= site_url('home/page/terms') ?>">Terms</a> &middot;
            <a href="<?= site_url('home/plans')  ?>">Pricing</a>
        </p>
    </div>
</footer>
<!-- FOOTER end -->

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script src="<?= site_url('home/user_avatar_markup') ?>"></script>
</body>

</html>