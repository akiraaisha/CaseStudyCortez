<?php
    #include('config.php');
    include('session.php');
    ?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no">
    <meta name="description" content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI.">
    <meta name="keywords" content="Semantic-UI, Theme, Design, Template">
    <meta name="author" content="PPType">
    <meta name="theme-color" content="#ffffff">
    <title>Static Top Navbar Template for Semantic-UI</title>
    <link rel="stylesheet" href="css/semantic.css" type="text/css">
    <style type="text/css">
        body {
            min-height: 2000px;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: grayscale;
        }

        .ui.borderless.menu {
            background-color: #f8f8f8;
            box-shadow: none;
            flex-wrap: wrap;
            border: none;
            padding-left: 0;
            padding-right: 0;
        }

        .ui.borderless.menu .header.item {
            font-size: 18px;
            font-weight: 400;
        }

        .ui.mobile.only.grid .ui.menu .ui.vertical.menu {
            display: none;
        }

        .ui.mobile.only.grid .ui.vertical.menu .dropdown.icon {
            float: unset;
        }

        .ui.mobile.only.grid .ui.vertical.menu .dropdown.icon:before {
            content: "\f0d7";
        }

        .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item .menu {
            position: static;
            width: 100%;
            background-color: unset;
            border: none;
            box-shadow: none;
        }

        .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item .menu {
            margin-top: 6px;
        }

        .ui.container > .ui.message {
            background-color: rga(238, 238, 238);
            box-shadow: none;
            padding: 5rem 4rem;
            margin-top: 1rem;
        }

        .ui.message h1.ui.header {
            font-size: 4.5rem;
        }

        .ui.message p.lead {
            font-size: 1.3rem;
            color: #333333;
            line-height: 1.4;
            font-weight: 300;
        }
    </style>
</head>

<body id="root">
<div class="ui tablet computer only padded grid">
    <div class="ui borderless fluid huge menu">
        <div class="ui container">
            <a class="header item">A-Prime Homeowner Association</a>
            <a class="active item">Home</a>
            <a class="item">About</a>
            <a class="item">Contact</a>
            <a class="item" href="logout.php">Logout</a>
        </div>
    </div>
</div>
<div class="ui mobile only padded grid">
    <div class="ui borderless huge fluid menu">
        <a class="header item">Project Name</a>
        <div class="right menu">
            <div class="item">
                <button class="ui icon toggle basic button">
                    <i class="content icon"></i>
                </button>
            </div>
        </div>
        <div class="ui vertical borderless fluid menu">
            <a class="active item">Home</a> <a class="item">About</a>
            <a class="item">Contact</a>
            <div class="ui dropdown item" tabindex="0">
                Dropdown<i class="dropdown icon"></i>
                <div class="menu" tabindex="-1">
                    <a class="item"> Action </a> <a class="item"> Another action </a>
                    <a class="item"> Something else here </a>
                    <div class="divider"></div>
                    <div class="header">Navbar header</div>
                    <a class="item"> Seperated link </a>
                    <a class="item"> One more seperated link </a>
                </div>
            </div>
            <a class="item">Default</a> <a class="active item">Static top</a>
            <a class="item">Fixed top</a>
        </div>
    </div>
</div>
<div class="ui container">
    <div class="ui message">
        <h1 class="ui huge header">Navbar example</h1>
        <p class="lead">
            This example is a quick exercise to illustrate how the default, static
            navbar and fixed to top navbar work. It includes the responsive CSS
            and HTML, so it also adapts to your viewport and device.
        </p>
        <a class="ui big primary button">View navbar docs » </a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="css/semantic.min.js"></script>
<!--
<script>
    $(document).ready(function() {
        $(".ui.toggle.button").click(function() {
            $(".mobile.only.grid .ui.vertical.menu").toggle(100);
        });

        $(".ui.dropdown").dropdown();
    });
</script>
-->
</body></html>