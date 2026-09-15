@extends('layouts.dashboard')


<div class="container py-4">

    {{-- Page heading --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <h3 class="mb-0 fw-bold d-flex flex-wrap align-items-center gap-2">
            <i class="bi bi-journal-text text-primary"></i>

            My Tests

            <span class="badge bg-primary rounded-pill fw-normal">
                Welcome, {{ auth()->user()?->name ?? 'Guest' }}
            </span>
        </h3>
    </div>

    {{-- Tests grid --}}


    <div class="row g-4">

        @forelse ($tests as $test)

        @php
        $attempt = \App\Models\TestAttempt::where('test_id', $test->id)
        ->where('student_id', auth()->id())
        ->latest('id')
        ->first();
        @endphp


        <div
            class="col-12 col-md-6 col-lg-4 d-flex test-card-animate"
            style="animation-delay: {{ $loop->index * 150 }}ms;">
            <div class="card quiz-card w-100 h-100 border-0 shadow-sm rounded-4 overflow-hidden">

             <!-- Card body  -->
                <div class="card-body p-3 p-md-4 d-flex flex-column">

                    <h5 class="card-title fw-bold text-dark mb-2 text-break">
                        {{ $test->title }}
                    </h5>

                    <p class="card-text text-secondary mb-4 flex-grow-1">
                        {{ Str::limit($test->description, 90) }}
                    </p>

                    <!-- Quiz information  -->
                    <div class="d-flex gap-2 flex-wrap mb-3">

                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-normal">
                            <i class="bi bi-clock text-primary me-1"></i>
                            {{ $test->duration_minutes }} mins
                        </span>

                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-normal">
                            <i class="bi bi-question-circle text-info me-1"></i>
                            {{ $test->total_questions }} Questions
                        </span>

                    </div>

                   <!-- Created date  -->
                    <div class="d-flex align-items-center text-muted small">
                        <i class="bi bi-calendar3 me-2"></i>

                        {{ $test->created_at->format('d M Y') }}
                    </div>

                </div>

                <!-- Card footer  -->
                <div class="card-footer bg-white border-0 p-3 p-md-4 pt-0">

                    @if ($attempt)

                    <a
                        href="{{ route('student.attempts.answers', $attempt->id) }}"
                        class="btn btn-success w-100 rounded-pill py-2 text-wrap fw-medium">
                        <i class="bi bi-check-circle me-2"></i>
                        You attempted this quiz
                    </a>

                    @else

                    @if($test->status == 'CLOSED')

                    <button
                        class="btn btn-outline-danger w-100 rounded-pill py-2 fw-medium"
                        disabled>
                        <i class="bi bi-lock me-2"></i>
                        Closed
                    </button>

                    @else

                    <a
                        href="{{ route('QuizAttempt', $test->id) }}"
                        class="btn btn-outline-primary w-100 rounded-pill py-2 fw-medium">
                        <i class="bi bi-question-circle me-2"></i>
                        Attempt Quiz
                    </a>

                    @endif

                    @endif

                </div>

            </div>
        </div>

        @empty

        <!-- No tests message  -->
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 text-center py-5">

                <div class="card-body py-5">

                    <div
                        class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                        style="width: 80px; height: 80px;">
                        <i class="bi bi-journal-text text-secondary fs-1"></i>
                    </div>

                    <h5 class="text-muted fw-semibold">
                        No tests found
                    </h5>

                    <p class="text-secondary small mb-0">
                        There are currently no tests available.
                    </p>

                </div>

            </div>
        </div>

        @endforelse

    </div>

</div>

<!-- Animation CSS  -->
<style>
    /* Card starts below its original position */
    .test-card-animate {
        opacity: 0;
        transform: translateY(60px);
        animation: cardSlideUp 0.7s ease-out forwards;
    }

    /* Card moves from bottom to top */
    @keyframes cardSlideUp {
        from {
            opacity: 0;
            transform: translateY(60px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Card hover transition */
    .quiz-card {
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }

    .quiz-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
    }

    /* Disable animation when device requests reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .test-card-animate {
            opacity: 1;
            transform: none;
            animation: none;
        }

        .quiz-card {
            transition: none;
        }

        .quiz-card:hover {
            transform: none;
        }
    }
</style>
@section('content')

@endsection