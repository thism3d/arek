<?php


$title = "Gabooye Community | Approved Applications";
include 'admin_server_files/admin_header.php';

?>




<div class="admin_middle_box_conatiner">



	<div class="admin_middle_box_conatiner">







		<div class="task_all_viewer_container">

			<h2 style="color: #009688" class="all_r_task_header">Approved Applications</h2>

			<div class="homepage_mid_container">


				<div class="notification_section">

					<?php

					$sql = 'SELECT id, full_name, birthdate, location, tribe, email, application_id, status FROM applications WHERE status = "Approved" ORDER BY id ASC;';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							// $dateFormatted = date("dS M, Y", strtotime($row["datejoined"]));
							// $billingDateNext = date("dS M, Y", strtotime($row["next_date_of_renewal"]));

							echo '
								<div class="mystd_single_student_container">
									<div class="mystd_single_student_left">
										<!-- <a class="mystd_profile_pic_flag">
											<img class="mystd_student_pic" src="../assets/profile_pic/avatar.svg">
										</a> -->

										<div class="mystd_basic_info">
											<p class="mystd_basic_info_name">'. $row["full_name"] .'</p>
											<p class="mystd_basic_info_bs"><span class="material-icons">event</span> '. $row["birthdate"] .'</p>
											<p class="mystd_basic_info_bs"><span class="material-icons">mail</span> '. $row["email"] .'</p>
											<p></p>
										</div>

										<div class="mystd_status_gender">
											<div class="mystd_status_gender_item"></div>

										</div>


										<div class="mystd_other_info">
											<div class="mystd_other_info_item">
												<span class="material-icons" style="color: #037b9c;">badge</span>
												<p class="mystd_star_count">'. $row["application_id"] .'</p>
												<p class="mystd_star_count_bottom">Application-ID</p>
											</div>
											<div class="mystd_other_info_item">
												<span class="material-icons" style="color: #03A9F4;">location_on</span>
												<p class="mystd_star_count">'. $row["location"] .'</p>
												<p class="mystd_star_count_bottom">Location</p>
											</div>
											<div class="mystd_other_info_item">
												<span class="material-icons" style="color: #FF9800;">dataset</span>
												<p class="mystd_star_count">'. $row["tribe"] .'</p>
												<p class="mystd_star_count_bottom">Tribe</p>
											</div>

										</div>
									</div>

									<div class="mystd_comment_keeper">
										
										<!--
										<form method="post" action="add_member_update">
											<input type="hidden" name="profile_id" value="'. $row["id"] .'">
											<input type="hidden" name="profile_is_activate" value="N">
											<button  onClick="return confirmSubmitWithPopup(this, \'Do you really want to approve the application of '. $row["full_name"] .' ?\')" type="submit" class="all_member_active_rec_btn">
												<span class="material-icons" style="color: #009688;">verified</span>
												<p>Approve</p>
											</button>
										</form>
										-->
										

										<form method="post" action="application_member_delete">
											<input type="hidden" name="profile_id" value="'. $row["id"] .'">
											<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the application of '. $row["full_name"] .' ?\')" type="submit" class="all_member_active_rec_btn">
												<span class="material-icons" style="color: #ff0057;">delete_forever</span>
												<p>Delete</p>
											</button>
										</form>

									</div>
								</div>
							';
						}
					}

					?>







				</div>



			</div>

		</div>

	</div>

</div>






<?php require 'admin_server_files/admin_footer.php'; ?>
