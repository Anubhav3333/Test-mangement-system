@extends('layouts.dashboard')

<link href="
https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css
" rel="stylesheet">

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
    <div style="margin-bottom: 2%;" class="col-">
       
    </div>


    @forelse($test as $test)

    <div class="col-md-4 col-lg-3 mb-4">
        <div class="card shadow-sm h-100" style="cursor:pointer; transition:.3s;" data-bs-toggle="modal" data-bs-target="#testModal{{ $test->id }}">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ $test->title }}</h5>
                <p class="card-text text-muted">{{ $test->description }}</p>
                <p class="card-text text-muted">{{ $test->duration_minutes }} mins</p>
                <small class="text-muted">
                    <i class="bi bi-calendar"></i> {{ $test->created_at->format('d M Y') }}
                </small>
            </div>

            <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">
                <div>
                    <button type="button" class="btn btn-sm btn-outline-warning me-2" title="Edit" onclick="event.stopPropagation();">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger" title="Delete" onclick="event.stopPropagation();">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <!-- <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#QuestionModalLong{{ $test->id }}" onclick="event.stopPropagation()">
                    Question
                </button> -->
                    <a class="btn btn-primary" href="{{ route('Quizstore') }}" role="button">Question</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="QuestionModalLong{{ $test->id }}" tabindex="-1" aria-labelledby="QuestionModalLongTitle{{ $test->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="QuestionModalLongTitle{{ $test->id }}">Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea name="" id="" cols="30" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    @empty

    <div class="col-12">
        <div class="alert alert-info text-center py-5">
            <i class="bi bi-journal-text fs-1"></i>

            <p class="mt-3">
                No tests found.
            </p>
        </div>
    </div>

    @endforelse


  

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
                        <i class="bi bi-plus-circle"></i> Add New test
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
                            <i class="bi bi-pencil"></i> Title
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
                            <i class="bi bi-file-text"></i> Test Discribtion
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
                            <i class="bi bi-pencil"></i> Duration-Minutes
                        </label>

                        <input type="number"
                            name="duration_minutes"
                            id="duration_minutes"
                            class="form-control"
                            placeholder="duration minutes"
                            required
                            maxlength="100">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-pencil">total_questions</i>
                        </label>

                        <input type="number"
                            name="total_questions"
                            id="total_questions"
                            class="form-control"
                            placeholder="Enter total Questions"
                            required
                            maxlength="200">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-pencil"> Marks per question</i>
                        </label>

                        <input type="number"
                            name="marks_per_question"
                            id="marks_per_question"
                            class="form-control"
                            placeholder="total marks"
                            required
                            maxlength="200">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-pencil">Negative_marks</i>
                        </label>

                        <input type="number"
                            name="negative_marks"
                            id="negative_marks"
                            class="form-control"
                            placeholder="nagative mark"
                            required
                            maxlength="200">
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Close
                    </button>

                    <button type="submit"
                        class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Save test
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@section('content')

@endsection