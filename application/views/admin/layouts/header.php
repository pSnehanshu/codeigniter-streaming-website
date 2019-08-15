<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/JaniRefsnes/w3css/w3.min.css">
    <title>Eimiflix admin</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        #container {
            min-height: 100%;
            position: relative;
        }
        header {
            background: #ff0;
            padding: 10px;
        }
        main {
            padding: 10px;
            padding-bottom: 60px; /* Height of the footer */
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px; /* Height of the footer */
        }
        a{
            color: #00f;
            text-decoration: none;
        }
        a:hover{
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div id="container">
        <header class="w3-padding w3-black">
            <a style="text-decoration: none; color: #fff;" href="<?= site_url('admin') ?>">
                <img src="https://dglyi7b99dtt4.cloudfront.net/free/main-logo.png" alt="EIMIFLIX" style="width: 115px;"> Admin area
            </a>
            
            <?php if (emflx_is_admin_logged()):?>
            <a class="w3-text-white w3-right w3-round" href="<?=site_url('admin/logout')?>">Logout</a>
            <?php endif;?>

        </header>

        <main class="w3-container w3-padding-large">
        