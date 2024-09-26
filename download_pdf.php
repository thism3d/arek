<?php
$row_affected = false;       // Default Initialisation
$row_affected = true;        // Hack

if($_SERVER["REQUEST_METHOD"] == "POST"){


   require_once 'server_files/connectserver.php';



    $name = $_POST["name"];
    $email = $_POST["email"];

    $stmt = $conn->prepare("INSERT INTO download_form_table (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if($stmt->execute()){
        $row_affected = true;

       
        
            
        $mail_address = $email;
        $mail_subject = 'Information Package Downloaded from Arek Property Manangement';
        
        $mail_html_body = 
        '<h3>Thank You for Downloading</h3>
        <br>
        <p><strong>Downloader Information</strong></p>
        <p>Name: '. $name .'</p>
        <p>Email: '. $email.'</p>';
        
        $mail_paintext_body = "Thank you for downloading the information package from Arek Property Management";
        require_once 'mail.php';
    }




}
// else{
//     header("Location: index.php");
// }


if($row_affected){
    $title = "Arek Property Management | Download Brochure";
    require_once 'server_files/header.php';

    echo '
        <div class="download_complete_container">
            <img src="assets/downloaded.png">
        </div>

        <h1 class="download_heading">Your PDF will be downloaded automatically</h1>

        <script>
            window.onload = function() {
                // URL of the PDF file
                var pdfUrl = "assets/pdf/Proposal.pdf";

                // Create an anchor element
                var link = document.createElement("a");
                link.href = pdfUrl;

                // Set the download attribute for the PDF
                link.download = "Property Managaement Proposal - Landlord.pdf";

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