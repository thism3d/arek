<?php

$title = "Squid ADZ - Members Administration";
include 'admin_server_files/admin_header.php';



?>





<div class="admin_middle_box_conatiner">







	<div class="task_all_viewer_container">

		<h2 class="all_r_task_header">Member Management</h2>

		<div class="homepage_mid_container">


			<div class="notification_section">





                <?php
				$myRefers = array();
				$sql = 'SELECT COUNT(referred_by) total, referred_by FROM users WHERE referred_by IS NOT NULL GROUP BY referred_by';
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$myRefers[$row["referred_by"]] = $row["total"];
					}
				}



				$myPackages = array();
				$sql = 'SELECT SUM(amount) AS total_package_price, user_id FROM purchased_packages  WHERE is_verified = "Yes" GROUP BY user_id';
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$myPackages[$row["user_id"]] = $row["total_package_price"];
					}
				}

				// print_r($myPackages);

                $sql = 'SELECT datecreated, id, fullname, username, email, phoneNumber, password, image, approved FROM users ORDER BY datecreated DESC';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $dateFormatted = date("dS M, Y", strtotime($row["datecreated"]));
                        $image = $row["image"];
                        $image = trim($image) != "" ? "../uploads/" . $image : "../assets/profile_pic/avatar.svg";
                        echo '
                        <div class="mystd_single_student_container">
        					<div class="mystd_single_student_left">
        						<a class="mystd_profile_pic_flag">
        							<img class="mystd_student_pic" src="'. $image  .'">
        						</a>

        						<div class="mystd_basic_info">
        							<p class="mystd_basic_info_name">'. $row["fullname"] .'</p>
        							<p class="mystd_basic_info_bs"><span class="material-icons">event</span> '. $dateFormatted .'</p>
        							<p class="mystd_basic_info_bs"><span class="material-icons">phone_iphone</span> '. $row["phoneNumber"] .'</p>

        							<!-- <p class="mystd_basic_info_bs"><span class="material-icons">account_circle</span> '. $row["username"] .'</p> -->
        							<p></p>
        						</div>

        						<div class="mystd_status_gender">
        							<div class="mystd_status_gender_item">'.
									(isset($myPackages[$row["id"]]) ?
									'<span class="material-icons" style="color: #4caf50;">verified_user</span>
									<p class="mystd_star_count">Package Purchased</p>' : '' )
        							.'</div>

        						</div>


        						<div class="mystd_other_info">
        							<div class="mystd_other_info_item">
        								<span class="material-icons" style="color: #607d8b;">group</span>
        								<p class="mystd_star_count">'. ( isset($myRefers[$row["id"]]) ? $myRefers[$row["id"]] : "0") .'</p>
        								<p class="mystd_star_count_bottom">Referral</p>
        							</div>
        							<div class="mystd_other_info_item">'.

									(isset($myPackages[$row["id"]]) ?
									'<span class="material-icons" style="color: #e91e63;">attach_money</span>
    								<p class="mystd_star_count">'. $myPackages[$row["id"]] .'</p>
    								<p class="mystd_star_count_bottom">Package</p>': '' )

								  .'</div>

        						</div>
        					</div>

        					<div class="mystd_comment_keeper">
                                <form method="post" action="add_member_update">
                                    <input type="hidden" name="profile_id" value="'. $row["id"] .'">
                                    ';

                                    if($row["approved"] == "Y"){
                                        echo
                                        '<input type="hidden" name="profile_is_activate" value="N">
                                        <button  onClick="return confirmSubmitWithPopup(this, \'Do you really want to block the id of '. $row["fullname"] .' ?\')" type="submit" class="all_member_active_rec_btn">
                                            <span class="material-icons" style="color: #ff0057;">block</span>
                                            <p>Block</p>
                                        </button>
                                        ';
                                    }else{
                                        echo
                                        '<input type="hidden" name="profile_is_activate" value="Y">
                                        <button onClick="return confirmSubmitWithPopup(this, \'Do you really want to re-activate the id of '. $row["fullname"] .' ?\')" class="all_member_active_rec_btn">
                							<span class="material-icons" style="color: #009688;">published_with_changes</span>
                							<p>Re-activate</p>
                						</button>
                                        ';
                                    }
                                		echo '


                                </form>

								<form method="post" action="add_member_delete">
									<input type="hidden" name="member_to_delete" value="'. $row["id"] .'">
									<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the member '. $row["fullname"] .' ?\')" type="submit" class="all_member_active_rec_btn">
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






                <!--
				<div class="mystd_single_student_container">
					<div class="mystd_single_student_left">
						<a href="students_profile.html" class="mystd_profile_pic_flag">
							<img class="mystd_student_pic" src="../assets/profile_pic/sample_profile.jpg">
						</a>

						<div class="mystd_basic_info">
							<p class="mystd_basic_info_name">Marlin Ostroy</p>
							<p class="mystd_basic_info_bs"><span class="material-icons">event</span> 22 Jan, 2022</p>
							<p class="mystd_basic_info_bs"><span class="material-icons">email</span> joe@orlando.com</p>

							<p class="mystd_basic_info_bs"><span class="material-icons">account_circle</span> jorlando</p>
							<p></p>
						</div>

						<div class="mystd_status_gender">
							<div class="mystd_status_gender_item">
								<span class="material-icons" style="color: gray;">verified_user</span>
								<p class="mystd_star_count">Package Purchased</p>
							</div>

						</div>


						<div class="mystd_other_info">
							<div class="mystd_other_info_item">
								<span class="material-icons" style="color: #607d8b;">group</span>
								<p class="mystd_star_count">0</p>
								<p class="mystd_star_count_bottom">Referral</p>
							</div>
							<div class="mystd_other_info_item">
								<span class="material-icons" style="color: #e91e63;">attach_money</span>
								<p class="mystd_star_count">35000</p>
								<p class="mystd_star_count_bottom">Package</p>
							</div>

						</div>
					</div>

					<div class="mystd_comment_keeper">

						<button class="all_member_active_rec_btn">
							<span class="material-icons" style="color: #009688;">published_with_changes</span>
							<p>Re-activate</p>
						</button>


					</div>
				</div>





				<div class="mystd_single_student_container">
					<div class="mystd_single_student_left">
						<a href="students_profile.html" class="mystd_profile_pic_flag">
							<img class="mystd_student_pic" src="../assets/profile_pic/sample_profile.jpg">
						</a>

						<div class="mystd_basic_info">
							<p class="mystd_basic_info_name">Johnny Orlando</p>
							<p class="mystd_basic_info_bs"><span class="material-icons">event</span> 22 Jan, 2022</p>
							<p class="mystd_basic_info_bs"><span class="material-icons">email</span> joe@orlando.com</p>

							<p class="mystd_basic_info_bs"><span class="material-icons">account_circle</span> jorlando</p>
							<p></p>
						</div>

						<div class="mystd_status_gender">
							<div class="mystd_status_gender_item">
								<span class="material-icons" style="color: #4caf50;">verified_user</span>
								<p class="mystd_star_count">Package Purchased</p>
							</div>

						</div>


						<div class="mystd_other_info">
							<div class="mystd_other_info_item">
								<span class="material-icons" style="color: #607d8b;">group</span>
								<p class="mystd_star_count">12</p>
								<p class="mystd_star_count_bottom">Referral</p>
							</div>
							<div class="mystd_other_info_item">
								<span class="material-icons" style="color: #e91e63;">attach_money</span>
								<p class="mystd_star_count">1200</p>
								<p class="mystd_star_count_bottom">Package</p>
							</div>

						</div>
					</div>

					<div class="mystd_comment_keeper">
						<button class="all_member_active_rec_btn">
							<span class="material-icons" style="color: #ff0057;">block</span>
							<p>Block</p>
						</button>

						<button class="all_member_active_rec_btn">
							<span class="material-icons" style="color: #009688;">published_with_changes</span>
							<p>Re-activate</p>
						</button>


					</div>
				</div>





				<div class="mystd_single_student_container">
					<div class="mystd_single_student_left">
						<a href="students_profile.html" class="mystd_profile_pic_flag">
							<img class="mystd_student_pic" src="../assets/profile_pic/sample_profile.jpg">
						</a>

						<div class="mystd_basic_info">
							<p class="mystd_basic_info_name">Johnny Orlando</p>
							<p class="mystd_basic_info_bs"><span class="material-icons">event</span> 22 Jan, 2022</p>
							<p class="mystd_basic_info_bs"><span class="material-icons">email</span> joe@orlando.com</p>

							<p class="mystd_basic_info_bs"><span class="material-icons">account_circle</span> jorlando</p>
							<p></p>
						</div>

						<div class="mystd_status_gender">
							<div class="mystd_status_gender_item">
								<span class="material-icons" style="color: #4caf50;">verified_user</span>
								<p class="mystd_star_count">Package Purchased</p>
							</div>

						</div>


						<div class="mystd_other_info">
							<div class="mystd_other_info_item">
								<span class="material-icons" style="color: #607d8b;">group</span>
								<p class="mystd_star_count">12</p>
								<p class="mystd_star_count_bottom">Referral</p>
							</div>
							<div class="mystd_other_info_item">
								<span class="material-icons" style="color: #e91e63;">attach_money</span>
								<p class="mystd_star_count">1200</p>
								<p class="mystd_star_count_bottom">Package</p>
							</div>

						</div>
					</div>

					<div class="mystd_comment_keeper">
						<button class="all_member_active_rec_btn">
							<span class="material-icons" style="color: #ff0057;">block</span>
							<p>Block</p>
						</button>

						<button class="all_member_active_rec_btn">
							<span class="material-icons" style="color: #009688;">published_with_changes</span>
							<p>Re-activate</p>
						</button>


					</div>
				</div>

                -->







			</div>



		</div>

	</div>

</div>





<?php require 'admin_server_files/admin_footer.php'; ?>
