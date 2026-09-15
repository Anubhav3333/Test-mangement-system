@extends('layouts.dashboard')


<div class="container py-4 py-md-5">


    <div class="card page-header-animate border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

                <div>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-2">
                        TEST HISTORY
                    </span>

                    <h2 class="fw-bold mb-1">
                         My Test Attempts
                    </h2>

                    <p class="text-secondary mb-0">
                        View your completed tests, scores and submitted answers.
                    </p>
                </div>

                <div>
                    <span class="badge bg-dark rounded-pill px-3 py-2 fs-6">
                        Total Attempts: {{ count($attempts) }}
                    </span>
                </div>

            </div>

        </div>
    </div>

    @if (count($attempts) > 0)

        {{-- Attempts table --}}
        <div class="card attempts-card-animate border-0 shadow-sm rounded-4 overflow-hidden">

            <div class="card-header bg-white border-bottom p-4">
                <h5 class="fw-bold mb-0">
                    <i class="bi bi-clock-history text-primary me-2"></i>
                    Recent Attempts
                </h5>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-dark">
                            <tr>
                                <th class="py-3 px-4">#</th>
                                <th class="py-3">Test Name</th>
                                <th class="py-3">Status</th>
                                <th class="py-3">Started At</th>
                                <th class="py-3 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($attempts as $attempt)

                                <tr
                                    class="attempt-row-animate"
                                    style="animation-delay: {{ 400 + ($loop->index * 120) }}ms;"
                                >  

                            
                                    <td class="px-4 text-secondary fw-semibold">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- Test name --}}
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div
                                                class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                                                style="width: 42px; height: 42px;"
                                            >
                                                
                                            </div>

                                            <div>
                                                <h6 class="fw-bold mb-1 text-break">
                                                    {{ $attempt->test_name }}
                                                </h6>

                                                <small class="text-secondary">
                                                    Attempt #{{ $attempt->id }}
                                                </small>
                                            </div>

                                        </div>
                                    </td>

                                    {{-- Status --}}
                                    <td>
                                        @if (strtolower($attempt->status) === 'completed')

                                            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                                <i class="bi bi-check-circle me-1"></i>
                                                Completed
                                            </span>

                                        @else
                                            <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2">
                                                <i class="bi bi-hourglass-split me-1"></i>
                                                {{ ucfirst($attempt->status) }}
                                            </span>

                                        @endif
                                    </td>

                                    {{-- Started date --}}
                                    <td>
                                        <div class="text-dark fw-medium">
                                            {{ \Carbon\Carbon::parse($attempt->started_at)->format('d M Y') }}
                                        </div>

                                        <small class="text-secondary">
                                            {{ \Carbon\Carbon::parse($attempt->started_at)->format('h:i A') }}
                                        </small>
                                    </td>

                                    {{-- Action --}}
                                    <td class="text-center">
                                        <a
                                            href="{{ route('student.attempts.answers', $attempt->id) }}"
                                            class="btn btn-primary btn-sm rounded-pill px-3"
                                        >
                                            View Answers
                                            <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

           
            <div class="card-footer bg-white border-top p-3">
                <p class="text-secondary small text-center mb-0">
                    Showing {{ count($attempts) }}
                    {{ count($attempts) === 1 ? 'attempt' : 'attempts' }}
                </p>
            </div>

        </div>

    @else

    
        <div class="card empty-state-animate border-0 shadow-sm rounded-4">

            <div class="card-body text-center py-5">

                <div class="display-3 mb-3">
                    📭
                </div>

                <h4 class="fw-bold">
                    No Test Attempts Found
                </h4>

                <p class="text-secondary mb-4">
                    You haven't attempted any quiz yet.
                </p>

                <a
                    href="javascript:history.back()"
                    class="btn btn-primary rounded-pill px-4"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Go Back
                </a>

            </div>

        </div>

    @endif

</div>

<style>
    /* Header entrance animation */
    .page-header-animate {
        opacity: 0;
        transform: translateY(60px);
        animation: slideUp 0.7s ease-out forwards;
    }

    /* Table entrance animation */
    .attempts-card-animate {
        opacity: 0;
        transform: translateY(60px);
        animation: slideUp 0.7s ease-out 0.2s forwards;
    }

    /* Each table row comes one-by-one */
    .attempt-row-animate {
        opacity: 0;
        transform: translateY(35px);
        animation: rowSlideUp 0.5s ease-out forwards;
        transition:
            transform 0.25s ease,
            background-color 0.25s ease;
    }

    /* Empty state animation */
    .empty-state-animate {
        opacity: 0;
        transform: translateY(60px);
        animation: slideUp 0.7s ease-out 0.2s forwards;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(60px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes rowSlideUp {
        from {
            opacity: 0;
            transform: translateY(35px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Row hover effect */
    .attempt-row-animate:hover {
        transform: translateX(5px);
    }

    /* Button animation */
    .attempt-row-animate .btn {
        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease;
    }

    .attempt-row-animate .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.2);
    }

    /* Disable animations when requested by device */
    @media (prefers-reduced-motion: reduce) {
        .page-header-animate,
        .attempts-card-animate,
        .attempt-row-animate,
        .empty-state-animate {
            opacity: 1;
            transform: none;
            animation: none;
        }

        .attempt-row-animate,
        .attempt-row-animate .btn {
            transition: none;
        }

        .attempt-row-animate:hover,
        .attempt-row-animate .btn:hover {
            transform: none;
        }
    }
</style>

@section('content')
@endsection