<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-info me-3'
        },
        buttonsStyling: false
    })

    $('.soft-delete-btn').on('click', function (event) {
        let form = $(this).closest('form');
        event.preventDefault();

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to recover this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Record has been deleted.',
                    'success'
                ).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                })
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Record is safe :)',
                    'error'
                )
            }
        })

    })

</script>
