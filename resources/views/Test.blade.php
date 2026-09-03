@extends('layouts.dashboard')



<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">
        <i class="bi bi-journal-text"></i> My tests
    </h3>

    <button type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#addtestModal">
        <i class="bi bi-plus-circle"></i>
        Add test
    </button>
</div>

<div class="row">
<div class="row">

    @forelse($test as $test)

<div class="col-md-6 col-lg-3 mb-4">


<div class="modal fade" id="editTest{{ $test->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Test</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('testupdate', $test->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Test Title</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ $test->title }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ $test->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duration</label>
                        <input type="number" name="duration_minutes" class="form-control"
                               value="{{ $test->duration_minutes }}">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

    <div class="card shadow-sm border-0 rounded-3 h-30" style="min-height: 280px;">

        <div class="card-body p-3">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <span class="badge rounded-pill
                    @if($test->status == 'PUBLISHED')
                        bg-success
                    @elseif($test->status == 'DRAFT')
                        bg-warning text-dark
                    @elseif($test->status == 'CLOSED')
                        bg-danger
                    @else
                        bg-secondary
                    @endif">
                    {{ $test->status }}
                </span>

                <div class="dropdown">
                    <button type="button"
                        class="btn btn-sm btn-light rounded-circle"
                        data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                     <li>
    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editTest{{ $test->id }}">
        <i class="bi bi-pencil-square text-warning me-2"></i>
        Edit
    </a>
</li>

                        <li>
                            <form action="{{ route('testdelete', $test->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-trash me-2"></i>
                                    Delete
                                </button>
                            </form>
                        </li>
                    </ul>

                    
                </div>

            </div>

            <h6 class="card-title fw-semibold text-primary mb-2">
                {{ $test->title }}
            </h6>

            <p class="card-text text-muted small mb-3">
                {{ $test->description }}
            </p>

            <div class="d-flex gap-2 flex-wrap mb-3">

                <span class="badge bg-primary">
                    <i class="bi bi-clock me-1"></i>
                    {{ $test->duration_minutes }} mins
                </span>

                <span class="badge bg-secondary">
                    <i class="bi bi-question-circle me-1"></i>
                    {{ $test->total_questions }} Questions
                </span>

            </div>

            <small class="text-muted">
                <i class="bi bi-calendar3 me-1"></i>
                {{ $test->created_at->format('d M Y') }}
            </small>

        </div>

        <div class="card-footer bg-transparent border-0 p-3 pt-0 mt-auto">

            <a class="btn btn-primary w-100"
                href="{{ route('Quizcreate', $test->id) }}">
                <i class="bi bi-question-circle me-1"></i>
                Questions
            </a>

        </div>

    </div>

</div>

    @empty

    <div class="col-12">
        <div class="alert alert-info text-center py-5">
            <i class="bi bi-journal-text fs-1"></i>
            <p class="mt-3 mb-0">No tests found.</p>
        </div>
    </div>

    @endforelse

</div>

</div>

<div class="modal fade"
    id="addtestModal"
    tabindex="-1"
    aria-labelledby="addtestModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="" method="POST" id="addtestForm">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title" id="addtestModalLabel">
                        <i class="bi bi-plus-circle"></i>
                        Add New test
                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-pencil"></i>
                            Title
                        </label>

                        <input type="text"
                            name="title"
                            class="form-control"
                            placeholder="Enter test title..."
                            required
                            maxlength="100">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-file-text"></i>
                            Test Description
                        </label>

                        <textarea name="description"
                            class="form-control"
                            rows="2"
                            placeholder="Write your test here..."
                            required
                            maxlength="6000"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-clock"></i>
                            Duration-Minutes
                        </label>

                        <input type="number"
                            name="duration_minutes"
                            id="duration_minutes"
                            class="form-control"
                            placeholder="Duration minutes"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-list-ol"></i>
                            Total Questions
                        </label>

                        <input type="number"
                            name="total_questions"
                            id="total_questions"
                            class="form-control"
                            placeholder="Enter total questions"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-award"></i>
                            Marks per question
                        </label>

                        <input type="number"
                            name="marks_per_question"
                            id="marks_per_question"
                            class="form-control"
                            placeholder="Marks per question"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-dash-circle"></i>
                            Negative Marks
                        </label>

                        <input type="number"
                            name="negative_marks"
                            id="negative_marks"
                            class="form-control"
                            placeholder="Negative marks"
                            required>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        <i class="bi bi-x"></i>
                        Close
                    </button>

                    <button type="submit"
                        class="btn btn-primary">
                        <i class="bi bi-check-circle"></i>
                        Save test
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('testupdate', $test->id) }}">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <input type="text" name="title" class="form-control" value="{{ $test->title }}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@section('content')

@endsection