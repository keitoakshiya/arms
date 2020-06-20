	        <div class="right_col" style="">
	         <div class="row">

	<?php

		if ($result) {
			
			foreach ($result as $key => $row) {
				echo '

				<!-- page content -->

		            <div class="col-md-4 col-sm-4 ">
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
							        <div class="col-md-10">
							        	<tr>
							        		<th></th>
											<th>Hospital Bill</th>
											<th>'.$row->professional_bill.'</th>
											

							        	</tr>
							        </div>
							        </thead>
							        <tbody>
							        <div class="col-md-6">
							        	<tr>
							        		<td></td>
							        		<td>Professional Bill</td>
								        	<td>'.$row->hospital_bill.'</td>
                        				</tr>
                        			</div>

									<div class="col-md-2">
                        				<tr>
                        					<td></td>
							        		<td>Hospital Bill Payment: <input type="text" class="form-control" name="hospital_bill_payment"></td>

								        	<td>Professional Fee Payment: <input type="text" class="form-control" name="professional_bill_payment"></td>
                        				</tr>
									</div>
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