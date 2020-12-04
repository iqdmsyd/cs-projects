<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <!-- Top sales per category start -->
                        <div class="col-xl-3 col-md-6">
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
                        </div>

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
                                    <div id="daily_sales_detail" style="display: none;">
                                        <?php
                                            $data = array($daily_sales['detail']['adult'], $daily_sales['detail']['infant']);
                                            // $data = "[".$daily_sales['detail']['adult'].",".$daily_sales['detail']['infant']."]";
                                            echo json_encode($data);
                                        ?>
                                    </div>
                                    <canvas id="psgtypeChart" height="250"></canvas>
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

                        <!-- <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Bootstrap Modals</h5>

                                </div>
                                <div class="card-block">
                                    <p>use button<code> onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-1']);"</code> to use effect.</p>
                                    <ul>
                                        <li>
                                            <button type="button" class="btn btn-primary sweet-1 m-b-10" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-1']);">Basic</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-success alert-success-msg m-b-10" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-success']);">Success</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-warning alert-confirm m-b-10" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-confirm']);">Confirm</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-danger alert-success-cancel m-b-10" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-success-cancel']);">Success or Cancel</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-primary alert-prompt m-b-10" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-prompt']);">Prompt</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-success alert-ajax m-b-10" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-ajax']);">Ajax</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                        <!-- Top sales per category list start -->
                        <!-- <div class="col-xl-6 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5 class="mb-3">Top 10 Sales</h5>
                                    <form action="<?php echo base_url() ?>analytics/getsales_dailyby" method="post">
                                        <div class="form-row mb-3">
                                            <div class="col-3">
                                                Dimension
                                            </div>
                                            <div class="col-5">
                                                <select id="columnfield" class="form-control-sm" name="column">
                                                    <option value="STSN_JUAL">STSN_JUAL</option>
                                                    <option value="RUTE">RUTE</option>
                                                    <option value="PNP">PNP</option>
                                                    <option value="KERETA">KERETA</option>
                                                    <option value="NO_KERETA">NO_KERETA</option>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                Month:
                                            </div>
                                            <div class="col-2">
                                                <select id="monthfield" class="form-control-sm" name="month">
                                                    <?php for ($i=1; $i <= 12; $i++) { ?>
                                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-4 offset-10">
                                                <input class="btn-sm btn-primary form-control-sm" type="submit" name="submit" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Dimension</th>
                                                    <th>Sales</th>
                                                    <th class="text-right">Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($sales_dailyby)): ?>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($sales_dailyby as $sales): ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $sales->DIMENSION ?></td>
                                                            <td><?php echo $sales->SALES ?></td>
                                                            <td class="text-right"><?php echo $sales->PERCENTAGE ?>%</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right  m-r-20">
                                        <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-6 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Top 10 Sales by Partner | <strong><?php echo $daily_sales_by_partner['month'] ?></strong></h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <button type="button" class="btn-sm ml-auto btn_partner" data-toggle="modal" data-target="#changemonth_partner">
                                              Change month
                                            </button>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless table-sm">
                                            <thead style="font-size:12px">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Partner</th>
                                                    <th>Sales</th>
                                                    <th class="text-right">Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:12px">
                                                <?php if (!empty($daily_sales_by_partner['record'])): ?>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($daily_sales_by_partner['record'] as $sales): ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $sales->PARTNER ?></td>
                                                            <td><?php echo number_format($sales->SALES) ?></td>
                                                            <td class="text-right"><?php echo $sales->PERCENTAGE ?>%</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="text-right  m-r-20">
                                        <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Top 10 Sales by Routes | <strong><?php echo $daily_sales_by_route['month'] ?></strong></h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <button type="button" name="button" class="btn-sm ml-auto">Change month</button>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless table-sm">
                                            <thead style="font-size:12px">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Route</th>
                                                    <th>Sales</th>
                                                    <th class="text-right">Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:12px">
                                                <?php if (!empty($daily_sales_by_route['record'])): ?>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($daily_sales_by_route['record'] as $sales): ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $sales->ROUTE ?></td>
                                                            <td><?php echo number_format($sales->SALES) ?></td>
                                                            <td class="text-right"><?php echo $sales->PERCENTAGE ?>%</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="text-right  m-r-20">
                                        <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Top 10 Sales by Passenger Type | <strong><?php echo $daily_sales_by_psgtype['month'] ?></strong></h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <button type="button" name="button" class="btn-sm ml-auto">Change month</button>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless table-sm">
                                            <thead style="font-size:12px">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Passenger Type</th>
                                                    <th>Sales</th>
                                                    <th class="text-right">Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:12px">
                                                <?php if (!empty($daily_sales_by_psgtype['record'])): ?>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($daily_sales_by_psgtype['record'] as $sales): ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $sales->PASSENGER ?></td>
                                                            <td><?php echo number_format($sales->SALES) ?></td>
                                                            <td class="text-right"><?php echo $sales->PERCENTAGE ?>%</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="text-right  m-r-20">
                                        <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Top 10 Sales by Subclass | <strong><?php echo $daily_sales_by_subclass['month'] ?></strong></h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <button type="button" name="button" class="btn-sm ml-auto">Change month</button>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless table-sm">
                                            <thead style="font-size:12px">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subclass</th>
                                                    <th>Sales</th>
                                                    <th class="text-right">Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:12px">
                                                <?php if (!empty($daily_sales_by_subclass['record'])): ?>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($daily_sales_by_subclass['record'] as $sales): ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $sales->SUBCLASS ?></td>
                                                            <td><?php echo number_format($sales->SALES) ?></td>
                                                            <td class="text-right"><?php echo $sales->PERCENTAGE ?>%</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="text-right  m-r-20">
                                        <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Top sales per category list start -->

                        <!-- sale order start -->
                        <div class="col-xl-4 col-md-6">
                            <div class="card o-hidden">
                                <div class="card-block bg-c-pink text-white">
                                    <h6>Sales Per Day <span class="f-right"><i class="feather icon-activity m-r-15"></i>3%</span></h6>
                                    <canvas id="sale-chart1" height="150"></canvas>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row">
                                        <div class="col-6 b-r-default">
                                            <h4>$4230</h4>
                                            <p class="text-muted m-b-0">Total Revenue</p>
                                        </div>
                                        <div class="col-6">
                                            <h4>321</h4>
                                            <p class="text-muted m-b-0">Today Sales</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card o-hidden">
                                <div class="card-block bg-c-green text-white">
                                    <h6>Visits<span class="f-right"><i class="feather icon-activity m-r-15"></i>9%</span></h6>
                                    <canvas id="sale-chart2" height="150"></canvas>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row">
                                        <div class="col-6 b-r-default">
                                            <h4>3562</h4>
                                            <p class="text-muted m-b-0">Monthly Visits</p>
                                        </div>
                                        <div class="col-6">
                                            <h4>96</h4>
                                            <p class="text-muted m-b-0">Today Visits</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card o-hidden">
                                <div class="card-block bg-c-blue text-white">
                                    <h6>Orders<span class="f-right"><i class="feather icon-activity m-r-15"></i>12%</span></h6>
                                    <canvas id="sale-chart3" height="150"></canvas>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row">
                                        <div class="col-6 b-r-default">
                                            <h4>1695</h4>
                                            <p class="text-muted m-b-0">Monthly Orders</p>
                                        </div>
                                        <div class="col-6">
                                            <h4>52</h4>
                                            <p class="text-muted m-b-0">Today Orders</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sale order end -->

                        <!-- social start -->
                        <div class="col-xl-4 col-md-12">
                            <div class="card quater-card">
                                <div class="card-block">
                                    <h6 class="text-muted m-b-20">This Quarter</h6>
                                    <h4>$3,9452.50</h4>
                                    <p class="text-muted">$3,9452.50</p>
                                    <h5 class="m-t-30">87</h5>
                                    <p class="text-muted">Online Revenue<span class="f-right">80%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-simple-c-pink" style="width: 80%"></div>
                                    </div>
                                    <h5 class="m-t-30">68</h5>
                                    <p class="text-muted">Offline Revenue<span class="f-right">50%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-simple-c-yellow" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-12">
                            <div class="card social-network">
                                <div class="card-header">
                                    <h5>Social Network</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="..\files\assets\images\widget\icon-1.png" alt=" " class="img-responsive p-b-20">
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Views :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">545,721</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Comments :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">2,256</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Likes :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">4,129</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Subscribe :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">3,451,945</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="..\files\assets\images\widget\icon-2.png" alt=" " class="img-responsive p-b-20">
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Engagement :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">1,543</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Shares :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">846</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Likes :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">569</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Comments :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">156</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 m-t-0">
                                            <img src="..\files\assets\images\widget\icon-3.png" alt=" " class="img-responsive p-b-10 p-t-10">
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Tweets :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">103,576</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 m-t-0">
                                            <img src="..\files\assets\images\widget\icon-4.png" alt=" " class="img-responsive p-b-10 p-t-10">
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text-muted m-b-5">Tweets :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p class="m-b-5 f-w-400">103,576</p>
                                                </div>
                                            </div>
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
