<!DOCTYPE HTML>

<html>

<head>
  <meta charset="utf-8">
  <title><?=$seo_title?></title>

  <meta name="description" content="<?=$seo_description?>" />
  <meta name="keywords" content="<?=$seo_keywords?>" />
  <meta name="robots" content="<?=$seo_robots?>" />

  <link rel="icon" href="<?=$this->mi->url->base('favicon.ico');?>" type="image/x-icon">
  <link rel="shortcut icon" href="<?=$this->mi->url->base('favicon.ico');?>" type="image/x-icon">

  <script src="<?=$this->mi->url->base('media/vendors/jquery/1.9.1/jquery.min.js')?>"></script>
  <script src="<?=$this->mi->url->base('media/vendors/HTML-KickStart-master/js/kickstart.js')?>"></script>
  <link rel="stylesheet" href="<?=$this->mi->url->base('media/vendors/HTML-KickStart-master/css/kickstart.css')?>" media="all" />

  <link rel="stylesheet" href="<?=$this->mi->url->base('media/css/style.css')?>" media="all" />
</head>

<body>

    <div id="site-wrapper">

    <h1><?=$this->mi->html->anchor('','MiMiMi micro framework', array('style'=>'text-decoration:underline', 'title'=>'Home'))?></h1>

    <?=$menu?>
