<?php
$title = "Arek Property Management | Contact";
require_once "server_files/header.php";
?>


<section class="service_intro_container"
    style="background-image: url('assets/services/new-orleans-louisiana-skyline-2023-11-27-05-18-32-utc.jpg');">
    <h2 class="service_intro_heading" style="text-shadow: 2px 3px 4px black;">Book Your Appointment</h2>
    <h2 class="service_intro_heading" style="text-shadow: 2px 3px 4px black;">+1 (403) 701-2169</h2>
</section>


<section class="booking_options_container">
    <div class="download_pdf_box">
        <div class="download_pdf_box_inside">
            <h2 class="download_pdf_heading" style="text-align: center;">Book Appointment Now | Get Custom Offers</h2>
            <form action="booking_complete" method="post">
                <label class="download_pdf_label">Name</label>
                <input name="name" class="download_pdf_input" type="text" required="">
                <label class="download_pdf_label">Email</label>
                <input name="email" class="download_pdf_input" type="email" required="">
                <label class="download_pdf_label">Phone Number</label>
                <input name="phoneNumber" class="download_pdf_input" type="text" required="">
                <label class="download_pdf_label">Booking Time</label>
                <input name="bookingTime" class="download_pdf_input" type="datetime-local" required="">
                <div class="download_btn_keeper" style="text-align: center;">
                    <button type="submit" class="common_btn_home">BOOK NOW <span class="material-icons">keyboard_double_arrow_right</span></button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    window.addEventListener('load', function() {
        window.scrollTo({
            top: 510,
            behavior: 'smooth'
        });
    });
</script>

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