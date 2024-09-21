<?php


$title = "InterfineArt Admin | Links";
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

			<h2 style="color: #009688" class="all_r_task_header">Links</h2>

			<div class="homepage_mid_container">


				<div class="notification_section">

					<div class="upside_down_cat_form">
						<div class="onchers_common_form_keeper">
							<form class="onchers_common_form" method="post" enctype="multipart/form-data" action="forms/add_new_link.php">
						
								
								<div class="onchers_common_form_header">
									<h2 style="text-align: center;" class="onchers_common_form_heading">Add New</h2>
								</div>

								<div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Title</label>
                                    <input class="onchers_common_form_input" name="data1" type="text" placeholder="" minlength="1" required="">
                                </div>

                                <div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Url</label>
                                    <input class="onchers_common_form_input" name="data2" type="url" placeholder="" minlength="1" required="">
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




            <div class="important_link_item_keeper">

                <?php
                    $x = 1;
                    while(isset($homepage["link" . $x])){
                        echo 
                        '<a style="position: relative;" class="important_link_item" target="_blank" href="'. $homepage["link" . $x]["data2"] .'">
                            <p class="important_link_heading">'. $homepage["link" . $x]["data1"] .'</p>
                            <p class="important_linkitem">'. $homepage["link" . $x]["data2"] .'</p>



                            <form method="post" action="forms/delete_the_link.php">
                                <input type="hidden" name="tagToDelete" value="link'. $x .'">
                                <button style="top: 2px;" onclick="return confirmSubmitWithPopup(this, \'Do you really want to delete the link '. $homepage["link" . $x]["data2"] .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
                                    <span class="material-icons" style="color: #ff0057;">delete_forever</span>
                                    <p>Delete</p>
                                </button>
                            </form>
                        </a>';
                        $x++;
                    }
                ?>

                
                



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
