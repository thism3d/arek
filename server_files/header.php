<?php


$title = isset($title) ? $title : "Arek Property Management | Your Home Team";

?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>

    <!-- Personal Properties -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description"
        content="Experience peace of mind with Arek's expert property management services. We handle everything from tenant screening to maintenance, maximizing your rental income and minimizing your stress. Your home is in good hands with Arek.">



    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <!-- CSS For this Page -->
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="library/main0.1.2.css">


    <!-- jQuery 3.5.1 -->
    <script src="library/jquery.min.js"></script>




    <!-- Owl Carousel Slider -->
    <link rel="stylesheet" href="library/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="library/owlcarousel/owl.theme.default.min.css">
    <script src="library/owlcarousel/owl.carousel.min.js"></script>



</head>

<body>

    <section class="upper_header">
        <div class="upper_menu_logo_keeper">
            <a class="upper_phone" href="tel:+14037012169"><span class="material-icons">call</span> 403-701-2169</a>
            <img class="upper_menu_logo" src="header_logo.png" alt="AREK PROPERTY MANAGEMENT | Logo">
            <div class="h3_p_div">
                <p class="upper_p">Elevate</p>
                <p class="upper_p">Property Management</p>
            </div>
        </div>
        <div class="upper_menu_nav">
            <a class="upper_menu_nav_link" target="_blank"
                href="https://signin.managebuilding.com/Resident/portal/global-login">Tenant Login</a>
            <p class="upper_menu_nav_border"> | </p>
            <a class="upper_menu_nav_link" target="_blank"
                href="https://signin.managebuilding.com/Resident/portal/global-login">Owner Login</a>
            <p class="upper_menu_nav_border"> | </p>
            <a onclick="showMaintenanceBtn()" class="upper_menu_nav_link">Maintenance Request</a>
        </div>
    </section>
    <header class="header">
        <a href="index" class="logo_keepers">
            <img class="logo_main" src="logo.png"
                alt="InterFineArt | Explore Fine Art, Galleries, and Creativity Online">
            <img class="logo_extension" src="logo_extension.png"
                alt="InterFineArt | Explore Fine Art, Galleries, and Creativity Online">
        </a>
        <div class="menu_keeper">
            <a class="menu_item" href="index">Home</a>
            <a class="menu_item" href="about">About</a>
            <a class="menu_item" href="services">Services</a>
            <a class="menu_item" href="blog">Blog</a>
            <a class="menu_item" href="contact">Contact</a>
            <!-- <a class="menu_item" >Podcasts</a>
                <a class="menu_item" >Marketplace</a>
                <a class="menu_item" >Blog</a>
                <a class="menu_item" >Events</a>
                <a class="menu_item" >Art Curators</a>
                <a class="menu_item" >Foundation</a>
                <a class="menu_item" >Socials</a>
                <a class="menu_item" >Links</a>
                <a class="menu_item" >Contacts</a> -->
            <a onclick="toogle_mobile_menu()" class="menu_mobile_button"><i class="fa fa-bars"></i></a>
        </div>
    </header>

    <div id="mobile_menu" class="header_mobile_menu">
        <div class="header_mobile_menu_top">
            <div class="header_mobile_heading">
                <div class="logo_keepers">
                    <img class="logo_main" src="logo.png"
                        alt="InterFineArt | Explore Fine Art, Galleries, and Creativity Online">
                    <img class="logo_extension" src="logo_extension.png"
                        alt="InterFineArt | Explore Fine Art, Galleries, and Creativity Online">
                </div>
                <a onclick="toogle_mobile_menu()" class="menu_mobile_button"><i class="fa fa-remove"></i></a>
            </div>

            <div class="header_mobile_menus">
                <a class="menu_item_desktop" href="index">Home</a>
                <a class="menu_item_desktop" href="about">About</a>
                <a class="menu_item_desktop" href="services">Services</a>
                <a class="menu_item_desktop" href="blog">Blog</a>
                <a class="menu_item_desktop" href="contact">Contact</a>
            </div>
        </div>
    </div>

    <script>
    const mobile_menu = document.getElementById("mobile_menu");

    function toogle_mobile_menu() {
        if (mobile_menu.className == "header_mobile_menu") {
            mobile_menu.className = "header_mobile_menu header_mobile_menu_show";
        } else mobile_menu.className = "header_mobile_menu";
    }
    </script>