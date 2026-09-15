@extends('layouts.dashboard')
<main class="container py-4 py-md-5">
    <header class="card result-header border-0 shadow-sm rounded-4 mb-4">

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-4 p-lg-5">

                <div class="row align-items-center g-4">

                    <!-- LEFT SIDE -->
                    <div class="col-lg-8">

                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">
                            <i class="bi bi-award-fill me-1"></i>
                            QUIZ RESULT
                        </span>

                        <h1 class="fw-bold mb-2">
                            {{ auth()->user()->name }}'s Result
                        </h1>

                        <p class="text-muted mb-4">
                            Here is your performance summary for this quiz.
                        </p>

                        <!-- Result Status -->
                        <div class="d-flex align-items-center gap-3 mb-4">

                            @if ($result === 'Pass')
                            <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center"
                                style="width:55px;height:55px;">
                                <i class="bi bi-check-lg fs-3"></i>
                            </div>

                            <div>
                                <small class="text-muted d-block">Final Result</small>
                                <h4 class="fw-bold text-success mb-0">Passed</h4>
                            </div>
                            @else
                            <div class="rounded-circle bg-danger-subtle text-danger d-flex align-items-center justify-content-center"
                                style="width:55px;height:55px;">
                                <i class="bi bi-x-lg fs-3"></i>
                            </div>

                            <div>
                                <small class="text-muted d-block">Final Result</small>
                                <h4 class="fw-bold text-danger mb-0">Failed</h4>
                            </div>
                            @endif

                        </div>

                        <!-- Percentage -->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold">Overall Performance</span>

                            <strong class="text-{{ $result === 'Pass' ? 'success' : 'danger' }}">
                              
                            </strong>
                        </div>
                  
                    </div>


                    <!-- RIGHT SIDE -->
                    <div class="col-lg-4">

                        <div class="bg-light rounded-4 p-4">

                            <div class="d-flex align-items-center gap-2 mb-4">
                                <div class="bg-primary-subtle text-primary rounded-3 p-2">
                                    <i class="bi bi-bar-chart-fill"></i>
                                </div>

                                <h5 class="fw-bold mb-0">
                                    Score Summary
                                </h5>
                            </div>


                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Total Questions
                                </span>
                                <strong>
                                    {{ $attempt->test->total_questions }}
                                </strong>
                            </div>


                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Attempted
                                </span>
                                <strong>
                                    {{ $totalAnswers }} / {{ $attempt->test->total_questions }}
                                </strong>
                            </div>


                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Correct
                                </span>
                                <strong class="text-success">
                                    {{ $correctCount }}
                                </strong>
                            </div>


                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Wrong
                                </span>
                                <strong class="text-danger">
                                    {{ $totalAnswers - $correctCount }}
                                </strong>
                            </div>


                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Unanswered
                                </span>
                                <strong>
                                    {{ max(0, $attempt->test->total_questions - $totalAnswers) }}
                                </strong>
                            </div>


                            <hr>


                            <!-- Score -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">
                                    Score
                                </span>

                                <strong class="fs-5">
                                    {{ number_format($score, 2) }}
                                    <span class="text-muted fs-6">
                                        / {{ number_format($totalMarks, 2) }}
                                    </span>
                                </strong>
                            </div>


                            <!-- Percentage -->
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Percentage
                                </span>

                                <strong>
                                    {{ number_format($scorePercentage, 2) }}%
                                </strong>
                            </div>


                            <!-- Passing Marks -->
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">
                                    Passing Marks
                                </span>

                                <strong>
                                    {{ number_format($passingMarks, 2) }}
                                </strong>
                            </div>


                            <!-- Result -->
                            <div class="d-flex justify-content-between align-items-center">

                                <span class="text-muted">
                                    Result
                                </span>

                                @if ($result === 'Pass')

                                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    PASS
                                </span>

                                @else

                                <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    FAIL
                                </span>

                                @endif

                            </div>

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