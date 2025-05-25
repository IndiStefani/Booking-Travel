<div class="modal fade" id="addDriverModal" tabindex="-1" aria-labelledby="addDriverModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDriverModalLabel">Add New Driver</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('driver.store') }}" method="POST">
                @csrf
                <x-alert type="success"/>
                <x-alert type="error"/>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="license_number" class="form-label">License Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="license_number" name="license_number" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Driver</button>
                </div>
            </form>
        </div>
    </div>
</div>
