{{--@props(['schedules'])--}}

<div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">
        <ul>
            <li><span>08:00</span></li>
            <li><span>08:30</span></li>
            <li><span>09:00</span></li>
            <li><span>09:30</span></li>
            <li><span>10:00</span></li>
            <li><span>10:30</span></li>
            <li><span>11:00</span></li>
            <li><span>11:30</span></li>
            <li><span>12:00</span></li>
            <li><span>12:30</span></li>
            <li><span>13:00</span></li>
            <li><span>13:30</span></li>
            <li><span>14:00</span></li>
            <li><span>14:30</span></li>
            <li><span>15:00</span></li>
            <li><span>15:30</span></li>
            <li><span>16:00</span></li>
            <li><span>16:30</span></li>
            <li><span>17:00</span></li>
        </ul>
    </div> <!-- .cd-schedule__timeline -->

    <div class="cd-schedule__events">
        <ul>
            <li class="cd-schedule__group">
                <div class="cd-schedule__top-info">
                    <span>Monday</span>
                </div>

                <ul>
                    @foreach(collect($classes->schedules) as $routine)
                        @if($routine->day === 'monday')
                            @php
                                $start_time = strtotime($routine->start_time);
                                $end_time = strtotime($routine->end_time);
                            @endphp
                            <li class="cd-schedule__event">
                                <a data-start="{{ date('H:i', $start_time) }}"
                                   data-end="{{ date('H:i', $end_time) }}" data-event="event-1"
                                   href="#0">
                                    @foreach($routine->subjects as $subject)
                                        <em class="cd-schedule__name">{{ $subject->name }}</em>
                                    @endforeach
                                    @foreach($routine->teachers as $teacher)
                                        <p class="text-gray-50 text-sm">{{ $teacher->fullName }}</p>
                                    @endforeach
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

            <li class="cd-schedule__group">
                <div class="cd-schedule__top-info"><span>Tuesday</span></div>

                <ul>
                    @foreach(collect($classes->schedules) as $routine)
                        @if($routine->day === 'tuesday')
                            @php
                                $start_time = strtotime($routine->start_time);
                                $end_time = strtotime($routine->end_time);
                            @endphp
                            <li class="cd-schedule__event">
                                <a data-start="{{ date('H:i', $start_time) }}"
                                   data-end="{{ date('H:i', $end_time) }}" data-event="event-2"
                                   href="#0">
                                    @foreach($routine->subjects as $subject)
                                        <em class="cd-schedule__name">{{ $subject->name }}</em>
                                    @endforeach
                                    @foreach($routine->teachers as $teacher)
                                        <p class="text-gray-50 text-sm">{{ $teacher->fullName }}</p>
                                    @endforeach
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

            <li class="cd-schedule__group">
                <div class="cd-schedule__top-info"><span>Wednesday</span></div>

                <ul>
                    @foreach($classes->schedules as $routine)
                        @if($routine->day === 'wednesday')
                            @php
                                $start_time = strtotime($routine->start_time);
                                $end_time = strtotime($routine->end_time);
                            @endphp
                            <li class="cd-schedule__event">
                                <a data-start="{{ date('H:i', $start_time) }}"
                                   data-end="{{ date('H:i', $end_time) }}" data-event="event-3"
                                   href="#0">
                                    @foreach($routine->subjects as $subject)
                                        <em class="cd-schedule__name">{{ $subject->name }}</em>
                                    @endforeach
                                    @foreach($routine->teachers as $teacher)
                                        <p class="text-gray-50 text-sm">{{ $teacher->fullName }}</p>
                                    @endforeach
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

            <li class="cd-schedule__group">
                <div class="cd-schedule__top-info"><span>Thursday</span></div>

                <ul>
                    @foreach(collect($classes->schedules) as $routine)
                        @if($routine->day === 'thursday')
                            @php
                                $start_time = strtotime($routine->start_time);
                                $end_time = strtotime($routine->end_time);
                            @endphp
                            <li class="cd-schedule__event">
                                <a data-start="{{ date('H:i', $start_time) }}"
                                   data-end="{{ date('H:i', $end_time) }}" data-event="event-4"
                                   href="#0">
                                    @foreach($routine->subjects as $subject)
                                        <em class="cd-schedule__name">{{ $subject->name }}</em>
                                    @endforeach
                                    @foreach($routine->teachers as $teacher)
                                        <p class="text-gray-50 text-sm">{{ $teacher->fullName }}</p>
                                    @endforeach
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

            <li class="cd-schedule__group">
                <div class="cd-schedule__top-info"><span>Friday</span></div>

                <ul>
                    @foreach(collect($classes->schedules) as $routine)
                        @if($routine->day === 'friday')
                            @php
                                $start_time = strtotime($routine->start_time);
                                $end_time = strtotime($routine->end_time);
                            @endphp
                            <li class="cd-schedule__event">
                                <a data-start="{{ date('H:i', $start_time) }}"
                                   data-end="{{ date('H:i', $end_time) }}" data-event="event-1"
                                   href="#0">
                                    @foreach($routine->subjects as $subject)
                                        <em class="cd-schedule__name">{{ $subject->name }}</em>
                                    @endforeach
                                    @foreach($routine->teachers as $teacher)
                                        <p class="text-gray-50 text-sm">{{ $teacher->fullName }}</p>
                                    @endforeach
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>

    <div class="cd-schedule-modal">
        <header class="cd-schedule-modal__header">
            <div class="cd-schedule-modal__content">
                <span class="cd-schedule-modal__date"></span>
                <h3 class="cd-schedule-modal__name"></h3>
            </div>

            <div class="cd-schedule-modal__header-bg"></div>
        </header>

        <div class="cd-schedule-modal__body">
            <div class="cd-schedule-modal__event-info"></div>
            <div class="cd-schedule-modal__body-bg"></div>
        </div>

        <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>

    <div class="cd-schedule__cover-layer"></div>
