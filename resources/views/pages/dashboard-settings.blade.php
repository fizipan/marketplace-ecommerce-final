@extends('layouts.dashboard')

@section('title')
    Store Dashboard Settings
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Settings</h2>
            <p class="dashboard-subtitle">Make store that profitable</p>
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
                            <label for="storeName">Store Name</label>
                            <input type="text" name="storeName" id="storeName" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="" class="form-control">
                            <option value="">Furniture</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Store Status</label>
                            <p class="text-muted">Apakah saat ini toko Anda buka?</p>
                            <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="storeStatus" id="storeStatusTrue" class="custom-control-input"
                                value="true" checked>
                            <label for="storeStatusTrue" class="custom-control-label">
                                Buka
                            </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="storeStatus" id="storeStatusFalse"
                                class="custom-control-input" value="false">
                            <label for="storeStatusFalse" class="custom-control-label">
                                Sementara Tutup
                            </label>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col text-right">
                        <button type="submit" name="save" class="btn btn-success px-4">Save Now</button>
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

