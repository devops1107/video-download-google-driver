<?php
session_status();
get_header();
if(isset($_SESSION['name'])){
    echo "welcome back bro";
} else {
    echo "silahkan login terlebih dahulu";
}