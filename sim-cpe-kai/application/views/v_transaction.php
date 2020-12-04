                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Manifest Transaction Data</h4>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="<?php echo base_url() ?>"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="<?php echo base_url("transaction") ?>">Transaction</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <!-- <div class="card-header">
                                                        <h5>Zero Configuration</h5>
                                                        <span>DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="card-block">
                                                        <form class="form-control" action="<?php echo base_url("Transaction/custom") ?>" method="post">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-xl-6 m-b-30">
                                                                    <h4 class="sub-title">Select Column to be displayed</h4>
                                                                    <select multiple="multiple" id="my-select" name="fields[]" class="form-control">
                                                                        <?php foreach ($allfields as $field): ?>
                                                                            <option value="<?php echo $field ?>"><?php echo $field ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-12 col-xl-6 m-b-30">
                                                                    <div class="row m-b-3">
                                                                        <div class="col-sm-12 col-xl-6 m-b-3">
                                                                            <h4 class="sub-title">Aggregation</h4>
                                                                            <select id="hello-single" class="form-control" name="agg">
                                                                                <option selected value="">-</option>
                                                                                <option value="COUNT">COUNT</option>
                                                                                <option value="COUNT (DIST)">COUNT (DIST)</option>
                                                                                <option value="SUM">SUM</option>
                                                                                <option value="AVG">AVG</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xl-6 m-b-3">
                                                                            <h4 class="sub-title">Field</h4>
                                                                            <select id="hello-single" class="form-control" name="agg-field">
                                                                                <option selected value="">-</option>
                                                                                <?php foreach ($fields as $field): ?>
                                                                                    <option value="<?php echo $field ?>"><?php echo $field ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-5">
                                                                        <div class="col-sm-12 col-xl-6 m-b-3">
                                                                            <h4 class="sub-title">Sort By</h4>
                                                                            <select id="hello-single" class="form-control" name="sort-field">
                                                                                <option selected value="">-</option>
                                                                                <?php foreach ($fields as $field): ?>
                                                                                    <option value="<?php echo $field ?>"><?php echo $field ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xl-6 m-b-3">
                                                                            <h4 class="sub-title">-</h4>
                                                                            <select id="hello-single" class="form-control" name="sort">
                                                                                <option selected value="">-</option>
                                                                                <option value="COUNT">ASCENDING</option>
                                                                                <option value="SUM">DESCENDING</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-xl-2 offset-xl-10">
                                                                    <input type="submit" name="Submit" value="Submit" class="form-control btn btn-primary">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div> -->
                                                </div>
                                                <div class="card">
                                                    <div class="card-block" id="tableCardBlock">
                                                        <div class="dt-responsive table-responsive pb-3">
                                                          <!-- <table border="0" cellspacing="5" cellpadding="5" class="float-left">
                                                            <tbody>
                                                              <tr>
                                                                <td>Date Filter:</td>
                                                                <td><input type="text" id="dateMin" name="min" style="text-align: center;"></td>
                                                                <td> : </td>
                                                                <td><input type="text" id="dateMax" name="max" style="text-align: center;"></td>
                                                                <td><a id="date_filter_button" href="#" class="label label-inverse-info-border"><i class="feather icon-filter"></i></a></td>
                                                              </tr>
                                                            </tbody>
                                                          </table> -->
                                                          <table id="manifestServerSideTable" class="table table-striped table-bordered nowrap">
                                                              <thead style="font-size: 12px">
                                                                  <tr>
                                                                      <?php foreach ($fields as $field): ?>
                                                                          <th scope="col"><?php echo $field ?></th>
                                                                      <?php endforeach; ?>
                                                                  </tr>
                                                              </thead>
                                                              <tbody style="font-size: 10px">
                                                              </tbody>
                                                          </table>
                                                            <a id="clear_state_button" href="#" class="mt-2"><i class="feather icon-refresh-cw"></i> Reset table filter</a>
                                                        </div>
                                                        <div class="py-2"></div>
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
            </div>
        </div>
    </div>
