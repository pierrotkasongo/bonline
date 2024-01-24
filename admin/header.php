<?php
   require_once '../library/Session.php';
    Session::checkSession();
   if (isset($_GET['deco']) && !empty($_GET['deco']) && $_GET['deco']=="logout"){
      Session::destroy();
   }
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>B-Online | Dashboard</title>
    <!-- Fonts -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/modern.css" rel="stylesheet">
    <link href="../css/line-awesome.min.css" rel="stylesheet">
    <script src="../js/settings.js"></script>

</head>
<body>




