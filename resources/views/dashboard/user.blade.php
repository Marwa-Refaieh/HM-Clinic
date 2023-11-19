@extends('dashboard.dashboard-layouts.master')

@section('title')
    HM-Clinic
@stop
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <!-- <div class="col-md-5">
            <div class="form-group">
              <label class="bmd-label-floating">Company (disabled)</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div> -->
                                <!-- <div class="col-md-3">
            <div class="form-group">
              <label class="bmd-label-floating">Username</label>
              <input type="text" class="form-control">
            </div>
          </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fist Name</label>
                                        <input type="text" class="form-control" id="f-name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Name</label>
                                        <input type="text" class="form-control" id="l-name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Birth</label>
                                        <input type="date" class="form-control" id="birth">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone</label>
                                        <input type="number" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price</label>
                                        <input type="number" class="form-control" id="price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Specialize</label>
                                        <input type="text" class="form-control" id="specialize">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" id="photo">Photo</label>
                                        <input type="file">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea class="form-control" rows="3" id="about"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Update
                                Profile</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="../assets/img/faces/marc.jpg" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category">CEO / Co-Founder</h6>
                        <h4 class="card-title">Alec Thompson</h4>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in
                            truth And I love you
                            like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <p>2001/4/1</p>
                            </div>
                            <div class="col-6">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p>0950509164</p>
                            </div>
                            <div class="col-6">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <p>20000</p>
                            </div>
                            <div class="col-6">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p>marwa@gmail.com</p>
                            </div>
                        </div>
                        <a href="#pablo" class="btn btn-primary btn-round">tus</a>
                        <a href="#pablo" class="btn btn-primary btn-round">tus</a>
                        <a href="#pablo" class="btn btn-primary btn-round">tus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
