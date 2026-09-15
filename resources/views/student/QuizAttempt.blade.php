@extends('layouts.dashboard')

<div class="container py-3 py-md-5">
    <div class="quiz-container quiz-entry card border-0 shadow-sm mx-auto">
        <div class="card-body p-3 p-md-5">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-3">
                <div>
                    <h4 class="mb-1 fw-bold text-break">
                        {{ $test->title }}
                    </h4>

                    <small class="text-muted">
                        Total Questions: {{ $questions->count() }}
                    </small>
                </div>

                <span class="badge bg-primary rounded-pill px-3 py-2 align-self-start align-self-sm-center">
                    <span id="currentQuestion">1</span>
                    /
                    {{ $questions->count() }}
                </span>
            </div>

            <div
                class="progress mb-4 rounded-pill"
                role="progressbar"
                aria-label="Quiz progress"
                style="height: 8px;"
            >
                <div
                    class="progress-bar progress-bar-striped progress-bar-animated rounded-pill"
                    id="progressBar"
                    style="width: 0%;"
                ></div>
            </div>

            <form action="{{ route('Quizstore') }}" method="POST" id="quizForm">
                @csrf

                <input
                    type="hidden"
                    name="test_id"
                    value="{{ $test->id }}"
                >

                @forelse ($questions as $question)
                    <div
                        class="step {{ $loop->first ? 'active' : '' }}"
                        data-step="{{ $loop->iteration }}"
                    >
                        <div class="mb-4">
                            <span class="badge bg-primary rounded-pill mb-3 px-3 py-2">
                                Question {{ $loop->iteration }}
                            </span>

                            <h5 class="fw-bold mb-0 lh-base text-break">
                                {{ $question->question_text }}
                            </h5>
                        </div>

                        <div class="options">
                            @foreach ($question->options as $option)
                                <label class="option d-flex align-items-center border rounded-3 p-3 mb-3">
                                    <input
                                        type="radio"
                                        name="answers[{{ $question->id }}]"
                                        value="{{ $option->id }}"
                                        class="form-check-input me-3 flex-shrink-0"
                                    >

                                    <span class="text-break">
                                        {{ $option->option_text }}
                                    </span>
                                </label>
                            @endforeach
                        </div>

                        <div class="buttons d-flex justify-content-between gap-2 mt-4">
                            <button
                                type="button"
                                class="prev-btn btn btn-outline-secondary rounded-pill px-3 px-md-4"
                                {{ $loop->first ? 'disabled' : '' }}
                            >
                                <i class="bi bi-arrow-left me-1"></i>
                                Previous
                            </button>

                            @if ($loop->last)
                                <button
                                    type="submit"
                                    class="next-btn btn btn-success rounded-pill px-3 px-md-4"
                                    disabled
                                >
                                    <i class="bi bi-check-circle me-1"></i>
                                    Submit Quiz
                                </button>
                            @else
                                <button
                                    type="button"
                                    class="next-btn btn btn-primary rounded-pill px-3 px-md-4"
                                    disabled
                                >
                                    Next
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning text-center mb-0">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        No questions are available for this quiz.
                    </div>
                @endforelse
            </form>
        </div>
    </div>
</div>

