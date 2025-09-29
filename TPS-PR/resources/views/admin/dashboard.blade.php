@extends('components.layouts.app')
@section('pageTitle', 'Admin Dashboard')

@php
	if (!auth()->guard('admin')->check()) {
		abort(403, 'Unauthorized');
	}
@endphp

@section('pageContent')
	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content">
			<!-- Page Header -->
			<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
				<div class="my-auto mb-2">
					<h3 class="page-title mb-1">Admin Dashboard</h3>
					<nav>
						<ol class="breadcrumb mb-0">
							<li class="breadcrumb-item">
								<a href="index.html">Dashboard</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
						</ol>
					</nav>
				</div>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
					<div class="mb-2">
						<a href="add-student.html" class="btn btn-primary d-flex align-items-center me-3"><i
								class="ti ti-square-rounded-plus me-2"></i>Add New Student</a>
					</div>
					<div class="mb-2">
						<a href="collect-fees.html" class="btn btn-light d-flex align-items-center">Fees Details</a>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-md-12">
					<div class="alert-message">
						<div class="alert alert-success rounded-pill d-flex align-items-center justify-content-between border-success mb-4"
							role="alert">
							<div class="d-flex align-items-center">
								<span class="me-1 avatar avatar-sm flex-shrink-0"><img
										src="assets/img/profiles/avatar-27.jpg" alt="Img"
										class="img-fluid rounded-circle"></span>
								<p>Fahed III,C has paid Fees for the <strong class="mx-1">“Term1”</strong></p>
							</div>
							<button type="button" class="btn-close p-0" data-bs-dismiss="alert"
								aria-label="Close"><span><i class="ti ti-x"></i></span></button>
						</div>
					</div>

					<!-- Dashboard Content -->
					<div class="card bg-dark">
						<div class="overlay-img">
							<img src="https://preskool.dreamstechnologies.com/html/template/assets/img/bg/shape-04.png" alt="img" class="img-fluid shape-01">
							<img src="https://preskool.dreamstechnologies.com/html/template/assets/img/bg/shape-01.png" alt="img" class="img-fluid shape-02">
							<img src="https://preskool.dreamstechnologies.com/html/template/assets/img/bg/shape-02.png" alt="img" class="img-fluid shape-03">
							<img src="https://preskool.dreamstechnologies.com/html/template/assets/img/bg/shape-03.png" alt="img" class="img-fluid shape-04">
						</div>
						<div class="card-body">
							<div
								class="d-flex align-items-xl-center justify-content-xl-between flex-xl-row flex-column">
								<div class="mb-3 mb-xl-0">
									<div class="d-flex align-items-center flex-wrap mb-2">
										<h1 class="text-white me-2">Welcome Back, <span class="text-capitalize">{{ Auth::guard('admin')->user()->first_name }}</span></h1>
										<a href="profile.html"
											class="avatar avatar-sm img-rounded bg-gray-800 dark-hover"><i
												class="ti ti-edit text-white"></i></a>
									</div>
									<p class="text-white">Have a Good day at work</p>
								</div>
								<p class="text-white"><i class="ti ti-refresh me-1"></i>Updated Recently on 15 Jun
									2024</p>
							</div>
						</div>
					</div>
					<!-- /Dashboard Content -->

				</div>
			</div>

			<div class="row">

				<!-- Total Students -->
				<div class="col-xxl-3 col-sm-6 d-flex">
					<div class="card flex-fill animate-card border-0">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="avatar avatar-xl bg-danger-transparent me-2 p-1">
									<img src="https://preskool.dreamstechnologies.com/html/template/assets/img/icons/student.svg" alt="img">
								</div>
								<div class="overflow-hidden flex-fill">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="counter">3654</h2>
										<span class="badge bg-danger">1.2%</span>
									</div>
									<p>Total Students</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
								<p class="mb-0">Active : <span class="text-dark fw-semibold">3643</span></p>
								<span class="text-light">|</span>
								<p>Inactive : <span class="text-dark fw-semibold">11</span></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Total Students -->

				<!-- Total Teachers -->
				<div class="col-xxl-3 col-sm-6 d-flex">
					<div class="card flex-fill animate-card border-0">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="avatar avatar-xl me-2 bg-secondary-transparent p-1">
									<img src="https://preskool.dreamstechnologies.com/html/template/assets/img/icons/teacher.svg" alt="img">
								</div>
								<div class="overflow-hidden flex-fill">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="counter">284</h2>
										<span class="badge bg-skyblue">1.2%</span>
									</div>
									<p>Total Teachers</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
								<p class="mb-0">Active : <span class="text-dark fw-semibold">254</span></p>
								<span class="text-light">|</span>
								<p>Inactive : <span class="text-dark fw-semibold">30</span></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Total Teachers -->

				<!-- Total Staff -->
				<div class="col-xxl-3 col-sm-6 d-flex">
					<div class="card flex-fill animate-card border-0">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="avatar avatar-xl me-2 bg-warning-transparent p-1">
									<img src="https://preskool.dreamstechnologies.com/html/template/assets/img/icons/staff.svg" alt="img">
								</div>
								<div class="overflow-hidden flex-fill">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="counter">162</h2>
										<span class="badge bg-warning">1.2%</span>
									</div>
									<p>Total Staff</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
								<p class="mb-0">Active : <span class="text-dark fw-semibold">161</span></p>
								<span class="text-light">|</span>
								<p>Inactive : <span class="text-dark fw-semibold">02</span></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Total Staff -->

				<!-- Total Subjects -->
				<div class="col-xxl-3 col-sm-6 d-flex">
					<div class="card flex-fill animate-card border-0">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="avatar avatar-xl me-2 bg-success-transparent p-1">
									<img src="https://preskool.dreamstechnologies.com/html/template/assets/img/icons/subject.svg" alt="img">
								</div>
								<div class="overflow-hidden flex-fill">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="counter">82</h2>
										<span class="badge bg-success">1.2%</span>
									</div>
									<p>Total Subjects</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
								<p class="mb-0">Active : <span class="text-dark fw-semibold">81</span></p>
								<span class="text-light">|</span>
								<p>Inactive : <span class="text-dark fw-semibold">01</span></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Total Subjects -->

			</div>
		</div>
	</div>
	<!-- /Page Wrapper -->
