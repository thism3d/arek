<?php

$title = "Squid ADZ - Packages Edit";
include 'admin_server_files/admin_header.php';

$package_to_edit = "";
$myPackageFound = false;
$myPackageId = $myPackageName = $myPackagePrice = $myPackageAds = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$package_to_edit = intval(stringPostReturn("package_edit_id"));
	// sysout($package_to_edit);

	$sql = 'SELECT dateadded, id, name, amount, daily_ads, is_activated FROM all_packages WHERE is_activated = "Y" AND id = '. $package_to_edit .';';
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
		$myPackageFound = true;
		while($row = $result->fetch_assoc()) {
			$myPackageId = $row["id"];
			$myPackageName = $row["name"];
			$myPackagePrice = $row["amount"];
			$myPackageAds = $row["daily_ads"];
		}
	}

}

if(!$myPackageFound){
	header('Location: packages');
}

?>




<div class="admin_middle_box_conatiner">






			<form class="top_side_running" action="add_package_update_data" method="post">
				<div class="admin_common_form_header">
					<span class="material-icons">inventory_2</span>
					<p>UPDATE PACKAGE</p>
				</div>

				<div class="admin_common_form_body">

					<input class="admin_common_form_input" type="hidden" placeholder="Package Name" name="package_id" value="<?php echo $myPackageId; ?>" required>

					<div class="admin_common_form_input_keeper">
						<input class="admin_common_form_input" type="text" placeholder="Package Name" name="package_name" value="<?php echo $myPackageName; ?>" required>
						<span class="material-icons">dns</span>
					</div>

					<div class="admin_common_form_input_keeper">
						<input class="admin_common_form_input" type="number" min="1" step="1" placeholder="Package Price" value="<?php echo $myPackagePrice; ?>" name="package_price" required>
						<span class="material-icons">price_change</span>
					</div>

					<div class="admin_common_form_input_keeper">
						<input class="admin_common_form_input" type="number" min="1" step="1" placeholder="Daily Ads" value="<?php echo $myPackageAds; ?>" name="daily_ads" required>
						<span class="material-icons">video_library</span>
					</div>

					<div class="admin_common_form_btn_keeper">
						<button type="submit" class="admin_common_form_btn">UPDATE PACKAGE</button>
					</div>

				</div>
			</form>


</div>





<?php require 'admin_server_files/admin_footer.php'; ?>
