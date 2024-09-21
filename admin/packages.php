<?php

$title = "Squid ADZ - Packages Administration";
include 'admin_server_files/admin_header.php';


include '../server_files/maintainance_status.php';




?>




<div class="admin_middle_box_conatiner">

	<div class="top_running_side_main_keeper">
		<form class="top_side_running" action="add_package" method="post">
			<div class="admin_common_form_header">
				<span class="material-icons">inventory_2</span>
				<p>NEW PACKAGE</p>
			</div>

			<div class="admin_common_form_body">

				<div class="admin_common_form_input_keeper">
					<input class="admin_common_form_input" type="text" placeholder="Package Name" name="package_name" required>
					<span class="material-icons">dns</span>
				</div>

				<div class="admin_common_form_input_keeper">
					<input class="admin_common_form_input" type="number" min="1" step="1" placeholder="Package Price" name="package_price" required>
					<span class="material-icons">price_change</span>
				</div>

				<div class="admin_common_form_input_keeper">
					<input class="admin_common_form_input" type="number" min="1" step="1" placeholder="Daily Ads" name="daily_ads" required>
					<span class="material-icons">video_library</span>
				</div>

				<div class="admin_common_form_btn_keeper">
					<button type="submit" class="admin_common_form_btn">CREATE PACKAGE</button>
				</div>

			</div>
		</form>

		<div class="package_others_maintain">

			<a class="package_each_box_anchor" href="package_summary">
				<p class="package_eba_icon">
					<span class="material-icons">widgets</span>
					<?php echo $package_waiting_counter != 0 ? '<span class="package_notifiation_admin_span package_eba_nf_t">'. $package_waiting_counter .'</span>' : '' ?>
				</p>
				<p class="package_eba_text">Package Summary</p>
			</a>




			<a class="package_each_box_anchor" style="background-color: <?php echo $maintainance_break ? '#e91e63' : '#4caf50'; ?>;" href="add_togggle_maintainance_break">
				<p class="package_eba_icon">
					<span class="material-icons">dns</span>
				</p>
				<p class="package_eba_text">Maintaince <?php echo $maintainance_break ? 'On' : 'Off'; ?></p>
			</a>


			<a class="package_each_box_anchor" href="pay_for_ads">
				<p class="package_eba_icon">
					<span class="material-icons">ads_click</span>
				</p>
				<p class="package_eba_text">Pay For Ads</p>
			</a>


			<a class="package_each_box_anchor" href="upi_pay_edit">
				<p class="package_eba_icon">
					<span class="material-icons">account_balance</span>
				</p>
				<p class="package_eba_text">Update UPI Params</p>
			</a>



		</div>


	</div>






	<div class="task_all_viewer_container">

			<h2 class="all_r_task_header">All Running Packages</h2>
			<div class="my_package_items_container">

                <?php

                $sql = 'SELECT dateadded, id, name, amount, daily_ads, is_activated FROM all_packages;';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $dateFormatted = date("dS M, Y", strtotime($row["dateadded"]));

                        echo
                        '
                        <div class="my_package_item_keeper">
        					<div class="my_package_item">
        						<div class="my_package_name my_package_admin_view">
        							<div>
										<p class="my_package_name_number"><span>'. $row["id"] .'</span> '. $row["name"] .' Package </p>
										<p class="my_pkg_date">Added on '. $dateFormatted .'</p>
									</div>
									<form method="post" action="package_edit_section">
										<input type="hidden" name="package_edit_id" value="'. $row["id"] .'">
										<button type="submit" class="edit_package_button"><span class="material-icons">mode_edit</span>Edit</button>
									</form>
        						</div>
        						<div class="my_package_divider">
        							<div class="my_package_d_item">
        								<p class="my_package_price">&#8377; '. $row["amount"] .'</p>
        								<p class="my_package_price_text"></p>
        							</div>
        							<div class="my_package_d_item">
        								<p class="my_package_price">'. $row["daily_ads"] .'</p>
        								<p class="my_package_price_text">Daily Ads</p>
        							</div>
                                </div>
                                <form action="add_package_update" method="post" action="add_package_update">
                                <input type="hidden" name="package_id" value="'. $row["id"] .'" required>
                                ';

                                if($row["is_activated"] == "Y"){
                                    echo '
                                    <input type="hidden" value="N" name="package_status" required>
                                    <button onClick="return confirmSubmitWithPopup(this, \'Do you really want to deactive the '. $row["name"] .' package ?\')" type="submit" class="my_package_purchase_btn">Deactivate <span class="material-icons">cancel</span></button>';
                                }else{
                                    echo '
                                    <input type="hidden" value="Y" name="package_status" required>
                                    <button onClick="return confirmSubmitWithPopup(this, \'Do you really want to re-activate the '. $row["name"] .' package ?\')" type="submit" class="my_package_purchase_btn my_package_purchase_deactivated">Activate <span class="material-icons">check_circle</span></button>';
                                }

        					echo
                                '</form>
                            </div>
        				</div>
                        ';
                    }
                }

                ?>
<!--
				<div class="my_package_item_keeper">
					<div class="my_package_item">
						<div class="my_package_name">
							<p class="my_package_name_number"><span>1</span> XYZ Package </p>
							<p class="my_pkg_date">Added on 12th Jan, 2021</p>
						</div>
						<div class="my_package_divider">
							<div class="my_package_d_item">
								<p class="my_package_price">&#8377; 2500</p>
								<p class="my_package_price_text"></p>
							</div>
							<div class="my_package_d_item">
								<p class="my_package_price">12</p>
								<p class="my_package_price_text">Daily Ads</p>
							</div>
						</div>
						<button class="my_package_purchase_btn my_package_purchase_deactivated">Activate <span class="material-icons">check_circle</span></button>
					</div>
				</div>

				<div class="my_package_item_keeper">
					<div class="my_package_item">
						<div class="my_package_name">
							<p class="my_package_name_number"><span>2</span> Silver Package </p>
							<p class="my_pkg_date">Added on 12th Jan, 2021</p>
						</div>
						<div class="my_package_divider">
							<div class="my_package_d_item">
								<p class="my_package_price">&#8377; 12300</p>
								<p class="my_package_price_text"></p>
							</div>
							<div class="my_package_d_item">
								<p class="my_package_price">30</p>
								<p class="my_package_price_text">Daily Ads</p>
							</div>
						</div>
						<button class="my_package_purchase_btn">Deactivate <span class="material-icons">cancel</span></button>
					</div>
				</div>

				<div class="my_package_item_keeper">
					<div class="my_package_item">
						<div class="my_package_name">
							<p class="my_package_name_number"><span>3</span> Diamond Package </p>
							<p class="my_pkg_date">Added on 12th Jan, 2021</p>
						</div>
						<div class="my_package_divider">
							<div class="my_package_d_item">
								<p class="my_package_price">&#8377; 23000</p>
								<p class="my_package_price_text"></p>
							</div>
							<div class="my_package_d_item">
								<p class="my_package_price">125</p>
								<p class="my_package_price_text">Daily Ads</p>
							</div>
						</div>
						<button class="my_package_purchase_btn">Deactivate <span class="material-icons">cancel</span></button>
					</div>
				</div> -->


			</div>

	</div>

</div>





<?php require 'admin_server_files/admin_footer.php'; ?>
