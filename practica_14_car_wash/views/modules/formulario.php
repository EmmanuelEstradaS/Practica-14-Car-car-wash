 
<?php
    include("admin_header.php");
?>
 
 <div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Formulario de prueba</h2>
                    
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Default Form</h4>
                    </div>
                    <div class="widget-body">
                        <form class="needs-validation" novalidate="">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Name</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Email Address *</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Enter your email" required="">
                                        <span class="input-group-addon addon-orange">.com</span>
                                        <div class="invalid-feedback">
                                            Please enter a valid email
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Password *</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" placeholder="Password" required="">
                                    <div class="invalid-feedback">
                                        Please enter a valid password
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">City *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="City" required="">
                                    <div class="invalid-feedback">
                                        Please enter a valid city
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Phone Number</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon addon-primary">
                                            <i class="la la-phone"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Date</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" placeholder="MM/DD/YYYY">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Options *</label>
                                <div class="col-lg-5">
                                    <div class="select">
                                        <select name="account" class="custom-select form-control" required="">
                                            <option value="">Select an option</option>
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                            <option>option 6</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select an option
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Website</label>
                                <div class="col-lg-5">
                                    <input type="url" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Custom Message</label>
                                <div class="col-lg-5">
                                    <textarea class="form-control" placeholder="Type your message here ..." required=""></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a custom message
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-gradient-01" type="submit">Submit Form</button>
                                <button class="btn btn-shadow" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->
<?php include("admin_footer.php") ?>    
</div>


