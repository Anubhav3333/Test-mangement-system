@extends('layouts.dashboard')
<main class="container py-4 py-md-5">
    <header class="card result-header border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4 p-lg-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge bg-primary-subtle text-primary rounded-pill mb-3 px-3 py-2">
                        QUIZ RESULT
                    </span>

                    <h1 class="display-6 fw-bold mb-3">
                        {{auth()->user()->name}} Result
                    </h1>



                    <div class="progress rounded-pill mt-4" style="height: 10px;">
                        <div
                            id="scoreProgressBar"
                            class="progress-bar rounded-pill bg-{{ $result === 'Pass' ? 'success' : 'danger' }}"
                            role="progressbar"
                            data-score="{{ min(100, max(0, $scorePercentage)) }}"
                            style="width: 0%;"
                            aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="alert alert-primary border-0 shadow-sm rounded-4 mb-0">
                        <h4 class="alert-heading fw-bold mb-3">
                            <i class="bi bi-bar-chart-fill me-2"></i>
                            Score Summary
                        </h4>

                        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                            <span>Total Questions:</span>
                            <strong>{{ $attempt->test->total_questions }}</strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                            <span>Attempted:</span>
                            <strong>
                                {{ $totalAnswers }} / {{ $attempt->test->total_questions }}
                            </strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                            <span>Correct:</span>
                            <strong>{{ $correctCount }}</strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                            <span>Wrong:</span>
                            <strong>{{ $totalAnswers -$correctCount }}</strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                            <span>Unanswered:</span>
                            <strong>
                                {{ max(0, $attempt->test->total_questions - $totalAnswers) }}
                            </strong>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                            <span>Score:</span>
                            <strong>
                                {{ number_format($score, 2) }}
                                
                                {{ number_format($totalMarks, 2) }}
                            </strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                            <span>Percentage:</span>
                            <strong>{{ number_format($scorePercentage, 2) }}%</strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                            <span>Passing Marks:</span>
                            <strong>{{ number_format($passingMarks, 2) }}</strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <span>Result:</span>

                            @if ($result === 'Pass')
                            <span class="badge bg-success rounded-pill px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>
                                Pass
                            </span>
                            @else
                            <span class="badge bg-danger rounded-pill px-3 py-2">
                                <i class="bi bi-x-circle-fill me-1"></i>
                                Fail
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-4">
                <i class="bi bi-list-check me-2"></i>
                Attempted Questions
            </h4>

            @forelse ($answers as $answer)
            <div class="border rounded-4 p-3 mb-3">
                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                    <h5 class="fw-bold mb-0">
                        Question {{ $loop->iteration }}
                    </h5>
                </div>

                <p class="fw-semibold mb-3">
                    {{ $answer->question?->question_text ?? 'Question not available' }}
                </p>

                <div class="alert alert-{{ $answer->is_correct  }} mb-0">
                    <strong>Selected Answer:</strong>

                    {{ $answer->selectedOption?->option_text ?? 'No answer selected' }}
                </div>
            </div>
            @empty
            <div class="alert alert-warning text-center mb-0">
                No attempted questions found.
            </div>
            @endforelse
        </div>
    </div>





    <style>
        .result-header {
            opacity: 0;
            transform: translateY(60px);
            animation: resultSlideUp 0.7s ease-out forwards;
        }

        .answer-card-animate {
            opacity: 0;
            transform: translateY(60px);
            animation: resultSlideUp 0.7s ease-out forwards;
        }

        .result-empty {
            opacity: 0;
            transform: translateY(60px);
            animation: resultSlideUp 0.7s ease-out 0.2s forwards;
        }

        .result-footer {
            opacity: 0;
            transform: translateY(40px);
            animation: resultSlideUp 0.6s ease-out 0.4s forwards;
        }

        @keyframes resultSlideUp {
            from {
                opacity: 0;
                transform: translateY(60px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .answer-card {
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .answer-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.12) !important;
        }

        #scoreProgressBar {
            transition: width 1.2s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {

            .result-header,
            .answer-card-animate,
            .result-empty,
            .result-footer {
                opacity: 1;
                transform: none;
                animation: none;
            }

            .answer-card,
            #scoreProgressBar {
                transition: none;
            }

            .answer-card:hover {
                transform: none;
            }
        }
    </style>


    @section('content')
    @endsection