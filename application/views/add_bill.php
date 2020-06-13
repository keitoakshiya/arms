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
			                  <form method="post" action="/index/main/insert_bill">
			                  	<input type="hidden" name="id" value="'.$row->id.'">
			                   	Hospital Bill: <input type="text" class="form-control" value = "'.$row->hostpital_bill.'" name="hostpital_bill">
			                   	Professional Fee: <input type="text" class="form-control" value = "'.$row->professional_bill.'" name="professional_bill">
			                   	<input type="submit" class="form-control btn btn-success submit-btn">
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