<!-- page content -->
        <div class="right_col" role="main">


          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?=$title?> <small><?=$description?></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li>
                      <div id="date" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                          <i class="fa fa-calendar"></i>&nbsp;
                          <input type="text" id="daterange" name="daterange" style="border: hidden;" value="01/01/1970 - 01/15/2020" />
                          <span></span> <i class="fa fa-caret-down"></i>
                      </div>
                    </li>
                    <li>
                       <form id="form-id" method="post" action="patients_filtered">
                          <input type="hidden" name="start" id="start">
                          <input type="hidden" name="end" id="end">
                          <input type="submit" name="" value="Filter" class="form-control" style="height: 36px">
                       </form>
                    </li>
                    <li style="padding-left: 10px;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">