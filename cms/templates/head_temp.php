<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nick's Blog and Resume</title>
  <link rel="stylesheet" type="text/css" href="./bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/custom.css">
</head>
<body>
  <?php
    $l = Post::getLatest();
   ?>
  <div class="container-fluid" id="top_container" >
    <div class ="row-fluid" id="topbar">
      <!--Nav Bar-->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
              <img id="n_logo" src="../img/n_circle_purple_sarif.png" alt="N logo">
            </a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">Home</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href=".?action=viewArticle&amp;articleId=".htmlspecialchars(<?php echo is_null($l) ? 'x' : $l->id; ?>>Latest Post</a></li>


                  <li><a href=".?action=archive&amp;type=all">Archive</a></li>
                  <li><a href=".?action=archive&amp;type=Tech">Tech</a></li>
                  <li><a href=".?action=archive&amp;type=History">History</a></li>
                  <li><a href=".?action=archive&amp;type=Books">Books</a></li>
                  <li><a href=".?action=archive&amp;type=Music">Music</a></li>
                </ul>
                <li><a href="../res/ResumeGetka4-14.pdf" download>Resume</a></li>
                <li><a href="https://github.com/Nick-Getka">Github</a></li>
                <li><a href=".?action=coming_soon">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
