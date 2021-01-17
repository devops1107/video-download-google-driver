<?php
/**
 * Created by PhpStorm.
 * User: Arachi
 * Date: 31/03/2020
 * Time: 20:10
 */
$id = edand('d', $_GET['id']);
// Init
$s = new YDrive();
// get Resolution List
//print_r($s->getResolution());
// set new ID df
$s->setID($id ?? "");
// set Resolution
$s->setResolution($_GET["m"]  ?? "");
// download Link
$s->setDownload($_GET["alt"]  ?? "");
// Start Stream
$s->stream();