@props(['teachers', 'students', 'parents'])

<script>
    {{--const data = {--}}
    {{--    labels: ['Teachers', 'Students', 'Parents'],--}}
    {{--    series: [--}}
    {{--        [{{ $teachers }}, {{ $students }}, {{ $parents }}],--}}
    {{--        --}}{{--[{{ $students }}],--}}
    {{--        --}}{{--[{{ $parents }}]--}}
    {{--        // [5],--}}
    {{--        // [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],--}}
    {{--        // [3, 2, 9, 5, 3, 4, 7, 8, 6, 5, 2, 15]--}}
    {{--    ]--}}
    {{--};--}}

    {{--const options = {--}}
    {{--    seriesBarDistance: 18,--}}
    {{--    plugins: [--}}
    {{--        Chartist.plugins.tooltip(),--}}
    {{--    ]--}}
    {{--};--}}

    {{--const responsiveOptions = [--}}
    {{--    ['screen and (max-width: 640px)', {--}}
    {{--        seriesBarDistance: 5,--}}
    {{--        axisX: {--}}
    {{--            labelInterpolationFnc: function (value) {--}}
    {{--                return value[0];--}}
    {{--            }--}}
    {{--        }--}}
    {{--    }]--}}
    {{--];--}}

    {{--new Chartist.Bar('.ct-chart', data, options, responsiveOptions);--}}

    var data = {
        labels: ['Teachers', 'Students', 'Parents'],
        series: [
            [{{ $teachers }}, {{ $students }}, {{ $parents }}],

        ]
    };

    var options = {
        seriesBarDistance: 10,
        plugins: [
            Chartist.plugins.tooltip(),
        ]
    };

    var responsiveOptions = [
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
