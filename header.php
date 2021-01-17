<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <title>WDrive by Westheme</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">WDrive</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link"  href="/dashboard">Home</a></li>
<!--            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>-->
<!--                <ul class="dropdown-menu">-->
<!--                    <li><a href="#">Page 1-1</a></li>-->
<!--                    <li><a href="#">Page 1-2</a></li>-->
<!--                    <li><a href="#">Page 1-3</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <?php if(isset($_SESSION['id'])){ ?>
                <li class="nav-item"><a  class="nav-link" href="/dashboard/add">Add Link</a></li>
                <li class="nav-item"><a  class="nav-link" href="/dashboard/tools">Tools</a></li>
                <li class="nav-item"><a  class="nav-link" href="/dashboard/settings">Settings</a></li>
            <?php } ?>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <?php if(isset($_SESSION['id'])){ ?>
                <li class="nav-item"><a  class="nav-link" href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php } else { ?>
                <li class="nav-item"><a  class="nav-link" href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li class="nav-item"><a  class="nav-link" href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>
<main class="container flex-shrink-0" role="main">