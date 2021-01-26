@extends('layouts.auth')

@section('title')
    Register Page
@endsection

@section('content')
<div class="page-content page-auth" id="register">
    <section class="store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-5">
                    <h2 class="mb-4">
                        Memulai untuk jual beli <br>
                        dengan cara terbaru
                    </h2>
                    <form method="POST" action="{{ route('register') }}" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" v-model="name"
                                autofocus value="{{ old('name') }}" autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" @change="checkEmail()" :class="{'is-invalid' : this.email_unavailable}" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                v-model="email" autofocus value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label>Store</label>
                            <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="is_store_open" id="openStoreTrue"
                                    class="custom-control-input" v-model="is_store_open" :value="true">
                                <label for="openStoreTrue" class="custom-control-label">
                                    Iya, Boleh
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="is_store_open" id="openStoreFalse"
                                    class="custom-control-input" v-model="is_store_open" :value="false">
                                <label for="openStoreFalse" class="custom-control-label">
                                    Enggak, Makasih
                                </label>
                            </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="store_name">Nama Toko</label>
                            <input type="text" name="store_name" id="store_name" v-model="store_name" class="form-control">
                            @error('store_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="categories_id">Category</label>
                            <select name="categories_id" id="categories_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" :disabled="this.email_unavailable" class="btn btn-success btn-block mt-4">Sign Up Now</button>
                        <a href="{{ route('login') }}" class="btn btn-login btn-block mt-2">Back to Sign In</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.use(Toasted);

        var register = new Vue({
            el: '#register',
            mounted() {
                AOS.init();
            },
            methods: {
                checkEmail: function() {
                    let self = this;
                    axios.get('{{ route('api-register-check') }}', {
                        params: {
                            email: this.email
                        }
                    })
                        .then(function (response) {
                            if (response.data == 'available') {
                            self.$toasted.show(
                                    "Email Tersedia silahkan lanjutkan pendaftaran.", {
                                        position: 'top-center',
                                        className: "rounded",
                                        duration: 2000,
                                    }
                                );
                                self.email_unavailable = false;
                            } else {
                                self.$toasted.error(
                                    "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                                        position: 'top-center',
                                        className: "rounded",
                                        duration: 2000,
                                    }
                                );
                                self.email_unavailable = true;
                                
                            }
                            console.log(response);
                });

                }
            },
            data() {
                return {
                    name: "",
                    email: "",
                    is_store_open: true,
                    store_name: '',
                    email_unavailable: false,
                }
            },
        });
    </script>
@endpush
