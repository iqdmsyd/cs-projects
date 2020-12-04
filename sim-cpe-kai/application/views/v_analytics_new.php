<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <!-- Top sales per category start -->
                        <!-- <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <?php if (!empty($header_data['all_sales'])): ?>
                                                <h4 class="text-c-yellow f-w-600"><?php echo number_format($header_data['all_sales']) ?></h4>
                                            <?php endif; ?>
                                            <h6 class="text-muted m-b-0">All Sales</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-yellow">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"><?php echo date('M Y'); ?></p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <?php if (!empty($header_data['topsales_bypartner'])): ?>
                                                <h4 class="text-c-green f-w-600"><?php echo number_format($header_data['topsales_bypartner']->SALES) ?></h4>
                                                <h6 class="text-muted m-b-0"><?php echo $header_data['topsales_bypartner']->PARTNER ?></h6>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-file-text f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"><?php echo date('M Y'); ?></p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <?php if (!empty($header_data['topsales_byroute'])): ?>
                                                <h4 class="text-c-pink f-w-600"><?php echo number_format($header_data['topsales_byroute']->SALES) ?></h4>
                                                <h6 class="text-muted m-b-0"><?php echo $header_data['topsales_byroute']->ROUTE ?></h6>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-calendar f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-pink">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"><?php echo date('M Y'); ?></p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <?php if (!empty($header_data['topsales_bysubclass'])): ?>
                                                <h4 class="text-c-blue f-w-600"><?php echo number_format($header_data['topsales_bysubclass']->SALES) ?></h4>
                                                <h6 class="text-muted m-b-0"><?php echo $header_data['topsales_bysubclass']->SUBCLASS ?></h6>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-download f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-blue">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"><?php echo date('M Y'); ?></p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Top sales per category  end -->

                        <!-- Sales daily start -->
                        <div class="col-xl-8 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Daily Sales | <strong><?php echo $daily_sales['month'] ?></strong> </h5>
                                    <span class="text-muted">For more details about usage, please refer <a href="https://www.amcharts.com/online-store/" target="_blank">amCharts</a> licences.</span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <button type="button" class="btn-sm ml-auto" data-toggle="modal" data-target="#changemonth_daily" data-action="getsales_daily">
                                              Change month
                                            </button>
                                            <!-- <li><i class="feather icon-maximize full-card"></i></li> -->
                                            <!-- <li><i class="feather icon-minus minimize-card"></i></li> -->
                                            <!-- <li><i class="feather icon-trash-2 close-card"></i></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="sales_daily" style="height:300px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Sales by Passenger Type</h5>
                                    <span class="text-muted">This pie is based on to the chart beside</span>
                                </div>
                                <div class="card-block">
                                    <div id="chartdiv" width="200px" height="300px" class=""></div>
                                </div>
                                <div class="card-footer ">
                                    <div class="row text-center b-t-default">
                                        <div class="col-6 b-r-default m-t-15">
                                            <h5><?php echo $daily_sales['detail']['adult_p'] ?>%</h5>
                                            <p class="text-muted m-b-0">Adult</p>
                                        </div>
                                        <div class="col-6 b-r-default m-t-15">
                                            <h5><?php echo $daily_sales['detail']['infant_p'] ?>%</h5>
                                            <p class="text-muted m-b-0">Infant</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- visitor end -->

                        <!-- Top sales per category list start -->
                        <div class="col-xl-6 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <?php if (!empty($daily_sales_by_dimension)): ?>
                                        <h5 class="mb-3">Top 10 sales by <?php echo $daily_sales_by_dimension['dim'] ?> | <strong><?php echo $daily_sales_by_dimension['month'] ?></strong></h5>
                                    <?php else: ?>
                                        <h5 class="mb-3">Top 10 Sales by Dimension</h5>
                                    <?php endif; ?>
                                    <span class="text-muted">
                                        This card serves to display the total sales in a month based on the selected dimension
                                        <br>
                                        The dimensions are: <strong>STSN_JUAL, RUTE, PNP,</strong> and <strong>KERETA</strong>
                                    </span>
                                </div>
                                <div class="card-block">
                                    <div class="container">
                                    <form action="<?php echo base_url() ?>analytics/change_daily_sales_by_dimension" method="post">
                                        <span class="ml-1">Dimension:</span>
                                        <select id="dim_field" class="form-control-sm" name="dimension">
                                            <option value="-" disabled selected>-</option>
                                            <option value="STSN_JUAL">STSN_JUAL</option>
                                            <option value="RUTE">RUTE</option>
                                            <option value="PNP">PNP</option>
                                            <option value="KERETA">KERETA</option>
                                            <option value="NO_KERETA">NO_KERETA</option>
                                        </select>
                                        <span class="ml-3">Month:</span>
                                        <select id="month_field" class="form-control-sm" name="month">
                                            <?php for ($i=1; $i <= 12; $i++) { ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php } ?>
                                        </select>
                                        <input class="btn-sm btn-primary form-control-sm ml-3" type="submit" name="submit" value="Submit" id="dim_submit" disabled>
                                    </form>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>
                                                        <?php if (!empty($daily_sales_by_dimension)): ?>
                                                            <?php echo $daily_sales_by_dimension['dim'] ?>
                                                        <?php else: ?>
                                                            Dimension
                                                        <?php endif; ?>
                                                    </th>
                                                    <th>Sales</th>
                                                    <th class="text-right">Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($daily_sales_by_dimension)): ?>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($daily_sales_by_dimension['record'] as $sales): ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $sales->DIM ?></td>
                                                            <td><?php echo number_format($sales->SALES) ?></td>
                                                            <td class="text-right"><?php echo $sales->PERCENTAGE ?>%</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Sales by Dimension</h5>
                                    <span class="text-muted">This pie is based on to the table beside</span>
                                </div>
                                <div class="card-block">
                                    <div id="chartdiv2" width="200px" height="300px" class=""></div>
                                </div>
                            </div>
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Sales by Dimension</h5>
                                    <span class="text-muted">This pie is based on to the table beside</span>
                                </div>
                                <div class="card-block">
                                    <!-- <div id="chartdiv2" width="200px" height="300px" class=""></div> -->
                                </div>
                            </div>

                        </div>
                        <!-- Top sales per category list start -->

                        <!-- social start -->
                        <div class="col-xl-4 col-md-12">
                            <div class="card quater-card">
                                <div class="card-block">
                                    <h6 class="text-muted m-b-20">This Quarter</h6>
                                    <h4>xxx</h4>
                                    <p class="text-muted">xxx</p>
                                    <h5 class="m-t-30">--</h5>
                                    <p class="text-muted">---<span class="f-right"></span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-simple-c-pink" style="width: 100%"></div>
                                    </div>
                                    <h5 class="m-t-30">--</h5>
                                    <p class="text-muted">---<span class="f-right"></span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-simple-c-yellow" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-12">
                            <div class="card social-network">
                                <div class="card-header">
                                    <h5>Table Structure</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <strong>#Dimension</strong>
                                            <br>
                                            <ul style="font-size: 12px">
                                                <li class="text-muted">KODE_PEMESANAN</li>
                                                <li class="text-muted">NO_TIKET</li>
                                                <li class="text-muted">KERETA</li>
                                                <li class="text-muted">KLS</li>
                                                <li class="text-muted">PNP</li>
                                                <li class="text-muted">NO_KURSI</li>
                                                <li class="text-muted">RUTE</li>
                                                <li class="text-muted">NAMA</li>
                                                <li class="text-muted">NO_IDENTITAS</li>
                                                <li class="text-muted">STSN_JUAL</li>
                                                <li class="text-muted">STSN_BOARDING</li>
                                                <li class="text-muted">JAM_BOARDING</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <strong>#Measure</strong>
                                            <br>
                                            <ul style="font-size: 12px">
                                                <li class="text-muted">ID_MANIFEST</li>
                                                <li class="text-muted">DEWASA</li>
                                                <li class="text-muted">ANAK</li>
                                                <li class="text-muted">INFANT</li>
                                                <li>
                                                </li>
                                            </ul>
                                            <img class="img-fluid" src="<?php echo base_url() ?>\files\assets\images\SIM CPE KAI.png" alt="Theme-Logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- social end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>

<div class="modal fade" id="changemonth_partner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change month</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-control" action="<?php echo base_url() ?>analytics/change_dailysales_partner" name="form_changemonth" id="form_changemonth" method="post">
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <select class="form-control" name="month">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <span>After submitting this form, it may take awhile to process.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="changemonth_daily" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change month</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-control" action="<?php echo base_url() ?>analytics/change_month_daily_sales" name="form_changemonth" id="form_changemonth" method="post">
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <select class="form-control" name="month">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <span>After submitting this form, it may take awhile to process.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
</div>
