<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>

<h1>Hello, world!</h1>
<div class="container-xxl flex-grow-1 container-p-y">
    <div clas="row">
        <div id="carouselExample" class="carousel slide col-md-8 offset-md-2" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url('img/elements/18.jpg'); ?>" alt="First slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h3>First slide</h3>
                        <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('img/elements/2.jpg'); ?>" alt="Second slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second slide</h3>
                        <p>In numquam omittam sea.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('img/elements/18.jpg'); ?>" alt="Third slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third slide</h3>
                        <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    <hr class="my-5">
    <div class="row">
        <form>
            <div class="mb-3 row">
                <label for="html5-text-input" class="col-md-2 col-form-label">Text</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" value="Sneat" id="html5-text-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-search-input" class="col-md-2 col-form-label">Search</label>
                <div class="col-md-10">
                    <input class="form-control" type="search" value="Search ..." id="html5-search-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input class="form-control" type="email" value="john@example.com" id="html5-email-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-url-input" class="col-md-2 col-form-label">URL</label>
                <div class="col-md-10">
                    <input class="form-control" type="url" value="https://themeselection.com" id="html5-url-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-tel-input" class="col-md-2 col-form-label">Phone</label>
                <div class="col-md-10">
                    <input class="form-control" type="tel" value="90-(164)-188-556" id="html5-tel-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                    <input class="form-control" type="password" value="password" id="html5-password-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-number-input" class="col-md-2 col-form-label">Number</label>
                <div class="col-md-10">
                    <input class="form-control" type="number" value="18" id="html5-number-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                <div class="col-md-10">
                    <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                <div class="col-md-10">
                    <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-month-input" class="col-md-2 col-form-label">Month</label>
                <div class="col-md-10">
                    <input class="form-control" type="month" value="2021-06" id="html5-month-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-week-input" class="col-md-2 col-form-label">Week</label>
                <div class="col-md-10">
                    <input class="form-control" type="week" value="2021-W25" id="html5-week-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
                <div class="col-md-10">
                    <input class="form-control" type="time" value="12:30:00" id="html5-time-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-color-input" class="col-md-2 col-form-label">Color</label>
                <div class="col-md-10">
                    <input class="form-control" type="color" value="#666EE8" id="html5-color-input" />
                </div>
            </div>
            <div class="row">
                <label for="html5-range" class="col-md-2 col-form-label">Range</label>
                <div class="col-md-10">
                    <input type="range" class="form-range mt-3" id="html5-range" />
                </div>
            </div>
        </form>
    </div>
    <hr class="my-5">

    <div class="container ">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Client</th>
                        <th>Users</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium">Angular Project</span></td>
                        <td>Albert Cook</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-react fa-lg text-info me-3"></i> <span class="fw-medium">React Project</span></td>
                        <td>Barry Hunter</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-success me-1">Completed</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <span class="fw-medium">VueJs Project</span></td>
                        <td>Trevor Baker</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <span class="fw-medium">Bootstrap Project</span></td>
                        <td>Jerry Milton</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-warning me-1">Pending</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>

<?php echo $this->endSection(); ?>