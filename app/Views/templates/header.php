<?php
$session = session();
$email = $session->get('email');
if ($email == null) {
  echo
  "<script>
 window.location.href = '/login/';
 </script>";
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FOX SISTEMAS</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?php echo base_url('theme/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('theme/dist/css/adminlte.min.css') ?>">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class=" hold-transition sidebar-mini text-sm">
  <div class="wrapper">

    <?php include_once('navbar.php') ?>
    <?php include_once('sidebar.php') ?>