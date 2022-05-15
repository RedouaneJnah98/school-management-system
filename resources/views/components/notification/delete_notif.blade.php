@if(session('delete'))
    <script>
        const notyf = new Notyf({
            duration: 5000,
            position: {
                x: 'right',
                y: 'top',
            },
            types: [
                {
                    type: 'error',
                    background: 'orange',
                    dismissible: false
                }
            ]
        });

        notyf.open({
            type: 'error',
            message: "{{ session('delete') }}"
        });
    </script>
@endif
