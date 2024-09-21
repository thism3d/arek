<?php


$title = "InterfineArt Admin | Photos";
$extra_heading = '<link rel="stylesheet" href="../library/lightbox.min.css">';    
include 'admin_server_files/admin_header.php';


$sql = 'SELECT * FROM homepage;';
$result = $conn->query($sql);

$homepage = array();
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$homepage[$row["tag"]] = array(
			"data1" => $row["data1"],
			"data2" => $row["data2"],
			"data3" => $row["data3"],
			"data4" => $row["data4"],
			"data5" => $row["data5"],
		);
	}
}
    

?>




<div class="admin_middle_box_conatiner">



	<div class="admin_middle_box_conatiner">







		<div class="task_all_viewer_container">

			<h2 style="color: #009688" class="all_r_task_header">Photos</h2>

			<div class="homepage_mid_container">


				<div class="notification_section">

					<div class="upside_down_cat_form">

                        <form class="onchers_common_form user_blog_upload_blog_option" method="post" enctype="multipart/form-data"  action="forms/add_new_photo.php">
            
                            <div class="onchers_form_item_container userf_form_left">
                                <div class="onchers_form_item_picture">
                                    <img id="student_profile_pic_form" class="onchers_game_data_form_iamge" src="assets/image_not_inputed.jpg">
                                    <input type="file" "image="" png,="" image="" gif,="" jpeg,="" gif"="" name="fileToUpload" id="student_profile_input" onchange="loadFile(event)" style="display: none;" required="">
                                    <label class="image_input_label" for="student_profile_input" style="cursor: pointer;">Upload</label>
                                </div>
                            </div>

                            <div class="userf_form_right">
                                <div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label" style="margin-top: 0;">Photo Text</label>
                                    <input class="onchers_common_form_input" name="data2" type="text" placeholder="When image is clicked, this text will be shown" minlength="1" required>
                                </div>
                                <br>
                                


                                <div class="onchers_form_item_container" style="text-align: right;">
                                    <input class="onchers_common_form_button" type="submit" value="UPLOAD">
                                </div>
                            </div>
                        </form>


					</div>


				</div>



			</div>

		</div>



        
        <div class="important_link_keeper">
            <h2 class="imoportant_link_header">Photos</h2>
        
            <section class="photo_gallery_container">
                <div>
                    <?php 
                        $x = 1;
                        while(isset($homepage["photo_album" . $x])){
                            echo 
                            '<div style="position: relative; display: inline-block;">
                                <a class="example-image-link" href="../assets/photos/'. $homepage["photo_album" . $x]["data1"] .'" data-lightbox="example-set" data-title="'. $homepage["photo_album" . $x]["data2"] .'">
                                    <img class="example-image" src="../assets/photos/'. $homepage["photo_album" . $x]["data1"] .'" alt=""/>
                                </a>


                                <form method="post" action="forms/delete_the_photo.php">
                                    <input type="hidden" name="tagToDelete" value="photo_album'. $x .'">
                                    <button onclick="return confirmSubmitWithPopup(this, \'Do you really want to delete the photo: '. $x .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
                                        <span class="material-icons" style="color: #ff0057;">delete_forever</span>
                                        <p>Delete</p>
                                    </button>
                                </form>
                            </div>';
                            
                            $x++;
                        }
        
                    ?>
                </div>
            </section>
        
        
        </div>







	</div>

</div>


<script src="../library/lightbox-plus-jquery.min.js"></script>
<script src="library/students_new.js"></script>

<?php require 'admin_server_files/admin_footer.php'; ?>
