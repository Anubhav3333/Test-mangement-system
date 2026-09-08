@extends('layouts.dashboard')

@section('content')

<div class="container py-5">

    <div class="quiz-container card border-0 shadow-sm mx-auto" style="max-width: 800px;">

        <div class="card-body p-4 p-md-5">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="mb-1">{{ $test->title }}</h4>

                    <small class="text-muted">
                        Total Questions: {{ $questions->count() }}
                    </small>
                </div>

                <span class="badge bg-primary">
                    <span id="currentQuestion">1</span> /
                    {{ $questions->count() }}
                </span>
            </div>

            <div class="progress mb-4" style="height: 8px;">
                <div
                    class="progress-bar"
                    id="progressBar"
                    style="width: 0%;">
                </div>
            </div>

            <form action="{{ route('Quizstore') }}" method="POST">

                @csrf

                <input type="hidden" name="test_id" value="{{ $test->id }}">

                @foreach($questions as $index => $question)

                <div
                    class="step {{ $index === 0 ? 'active' : '' }}"
                    data-step="{{ $index + 1 }}">

                    <div class="mb-4">

                        <span class="badge bg-primary mb-3">
                            Question {{ $index + 1 }}
                        </span>

                        <h5 class="fw-bold mb-0">
                            {{ $question->question_text }}
                        </h5>

                    </div>

                    <div class="options">

                        @foreach($question->options as $option)

                        <label class="option d-flex align-items-center border rounded-3 p-3 mb-3">

                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}"
                                class="form-check-input me-3">

                            <span>
                                {{ $option->option_text }}
                            </span>

                        </label>

                        @endforeach

                    </div>

                    <div class="buttons d-flex justify-content-between mt-4">

                        <button
                            type="button"
                            class="prev-btn btn btn-outline-secondary"
                            {{ $index === 0 ? 'disabled' : '' }}>
                            Previous
                        </button>

                        @if($index === $questions->count() - 1)

                        <button
                            type="submit"
                            class="next-btn btn btn-success"
                            disabled>
                            Submit Quiz
                        </button>

                        @else

                        <button
                            type="button"
                            class="next-btn btn btn-primary"
                            disabled>
                            Next
                        </button>

                        @endif

                    </div>

                </div>

                @endforeach

            </form>

        </div>

    </div>

</div>


<style>
    .quiz-container {
        border-radius: 16px;
    }

    .option {
        cursor: pointer;
        transition: 0.2s;
        background: #fff;
        border: 2px solid #dee2e6 !important;
    }

    .option:hover {
        border-color: #0d6efd !important;
        background: #f8faff;
    }

    .option.selected {
        border-color: #0d6efd !important;
        background: #eef5ff;
    }

    .option input[type="radio"] {
        accent-color: #0d6efd;
    }

    .option input[type="radio"]:checked~span {
        color: #0d6efd;
        font-weight: 600;
    }

    .step {
        display: none;
    }

    .step.active {
        display: block;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const steps = document.querySelectorAll('.step');
        const progressBar = document.getElementById('progressBar');
        const currentQuestion = document.getElementById('currentQuestion');

        let currentStep = 1;
        const totalSteps = steps.length;

        document.querySelectorAll('input[type="radio"]').forEach(radio => {

            radio.addEventListener('change', function() {

                const step = this.closest('.step');

                step.querySelectorAll('.option').forEach(option => {
                    option.classList.remove('selected');
                });

                this.closest('.option').classList.add('selected');

                step.querySelector('.next-btn').disabled = false;

            });

        });

        document.querySelectorAll('.next-btn').forEach(button => {

            button.addEventListener('click', function() {

                if (this.type === 'submit') {
                    return;
                }

                currentStep++;

                updateStep();

            });

        });

        document.querySelectorAll('.prev-btn').forEach(button => {

            button.addEventListener('click', function() {

                currentStep--;

                updateStep();

            });

        });

        function updateStep() {

            steps.forEach(step => {
                step.classList.remove('active');
            });

            const activeStep = document.querySelector(
                `.step[data-step="${currentStep}"]`
            );

            activeStep.classList.add('active');

            currentQuestion.textContent = currentStep;

            progressBar.style.width =
                (currentStep / totalSteps) * 100 + '%';

            const prevBtn = activeStep.querySelector('.prev-btn');
            const nextBtn = activeStep.querySelector('.next-btn');

            prevBtn.disabled = currentStep === 1;

            const selected = activeStep.querySelector(
                'input[type="radio"]:checked'
            );

            nextBtn.disabled = !selected;

        }

        progressBar.style.width =
            (1 / totalSteps) * 100 + '%';

    });
</script>

@endsection