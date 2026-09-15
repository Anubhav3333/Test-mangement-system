@extends('layouts.dashboard')

<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-chat-left-text me-2"></i>Submitted Queries
            </h3>
            <p class="text-muted mb-0">
                View all questions and queries submitted by users.
            </p>
        </div>

        <span class="badge bg-primary fs-6 px-3 py-2">
            {{ $queries->count() }} Queries
        </span>
    </div>


    {{-- Queries --}}
    <div class="row g-4">

        @forelse($queries as $query)

            <div class="col-12 col-md-6 col-xl-4">

                <div class="card border-0 shadow-sm h-100 query-card">

                    <div class="card-body p-4">

                        {{-- User --}}
                        <div class="d-flex align-items-center mb-3">

                            <div class="avatar bg-primary text-white rounded-circle
                                        d-flex align-items-center justify-content-center me-3">
                                {{ strtoupper(substr($query->name, 0, 1)) }}
                            </div>

                            <div>
                                <h5 class="fw-semibold mb-0">
                                    {{ $query->name }}
                                </h5>

                                <small class="text-muted">
                                    {{ $query->email }}
                                </small>
                            </div>

                        </div>


                        {{-- Subject --}}
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                SUBJECT
                            </small>

                            <h6 class="fw-bold mb-0">
                                {{ $query->subject }}
                            </h6>
                        </div>


                        <!-- Message  -->
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                MESSAGE
                            </small>

                            <p class="text-secondary mb-0">
                                {{ Str::limit($query->message, 120) }}
                            </p>
                        </div>


                         <!-- Footer  -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">

                            <small class="text-muted">
                                <i class="bi bi-clock me-1"></i>
                                {{ $query->created_at->format('d M Y, h:i A') }}
                            </small>

                            <button
                                class="btn btn-sm btn-outline-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#queryModal{{ $query->id }}">
                                View
                            </button>

                        </div>

                    </div>

                </div>

            </div>


            <!-- View Query Modal  -->
            <div class="modal fade" id="queryModal{{ $query->id }}" tabindex="-1">

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content border-0 shadow">

                        <div class="modal-header">

                            <h5 class="modal-title fw-bold">
                                <i class="bi bi-chat-left-text me-2"></i>
                                Query Details
                            </h5>

                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal">
                            </button>

                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <small class="text-muted">NAME</small>
                                <div class="fw-semibold">
                                    {{ $query->name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">EMAIL</small>
                                <div>
                                    {{ $query->email }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">SUBJECT</small>
                                <div class="fw-semibold">
                                    {{ $query->subject }}
                                </div>
                            </div>

                            <div>
                                <small class="text-muted">MESSAGE</small>

                                <div class="bg-light rounded p-3 mt-1">
                                    {{ $query->message }}
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Close
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="text-center py-5">

                    <i class="bi bi-chat-square-text display-4 text-muted"></i>

                    <h5 class="mt-3">
                        No Queries Found
                    </h5>

                    <p class="text-muted">
                        No one has submitted a query yet.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>


<style>
    .query-card {
        transition: 0.2s ease;
    }

    .query-card:hover {
        transform: translateY(-3px);
    }

    .avatar {
        width: 45px;
        height: 45px;
        font-weight: 600;
    }
</style>
@section('content')
@endsection

