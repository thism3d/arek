<?php

$title = "Squid ADZ - Notifications Administration";
include 'admin_server_files/admin_header.php';



?>



<div class="admin_middle_box_conatiner">

	<div class="top_running_side_main_keeper">
		<form class="top_side_running" method="post" action="add_notification">
			<div class="admin_common_form_header">
				<span class="material-icons">notifications</span>
				<p>NEW NOTIFICATION</p>
			</div>

			<div class="admin_common_form_body">

				<textarea placeholder="Enter your notification" name="notification_server" required></textarea>

				<div class="admin_common_form_btn_keeper">
					<button type="submit" class="admin_common_form_btn">ADD NOTIFICATION</button>
				</div>

			</div>
		</form>


	</div>






	<div class="task_all_viewer_container">

		<h2 class="all_r_task_header">All Notifications</h2>

		<div class="homepage_mid_container">


			<div class="notification_section">

                <?php

                $sql = 'SELECT serial, dateadded, notification FROM notifications;';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $dateFormatted = date("dS F, Y", strtotime($row["dateadded"]));
                        echo
                        '<div class="notification_item">
							<div>
								<p class="notification_date">'. $dateFormatted .'</p>
								<p class="notification_inside">'. $row["notification"] .'</p>
							</div>
							<form class="notification_delete_form" action="add_notification_delete" method="post">
								<input type="hidden" name="notification_id" value="'. $row["serial"] .'">
								<button  onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete this notification ?\')" type="submit" class="material-icons">delete_forever</button>
							</form>
						</div>';
                    }
                }
                ?>


				<!-- <div class="notification_item">
					<div>
						<p class="notification_date">10th February, 2022</p>
						<p class="notification_inside">Admin can activate, deactivate running packages and can create new package if needed.</p>
					</div>
					<span class="material-icons">delete_forever</span>
				</div> -->

			</div>



		</div>

	</div>

</div>



<?php require 'admin_server_files/admin_footer.php'; ?>
