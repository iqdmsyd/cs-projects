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
                                    <h4>CSV Import</h4>
                                    <span>Import multiple csv files into one corresponding table</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url("import") ?>">Import</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>CSV Import</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <!-- <li><i class="feather icon-trash-2 close-card"></i></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="row justify-content-center align-items-center">
                                <!-- Import start -->
                                <div class="col-xl-4 my-auto">
                                    Select table to be imported below:
                                    <form class="form-control" action="<?php echo base_url() ?>import/tryimport" method="post" name="import_form" enctype="multipart/form-data">
                                        <select id="table_name_field" class="form-control mb-1" name="table_name">
                                            <option value="t_manifest">Manifest</option>
                                            <option value="t_example" disabled>Example</option>
                                        </select>
                                        <input id="files_field" class="form-control mb-3" type="file" name="file[]" value="" multiple required>
                                        <span style="color: red; font-size: 12px">*maks 10 files
                                        <br>
                                        <input id="import_submit" class="form-control btn btn-primary btn-round col-4 offset-4 mt-2" type="submit" name="importSubmit" value="Import">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
