	        <div class="right_col" style="">
	         <div class="row">

	<?php

		if ($result) {
			
			foreach ($result as $key => $row) {
				echo '

				<!-- page content -->

		            <div class="col-md-5 col-sm-5 ">
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
											

							        	</tr>
							  
							        </thead>
							        <tbody >
							        	<tr>

											<td style="border-bottom: 1px solid #ddd;">Hospital Bill</td>
											<td style="border-bottom: 1px solid #ddd;text-align:center">'.$row->professional_bill.'</td>
											

							        	</tr>
							        
							        	<tr>
							        		
							        		<td style="border-bottom: 1px solid #ddd;">Professional Bill</td>
							        
								        	<td style="border-bottom: 1px solid #ddd;text-align:center">'.$row->hospital_bill.'</td>
								        	
                        				</tr>
                        		


                        				<tr>
                        					
							        		<td style="border-bottom: 1px solid #ddd;">Hospital Bill Payment: </td>
							        		<td style="border-bottom: 1px solid #ddd;"><input type="text" class="form-control" placeholder = "please enter amount" name="hospital_bill_payment"></td>

                        				</tr>
                        				<tr  border: 1px solid black;>


								        	<td style="border-bottom: 1px solid #ddd;">Professional Fee Payment: </td><td style="border-bottom: 1px solid #ddd;"><input type="text" placeholder = "please enter amount" class="form-control" name="professional_bill_payment"></td>

                        				</tr>

							        </tbody>
						        </table>

			                   	<input type="submit" class=" form form-control btn btn-success submit-btn">
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