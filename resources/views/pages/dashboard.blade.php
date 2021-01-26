@extends('layouts.dashboard')

@section('title')
    Store Dashboard
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Dashboard</h2>
              <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">Customer</div>
                      <div class="dashboard-card-subtitle">{{ number_format($custumer) }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">Revenue</div>
                      <div class="dashboard-card-subtitle">IDR {{ number_format($revenue) ?? 0 }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">Transaction</div>
                      <div class="dashboard-card-subtitle">{{ number_format($transactions_count) }}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 mt-2">
                  <h5 class="mb-3">Recent Transactions</h5>
                  @forelse ($transactions_data as $transaction)
                      <a href="#" class="card card-list d-block">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-1">
                              <img src="{{ Storage::url($transaction->product->galleries->first()->photos) }}" class="w-100" alt="">
                            </div>
                            <div class="col-md-4">
                              {{ $transaction->product->name }}
                            </div>
                            <div class="col-md-3">
                              {{ $transaction->product->user->store_name }}
                            </div>
                            <div class="col-md-3">
                              {{ $transaction->created_at->format('d, F Y') }}
                            </div>
                            <div class="col-md-1 d-none d-md-block">
                              <img src="/images/icon-row.svg" alt="">
                            </div>
                          </div>
                        </div>
                      </a>
                  @empty
                      <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                            Transaction Not Found
                          </div>
                        </div>
                      </div>
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection