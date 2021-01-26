@extends('layouts.dashboard')

@section('title')
    Store Dashboard Account
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">Update your current profile</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
            <div class="col-12 mt-2">
                <form action="" method="POST">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="address1">Address I</label>
                            <input type="text" name="address1" id="address1" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="address2">Address 2</label>
                            <input type="text" name="address2" id="address2" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <select name="province" id="province" class="form-control">
                            <option value="Jawa Barat">Jawa Barat</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" id="city" class="form-control">
                            <option value="Bandung">Bandung</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="postalCode">Postal Code</label>
                            <input type="number" name="postalCode" id="postalCode" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="tel" name="mobile" id="mobile" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col text-right">
                        <button type="submit" name="save" class="btn btn-success px-4">Save Now</button>
                        </div>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

