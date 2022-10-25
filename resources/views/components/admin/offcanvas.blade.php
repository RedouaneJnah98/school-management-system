@props(['classes', 'subjects'])

<form action="{{ route('admin.routines.store') }}" method="POST">
    @csrf

    <div class="offcanvas pb-5 offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Add a class routine</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="col-12 mb-2">
                <label for="inputState" class="form-label">Class</label>
                <select id="inputState" name="class_id" class="form-select">
                    <option>Select a class</option>
                    @forelse($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @empty
                        <option selected disabled>No classroom found</option>
                    @endforelse
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="subject" class="form-label">Subject</label>
                <select id="subject" name="subject_id" class="form-select">
                    <option selected disabled>Select a subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="subjectTeacher" class="form-label">Teacher</label>

                <div class="loading visually-hidden">
                    <option id="hide" class="d-none">Loading...</option>
                </div>

                <select id="subjectTeacher" name="teacher_id" class="form-select">
                    <option selected>Select teacher</option>
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="inputState" class="form-label">Day</label>
                <select id="inputState" name="day" class="form-select">
                    <option selected disabled>Select a day</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="inputState" class="form-label">Starting hour</label>
                <select id="inputState" name="starting_hour" class="form-select">
                    <option selected disabled>Select an hour</option>
                    <option>8AM</option>
                    <option>9AM</option>
                    <option>10AM</option>
                    <option>11AM</option>
                    <option>12PM</option>
                    <option>1PM</option>
                    <option>2PM</option>
                    <option>3PM</option>
                    <option>4PM</option>
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="inputState" class="form-label">Starting minute</label>
                <select id="inputState" name="starting_minute" class="form-select">
                    <option selected disabled>Select a minute</option>
                    <option>00</option>
                    <option>05</option>
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                    <option>25</option>
                    <option>30</option>
                    <option>35</option>
                    <option>40</option>
                    <option>45</option>
                    <option>50</option>
                    <option>55</option>
                </select>
            </div>
            <div class="col-12 mb-2">
                <label for="inputState" class="form-label">Ending hour</label>
                <select id="inputState" name="ending_hour" class="form-select">
                    <option selected disabled>Select an hour</option>
                    <option>8AM</option>
                    <option>9AM</option>
                    <option>10AM</option>
                    <option>11AM</option>
                    <option>12PM</option>
                    <option>1PM</option>
                    <option>2PM</option>
                    <option>3PM</option>
                    <option>4PM</option>
                </select>

            </div>
            <div class="col-12 mb-2">
                <label for="inputState" class="form-label">Ending minute</label>
                <select id="inputState" name="ending_minute" class="form-select">
                    <option selected disabled>Select a minute</option>
                    <option>00</option>
                    <option>05</option>
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                    <option>25</option>
                    <option>30</option>
                    <option>35</option>
                    <option>40</option>
                    <option>45</option>
                    <option>50</option>
                    <option>55</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success text-white mt-3">Add routine</button>
        </div>
    </div>
</form>
