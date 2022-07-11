@props(['teachers', 'students', 'parents'])

<script>
    const data = {
        labels: ['Teachers', 'Students', 'Parents'],
        series: [
            [{{ $teachers }}, {{ $students }}, {{ $parents }}],

        ]
    };

    const options = {
        seriesBarDistance: 10,
        plugins: [
            Chartist.plugins.tooltip(),
        ]
    };

    const responsiveOptions = [
        ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
                labelInterpolationFnc: function (value) {
                    return value[0];
                }
            }
        }]
    ];

    new Chartist.Bar('.ct-chart', data, options, responsiveOptions);

</script>
