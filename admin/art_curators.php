<?php


$title = "InterfineArt Admin | Art Curators";
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

			<h2 style="color: #009688" class="all_r_task_header">Art Curators</h2>

			<div class="homepage_mid_container">


				<div class="notification_section">

					<div class="upside_down_cat_form">
						<div class="onchers_common_form_keeper">
							<form class="onchers_common_form" method="post" enctype="multipart/form-data" action="forms/add_new_art_curator.php">
						
								
								<div class="onchers_common_form_header">
									<h2 style="text-align: center;" class="onchers_common_form_heading">Add New</h2>
								</div>


								<div class="onchers_form_item_container onchers_picture_center_keeper">
									<div class="onchers_form_item_picture">
										<img id="student_profile_pic_form" class="onchers_game_data_form_iamge" src="assets/image_not_inputed.jpg">
										<input type="file" "image="" png,="" image="" gif,="" jpeg,="" gif"="" name="fileToUpload" id="student_profile_input" onchange="loadFile(event)" style="display: none;" required="">
										<label class="image_input_label" for="student_profile_input" style="cursor: pointer;">Upload</label>
									</div>
								</div>

						
								<br>
								<div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Artist Name</label>
                                    <input class="onchers_common_form_input" name="data2" type="text" placeholder="" minlength="1" required="">
                                </div>

                                <div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Artist Brief</label>
                                    <input class="onchers_common_form_input" name="data3" type="text" placeholder="" minlength="1" required="">
                                </div>

                                <div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Email</label>
                                    <input class="onchers_common_form_input" name="data4" type="email" placeholder="Artist Email Address" minlength="1" required="">
                                </div>

                                <div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Phone</label>
                                    <input class="onchers_common_form_input" name="data5" type="text" placeholder="Add Area Code and Numbers without any space" minlength="1" required="">
                                </div>

						
								<div class="onchers_form_item_container">
									<input class="onchers_common_form_button" type="submit" value="ADD">
								</div>
						
						
							</form>
						</div>


					</div>


				</div>



			</div>

		</div>




        <div class="art_curator_container">
            <div class="art_curator_container_inaise">

                <?php
                    $x = 1;
                    while(isset($homepage["art_curator" . $x])){
                        echo 
                        '<div class="art_curator_item" style="position: relative;">
                            <div class="art_curator_item_inside">
                                <div class="art_curator_upper_keeper">
                                    <div>
                                        <img class="art_curator_img" src="../assets/artists/'. $homepage["art_curator" . $x]["data1"] .'">
                                    </div>
                                    <p class="art_curator_name">'. $homepage["art_curator" . $x]["data2"] .'</p>
                                    <p class="art_curator_bio">Bio: '. substr($homepage["art_curator" . $x]["data3"], 0, 200) .'</p>
                                </div>
                                <div class="art_curator_button_keeper">
                                    <a class="art_curtor_btn" href="mailto:'. $homepage["art_curator" . $x]["data4"] .'">Email</a>
                                    <a class="art_curtor_btn" href="tel:'. $homepage["art_curator" . $x]["data5"] .'">Contact</a>
                                </div>
                                
                            </div>

                            <form method="post" action="forms/delete_the_art_curator.php">
                                <input type="hidden" name="tagToDelete" value="art_curator'. $x .'">
                                <button onclick="return confirmSubmitWithPopup(this, \'Do you really want to delete the art curator : '. $homepage["art_curator" . $x]["data2"] .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
                                    <span class="material-icons" style="color: #ff0057;">delete_forever</span>
                                    <p>Delete</p>
                                </button>
                            </form>
                        </div>';
                        $x++;
                    }
                ?>
                
                
        



            </div>
        </div>

	</div>

</div>



<script>


var loadFile = function(event) {
	var image = document.getElementById('student_profile_pic_form');
	image.src = URL.createObjectURL(event.target.files[0]);
};

</script>



<?php require 'admin_server_files/admin_footer.php'; ?>
