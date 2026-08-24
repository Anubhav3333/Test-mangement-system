@extends('layouts.dashboard')





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

    @forelse($test as $test)

    <div class="col-md-4 col-lg-3 mb-4">

        <!-- Clickable Card -->
        <div class="card shadow-sm h-100"
            style="cursor:pointer; transition:.3s;"
            data-bs-toggle="modal"
            data-bs-target="#testModal{{ $test->id }}">

            <div class="card-body">

                <h5 class="card-title text-primary">
                    {{ $test->title }}
                </h5>

                <p class="card-text text-muted">
                    {{ $test-> description }}
                </p>
                <p class="card-text text-muted">
                    {{ $test-> duration_minutes }}
                </p>


                <small class="text-muted">
                    <i class="bi bi-calendar"></i>
                    {{ $test->created_at->format('d M Y') }}
                </small>

            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade"
        id="testModal{{ $test->id }}"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- UPDATE FORM -->
                <form action="{{ route('testupdate', ['id' => $test->id]) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="bi bi-pencil-square"></i>
                            Edit test
                        </h5>

                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Title</label>

                            <input type="text"
                                name="title"
                                class="form-control"
                                value="{{ $test->title }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>

                            <textarea name="description"
                                class="form-control"
                                rows="2"


                                required>{{ $test->description }}</textarea>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Marks_Per_Question</label>

                            <textarea name="marks_per_question"
                                class="form-control"
                                rows="2"


                                required>{{ $test->marks_per_question	 }}</textarea>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Total_Questions</label>

                            <textarea name="total_questions"
                                class="form-control"
                                rows="2"


                                required>{{ $test->total_questions }}</textarea>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Duration Minutes</label>

                            <textarea name="duration_minutes"
                                class="form-control"
                                rows="1"


                                required>{{ $test->duration_minutes }}</textarea>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">

                        <!-- deleted buttom  -->
                        <button type="submit"
                            form="deleteForm{{ $test->id }}"
                            class="btn btn-danger"
                            onclick="return confirm('Delete this test?')">
                            <i class="bi bi-trash"></i>
                            Delete
                        </button>

                        <div>
                            <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Close
                            </button>

                            <button type="submit"
                                class="btn btn-success">
                                <i class="bi bi-check-circle"></i>
                                Update test
                            </button>
                        </div>

                    </div>

                </form>

                <!-- DELETE  FORM here -->
                <form id="deleteForm{{ $test->id }}"
                    action="{{ route('testdelete', $test->id) }}"
                    method="POST"
                    style="display:none;">

                    @csrf
                    @method('DELETE')

                </form>

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


<!-- add test here  -->

<div class="modal fade" id="addtestModal" tabindex="-1" aria-labelledby="addtestModalLabel" aria-hidden="true">
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

                    <!-- Title Input -->
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

                    <!-- test Textarea -->
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
                            name="duration_minutes"
                            id="duration_minutes"
                            class="form-control"
                            placeholder="Enter total Questions"
                            required
                            maxlength="200">

                    </div>



                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-pencil">total_questions</i>
                        </label>


                        <input type="number"
                            name="total_questions"
                            id="duration_minutes"
                            class="form-control"
                            placeholder="Enter total Questions"
                            required
                            maxlength="200">

                    </div>

                    <!-- total question end  -->
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-pencil"> Marks per question</i>
                        </label>


                        <input type="number"
                            name="marks_per_question"
                            id="duration_minutes"
                            class="form-control"
                            placeholder="total marks"
                            required
                            maxlength="200">

                    </div>

                    <!-- end  -->
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-pencil">Negative_marks</i>
                        </label>


                        <input type="number"
                            name="negative_marks"
                            id="duration_minutes"
                            class="form-control"
                            placeholder="nagative mark "
                            required
                            maxlength="200">

                    </div>


                    <!-- nagatvie mark khatm -->


                    <!-- status  -->







                </div>


                <!-- button -->

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




@section('content')


@endsection