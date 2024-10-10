<?php


$title = isset($title) ? $title : "Arek Property Management | Your Home Team";
$meta_description = isset($meta_description) ? $meta_description : "Experience peace of mind with Arek's expert property management services. We handle everything from tenant screening to maintenance, maximizing your rental income and minimizing your stress. Your home is in good hands with Arek.";


$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currentUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$canonical = '<link rel="canonical" href="' . htmlspecialchars($currentUrl, ENT_QUOTES, 'UTF-8') . '" />';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>

    <!-- Personal Properties -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="<?php echo $meta_description; ?>">

    
    <!-- Canonical -->
    <?php echo $canonical; ?>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VKLD2KTQ7L"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-VKLD2KTQ7L');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TKFLP2C6');</script>


    <!-- PWA Code -->
    <link rel="manifest" href="manifest.json" />
    <meta name="theme-color" content="#000f1f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="icns/512x512.png">
    <link rel="apple-touch-startup-image" href="logo_upper_header.png">


    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- CSS For this Page -->
    <link rel="icon" href="favicon_round.png">
    <link rel="stylesheet" href="library/main0.1.3.css?v103">

    <!-- jQuery 3.5.1 -->
    <script src="library/jquery.min.js"></script>

    
    <?php echo isset($header_extra_tags) ? $header_extra_tags : ''; ?>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKFLP2C6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '3961947190704449');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=3961947190704449&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

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
                alt="Arek Property Management">
            <img class="logo_extension" src="logo_extension.png"
                alt="Arek Property Management">
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
                        alt="Arek Property Management">
                    <img class="logo_extension" src="logo_extension.png"
                        alt="Arek Property Management">
                </div>
                <a onclick="toogle_mobile_menu()" class="menu_mobile_button"><i class="fa fa-remove"></i></a>
            </div>

            <div class="header_mobile_menus">
                <a class="menu_item_desktop" href="index">Home</a>
                <a class="menu_item_desktop" href="booking">Book Appointment</a>
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