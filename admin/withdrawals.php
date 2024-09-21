<?php

$title = "Squid ADZ - Withdrawals";
include 'admin_server_files/admin_header.php';



?>



<div class="admin_middle_box_conatiner">

	<h2 class="all_requested_withdraw_heading">All Requested Withdrawals</h2>


	<?php

		$sql = 'SELECT accounts.transaction_time, accounts.id AS tr_id, debit_amount, withdrawal_status, bank_name, bank_branch, bank_account_no, bank_accountholder_name, ifsc_code, fullname, image, phoneNumber FROM accounts LEFT JOIN payment_details ON accounts.user_id = payment_details.user_id LEFT JOIN users ON users.id = accounts.user_id WHERE debit_section ="Withdrawal" ORDER BY accounts.transaction_time DESC;';
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$image = $row["image"];
				$image = trim($image) != "" ? "../uploads/" . $image : "../assets/profile_pic/avatar.svg";

				echo '
				<div class="withdraw_accept_single_item">
					<div class="left_side_withdrawal_accept">
						<div class="withdraw_accept_image">
							<img src="'. $image .'">
						</div>
						<div class="left_side_w_a_basic_info">
							<p class="wa_full_name">'. $row["fullname"] .'</p>
							<p><span class="material-icons">phone_iphone</span> '. $row["phoneNumber"] .'</p>

						</div>
					</div>
					<div class="middle_side_withdrawal_accept">
						<p>Amount: '. $row["debit_amount"] .'</p>
						<p>Bank: '. $row["bank_name"] .'</p>
						<p>Account Name: '. $row["bank_accountholder_name"] .'</p>
						<p>Account No: '. $row["bank_account_no"] .'</p>
						<p>Branch: '. $row["bank_branch"] .'</p>
						<p>IFSC Code: '. $row["ifsc_code"] .'</p>
					</div>
					<div>';
					if($row["withdrawal_status"] == "Requested"){
						echo '
						<form method="post" action="add_withdrawal_accept">
							<input type="hidden" name="tr_id" value="'. $row["tr_id"] .'">
							<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to accept the withdrawal of '. $row["fullname"] .' ? - Amount: '. $row["debit_amount"] .'\')" type="submit" class="accept_wtihdraw_button"><span class="material-icons">check</span> Accept Withdraw</button>
						</form>
						<form method="post" action="add_withdrawal_delete">
							<input type="hidden" name="tr_id" value="'. $row["tr_id"] .'">
							<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to decline the withdrawal of '. $row["fullname"] .' ? - Amount: '. $row["debit_amount"] .'\')" type="submit" class="decline_wtihdraw_button"><span class="material-icons">clear</span> Decline Withdraw</button>
						</form>
						';
					}else if($row["withdrawal_status"] == "Accepted"){
						echo '
						<div class="accepted_withdawal_field">
							<span class="material-icons">verified</span>
							<p>Withdrawal Accepted</p>
						</div>
						';
					}

				echo
					'</div>
				</div>
				';
			}
		}
	?>

<!--
	<div class="withdraw_accept_single_item">
		<div class="left_side_withdrawal_accept">
			<div class="withdraw_accept_image">
				<img src="../assets/profile_pic/sample_profile.jpg">
			</div>
			<div class="left_side_w_a_basic_info">
				<p class="wa_full_name">Yousuf Ali Johnny</p>
				<p><span class="material-icons">email</span> yousufali21@gmail.com</p>
				<p><span class="material-icons">account_circle</span> u2823</p>
			</div>
		</div>
		<div class="middle_side_withdrawal_accept">
			<p>Amount: 9775</p>
			<p>Wallet Type: Bank</p>
			<p>Bank: Sonali Bank</p>
			<p>Account Name: Yousuf Ali Johnny</p>
			<p>Account No: 1928312638</p>
			<p>Branch: Rangpur</p>
		</div>
		<div>
			<button class="accept_wtihdraw_button"><span class="material-icons">check</span> Accept Withdraw</button>
			<button class="decline_wtihdraw_button"><span class="material-icons">clear</span> Decline Withdraw</button>
			<div class="accepted_withdawal_field">
				<span class="material-icons">verified</span>
				<p>Withdrawal Accepted</p>
			</div>
		</div>
	</div>

	<div class="withdraw_accept_single_item">
		<div class="left_side_withdrawal_accept">
			<div class="withdraw_accept_image">
				<img src="../assets/profile_pic/sample_profile.jpg">
			</div>
			<div class="left_side_w_a_basic_info">
				<p class="wa_full_name">Yousuf Ali Johnny</p>
				<p><span class="material-icons">email</span> yousufali21@gmail.com</p>
				<p><span class="material-icons">account_circle</span> u2823</p>
			</div>
		</div>
		<div class="middle_side_withdrawal_accept">
			<p>Amount: 120</p>
			<p>Wallet Type: Patym</p>
			<p>Paythm No: +91 11 4166 7671</p>
		</div>
		<div>
			<button class="accept_wtihdraw_button"><span class="material-icons">check</span> Accept Withdraw</button>
		</div>
	</div>

-->
</div>




<?php require 'admin_server_files/admin_footer.php'; ?>
