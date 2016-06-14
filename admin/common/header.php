<?php session_start(); ?>
<?php
function __autoload($className)
{
    //Zaredi papka entities ako e entity
    //Zaredi papka collections ako e kolekciq
    //Zaredi papka system ako ne e nito kolekciq nito entity

    if (strpos($className, 'Collection') > 0) {
        $path = __DIR__.'/../../common/models/collections/' . $className . '.php';
    } elseif (strpos($className, 'Entity') > 0) {
        $path = __DIR__.'/../../common/models/entities/' . $className . '.php';
    } else {
        $path = __DIR__.'/../../common/system/' . $className . '.php';
    }

    require_once $path;
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Do.IT - Admin panel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body onload="startTime()">

<div id="wrapper">