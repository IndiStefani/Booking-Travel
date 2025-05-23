@if (session('success') || session('error') || session('warning'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: @json(session('success') ? 'Success' : (session('error') ? 'Error' : 'Warning')),
                text: @json(session('success') ?? (session('error') ?? session('warning'))),
                icon: @json(session('success') ? 'success' : (session('error') ? 'error' : 'warning')),
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
