<?php
$row_affected = false;       // Default Initialisation
$row_affected = true;        // Hack

if($_SERVER["REQUEST_METHOD"] == "POST"){


   require_once 'server_files/connectserver.php';



    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $bookingTime = $_POST["bookingTime"];
    $bookingTimeFormatted = date("jS F, Y H:i:s", strtotime($bookingTime));

    $stmt = $conn->prepare("INSERT INTO booked_appointment (name, email, phoneNumber, bookingTime) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phoneNumber, $bookingTime);

    if($stmt->execute()){
        $row_affected = true;

       
        
            
        $mail_address = $email;
        $mail_subject = 'Booked Appointment | Arek Property Management';
        
        $mail_html_body = 
        '<h3>Your Appointment has been booked successfully</h3>
        <br>
        <h3>Call us at <a href="tel:+14037012169">+1 (403) 701-2169</a> for more details.</h3>
        <br>
        <p><strong>Your booking details are as follows:</strong></p>
        <p>Name: '. $name .'</p>
        <p>Email: '. $email.'</p>
        <p>Phone Number: '. $phoneNumber.'</p>
        <p>Booking Time: '. $bookingTimeFormatted.'</p>
        <br>
        <p>Thank you for booking with us.</p>'; 
        
        $mail_paintext_body = "Thank you for booking with us. We have received your booking details and will get back to you shortly.";
        require_once 'mail.php';
    }




}
// else{
//     header("Location: index.php");
// }


if($row_affected){
    $title = "Arek Property Management | Booking Completed";
    require_once 'server_files/header.php';

    echo '
        <div class="download_complete_container">
            <img style="border-radius: 10px;" src="assets/appointment_booked.jpg">
        </div>
        <p class="booking_complete_text"><strong>Call us at <a href="tel:+14037012169">+1 (403) 701-2169</a> for more details.</strong></p>
        <div style="text-align: center;">
            <a class="common_btn_home" href="https://arekpm.com/assets/pdf/Proposal.pdf" download="Property Management Proposal - Landlord.pdf">Download Our Brochure</a>
        </div>
        <br>
        <h1 class="download_heading">Booking Completed.</h1>
        

        <script>
            window.onload = function() {
                // URL of the PDF file
                var pdfUrl = "assets/pdf/Proposal.pdf";

                // Create an anchor element
                var link = document.createElement("a");
                link.href = pdfUrl;

                // Set the download attribute for the PDF
                link.download = "Property Management Proposal - Landlord.pdf";

                // Append the link to the body (this step is optional)
                document.body.appendChild(link);

                // Trigger a click on the link to start the download
                link.click();

                // Remove the link after downloading
                document.body.removeChild(link);
            }
        </script>
    ';

    require_once 'server_files/footer.php';
}
// else{
//     header("Location: index.php");
// }


?>