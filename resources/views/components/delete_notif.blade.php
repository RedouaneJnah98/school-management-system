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
                    type: 'warning',
                    background: 'orange',
                    icon: {
                        className: 'material-icons',
                        tagName: 'i',
                        color: '#fff'
                    },
                    dismissible: false
                }
            ]
        });

        notyf.open({
            type: 'warning',
            message: "{{ session('delete') }}"
        });
    </script>
@endif
