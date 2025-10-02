<div class="container-fuild">
    <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
        <div class="row">
            <div class="col-lg-6">
                <div class="login-background position-relative d-lg-flex align-items-center justify-content-center d-lg-block d-none flex-wrap vh-100 overflowy-auto">
                    <div>
                        {{ $logo }}
                    </div>
                    <div class="authen-overlay-item  w-100 p-4">
                        <h4 class="text-white mb-3">Welcome Back!</h4>
                        <div
                            class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Admin Login</h6>
                                <p class="mb-0 text-truncate">Lorem ipsum dolor sit amet elit.</p>
                            </div>
                            <a href="{{ route('admin.login') }}"><i class="ti ti-chevrons-right"></i></a>
                        </div>
                        <div
                            class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Staff Login</h6>
                                <p class="mb-0 text-truncate">Lorem ipsum, dolor sit elit. Dolor, assumenda.
                                </p>
                            </div>
                            <a href="{{ route('staff.login') }}"><i class="ti ti-chevrons-right"></i></a>
                        </div>
                        <div
                            class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Student Login</h6>
                                <p class="mb-0 text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                            <a href="{{ route('students.create') }}"><i class="ti ti-chevrons-right"></i></a>
                        </div>
                        <div
                            class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Parent/Guardian Login</h6>
                                <p class="mb-0 text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                            <a href="{{ route('guardians.index') }}"><i class="ti ti-chevrons-right"></i></a>
                        </div>
                        <!-- <div
                            class="d-flex align-items-center flex-row mb-0 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Summer Vacation Holiday Homework</h6>
                                <p class="mb-0 text-truncate">The school will remain closed from April 20th to June 15th for
                                    summer...</p>
                            </div>
                            <a href="javascript:void(0);"><i class="ti ti-chevrons-right"></i></a>
                        </div> -->

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                    <div class="col-md-8 mx-auto p-4">
                        {{ $slot }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
