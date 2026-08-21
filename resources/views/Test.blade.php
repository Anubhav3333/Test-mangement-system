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
                        {{ \Illuminate\Support\Str::limit($test->test,120,'...') }}
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
                    <form action="" method="POST">
                        @csrf

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
                                <label class="form-label">test</label>

                                <textarea name="test"
                                          class="form-control"
                                          rows="10"
                                          required>{{ $test->test }}</textarea>
                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">

                            <!-- Delete Button -->
                            <button type="button"
                                    class="btn btn-danger"
                                    onclick="if(confirm('Delete this test?')) document.getElementById('deleteForm{{ $test->id }}').submit();">
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
                          action=""
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
                            <i class="bi bi-file-text"></i> test
                        </label>

                        <textarea name="test"
                                  class="form-control"
                                  rows="6"
                                  placeholder="Write your test here..."
                                  required
                                  maxlength="5000"></textarea>
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




@section('content')


@endsection




