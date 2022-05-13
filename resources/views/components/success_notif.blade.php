@if(session('success'))
    <script>
        const notyf = new Notyf({
            duration: 5000,
            position: {
                x: 'right',
                y: 'top',
            },
        });

        notyf.open({
            type: 'success',
            message: "{{ session('success') }}"
        });
    </script>
@endif
