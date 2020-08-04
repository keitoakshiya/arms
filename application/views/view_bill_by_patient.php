	        <div class="right_col" style="">
	         <div class="row">

	<?php

		if ($result) {
			
			foreach ($result as $key => $row) {
				echo '

				<!-- page content -->

		            <div class="col-md-8 col-sm-8 ">
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

			                  <form method="post" action="/arms/main/insert_transaction">

			                  	<input type="hidden" name="patient_id" value="'.$row->patient_id.'">
			                  	<input type="hidden" name="bill_id" value="'.$row->bill_id.'">

									<table>
							        <thead>
							       
							        	<tr>

											<th style="border-bottom: 1px solid #ddd;"></th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Amount</th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Payment</th>
											<th style="border-bottom: 1px solid #ddd;text-align:center">Balance</th>
							        	</tr>
							  
							        </thead>
							        <tbody >
							        	<tr>

											<td style="border-bottom: 1px solid #ddd; padding-right:26px">Hospital Bill</td>
											<td style="border-bottom: 1px solid #ddd;text-align:center;padding-right:26px">'.$row->professional_bill.'</td>

							        		<td style="border-bottom: 1px solid #ddd; direction: ltr;">
							        		 <input type="text" onkeyup="change_pro_bal(this.value,'.$row->professional_bill.');" placeholder = "0.00" name="hospital_bill_payment"></td>
							        		<td><input type="text" id="pro_bill" disabled></td>

											

							        	</tr>
							        
							        	<tr>
							        		
							        		<td style="border-bottom: 1px solid #ddd;padding-right:26px">Professional Bill</td>
							        
								        	<td style="border-bottom: 1px solid #ddd;text-align:center;padding-right:26px">'.$row->hospital_bill.'</td>
								        	<td style="border-bottom: 1px solid #ddd; direction: ltr;">
								        	 <input type="text" onkeyup="change_hosp_bal(this.value,'.$row->hospital_bill.');"  placeholder = "0.00" name="professional_bill_payment"></td>
								        	<td><input type="text" id="hosp_bill" disabled></td>
								        	
                        				</tr>
                        		




							        </tbody>
						        </table>

			                   	<input type="submit" id="submit" class=" form form-control btn btn-success submit-btn">
			                  </form>
		                  </div>
		                </div>
		              </div>
		            </div>
		        <!-- /page content -->
		        ';

			}
		}
		
	?>

	          </div>
	          </div>


<script type="text/javascript">
	function change_pro_bal(a,b) {
		x = b-a;
		document.getElementById('pro_bill').value = x;
		isValid();
	}

	function change_hosp_bal(a,b) {
		x = b-a;
		document.getElementById('hosp_bill').value = x;
		isValid();
	}

	function isValid(){
		x = document.getElementById('hosp_bill').value;
		y = document.getElementById('pro_bill').value;
		if (x<0||y<0) {
			document.getElementById('submit').setAttribute("disabled","1");
		}else{
			document.getElementById('submit').removeAttribute("disabled");
		}

	}

</script>