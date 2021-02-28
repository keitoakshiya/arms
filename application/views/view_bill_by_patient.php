	        <div class="right_col" style="color: #292929;">
	         <div class="row">

	<?php
		
		foreach ($unapplied as $key => $row) {
			$unp = $row->unapplied;
		}
		if ($result) {
			
			foreach ($result as $key => $row) {
				echo '

				<!-- page content -->

		            <div class="col-md-12 col-sm-12 ">
		              <div class="x_panel">
		                <div class="x_title">
		                  <h2>
		                  ' .$row->name.'  <small>'.$row->first_name.' '.$row->last_name.' 
		                  <br>
		                  Unapplied Amount: <input type="text" id="unp_disp" value="'.$unp.'" disabled style="width:79px;"></a></small></h2>
		                  <ul class="nav navbar-right panel_toolbox">
		                    <li style="padding-left: 51px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		                    </li>
		                  </ul>
		                  <div class="clearfix"></div>
		                </div>
			                <div class="x_content">
		                  <div class="dashboard-widget-content">

			                  <form method="post" action="/arms/main/insert_transaction" autocomplete="off">
			                  	<input type="hidden" name="unapplied" id="unp" value="'.$unp.'">
			                  	<input type="hidden" name="patient_id" value="'.$row->patient_id.'">
			                  	<input type="hidden" name="bill_id" value="'.$row->bill_id.'">
			                  	<input type="hidden" name="receipt_id" value="'.$receipt.'">
			                  	<input type="hidden" name="company_id" value="'.$company_id.'">

									<table>
							        <thead>
							       
							        	<tr>

											<th style="border-bottom: 1px solid #ddd;"></th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Bill </th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Payment</th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Balance</th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Total Paid</th>
							        	</tr>
							  
							        </thead>
							        <tbody >
							        	<tr>

											<td style="border-bottom: 1px solid #ddd; padding-right:26px"><b>Professional Fee</b></td>
											<td style="border-bottom: 1px solid #ddd;text-align:center;padding-right:26px">'.$row->professional_bill.'</td>

							        		<td style="border-bottom: 1px solid #ddd; direction: ltr;">

							        		 <input type="number" id="pro_payment" onkeyup="change_pro_bal(this.value,'.$row->professional_bill.','.$row->SUM2.');"  placeholder = "0.00" name="professional_bill_payment"></td>

							        		<td><input type="text" min="1" value = '.($row->professional_bill -$row->SUM2).' id="pro_bill" disabled>
							        		</td>
							        		<td>
							        		<input type="text" value = "'.$row->SUM1.'" id="prof_bill_transaction" disabled>
							        		</td>
											

							        	</tr>
							        
							        	<tr>
							        		
							        		<td style="border-bottom: 1px solid #ddd;padding-right:26px"><b>Hospital Bill</b></td>
							        
								        	<td style="border-bottom: 1px solid #ddd;text-align:center;padding-right:26px">'.$row->hospital_bill.'</td>
								        	<td style="border-bottom: 1px solid #ddd; direction: ltr;">
								        	 <input type="number" id="hosp_payment" min="1" onkeyup="change_hosp_bal(this.value,'.$row->hospital_bill.','.$row->SUM1.');"  placeholder = "0.00" name="hospital_bill_payment"></td>
								        	<td><input type="text" value = '.($row->hospital_bill -$row->SUM1).' id="hosp_bill" disabled>
								        	</td>
								        	<td>
							        			<input type="text" value = "'.$row->SUM2.'"
							        			id="hosp_bill_transaction" disabled>
							        		</td>
								        	
                        				</tr>
                        		




							        </tbody>
						        </table>
						        <div class="col-md-8 col-sm-8 ">
			                   	<input type="submit" id="submit" class=" form form-control btn btn-success submit-btn" disabled>
			                   </div>
			                  </form>
		                  </div>
		                </div>
		              </div>
		            </div>
		        <!-- /page content -->
		        ';

			}
/*			foreach ($result2 as $key => $row2) {
				echo $row2->date_created;
			}*/
		}
		
	?>

	          </div>
	          </div>


<script type="text/javascript">
	function change_pro_bal(payment,bill,bal) {

		var payment1 = 0; bal1 = 0;
		x = (bill-payment)-bal;
		if (payment) {
			payment1 = parseFloat(payment);
		}
		if (bal) {
			bal1 = parseFloat(bal);
		}
		paid = payment1 + bal1;

		document.getElementById('pro_bill').value = x;
		document.getElementById('prof_bill_transaction').value = paid;

		update_unp_disp();
	}

	function change_hosp_bal(payment,bill,bal) {

		var payment1 = 0; bal1 = 0;
		x = (bill-payment)-bal;
		if (payment) {
			payment1 = parseFloat(payment);
		}
		if (bal) {
			bal1 = parseFloat(bal);
		}
		paid = payment1 + bal1;

		document.getElementById('hosp_bill').value = x;
		document.getElementById('hosp_bill_transaction').value = paid;
		
		update_unp_disp();
	}

	function update_unp_disp() {
		var hosp = 0, pro = 0;
		var u = parseFloat(document.getElementById('unp').value);
		if (!isNaN(parseFloat(document.getElementById('hosp_payment').value))) {
			hosp = parseFloat(document.getElementById('hosp_payment').value);
		}
		if (!isNaN(parseFloat(document.getElementById('pro_payment').value))) {
			pro  = parseFloat(document.getElementById('pro_payment').value);
		}

		 new_unp = u-(hosp+pro);

		document.getElementById('unp_disp').value = new_unp;
		isValid(new_unp);

	}

	function isValid(new_unp){

		if (new_unp>=0) {
			if (0>document.getElementById('hosp_bill').value) {
				alert('too much hosp');
				document.getElementById('submit').setAttribute("disabled","1");
			}
			if (0>document.getElementById('pro_bill').value) {
				alert('too much pro');
				document.getElementById('submit').setAttribute("disabled","1");
			}
			if(0<=document.getElementById('pro_bill').value && 0<=document.getElementById('hosp_bill').value){				
				document.getElementById('submit').removeAttribute("disabled");
			}
		}

		else {document.getElementById('submit').setAttribute("disabled","1");}
	}

</script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

