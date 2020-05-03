<?php include 'pages/layouts/header.php'; ?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
              <section id="number-tabs">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pendaftaran Skripsi</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>Form Pendaftaran Skripsi.</p>
                                    <form action="#" class="number-tab-steps wizard-circle">

                                        <!-- Step 1 -->
                                        <h6>Step 1</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="firstName1">First Name </label>
                                                        <input type="text" class="form-control" id="firstName1">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="lastName1">Last Name</label>
                                                        <input type="text" class="form-control" id="lastName1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="emailAddress1">Email</label>
                                                        <input type="email" class="form-control" id="emailAddress1">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="location1">City</label>
                                                        <select class="custom-select form-control" id="location1" name="location">
                                                            <option value="new-york">New York</option>
                                                            <option value="chicago">Chicago</option>
                                                            <option value="san-francisco">San Francisco</option>
                                                            <option value="boston">Boston</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 2 -->
                                        <h6>Step 2</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="proposalTitle1">Proposal Title</label>
                                                        <input type="text" class="form-control" id="proposalTitle1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jobtitle">Job Title</label>
                                                        <input type="text" class="form-control" id="jobtitle">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="shortDescription1">Short Description :</label>
                                                        <textarea name="shortDescription" id="shortDescription1" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 3 -->
                                        <h6>Step 3</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="eventName1">Event Name :</label>
                                                        <input type="text" class="form-control" id="eventName1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="eventType1">Event Status :</label>
                                                        <select class="custom-select form-control" id="eventType1" data-placeholder="Type to search cities" name="eventType1">
                                                            <option value="Banquet">Planning</option>
                                                            <option value="Fund Raiser">In Process</option>
                                                            <option value="Dinner Party">Finished</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="eventLocation1">Event Location :</label>
                                                        <select class="custom-select form-control" id="eventLocation1" name="location">
                                                            <option value="new-york">New York</option>
                                                            <option value="chicago">Chicago</option>
                                                            <option value="san-francisco">San Francisco</option>
                                                            <option value="boston">Boston</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group d-flex align-items-center pt-md-2">
                                                        <label class="mr-2">Requirements :</label>
                                                        <div class="c-inputs-stacked">
                                                            <div class="d-inline-block mr-2">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" value="false">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Staffing</span>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" value="false">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Catering</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php include 'pages/layouts/footer.php'; ?>