</div>


{{--<script>--}}
{{--    $(document).ready(function () {--}}

{{--    })--}}
{{--</script>--}}


{{--<div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">--}}
{{--    <div class="cd-schedule__timeline">--}}
{{--        <ul>--}}
{{--            <li><span>08:00</span></li>--}}
{{--            <li><span>08:30</span></li>--}}
{{--            <li><span>09:00</span></li>--}}
{{--            <li><span>09:30</span></li>--}}
{{--            <li><span>10:00</span></li>--}}
{{--            <li><span>10:30</span></li>--}}
{{--            <li><span>11:00</span></li>--}}
{{--            <li><span>11:30</span></li>--}}
{{--            <li><span>12:00</span></li>--}}
{{--            <li><span>12:30</span></li>--}}
{{--            <li><span>13:00</span></li>--}}
{{--            <li><span>13:30</span></li>--}}
{{--            <li><span>14:00</span></li>--}}
{{--            <li><span>14:30</span></li>--}}
{{--            <li><span>15:00</span></li>--}}
{{--            <li><span>15:30</span></li>--}}
{{--            <li><span>16:00</span></li>--}}
{{--            <li><span>16:30</span></li>--}}
{{--            <li><span>17:00</span></li>--}}
{{--            <li><span>17:30</span></li>--}}
{{--            <li><span>18:00</span></li>--}}
{{--        </ul>--}}
{{--    </div> <!-- .cd-schedule__timeline -->--}}

{{--    <div class="cd-schedule__events">--}}
{{--        <ul>--}}
{{--            <li class="cd-schedule__group">--}}
{{--                <div class="cd-schedule__top-info"><span>Monday</span></div>--}}

{{--                <ul>--}}
{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="08:30" data-end="09:30" data-event="event-1" href="#0">--}}
{{--                            <em class="cd-schedule__name">Abs Circuit</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="09:45" data-end="10:30" data-event="event-2" href="#0">--}}
{{--                            <em class="cd-schedule__name">Abs Circuit</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="11:00" data-end="12:30" data-event="event-3" href="#0">--}}
{{--                            <em class="cd-schedule__name">Rowing Workout</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="14:00" data-end="15:15" data-event="event-4" href="#0">--}}
{{--                            <em class="cd-schedule__name">Yoga Level 1</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="cd-schedule__group">--}}
{{--                <div class="cd-schedule__top-info"><span>Tuesday</span></div>--}}

{{--                <ul>--}}
{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="10:00" data-end="11:00" data-event="event-2" href="#0">--}}
{{--                            <em class="cd-schedule__name">Rowing Workout</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="11:30" data-end="13:00" data-event="event-4" href="#0">--}}
{{--                            <em class="cd-schedule__name">Restorative Yoga</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="13:30" data-end="15:00" data-event="event-1" href="#0">--}}
{{--                            <em class="cd-schedule__name">Abs Circuit</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="15:45" data-end="16:45" data-event="event-3" href="#0">--}}
{{--                            <em class="cd-schedule__name">Yoga Level 1</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="cd-schedule__group">--}}
{{--                <div class="cd-schedule__top-info"><span>Wednesday</span></div>--}}