@endsection

@section('modals')
    <!-- Add Class Routine -->
    <div class="modal fade" id="add_class_routine">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-wrapper">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Class Routine</h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <form action="index.html">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Teacher</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>Erickson</option>
                                            <option>Mori</option>
                                            <option>Joseph</option>
                                            <option>James</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Class</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>I</option>
                                            <option>II</option>
                                            <option>III</option>
                                            <option>IV</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Section</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Day</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>Monday</option>
                                            <option>Tuesday</option>
                                            <option>Wedneshday</option>
                                            <option>Thursday</option>
                                            <option>Friday</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Start Time</label>
                                                <div class="date-pic">
                                                    <input type="text" class="form-control timepicker"
                                                        placeholder="Choose">
                                                    <span class="cal-icon"><i class="ti ti-clock"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">End Time</label>
                                                <div class="date-pic">
                                                    <input type="text" class="form-control timepicker"
                                                        placeholder="Choose">
                                                    <span class="cal-icon"><i class="ti ti-clock"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Class Room</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>101</option>
                                            <option>102</option>
                                            <option>103</option>
                                            <option>104</option>
                                            <option>105</option>
                                        </select>
                                    </div>
                                    <div
                                        class="modal-satus-toggle d-flex align-items-center justify-content-between">
                                        <div class="status-title">
                                            <h5>Status</h5>
                                            <p>Change the Status by toggle </p>
                                        </div>
                                        <div class="status-toggle modal-status">
                                            <input type="checkbox" id="user1" class="check">
                                            <label for="user1" class="checktoggle"> </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="index.html#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Class Routine</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Class Routine -->

    <!-- Add Event -->
    <div class="modal fade" id="add_event">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Event</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="index.html">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">Event For</label>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="form-check me-3 mb-3">
                                            <input class="form-check-input" type="radio" name="event" id="all"
                                                checked="">
                                            <label class="form-check-label" for="all">
                                                All
                                            </label>
                                        </div>
                                        <div class="form-check me-3 mb-3">
                                            <input class="form-check-input" type="radio" name="event" id="students">
                                            <label class="form-check-label" for="students">
                                                Students
                                            </label>
                                        </div>
                                        <div class="form-check me-3 mb-3">
                                            <input class="form-check-input" type="radio" name="event" id="staffs">
                                            <label class="form-check-label" for="staffs">
                                                Staffs
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="all-content" id="all-student">
                                    <div class="mb-3">
                                        <label class="form-label">Classes</label>
                                        <select class="select">
                                            <option>All Classes</option>
                                            <option>I</option>
                                            <option>II</option>
                                            <option>III</option>
                                            <option>IV</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sections</label>
                                        <select class="select">
                                            <option>All Sections</option>
                                            <option>A</option>
                                            <option>B</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="all-content" id="all-staffs">
                                    <div class="mb-3">
                                        <div class="bg-light-500 p-3 pb-2 rounded">
                                            <label class="form-label">Role</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-sm mb-2">
                                                        <input class="form-check-input" type="checkbox">Admin
                                                    </div>
                                                    <div class="form-check form-check-sm mb-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            checked>Teacher
                                                    </div>
                                                    <div class="form-check form-check-sm mb-2">
                                                        <input class="form-check-input" type="checkbox">Driver
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-sm mb-2">
                                                        <input class="form-check-input" type="checkbox">Accountant
                                                    </div>
                                                    <div class="form-check form-check-sm mb-2">
                                                        <input class="form-check-input" type="checkbox">Librarian
                                                    </div>
                                                    <div class="form-check form-check-sm mb-2">
                                                        <input class="form-check-input" type="checkbox">Receptionist
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">All Teachers</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>I</option>
                                            <option>II</option>
                                            <option>III</option>
                                            <option>IV</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Event Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Event Category</label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Celebration</option>
                                    <option>Training</option>
                                    <option>Meeting</option>
                                    <option>Holidays</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Start Date</label>
                                    <div class="date-pic">
                                        <input type="text" class="form-control datetimepicker"
                                            placeholder="15 May 2024">
                                        <span class="cal-icon"><i class="ti ti-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">End Date</label>
                                    <div class="date-pic">
                                        <input type="text" class="form-control datetimepicker"
                                            placeholder="21 May 2024">
                                        <span class="cal-icon"><i class="ti ti-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Start Time</label>
                                    <div class="date-pic">
                                        <input type="text" class="form-control timepicker" placeholder="09:10 AM">
                                        <span class="cal-icon"><i class="ti ti-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">End Time</label>
                                    <div class="date-pic">
                                        <input type="text" class="form-control timepicker" placeholder="12:50 PM">
                                        <span class="cal-icon"><i class="ti ti-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="bg-light p-3 pb-2 rounded">
                                        <div class="mb-3">
                                            <label class="form-label">Attachment</label>
                                            <p>Upload size of 4MB, Accepted Format PDF</p>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="btn btn-primary drag-upload-btn mb-2 me-2">
                                                <i class="ti ti-file-upload me-1"></i>Upload
                                                <input type="file" class="form-control image_sign" multiple="">
                                            </div>
                                            <p class="mb-2">Fees_Structure.pdf</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control"
                                        rows="4">Meeting with Staffs on the Quality Improvement s and completion of syllabus before the August,  enhance the students health issue</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="index.html#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Event -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        // Date Time Picker
        if ($('.datetimepicker').length > 0) {
            $('.datetimepicker').datetimepicker({
                format: 'DD MMM YYYY',
                icons: {
                    up: "ti ti-chevron-up",
                    down: "ti ti-chevron-down",
                    next: 'ti ti-chevron-right',
                    previous: 'ti ti-chevron-left'
                }
            });
        }

        // Time Picker
        if ($('.timepicker').length > 0) {
            $('.timepicker').datetimepicker({
                format: 'LT',
                icons: {
                    up: "ti ti-chevron-up",
                    down: "ti ti-chevron-down",
                    next: 'ti ti-chevron-right',
                    previous: 'ti ti-chevron-left'
                }
            });
        }

        // Show/Hide based on radio button
        $('input[type=radio][name=event]').change(function() {
            if (this.id == 'all') {
                $('#all-student').show();
                $('#all-staffs').show();
            } else if (this.id == 'students') {
                $('#all-student').show();
                $('#all-staffs').hide();
            } else if (this.id == 'staffs') {
                $('#all-staffs').show();
                $('#all-student').hide();
            }
        });
    </script>
    <script>
		$(document).ready(function () {
			// 🔹 Load countries on page load
			$.get("https://countriesnow.space/api/v0.1/countries/positions", function (response) {
				if (response.data) {
					$.each(response.data, function (index, country) {
						$('#country').append('<option value="' + country.name + '">' + country.name + '</option>');
					});
				}
			});

			// 🔹 When country changes, load states
			$('#country').on('change', function () {
				var country = $(this).val();
				$('#state').empty().append('<option value="">-- Select State --</option>');

				if (country) {
					$.ajax({
						url: "https://countriesnow.space/api/v0.1/countries/states",
						type: "POST",
						contentType: "application/json",
						data: JSON.stringify({ country: country }),
						success: function (response) {
							if (response.data && response.data.states) {
								$.each(response.data.states, function (index, state) {
									$('#state').append('<option value="' + state.name + '">' + state.name + '</option>');
								});
							}
						},
						error: function (err) {
							console.error("Error fetching states:", err);
						}
					});
				}
			});
		});
	</script>
@endpush