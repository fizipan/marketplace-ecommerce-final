@extends('layouts.admin')

@section('title')
    Store Admin Dashboard
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Admin Dashboard</h2>
              <p class="dashboard-subtitle">This is Store Marketplace Administrator Panel</p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">Customer</div>
                      <div class="dashboard-card-subtitle">{{ number_format($customer) }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">Revenue</div>
                      <div class="dashboard-card-subtitle">IDR {{ number_format($revenue) }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">Transaction</div>
                      <div class="dashboard-card-subtitle">{{ number_format($transaction) }}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 mt-2">
                  <h5 class="mb-3">Recent Transactions</h5>
                  <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-1">
                          <img src="/images/dashboard-image.png" alt="">
                        </div>
                        <div class="col-md-4">
                          Shirup Marzan
                        </div>
                        <div class="col-md-3">
                          Angga Risky
                        </div>
                        <div class="col-md-3">
                          14, Januari 2020
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                          <img src="/images/icon-row.svg" alt="">
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-1">
                          <img src="/images/dashboard-image-2.png" alt="">
                        </div>
                        <div class="col-md-4">
                          Lebrone X
                        </div>
                        <div class="col-md-3">
                          Masayashi
                        </div>
                        <div class="col-md-3">
                          11 Januari, 2020
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                          <img src="/images/icon-row.svg" alt="">
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-1">
                          <img src="/images/dashboard-image-3.png" alt="">
                        </div>
                        <div class="col-md-4">
                          Soffa Lembutte
                        </div>
                        <div class="col-md-3">
                          Shayna
                        </div>
                        <div class="col-md-3">
                          10 Januari, 2020
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                          <img src="/images/icon-row.svg" alt="">
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection