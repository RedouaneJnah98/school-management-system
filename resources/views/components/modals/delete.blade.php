<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger me-3',
            cancelButton: 'btn btn-info'
        },
        buttonsStyling: false
    });

    $('.delete-btn').click(function (event) {
        var form = $(this).closest('form');
        event.preventDefault();

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this record!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
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

            }
        })
    })
</script>

