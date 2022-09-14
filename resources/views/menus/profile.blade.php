@extends('layouts.master')

@section('Header', 'Profile')
@section('profile')
<div class="section-body">
    <h2 class="section-title">Hi, {{Auth()->User()->name}}!</h2>
    <p class="section-lead">
        Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
            <div class="profile-widget-header">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
                <div class="profile-widget-item">
                <div class="profile-widget-item-label">Posts</div>
                <div class="profile-widget-item-value">187</div>
                </div>
                <div class="profile-widget-item">
                <div class="profile-widget-item-label">Followers</div>
                <div class="profile-widget-item-value">6,8K</div>
                </div>
                <div class="profile-widget-item">
                <div class="profile-widget-item-label">Following</div>
                <div class="profile-widget-item-value">2,1K</div>
                </div>
            </div>
            </div>
            <div class="profile-widget-description">
            <div class="profile-widget-name">{{Auth()->User()->name}}<div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
            {{Auth()->User()->desc}}
            </div>
        </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
            <form method="post" action="#" class="needs-validation" novalidate="">
            <div class="card-header">
                <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{$biodata->nama}}" required="" name="name">
                        <div class="invalid-feedback">
                            Please fill in the first name
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$biodata->email}}" required="" name="email">
                            <div class="invalid-feedback">
                                Please fill in the email
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <label>NIS</label>
                        <input type="text" class="form-control" value="{{$biodata->nis}}" required="" name="nis">
                            <div class="invalid-feedback">
                                Please fill in the nis
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <label>Kelas</label>
                        <input type="text" class="form-control" value="{{$biodata->kelas}}" required="" name="kelas">
                            <div class="invalid-feedback">
                                Please fill in the kelas
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <label>Birthdate</label>
                        <input type="text" class="form-control" value="{{$biodata->tgllahir}}" required="" name="tgllahir">
                            <div class="invalid-feedback">
                                Please fill in the Birthdate
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection