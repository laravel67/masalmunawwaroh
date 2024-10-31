<form id="logoutForm" action="{{ route('logout') }}" method="post" class="d-none">
    @csrf
    {{ $slot }}
</form>

@push('js')
    <script>
        function logout() {
            Swal.fire({
                title: "Yakin ingin Keluar?",
                text: "Aksi ini akan mengeluarkan anda dari semua sesi. Silakan masuk kembali untuk mengakses halaman ini.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#008000",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Keluar",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        }
    </script>
@endpush
