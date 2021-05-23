<form method="post">
	<h4><b>Uncheck box to remove access to page:</b></h4>
<div class="row" style="padding-top: 10px; font-family:verdana; font-size: 14px" >

	<?php

		if($_GET['value']){
			$sql = "SELECT * FROM `user` WHERE id = '".$_GET['value']."'";
			$con = mysqli_connect('localhost','root','','arms');
			//By default, password is blank
			$query = mysqli_query($con,$sql); 


			while ($row = mysqli_fetch_array($query)) {
				//echo "<div class='col-md-3'>";
				//echo "View Data:  <input type='checkbox' name='view_data'";
				//echo $row['view_data'] == 0 ?  ">" :  "checked>"; 
				//echo "</div>";

				//echo "<div class='col-md-4'>";
				//echo "Add Data:  <input type='checkbox' name='add_data'";
				//echo $row['add_data'] == 0 ?  ">" :  "checked>";
				//echo "</div>";

				//echo "<div class='col-md-4'>";
				//echo "Edit Data:  <input type='checkbox' name='edit_data'";
				//echo $row['edit_data'] == 0 ?  ">" :  "checked>";
				//echo "</div>";

				//echo "<div class='col-md-4'>";
				//echo "Delete Data:  <input type='checkbox' name='delete_data'";
				//echo $row['delete_data'] == 0 ?  ">" :  "checked> ";
				//echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_dashboard'";
				echo $row['view_dashboard'] == 0 ?  ">" :  "checked>"; 
				echo "	Dashboard";
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='add_patient'";
				echo $row['add_patient'] == 0 ?  ">" :  "checked>";
				echo "	Add Patient"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_patients'";
				echo $row['view_patients'] == 0 ?  ">" :  "checked>";
				echo "	Patient List"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='edit_patients'";
				echo $row['edit_patients'] == 0 ?  ">" :  "checked>";
				echo "	Edit Patient"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='delete_patients'";
				echo $row['delete_patients'] == 0 ?  ">" :  "checked>";
				echo "	Archive Patient"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_accounts_receivable'";
				echo $row['view_accounts_receivable'] == 0 ?  ">" :  "checked>";
				echo "	Accounts Receivable"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_accounts_receivable2'";
				echo $row['view_accounts_receivable2'] == 0 ?  ">" :  "checked>";
				echo "	Accounts Receivable Patient List"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_payment_summary'";
				echo $row['view_payment_summary'] == 0 ?  ">" :  "checked>";
				echo "	Total Payment"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_payment_summary2'";
				echo $row['view_payment_summary2'] == 0 ?  ">" :  "checked>";
				echo "	Total Payment Patient List"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_remaining_balance'";
				echo $row['view_remaining_balance'] == 0 ?  ">" :  "checked>";
				echo "	Remaining Balance"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_remaining_balance2'";
				echo $row['view_remaining_balance2'] == 0 ?  ">" :  "checked>";
				echo "	Remaining Balance Patient List"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='add_official_receipt'";
				echo $row['add_official_receipt'] == 0 ?  ">" :  "checked>";
				echo "	Add Official Receipt"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_official_receipt_list2'";
				echo $row['view_official_receipt_list2'] == 0 ?  ">" :  "checked>";
				echo "	Applied Official Receipt List"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='delete_official_receipt'";
				echo $row['delete_official_receipt'] == 0 ?  ">" :  "checked>";
				echo "	Delete Official Receipt"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_company_list_official_receipt_list'";
				echo $row['view_company_list_official_receipt_list'] == 0 ?  ">" :  "checked>";
				echo "	Payment Application"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='add_patient_to_receipt'";
				echo $row['add_patient_to_receipt'] == 0 ?  ">" :  "checked>";
				echo "	Add Payment"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='add_view_bill_by_patient'";
				echo $row['add_view_bill_by_patient'] == 0 ?  ">" :  "checked>";
				echo "	Edit Payment"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_list_company'";
				echo $row['view_list_company'] == 0 ?  ">" :  "checked>";
				echo "	Company List"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='add_company'";
				echo $row['add_company'] == 0 ?  ">" :  "checked>";
				echo "	Add Company"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_archive'";
				echo $row['view_archive'] == 0 ?  ">" :  "checked>";
				echo "	Archive List"; 
				echo "</div>";
				
				/*echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='delete_archive'";
				echo $row['delete_archive'] == 0 ?  ">" :  "checked>";
				echo "	delete_archive"; 
				echo "</div>";*/
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='restore_archive'";
				echo $row['restore_archive'] == 0 ?  ">" :  "checked>";
				echo "	Restore Patient"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='add_account'";
				echo $row['add_account'] == 0 ?  ">" :  "checked>";
				echo "	Add User Account"; 
				echo "</div>";
				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='edit_roles'";
				echo $row['edit_roles'] == 0 ?  ">" :  "checked>";
				echo "	Manage Roles"; 
				echo "</div>";
				
				/*echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='delete_or'";
				echo $row['delete_or'] == 0 ?  ">" :  "checked>";
				echo "	Archive Official Receipt"; 
				echo "</div>";
*/				
				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='permanently_delete'";
				echo $row['permanently_delete'] == 0 ?  ">" :  "checked>";
				echo "	Permanently Delete Patient"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='edit_company'";
				echo $row['edit_company'] == 0 ?  ">" :  "checked>";
				echo "	Edit Company"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_payment_history'";
				echo $row['view_payment_history'] == 0 ?  ">" :  "checked>";
				echo "	View Payment History"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_or_list'";
				echo $row['view_or_list'] == 0 ?  ">" :  "checked>";
				echo "	View Collection Report"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='view_or_list_patient'";
				echo $row['view_or_list_patient'] == 0 ?  ">" :  "checked>";
				echo "	View Patients Official Receipts"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='edit_official_receipt'";
				echo $row['edit_official_receipt'] == 0 ?  ">" :  "checked>";
				echo "	Edit Official Receipt"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='void_official_receipt'";
				echo $row['void_official_receipt'] == 0 ?  ">" :  "checked>";
				echo "	Void Official Receipt"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='unvoid_official_receipt'";
				echo $row['unvoid_official_receipt'] == 0 ?  ">" :  "checked>";
				echo "	Undo Void"; 
				echo "</div>";

				echo "<div class='col-md-4'>";
				echo "<input type='checkbox' name='permavoid_official_receipt'";
				echo $row['permavoid_official_receipt'] == 0 ?  ">" :  "checked>";
				echo "	Permanently Void Official Receipt"; 
				echo "</div>";


			}
			echo "<br>";
			echo "<br>";
			echo "<div class='col-md-12'>";
			echo "<input type='submit' class='btn btn-success'>";
			echo "</div>";
		}

	?>
</div>
</form>
      

            <!-- menu profile quick info -->
            
              
              
                

                </div>
                <div class="col-md-6" style="color: white; padding-left: 1px;">
                 

                </div>
                
              </div>