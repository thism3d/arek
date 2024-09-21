<?php

$title = "Squid ADZ - Packages Administration";
include 'admin_server_files/admin_header.php';



?>




<div class="admin_middle_box_conatiner">





	<div class="task_all_viewer_container">

			<h2 class="all_r_task_header">Package Purchase Summary</h2>
			<div>
				<table class="styled-table">
				    <thead>
				        <tr>
							<th>Serial</th>
				            <th>Date</th>
							<th>User Full Name</th>
							<th>User Mobile</th>
							<th>Package Details</th>
							<th>Transaction ID</th>
							<th>Order No</th>
							<th>UPI Reference</th>
							<!-- <th>UPI Transaction</th>
							<th>UPI ID</th> -->
							<th>Verified</th>
				            <th>Update</th>
				        </tr>
				    </thead>
				    <tbody>
						<?php

						$counter = 0;
		                $sql = 'SELECT purchased_packages.id AS purchase_pack_id, users.fullname, users.phoneNumber,  purchased_packages.dateadded, user_id, package_id, package_name, amount, daily_ads, transaction_number, order_no, upi_reference_id, upi_transaction_no, upi_id, is_verified FROM purchased_packages LEFT JOIN users ON users.id = purchased_packages.user_id ORDER BY purchased_packages.dateadded DESC;';
		                $result = $conn->query($sql);
		                if ($result->num_rows > 0) {
		                    while($row = $result->fetch_assoc()) {
		                        $dateFormatted = date("dS M, Y", strtotime($row["dateadded"]));
								$counter = $counter + 1;
								echo '
								<tr>
									<td>'. $counter .'</td>
									<td>'. $dateFormatted .'</td>
									<td>'. $row["fullname"] .'</td>
									<td>'. $row["phoneNumber"] .'</td>
									<td>'. $row["package_name"] .' - '. $row["amount"] .'<br>'. $row["daily_ads"] .' ads daily</td>
									<td>'. $row["transaction_number"] .'</td>
									<td>'. $row["order_no"] .'</td>
									<td>'. $row["upi_reference_id"] .'</td>
								<!--<td>'. $row["upi_transaction_no"] .'</td>
									<td>'. $row["upi_id"] .'</td>-->
									<td>'. $row["is_verified"] .'</td>
									<td>';


									if($row["is_verified"] == "Waiting"){
										echo'
											<div class="verify_account_btns_keeper">
												<form method="post" action="add_purchase_package_update">
													<input type="hidden" name="user_id" value="'. $row["user_id"] .'">
													<input type="hidden" name="package_purchase_id" value="'. $row["purchase_pack_id"] .'">
													<input type="hidden" name="package_price" value="'. $row["amount"] .'">
													<input type="hidden" name="package_purchase_status" value="Yes">
													<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to activate the package of '. $row["fullname"] .' ?\')" class="button_decline_acc_vt"><span class="material-icons">done_all</span></button>
												</form>
												<!--
												<form method="post" action="add_purchase_package_update">
													<input type="hidden" name="package_purchase_id" value="'. $row["purchase_pack_id"] .'">
													<input type="hidden" name="package_purchase_status" value="No">
													<button class="button_tick_acc_vt"><span class="material-icons">remove_circle</span></button>
												</form>
												-->

												<form method="post" action="add_purchase_package_delete">
													<input type="hidden" name="package_purchase_id" value="'. $row["purchase_pack_id"] .'">
													<input type="hidden" name="package_purchase_status" value="No">
													<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to decline the package of '. $row["fullname"] .' ?\')" class="button_tick_acc_vt"><span class="material-icons">delete</span></button>
												</form>
											</div>
										';
									}else{
										echo '<span style="color: green;" class="material-icons">verified</span>';
									}



									echo '</td>
								</tr>
								';
		                    }
		                }

		                ?>


				        <!-- and so on... -->
				    </tbody>
				</table>
			</div>





	</div>

</div>





<?php require 'admin_server_files/admin_footer.php'; ?>
