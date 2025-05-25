<x-app-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="user-management"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='User Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/img/default-avatar.png') }}"
                                alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                {{ $user->getRoleNames()->first() ?? 'User' }}
                            </p>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center mt-3 mt-sm-0">
                        <div class="nav-wrapper position-relative end-0">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                                <i class="material-icons text-lg position-relative">arrow_back</i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Profile Information</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control border border-2 p-2"
                                        value='{{ old('email', $user->email) }}'>
                                    @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control border border-2 p-2"
                                        value='{{ old('name', $user->name) }}'>
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control border border-2 p-2"
                                        value='{{ old('username', $user->username) }}'>
                                    @error('username')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control border border-2 p-2"
                                        value=''>
                                    @error('password')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone_number" class="form-control border border-2 p-2"
                                        value='{{ old('phone_number', optional($user->passenger)->phone_number ?? optional($user->driver)->phone_number) }}'>
                                    @error('phone_number')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                @if ($user->passenger)
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control border border-2 p-2"
                                            value="{{ old('address', optional($user->passenger)->address) }}">
                                        @error('address')
                                            <p class="text-danger inputerror">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @elseif ($user->driver)
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">License Number</label>
                                        <input type="text" name="license_number"
                                            class="form-control border border-2 p-2"
                                            value="{{ old('license_number', optional($user->driver)->license_number) }}">
                                        @error('license_number')
                                            <p class="text-danger inputerror">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif

                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn bg-gradient-dark">Submit</button>
                            </div>
                            <x-alert />
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-app-layout>