<style>
    .quiz-container {
        max-width: 800px;
        border-radius: 16px;
    }

    .quiz-entry {
        opacity: 0;
        transform: translateY(60px);
        animation: quizCardSlideUp 0.7s ease-out forwards;
    }

    @keyframes quizCardSlideUp {
        from {
            opacity: 0;
            transform: translateY(60px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .option {
        cursor: pointer;
        background-color: #ffffff;
        border: 2px solid #dee2e6 !important;
        transition:
            transform 0.2s ease,
            border-color 0.2s ease,
            background-color 0.2s ease,
            box-shadow 0.2s ease;
    }

    .option:hover {
        transform: translateY(-3px);
        border-color: #0d6efd !important;
        background-color: #f8faff;
        box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.1);
    }

    .option.selected {
        transform: translateY(-2px);
        border-color: #0d6efd !important;
        background-color: #eef5ff;
        box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.12);
    }

    .option input[type="radio"] {
        cursor: pointer;
        accent-color: #0d6efd;
    }

    .option input[type="radio"]:checked ~ span {
        color: #0d6efd;
        font-weight: 600;
    }

    .step {
        display: none;
    }

    .step.active {
        display: block;
        animation: questionSlideUp 0.5s ease-out;
    }

    @keyframes questionSlideUp {
        from {
            opacity: 0;
            transform: translateY(45px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #progressBar {
        transition: width 0.4s ease;
    }

    @media (prefers-reduced-motion: reduce) {
        .quiz-entry,
        .step.active {
            opacity: 1;
            transform: none;
            animation: none;
        }

        .option,
        #progressBar {
            transition: none;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const steps = document.querySelectorAll('.step');
        const progressBar = document.getElementById('progressBar');
        const currentQuestion = document.getElementById('currentQuestion');
        const quizContainer = document.querySelector('.quiz-container');

        let currentStep = 0;
        const totalSteps = steps.length;

        if (totalSteps === 0) {
            return;
        }

        document.querySelectorAll('input[type="radio"]').forEach(function (radio) {
            radio.addEventListener('change', function () {
                const step = this.closest('.step');
                const nextButton = step.querySelector('.next-btn');

                step.querySelectorAll('.option').forEach(function (option) {
                    option.classList.remove('selected');
                });

                this.closest('.option').classList.add('selected');

                if (nextButton) {
                    nextButton.disabled = false;
                }
            });
        });

        document.querySelectorAll('.next-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                if (this.type === 'submit') {
                    return;
                }

                if (currentStep < totalSteps - 1) {
                    currentStep++;
                    updateStep();
                }
            });
        });

        document.querySelectorAll('.prev-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                if (currentStep > 0) {
                    currentStep--;
                    updateStep();
                }
            });
        });

        function updateStep() {
            steps.forEach(function (step) {
                step.classList.remove('active');
            });

            const activeStep = steps[currentStep];

            if (!activeStep) {
                return;
            }

            void activeStep.offsetWidth;
            activeStep.classList.add('active');

            currentQuestion.textContent = currentStep + 1;

            progressBar.style.width =
                ((currentStep + 1) / totalSteps) * 100 + '%';

            const previousButton = activeStep.querySelector('.prev-btn');
            const nextButton = activeStep.querySelector('.next-btn');
            const selectedAnswer = activeStep.querySelector(
                'input[type="radio"]:checked'
            );

            if (previousButton) {
                previousButton.disabled = currentStep === 0;
            }

            if (nextButton) {
                nextButton.disabled = !selectedAnswer;
            }

            quizContainer.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        updateStep();
    });
</script>

 <script>
const T = Swal.mixin({ toast: true, position: 'top-end', timer: 1200, showConfirmButton: false });

// Answer select
document.addEventListener('change', e => {
    if (e.target.name?.includes('answers')) {
        T.fire({ icon: 'success', title: '✅ Answer Selected' });
        document.querySelector('.next-btn')?.removeAttribute('disabled');
    }
});

// Next button
document.addEventListener('click', e => {
    if (e.target.closest('.next-btn:not(:disabled)')) {
        e.preventDefault();
        const btn = e.target.closest('.next-btn');
        if (btn.textContent.includes('Submit')) {
            Swal.fire({
                icon: 'success',
                title: '🎉 Quiz Submitted!',
                text: 'Your answers have been saved.',
                confirmButtonColor: '#198754'
            }).then(() => document.getElementById('quizForm').submit());
        } else {
            T.fire({ icon: 'info', title: '➡️ Next Question' });
        }
    }
});

// Previous button
document.addEventListener('click', e => {
    if (e.target.closest('.prev-btn:not(:disabled)')) {
        e.preventDefault();
        T.fire({ icon: 'info', title: '⬅️ Previous Question' });
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content')

@endsection