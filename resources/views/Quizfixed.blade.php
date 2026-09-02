@extends('layouts.dashboard')

<form action="{{ route('Quizstore') }}" method="POST" class="card shadow-sm border-0 p-4 mx-auto" style="max-width: 700px;">
    @csrf

    <input type="hidden" name="test_id" value="{{ $test->id }}">

    <div class="mb-3">
        <label for="name" class="form-label fw-semibold">Question:</label>
        <input type="text"
            id="name"
            name="question_text"
            class="form-control"
            placeholder="Enter your question"
            required>
    </div>

    <div class="mb-3">
        <label for="option1" class="form-label fw-semibold">Option 1:</label>
        <input type="text"
            id="option1"
            name="options[]"
            class="form-control"
            placeholder="Enter option 1"
            required>
    </div>

    <div class="mb-3">
        <label for="option2" class="form-label fw-semibold">Option 2:</label>
        <input type="text"
            id="option2"
            name="options[]"
            class="form-control"
            placeholder="Enter option 2"
            required>
    </div>

    <div class="mb-3">
        <label for="option3" class="form-label fw-semibold">Option 3:</label>
        <input type="text"
            id="option3"
            name="options[]"
            class="form-control"
            placeholder="Enter option 3"
            required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Correct option:</label>

        <div class="d-flex gap-4 mt-2">
            <div class="form-check">
                <input class="form-check-input"
                    type="radio"
                    name="correct_option"
                    value="0"
                    required>
                <label class="form-check-label light">
                    Option 1
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                    type="radio"
                    name="correct_option"
                    value="1">
                <label class="form-check-label light">
                    Option 2
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                    type="radio"
                    name="correct_option"
                    value="2">
                <label class="form-check-label light">
                    Option 3
                </label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">
        Submit Data
    </button>
</form>

@section('content')
@endsection