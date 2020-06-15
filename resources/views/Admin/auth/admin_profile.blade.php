@extends('Admin.master')
@section('content')
 <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{ asset('Backend/assets/images/profile/'. Auth::user()->profile) }}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                                    <h6 class="card-subtitle">{{ Auth::user()->email }}</h6>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{ Auth::user()->email }}</h6>
                                <small class="text-muted p-t-30 db">Mobile</small>
                                <h6>{{ Auth::user()->phone }}</h6>
                                <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Update Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#changePassword" role="tab">Change Password</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">
                                                    {{ Auth::user()->name }}
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">
                                                    {{ Auth::user()->email }}
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">
                                                    {{ Auth::user()->phone }}
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="font-medium m-t-30">Skill Set</h4>
                                        <hr>
                                        <h5 class="m-t-30">Laravel<span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Enter Your Name" class="form-control form-control-line" name="name" value="{{ $admin->name }}">
                                                    <!-- Error Message -->
                                                    @error('name')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="Enter Your Email" class="form-control form-control-line" name="email" id="example-email" value="{{ $admin->email }}">
                                                    <!-- Error Message -->
                                                    @error('email')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Mobile</label>
                                                <div class="col-md-12">
                                                    <input type="number" placeholder="Enter Your Mobile Number" class="form-control form-control-line" name="phone" value="{{ $admin->phone }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Profile</label>
                                                <div class="col-md-12">
                                                    <input type="file" class="form-control form-control-line" name="image">
                                                    <!-- Auth Image -->
                                                    <img width="50" src="{{ asset('Backend/assets/images/profile/'. $admin->profile) }}">
                                                    <!-- Error Message -->
                                                    @error('image')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Password Change Panel -->
                                <div class="tab-pane" id="changePassword" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" action="{{ route('admin.password.update') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-md-12">Old Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line" name="current_password">
                                                    <!-- Error Message -->
                                                    @error('current_password')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">New Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line" name="password">
                                                    <!-- Error Message -->
                                                    @error('password')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Again New Password</label>
                                                <div class="col-md-12">
                                                    <input type="password"class="form-control form-control-line" name="password_confirmation">
                                                    <!-- Error Message -->
                                                    @error('password_confirmation')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
@endsection

@push('js')
<!--stickey kit -->
    <script src="{{ asset('Backend/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('Backend/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endpush
