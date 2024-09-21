<?php

$title = "Squid ADZ - Pay For Ads";
include 'admin_server_files/admin_header.php';



?>




<div class="admin_middle_box_conatiner">





	<div class="task_all_viewer_container">

			<h2 class="all_r_task_header">Pay For Ads Work</h2>
			<div>
				<table class="styled-table">
				    <thead>
				        <tr>
							<th>Serial</th>
							<th>User Full Name</th>
							<th>User Mobile</th>
							<th>Package Details</th>
							<th>Package Total Task</th>
							<th>Task Completed Today</th>
				        </tr>
				    </thead>
				    <tbody>
						<?php


						$ads_view_total_counts = array();
						$sql = 'SELECT COUNT(ads_id) AS total_viewed_today, viewed_by FROM ads_view GROUP BY viewed_by;';
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								$ads_view_total_counts[$row["viewed_by"]] = intval($row["total_viewed_today"]);
							}
						}


						$counter = 0;
		                $sql = 'SELECT purchased_packages.id AS purchase_pack_id, users.fullname, users.phoneNumber,  purchased_packages.dateadded, user_id, package_id, package_name, amount, daily_ads, transaction_number, order_no, upi_reference_id, upi_transaction_no, upi_id, is_verified FROM purchased_packages LEFT JOIN users ON users.id = purchased_packages.user_id WHERE is_verified = "Yes" ORDER BY purchased_packages.dateadded DESC;';
		                $result = $conn->query($sql);
		                if ($result->num_rows > 0) {
		                    while($row = $result->fetch_assoc()) {
								$counter = $counter + 1;
								echo '
								<tr>
									<td>'. $counter .'</td>
									<td>'. $row["fullname"] .'</td>
									<td>'. $row["phoneNumber"] .'</td>
									<td>'. $row["package_name"] .'</td>
									<td>'. $row["daily_ads"] .'</td>
									<td>';

									$total_task_completed = 0;
									if(isset($ads_view_total_counts[$row["user_id"]])){
										$total_task_completed = $ads_view_total_counts[$row["user_id"]];

										if($total_task_completed > intval($row["daily_ads"])){
											$total_task_completed = intval($row["daily_ads"]);
										}
									}

									echo $total_task_completed;
									
									echo
									'</td>
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
