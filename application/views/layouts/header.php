<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eimiflix</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body class="d-flex flex-column h-100">
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?= site_url('home') ?>">EIMIFLIX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('home/category/special') ?>">Special</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('home/category/comedy') ?>">Comedy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('home/category/short-videos') ?>">Short videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('home/category/music-videos') ?>">Music videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('home/category/movies') ?>">Movies</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- header end -->

    <!-- main -->
    <main role="main" style="margin-top: 56px;">
        