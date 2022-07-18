<x-dashboard_layout>
    @section('title', 'Support')

    {{-- sidebar --}}
    @include('components.student._sidebar')

    {{-- Navbar --}}
    @include('components.settings.student.navbar')

    <div class="alert alert-info mt-5">
        We want to make Ajiale School a better platform for students; If you encounter any issues when using it, please contact us or left a feedback.
    </div>
    <div class="card border-0 shadow mt-2">
        <div class="card-body">
            <form action="{{ route('student.send_message') }}" method="post">
                @csrf

                <label for="textarea">Please send your suggestions, ideas and comments!</label>
                <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Enter your message..." id="textarea" rows="4"></textarea>
                @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <button type="submit" class="btn btn-success mt-4 text-white">Send Message</button>
            </form>
        </div>
    </div>
</x-dashboard_layout>

<x-modals.success/>
<x-modals.failed/>
