<x-app-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="driver"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Driver"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">

                        <div class="card my-4">
                            <div class="d-flex justify-content-between align-items-center px-4 pt-4">
                                <div>
                                    <p class="mb-0 text-sm text-secondary">
                                        Halaman ini digunakan untuk mengelola data driver. Anda dapat menambah, mengedit,
                                        dan menghapus driver sesuai kebutuhan.
                                    </p>
                                </div>
                                <div class="me-3 my-3 text-end">
                                    <button class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                        data-bs-target="#addDriverModal">
                                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Driver
                                    </button>
                                </div>
                            </div>
                            <x-modal.add-driver-modal></x-modal.add-driver-modal>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ID</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    PHOTO</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    NAME</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    PHONE NUMBER</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    LICENSE NUMBER</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($drivers as $index => $driver)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <p class="mb-0 text-sm">{{ $index + 1 }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="{{ asset($driver->user->photo ?? 'assets/img/default-avatar.png') }}"
                                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                                    alt=" {{$driver->user->photo ?? 'assets/img/default-avatar.png' }}">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $driver->user->name }}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs text-secondary mb-0">{{ $driver->phone_number }}</p>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $driver->license_number }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('driver.edit', $driver->id) }}"
                                                            class="btn btn-success btn-link" title="Edit">
                                                            <i class="material-icons">edit</i>
                                                        </a>

                                                        <!-- Delete Button trigger modal -->
                                                        <button type="button" class="btn btn-danger btn-link"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteDriverModal{{ $driver->id }}"
                                                            title="Delete">
                                                            <i class="material-icons">close</i>
                                                        </button>

                                                        <!-- Delete Confirmation Modal -->
                                                        <div class="modal fade" id="deleteDriverModal{{ $driver->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="deleteDriverModalLabel{{ $driver->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="deleteDriverModalLabel{{ $driver->id }}">
                                                                            Delete Driver</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete this driver?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form
                                                                            action="{{ route('driver.destroy', $driver->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <x-alert />
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>

    <x-plugins></x-plugins>
</x-app-layout>