{{--                <ul>--}}
{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="09:00" data-end="10:15" data-event="event-4" href="#0">--}}
{{--                            <em class="cd-schedule__name">Restorative Yoga</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="10:45" data-end="11:45" data-event="event-3" href="#0">--}}
{{--                            <em class="cd-schedule__name">Yoga Level 1</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="12:00" data-end="13:45" data-event="event-2" href="#0">--}}
{{--                            <em class="cd-schedule__name">Rowing Workout</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="13:45" data-end="15:00" data-event="event-3" href="#0">--}}
{{--                            <em class="cd-schedule__name">Yoga Level 1</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="cd-schedule__group">--}}
{{--                <div class="cd-schedule__top-info"><span>Thursday</span></div>--}}

{{--                <ul>--}}
{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="09:30" data-end="10:30" data-event="event-1" href="#0">--}}
{{--                            <em class="cd-schedule__name">Abs Circuit</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="12:00" data-end="13:45" data-event="event-4" href="#0">--}}
{{--                            <em class="cd-schedule__name">Restorative Yoga</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="15:30" data-end="16:30" data-event="event-1" href="#0">--}}
{{--                            <em class="cd-schedule__name">Abs Circuit</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="17:00" data-end="18:00" data-event="event-2" href="#0">--}}
{{--                            <em class="cd-schedule__name">Rowing Workout</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="cd-schedule__group">--}}
{{--                <div class="cd-schedule__top-info"><span>Friday</span></div>--}}

{{--                <ul>--}}
{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="10:00" data-end="11:00" data-event="event-2" href="#0">--}}
{{--                            <em class="cd-schedule__name">Rowing Workout</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="12:30" data-end="14:00" data-event="event-1" href="#0">--}}
{{--                            <em class="cd-schedule__name">Abs Circuit</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="cd-schedule__event">--}}
{{--                        <a data-start="15:45" data-end="16:45" data-event="event-3" href="#0">--}}
{{--                            <em class="cd-schedule__name">Yoga Level 1</em>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}

{{--    <div class="cd-schedule-modal">--}}
{{--        <header class="cd-schedule-modal__header">--}}
{{--            <div class="cd-schedule-modal__content">--}}
{{--                <span class="cd-schedule-modal__date"></span>--}}
{{--                <h3 class="cd-schedule-modal__name"></h3>--}}
{{--            </div>--}}

{{--            <div class="cd-schedule-modal__header-bg"></div>--}}
{{--        </header>--}}

{{--        <div class="cd-schedule-modal__body">--}}
{{--            <div class="cd-schedule-modal__event-info"></div>--}}
{{--            <div class="cd-schedule-modal__body-bg"></div>--}}
{{--        </div>--}}

{{--        <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>--}}
{{--    </div>--}}

{{--    <div class="cd-schedule__cover-layer"></div>--}}
{{--</div>--}}

<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>


