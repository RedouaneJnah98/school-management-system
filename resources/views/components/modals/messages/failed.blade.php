@if(session('failed'))
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-gray'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('failed') }}',
        })
    </script>
@endif
