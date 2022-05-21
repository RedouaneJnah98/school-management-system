@if(session('success'))
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-gray'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: true,
        })
    </script>
@endif
