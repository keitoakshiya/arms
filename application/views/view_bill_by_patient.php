	        <div class="right_col" style="">
	         <div class="row">

	<?php

		if ($result) {
			
			foreach ($result as $key => $row) {
				echo '

				<!-- page content -->

		            <div class="col-md-10 col-sm-10s ">
		              <div class="x_panel">
		                <div class="x_title">
		                  <h2>'.$row->first_name.' '.$row->last_name.' <small><?=$description?></small></h2>
		                  <ul class="nav navbar-right panel_toolbox">
		                    <li style="padding-left: 51px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		                    </li>
		                  </ul>
		                  <div class="clearfix"></div>
		                </div>
			                <div class="x_content">
		                  <div class="dashboard-widget-content">

			                  <form method="post" action="/arms/main/insert_transaction" autocomplete="off">

			                  	<input type="hidden" name="patient_id" value="'.$row->patient_id.'">
			                  	<input type="hidden" name="bill_id" value="'.$row->bill_id.'">

									<table>
							        <thead>
							       
							        	<tr>

											<th style="border-bottom: 1px solid #ddd;"></th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Amount</th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Payment</th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Balance</th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Total Paid</th>
							        	</tr>
							  
							        </thead>
							        <tbody >
							        	<tr>

											<td style="border-bottom: 1px solid #ddd; padding-right:26px">Professional Bill</td>
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
							        		
							        		<td style="border-bottom: 1px solid #ddd;padding-right:26px">Hospital Bill</td>
							        
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

			                   	<input type="submit" id="submit" class=" form form-control btn btn-success submit-btn" disabled>
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
		
		x = (bill-payment)-bal;
		paid = parseFloat(payment) + parseFloat(bal);

		document.getElementById('pro_bill').value = x;
		document.getElementById('prof_bill_transaction').value = paid;
		isValid();
	}

	function change_hosp_bal(payment,bill,bal) {

		x = (bill-payment)-bal;
		paid = parseFloat(payment) + parseFloat(bal);

		document.getElementById('hosp_bill').value = x;
		document.getElementById('hosp_bill_transaction').value = paid;
		isValid();
	}

	function isValid(){
		x = document.getElementById('hosp_bill').value;
		y = document.getElementById('pro_bill').value;

		a = document.getElementById('hosp_payment').value;
		b = document.getElementById('pro_payment').value;


		if (a>0||b>0) {
			if (x<0||y<0) {
				document.getElementById('submit').setAttribute("disabled","1");
			}else{
				document.getElementById('submit').removeAttribute("disabled");
			}
		}else{
			document.getElementById('submit').setAttribute("disabled","1");
		}


	}

</script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>