<?php
$row_affected = false;       // Default Initialisation


if($_SERVER["REQUEST_METHOD"] == "POST"){


   require_once 'server_files/connectserver.php';



    $name = $_POST["name"];
    $email = $_POST["email"];

    $stmt = $conn->prepare("INSERT INTO download_form_table (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if($stmt->execute()){
        $row_affected = true;
    }




}else{
    header("Location: index.php");
}


if($row_affected){
    require_once 'server_files/header.php';

    echo '
        <div class="download_complete_container">
            <img src="assets/undraw_completing_re_i7ap.svg">
        </div>

        <h1 class="download_heading">Your PDF will be downloaded automatically</h1>

        <script>
            window.onload = function() {
                // URL of the PDF file
                var pdfUrl = "assets/pdf/PersonalCV.pdf";

                // Create an anchor element
                var link = document.createElement("a");
                link.href = pdfUrl;

                // Set the download attribute for the PDF
                link.download = "Arek_Property.pdf";

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
}else{
    header("Location: index.php");
}





?>