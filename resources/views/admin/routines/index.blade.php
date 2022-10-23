<x-dashboard_layout>
    @section('title', 'Class Routine')
    {{-- sidebar --}}
    @include('components.admin._sidebar')

    {{-- Navbar --}}
    @include('components.settings.admin.navbar')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Classrooms</li>
                </ol>
            </nav>
            <h2 class="h4">Class Routine</h2>
            <p class="mb-0">Schedule your class routine.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add routine
            </button>

            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow">
        <div class="card-body">
            {{-- Offcanvas --}}
            <x-admin.offcanvas :classes="$classes" :subjects="$subjects"/>

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-3">
                        <select name="" class="form-select" id="">
                            <option selected>Select a class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-gray-200 ms-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                        </svg>
                        Filter
                    </button>
                </div>
            </div>
            <hr class="mt-4">
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
                                @foreach($schedules as $routine)
                                    @if($routine->day === 'monday')
                                        @php
                                            $start_time = strtotime($routine->start_time);
                                            $end_time = strtotime($routine->end_time);
                                        @endphp
                                        <li class="cd-schedule__event">
                                            <a data-start="{{ date('H:i', $start_time) }}"
                                               data-end="{{ date('H:i', $end_time) }}" data-content="event-abs-circuit" data-event="event-{{ $routine->id }}"
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
                                @foreach($schedules as $routine)
                                    @if($routine->day === 'tuesday')
                                        @php
                                            $start_time = strtotime($routine->start_time);
                                            $end_time = strtotime($routine->end_time);
                                        @endphp
                                        <li class="cd-schedule__event">
                                            <a data-start="{{ date('H:i', $start_time) }}"
                                               data-end="{{ date('H:i', $end_time) }}" data-content="event-abs-circuit" data-event="event-{{ $routine->id }}"
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
                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="10:00" data-end="11:00" data-content="event-rowing-workout" data-event="event-2" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Rowing Workout</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="11:30" data-end="13:00" data-content="event-restorative-yoga" data-event="event-4" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Restorative Yoga</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="13:30" data-end="15:00" data-content="event-abs-circuit" data-event="event-1" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Abs Circuit</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="15:45" data-end="16:45" data-content="event-yoga-1" data-event="event-3" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Yoga Level 1</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                            </ul>
                        </li>

                        <li class="cd-schedule__group">
                            <div class="cd-schedule__top-info"><span>Wednesday</span></div>

                            <ul>
                                @foreach($schedules as $routine)
                                    @if($routine->day === 'wednesday')
                                        @php
                                            $start_time = strtotime($routine->start_time);
                                            $end_time = strtotime($routine->end_time);
                                        @endphp
                                        <li class="cd-schedule__event">
                                            <a data-start="{{ date('H:i', $start_time) }}"
                                               data-end="{{ date('H:i', $end_time) }}" data-content="event-abs-circuit" data-event="event-{{ $routine->id }}"
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
                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="09:00" data-end="10:15" data-content="event-restorative-yoga" data-event="event-4" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Restorative Yoga</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="10:45" data-end="11:45" data-content="event-yoga-1" data-event="event-3" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Yoga Level 1</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="12:00" data-end="13:45" data-content="event-rowing-workout" data-event="event-2" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Rowing Workout</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="13:45" data-end="15:00" data-content="event-yoga-1" data-event="event-3" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Yoga Level 1</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                            </ul>
                        </li>

                        <li class="cd-schedule__group">
                            <div class="cd-schedule__top-info"><span>Thursday</span></div>

                            <ul>
                                @foreach($schedules as $routine)
                                    @if($routine->day === 'thursday')
                                        @php
                                            $start_time = strtotime($routine->start_time);
                                            $end_time = strtotime($routine->end_time);
                                        @endphp
                                        <li class="cd-schedule__event">
                                            <a data-start="{{ date('H:i', $start_time) }}"
                                               data-end="{{ date('H:i', $end_time) }}" data-content="event-abs-circuit" data-event="event-{{ $routine->id }}"
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
                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Abs Circuit</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="12:00" data-end="13:45" data-content="event-restorative-yoga" data-event="event-4" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Restorative Yoga</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="15:30" data-end="16:00" data-content="event-abs-circuit" data-event="event-1" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Abs Circuit</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="17:00" data-end="18:00" data-content="event-rowing-workout" data-event="event-2" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Rowing Workout</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                            </ul>
                        </li>

                        <li class="cd-schedule__group">
                            <div class="cd-schedule__top-info"><span>Friday</span></div>

                            <ul>
                                @foreach($schedules as $routine)
                                    @if($routine->day === 'friday')
                                        @php
                                            $start_time = strtotime($routine->start_time);
                                            $end_time = strtotime($routine->end_time);
                                        @endphp
                                        <li class="cd-schedule__event">
                                            <a data-start="{{ date('H:i', $start_time) }}"
                                               data-end="{{ date('H:i', $end_time) }}" data-content="event-abs-circuit" data-event="event-{{ $routine->id }}"
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
                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="10:00" data-end="11:00" data-content="event-rowing-workout" data-event="event-2" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Rowing Workout</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Abs Circuit</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="cd-schedule__event">--}}
                                {{--                                    <a data-start="15:45" data-end="16:45" data-content="event-yoga-1" data-event="event-3" href="#0">--}}
                                {{--                                        <em class="cd-schedule__name">Yoga Level 1</em>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
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
            </div> <!-- .cd-schedule --> <!-- .cd-schedule -->
        </div>
    </div>
</x-dashboard_layout>

{{-- Success Notification --}}
<x-notification.success_notif/>
{{-- Delete Modal --}}
<x-modals.messages.delete/>
{{-- Delete Notification --}}
<x-notification.delete_notif/>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#subject').on('change', function () {
            let value = $(this).val();
            let loader = $('.loading').html();

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.teachersSubject') }}",
                data: {id: value},
                beforeSend: function () {
                    $('#subjectTeacher').html(loader).show();
                },
                complete: function () {
                    $('#hide').hide();
                },
                success: function (data) {
                    $(data).each(function (index, item) {
                        $('#subjectTeacher').append(`<option value="${item.id}" selected>${item.fullName}</option>`);
                    })
                },
            })
        })
    })
</script>
