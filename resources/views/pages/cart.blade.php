@extends('layouts.app')

@section('title', 'Store Cart Page')

@section('content')
    <div class="page-content page-cart">
        <section class="store-breadcrumb" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item">
                                    <a href="/index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Cart
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name &amp; Seller</th>
                                    <th>Price</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @forelse ($carts as $cart)
                                <tr>
                                    <td style="width: 20%;">
                                        <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}" alt="" class="cart-image">
                                    </td>
                                    <td style="width: 35%;">
                                        <div class="product-title">{{ $cart->product->name }}</div>
                                        <div class="product-subtitle">by {{ $cart->product->user->store_name }}</div>
                                    </td>
                                    <td style="width: 35%;">
                                        <div class="product-title">Rp. {{ number_format($cart->product->price) }}</div>
                                        <div class="product-subtitle">IDR</div>
                                    </td>
                                    <td style="width: 20%;">
                                        <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-remove text-white btn-block px-3">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $totalPrice += $cart->product->price;
                                @endphp
                                @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-info text-center">
                                            Product Not Found
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <h2>
                            Shipping Details
                        </h2>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="POST" id="locations">
                    @csrf
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one">Address 1</label>
                                <input type="text" name="address_one" id="address_one" class="form-control form-store"
                                    value="Setra Duta Cemara">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_two">Address 2</label>
                                <input type="text" name="address_two" id="address_two" class="form-control form-store"
                                    value="Blok B2 No. 34">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinces_id">Province</label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-model="provinces_id">
                                    <option :value="province.id" v-for="province in provinces">@{{ province.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="regencies_id">City</label>
                                <select name="regencies_id" id="regencies_id" class="form-control" v-model="regencies_id">
                                    <option :value="regency.id" v-for="regency in regencies">@{{ regency.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zip_code">Postal code</label>
                                <input type="number" name="zip_code" id="zip_code" class="form-control form-store"
                                    value="123999">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country" class="form-control form-store"
                                    value="Indonesia">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">Mobile</label>
                                <input type="tel" name="phone_number" id="phone_number" class="form-control form-store"
                                    value="+628 2020 11111">
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <h2 class="mb-2">
                                Payment Information
                            </h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-2">
                            <div class="product-title">IDR 0</div>
                            <div class="product-subtitle mb-3">Country Tax</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title">IDR 0</div>
                            <div class="product-subtitle">Product Insurance</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title">IDR 0</div>
                            <div class="product-subtitle">Ship to Jakarta</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title text-success">IDR {{ number_format($totalPrice) ?? 0 }}</div>
                            <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-8 col-md-3">
                            <button type="submit" class="btn btn-success btn-block px-4 mt-1">Checkout Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                this.getProvincesData();
                AOS.init();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null,
            },
            methods: {
                getProvincesData: function() {
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                        .then(function(response) {
                            self.provinces = response.data;
                        })
                },
                getRegenciesData: function() {
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function(response) {
                            self.regencies = response.data;
                        })
                },
            },
            watch: {
                provinces_id: function(val, oldval) {
                    this.regencies_id = null;
                    this.getRegenciesData();
                }
            }
            
        }); 
    </script>
@endpush


