@extends('layouts.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0 fw-bold">
        <li class="nav-item">
            <span class="d-flex align-items-center gap-2 px-3 py-2">
                <span class="d-flex align-items-center gap-2 px-3 py-2">
                    <i class="bi bi-person-circle fs-5"></i>
                    <span>
                        <small class="text-muted me-1">YOU ARE</small>
                        <strong class="badge bg-primary rounded-pill">
                            {{ auth()->user()?->role ?? 'Guest' }}
                        </strong>
                    </span>
                </span>
                <i class="bi bi-journal-text text-primary me-2"></i>Create Test
    </h3>
    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addTestModal">
        <i class="bi bi-plus-lg me-1"></i>Add Test
    </button>
</div>

<div class="row g-4">
    @forelse($test as $test)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden transition-all hover-shadow-lg">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="badge rounded-pill px-3 py-2 fw-medium
                            @if($test->status == 'PUBLISHED') bg-success-subtle text-success
                            @elseif($test->status == 'DRAFT') bg-warning-subtle text-warning-emphasis
                            @elseif($test->status == 'CLOSED') bg-danger-subtle text-danger
                            @else bg-secondary-subtle text-secondary
                            @endif">
                        <i class="bi bi-circle-fill me-1" style="font-size: 6px; vertical-align: middle;"></i>{{ $test->status }}
                    </span>
                    <div class="dropdown">
                        <button type="button" class="btn btn-light btn-sm rounded-circle border-0" data-bs-toggle="dropdown" style="width: 32px; height: 32px; padding: 0;">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">
                            <li>
                                <button type="button" class="dropdown-item py-2" data-bs-toggle="modal"
                                    data-bs-target="#editTestModal"
                                    data-test-id="{{ $test->id }}"
                                    data-test-title="{{ $test->title }}"
                                    data-test-description="{{ $test->description }}"
                                    data-test-duration="{{ $test->duration_minutes }}"
                                    data-test-status="{{ $test->status }}">
                                    <i class="bi bi-pencil-square text-warning me-2"></i>Edit
                                </button>
                            </li>
                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>
                            <li>
                                <form action="{{ route('testdelete', $test->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item py-2 text-danger">
                                        <i class="bi bi-trash me-2"></i>Delete
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <h5 class="card-title fw-bold text-dark mb-2">{{ $test->title }}</h5>
                <p class="card-text text-secondary mb-4" style="min-height: 48px;">{{ Str::limit($test->description, 90) }}</p>

                <div class="d-flex gap-2 flex-wrap mb-3">
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-normal">
                        <i class="bi bi-clock text-primary me-1"></i>{{ $test->duration_minutes }} mins
                    </span>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-normal">
                        <i class="bi bi-question-circle text-info me-1"></i>{{ $test->total_questions }} Questions
                    </span>
                </div>

                <div class="d-flex align-items-center text-muted small">
                    <i class="bi bi-calendar3 me-2 text-secondary"></i>
                    {{ $test->created_at->format('d M Y') }}
                </div>
            </div>

            <div class="card-footer bg-white border-top-0 p-4 pt-0">
                <a class="btn btn-outline-primary w-100 rounded-pill py-2 fw-medium" href="{{ route('Quizcreate', $test->id) }}">
                    <i class="bi bi-question-circle me-2"></i>Manage Questions
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 text-center py-5">
            <div class="card-body py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                    <i class="bi bi-journal-text text-secondary fs-1"></i>
                </div>
                <h5 class="text-muted fw-semibold">No tests found</h5>
                <p class="text-secondary small mb-4">Get started by creating your first test.</p>
                <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addTestModal">
                    <i class="bi bi-plus-lg me-1"></i>Create Test
                </button>
            </div>
        </div>
    </div>
    @endforelse
</div>

<!-- ====== ADD TEST MODAL ====== -->
<div class="modal fade" id="addTestModal" tabindex="-1" aria-labelledby="addTestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <form id="addTestForm" action="{{ route('testcreate') }}" method="POST">
                @csrf
                <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold" id="addTestModalLabel">
                        <i class="bi bi-plus-circle text-primary me-2"></i>Add New Test
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-medium small text-secondary">
                            <i class="bi bi-pencil me-1"></i>Title
                        </label>
                        <input type="text" name="title" class="form-control form-control-lg rounded-3" 
                               placeholder="Enter test title..." required maxlength="100">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small text-secondary">
                            <i class="bi bi-file-text me-1"></i>Description
                        </label>
                        <textarea name="description" class="form-control rounded-3" rows="3" 
                                  placeholder="Write test description..." required maxlength="6000"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label fw-medium small text-secondary">
                                <i class="bi bi-clock me-1"></i>Duration (min)
                            </label>
                            <input type="number" name="duration_minutes" class="form-control rounded-3" 
                                   placeholder="30" min="1" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-medium small text-secondary">
                                <i class="bi bi-list-ol me-1"></i>Total Questions
                            </label>
                            <input type="number" name="total_questions" class="form-control rounded-3" 
                                   placeholder="50" min="1" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label fw-medium small text-secondary">
                                <i class="bi bi-award me-1"></i>Marks / Question
                            </label>
                            <input type="number" name="marks_per_question" class="form-control rounded-3" 
                                   step="0.5" placeholder="1" min="0" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-medium small text-secondary">
                                <i class="bi bi-dash-circle me-1"></i>Negative Marks
                            </label>
                            <input type="number" name="negative_marks" class="form-control rounded-3" 
                                   step="0.5" placeholder="0.25" min="0" required>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label fw-medium small text-secondary">
                            <i class="bi bi-toggle-on me-1"></i>Status
                        </label>
                        <select name="status" class="form-select rounded-3" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="DRAFT">Draft</option>
                            <option value="PUBLISHED">Published</option>
                            <option value="CLOSED">Closed</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer border-top-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-check-lg me-1"></i>Save Test
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ====== EDIT TEST MODAL ====== -->
<div class="modal fade" id="editTestModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <form id="editTestForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-pencil-square text-warning me-2"></i>Edit Test
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-medium small text-secondary">Title</label>
                        <input type="text" name="title" id="editTitle" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small text-secondary">Description</label>
                        <textarea name="description" id="editDescription" class="form-control rounded-3" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small text-secondary">Duration (Minutes)</label>
                        <input type="number" name="duration_minutes" id="editDuration" class="form-control rounded-3" min="1" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label fw-medium small text-secondary">Status</label>
                        <select name="status" id="editStatus" class="form-select rounded-3" required>
                            <option value="DRAFT">Draft</option>
                            <option value="PUBLISHED">Published</option>
                            <option value="CLOSED">Closed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-top-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-check-lg me-1"></i>Update Test
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ====== SCRIPTS ====== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const T = Swal.mixin({ toast: true, position: 'top-end', timer: 1500, showConfirmButton: false });

// ADD TEST FORM
const addForm = document.getElementById('addTestForm');
addForm?.addEventListener('submit', e => {
    e.preventDefault();
    Swal.fire({
        icon: 'success',
        title: '🎉 Test Created!',
        text: 'Your test has been saved successfully!',
        confirmButtonColor: '#0d6efd'
    }).then(() => addForm.submit());
});

// EDIT TEST MODAL
document.getElementById('editTestModal')?.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const testId = button.getAttribute('data-test-id');
    const form = document.getElementById('editTestForm');
    
    document.getElementById('editTitle').value = button.getAttribute('data-test-title');
    document.getElementById('editDescription').value = button.getAttribute('data-test-description');
    document.getElementById('editDuration').value = button.getAttribute('data-test-duration');
    document.getElementById('editStatus').value = button.getAttribute('data-test-status');
    
    form.action = "{{ url('/Test') }}/" + testId;
});

// EDIT TEST FORM SUBMIT
document.getElementById('editTestForm')?.addEventListener('submit', e => {
    e.preventDefault();
    Swal.fire({
        icon: 'success',
        title: '✏️ Test Updated!',
        text: 'Your changes have been saved.',
        confirmButtonColor: '#0d6efd'
    }).then(() => e.target.submit());
});

// DELETE TEST
document.addEventListener('click', e => {
    if (e.target.closest('.delete-form')) {
        e.preventDefault();
        const form = e.target.closest('.delete-form');
        
        Swal.fire({
            icon: 'warning',
            title: 'Delete Test?',
            text: 'This action cannot be undone.',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#dc3545'
        }).then(result => {
            if (result.isConfirmed) {
                T.fire({ icon: 'success', title: '🗑️ Test Deleted' });
                setTimeout(() => form.submit(), 500);
            }
        });
    }
});
</script>

<style>
    .transition-all {
        transition: all 0.3s ease;
    }

    .hover-shadow-lg:hover {
        transform: translateY(-4px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
    }
</style>

@section('content')
@endsection