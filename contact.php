<?php
$title = "Arek Property Management | Contact";
require_once "server_files/header.php";
?>


    <section class="service_intro_container" style="background-image: url('assets/services/contact-hero.jpg');">
        <h2 class="service_intro_heading">Stress-Free Calgary Area</h2>
        <h2 class="service_intro_heading">Property Management</h2>
    </section>


    <section class="contact_info_container">
        <div class="contact_info_item">

            <h2>Briere Property Management</h2>

            <p>Owner Property Manager</p>
            <a href="tel:+14037012169"><p>403-701-2169</p></a>
            <a href="mailto:gvirdi@arekpm.com"><p>gvirdi@arekpm.com</p></a>
        </div>
        <div class="contact_info_item">
            <h2>Address</h2>

            <p>8A – 4550 112 Avenue SE</p>
            <p>Calgary, Alberta, </p>
            <p>T2C 2K2</p>
        </div>
    </section>


    <section class="service_maintenance_request">
        <div class="service_maintenance_request_inside">
            <div class="service_maintenance_request_top">
                <div class="smrt_left">
                    <img class="smrt_img" src="assets/services/main-icon.png">
                </div>
                <div class="smrt_right">
                    <h2>Maintenance Request</h2>
                    <a onclick="showMaintenanceBtn()">Submit a maintenance Request</a>
                </div>
            </div>
            <p class="smr_brief">*For maintenance emergencies please call your assigned property manager</p>
        </div>
    </section>



    <?php
require_once "server_files/footer.php";
?>