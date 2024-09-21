<?php

$title = "Squid ADZ - Packages Edit";
include 'admin_server_files/admin_header.php';

require '../server_files/upi_paramaters.php';


?>




<div class="admin_middle_box_conatiner">






			<form class="top_side_running" action="add_updat_upi_payment" method="post">
				<div class="admin_common_form_header">
					<span class="material-icons">account_balance</span>
					<p>UPI PAYMENT</p>
				</div>

				<div class="admin_common_form_body">



					<div class="admin_common_form_input_keeper">
						<input class="admin_common_form_input" type="text" placeholder="Payee VPA" value="<?php echo $upi_pa; ?>"  name="payee_vpa" required>
						<span class="material-icons">point_of_sale</span>
					</div>

					<div class="admin_common_form_input_keeper">
						<input class="admin_common_form_input" type="text" placeholder="Payee Display Name" value="<?php echo urldecode($upi_pn); ?>" name="payee_display_name" required>
						<span class="material-icons">business</span>
					</div>

					<div class="admin_common_form_input_keeper">
						<input class="admin_common_form_input" type="number" min="1" step="1" placeholder="Payee Merchant Code" value="<?php echo $upi_mc; ?>" name="merchant_category_code" required>
						<span class="material-icons">vpn_key</span>
					</div>

					<div class="admin_common_form_btn_keeper">
						<button type="submit" class="admin_common_form_btn">UPDATE UPI SETTINGS</button>
					</div>

				</div>
			</form>


</div>





<?php require 'admin_server_files/admin_footer.php'; ?>
