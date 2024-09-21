<?php


$title = "InterfineArt Admin | Events";
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

			<h2 style="color: #009688" class="all_r_task_header">Events</h2>

			<div class="homepage_mid_container">


				<div class="notification_section">

					<div class="upside_down_cat_form">
						<div class="onchers_common_form_keeper">
							<form class="onchers_common_form" method="post" enctype="multipart/form-data" action="forms/add_new_event.php">
						
								
								<div class="onchers_common_form_header">
									<h2 style="text-align: center;" class="onchers_common_form_heading">Add New</h2>
								</div>
						

                                <div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Date</label>
                                    <input class="onchers_common_form_input" name="data1" type="date" placeholder="" minlength="1" required="">
                                </div>

								<div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Title</label>
                                    <input class="onchers_common_form_input" name="data2" type="text" placeholder="" minlength="1" required="">
                                </div>

                                <div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label">Short Description</label>
                                    <input class="onchers_common_form_input" name="data3" type="text" placeholder="" minlength="1" required="">
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



        <div class="event_keeper">
            <div class="event_keeper_inside">


                <?php
                $x = 1;
                while(isset($homepage["event" . $x])){
                    $x++;
                }
                $x--;

                while($x>0){
                    echo 
                    '<div class="event_item" style="position:relative;">
                        <div class="event_item_inside">
                            <div class="event_item_left">
                                <p class="date_1">'. date("d M", strtotime($homepage["event" . $x]["data1"])) .'</p>
                                <p class="date_2">'. date("Y", strtotime($homepage["event" . $x]["data1"])) .'</p>
                            </div>
                            <div class="event_item_right">
                                <p class="data_3">'. $homepage["event" . $x]["data2"] .'</p>
                                <p class="data_4">'. $homepage["event" . $x]["data3"] .'</p>
                            </div>
                        </div>


                        <form method="post" action="forms/delete_the_event.php">
                            <input type="hidden" name="tagToDelete" value="event'. $x .'">
                            <button onclick="return confirmSubmitWithPopup(this, \'Do you really want to delete the event: '. $homepage["event" . $x]["data2"] .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
                                <span class="material-icons" style="color: #ff0057;">delete_forever</span>
                                <p>Delete</p>
                            </button>
                        </form>
                    </div>';
                    $x--;
                }
            ?>

                
                
        



            </div>
        </div>

	</div>

</div>



<?php require 'admin_server_files/admin_footer.php'; ?>
