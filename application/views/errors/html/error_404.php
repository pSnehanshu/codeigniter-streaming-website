<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
if( ! isset($CI))
{
    $CI = new CI_Controller();
}
$CI->load->helper('url');


?><html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="https://dglyi7b99dtt4.cloudfront.net/free/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://dglyi7b99dtt4.cloudfront.net/free/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>404 Page not found | Eimiflix.com</title>
	<style>#main { height: 100vh; }</style>
</head>

<body>
	<div class="d-flex justify-content-center align-items-center" id="main">
		<h1 class="mr-3 px-3 align-top border-right inline-block align-content-center">404 page not found</h1>
		<div class="inline-block align-middle px-2">
			<a href="<?=site_url()?>">
				<img style="max-width: 80%;" src="https://dglyi7b99dtt4.cloudfront.net/free/main-logo.png" alt="Eimiflix">
			</a>
		</div>
	</div>
</body>

</html>
