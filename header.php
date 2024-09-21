<?php
    $title = isset($title) ? $title : "InterFineArt | Explore Fine Art, Galleries, and Creativity Online";
    $extra_heading = isset($extra_heading) ? $extra_heading : "";
?>


<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        
        <!-- Personal Properties -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Discover a world of fine art and creativity at InterFineArt. Explore galleries, artworks, and resources for artists. Connect with a vibrant community of art enthusiasts">



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

        <?php echo $extra_heading; ?>


    </head>

    <body>
        <header class="header">
            <a  href="index" class="logo_keepers">
                <img class="logo_main" src="logo.png" alt="InterFineArt | Explore Fine Art, Galleries, and Creativity Online">
                <img class="logo_extension" src="logo_extension.png" alt="InterFineArt | Explore Fine Art, Galleries, and Creativity Online">
            </a>
            <div class="menu_keeper">
                <a class="menu_item" href="index">Home</a>
                <a class="menu_item" href="management">Management</a>
                <a class="menu_item" href="index#publishing">Publishing</a>
                <a class="menu_item" href="graphxcentral">GraphXCentral</a>
                <a class="menu_item" href="index#music">Music</a>
                <a class="menu_item" href="photos">Photos</a>
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
                        <img class="logo_main" src="logo.png" alt="InterFineArt | Explore Fine Art, Galleries, and Creativity Online">
                        <img class="logo_extension" src="logo_extension.png" alt="InterFineArt | Explore Fine Art, Galleries, and Creativity Online">
                    </div>
                    <a onclick="toogle_mobile_menu()" class="menu_mobile_button"><i class="fa fa-remove"></i></a>
                </div>

                <div class="header_mobile_menus">
                    <a class="menu_item_desktop" href="index">Home</a>
                    <a class="menu_item_desktop" href="management" >Management</a>
                    <a class="menu_item_desktop" href="index#publishing">Publishing</a>
                    <a class="menu_item_desktop" href="graphxcentral">GraphXCentral</a>
                    <a class="menu_item_desktop" href="index#music">Music</a>
                    <a class="menu_item_desktop" href="photos">Photos</a>
                </div>
            </div>
        </div>

        <script>
            const mobile_menu = document.getElementById("mobile_menu");

            function toogle_mobile_menu(){
                if(mobile_menu.className == "header_mobile_menu"){
                    mobile_menu.className = "header_mobile_menu header_mobile_menu_show";
                }else mobile_menu.className = "header_mobile_menu";
            }
        </script>

        <div class="header_another">
            <div class="header_another_inside hide_scrollbar">

                <div class="menu_special_container">
                    <a href="podcasts" class="menu_special_item">
                        <span class="material-icons">podcasts</span>
                        <p class="menu_special_text">Podcasts</p>
                    </a>
                </div>

                <div class="menu_special_container">
                    <a href="marketplace"  class="menu_special_item">
                        <span class="material-icons">storefront</span>
                        <p class="menu_special_text">Marketplace</p>
                    </a>
                </div>

                <div class="menu_special_container">
                    <a href="blog" class="menu_special_item">
                        <span class="material-icons">gesture</span>
                        <p class="menu_special_text">Blog</p>
                    </a>
                </div>

                <div class="menu_special_container">
                    <a href="event" class="menu_special_item">
                        <span class="material-icons">event</span>
                        <p class="menu_special_text">Events</p>
                    </a>
                </div>

                <div class="menu_special_container">
                    <a href="art_curators" class="menu_special_item">
                        <span class="material-icons">palette</span>
                        <p class="menu_special_text">Art Curators</p>
                    </a>
                </div>

                <!-- <div class="menu_special_container">
                    <a href="#art_galley" class="menu_special_item">
                        <span class="material-icons">photo_library</span>
                        <p class="menu_special_text">Photos</p>
                    </a>
                </div> -->

                <div class="menu_special_container">
                    <a href="http://jaksoley.org/" class="menu_special_item">
                        <span class="material-icons">foundation</span>
                        <p class="menu_special_text">Foundation</p>
                    </a>
                </div>

                <div class="menu_special_container">
                    <a href="#follow_us" class="menu_special_item">
                        <span class="material-icons">share</span>
                        <p class="menu_special_text">Socials</p>
                    </a>
                </div>

                <div class="menu_special_container">
                    <a href="link" class="menu_special_item">
                        <span class="material-icons">public</span>
                        <p class="menu_special_text">Links</p>
                    </a>
                </div>

                <div class="menu_special_container">
                    <a href="#contact_us" class="menu_special_item">
                        <span class="material-icons">contacts</span>
                        <p class="menu_special_text">Contacts</p>
                    </a>
                </div>

            </div>
        </div>


        