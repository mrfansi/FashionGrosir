<?php
$CI =& get_instance();
$CI->load->helper('url');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/all.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>"
          type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/fasion-style.css'); ?>">
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <link rel="shortcut icon" href="<?= base_url('upload/' . $icon); ?>">

    <title><?= $brandname; ?></title>
</head>
<body>
