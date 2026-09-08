@extends('layouts.dashboard')



<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

<div class="container-md py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-question-circle text-primary me-2"></i>Create Questions
            </h3>
            <p class="text-secondary small mb-0">{{ $test->title }}</p>
        </div>
        <div class="text-end">
            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                <i class="bi bi-list-ol me-1 text-primary"></i>
                <span id="questionCount">1</span> / {{ $test->total_questions }}
            </span>
        </div>
    </div>

    <div class="progress mb-4 rounded-pill" style="height: 8px;">
        <div id="progressBar" class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 0%; transition: width 0.4s ease;"></div>
    </div>

    <form action="{{ route('Questionstore') }}" method="POST" id="quizForm">
        @csrf
        <input type="hidden" name="test_id" value="{{ $test->id }}">

        <div id="questionss">
            <div class="question-block mb-4" data-index="0">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">
                                <span class="badge bg-primary rounded-pill me-2 q-number">1</span>
                                Question
                            </h5>
                            <button type="button" class="btn btn-light btn-sm rounded-circle text-danger border-0 delete-question" style="width: 36px; height: 36px;" disabled title="Cannot delete the only question">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label class="form-label fw-medium small text-secondary">Question Text</label>
                            <input type="text" name="questions[0][question_text]" class="form-control form-control-lg rounded-3" placeholder="Type your question here..." required>
                        </div>

                        <label class="form-label fw-medium small text-secondary mb-3">Answer Options <span class="text-muted fw-normal">(select correct one)</span></label>
                        <div class="options-list">
                            <div class="option-row mb-3 d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <div class="form-check m-0">
                                    <input class="form-check-input" type="radio" name="questions[0][correct_option]" value="0" required id="q0o0">
                                </div>
                                <input type="text" name="questions[0][options][]" class="form-control border-0 bg-transparent" placeholder="Option A" required>
                                <button type="button" class="btn btn-outline-danger btn-sm rounded-circle border-0 delete-option" style="width: 32px; height: 32px; padding: 0;">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="option-row mb-3 d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <div class="form-check m-0">
                                    <input class="form-check-input" type="radio" name="questions[0][correct_option]" value="1" id="q0o1">
                                </div>
                                <input type="text" name="questions[0][options][]" class="form-control border-0 bg-transparent" placeholder="Option B" required>
                                <button type="button" class="btn btn-outline-danger btn-sm rounded-circle border-0 delete-option" style="width: 32px; height: 32px; padding: 0;">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="option-row mb-3 d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <div class="form-check m-0">
                                    <input class="form-check-input" type="radio" name="questions[0][correct_option]" value="2" id="q0o2">
                                </div>
                                <input type="text" name="questions[0][options][]" class="form-control border-0 bg-transparent" placeholder="Option C" required>
                                <button type="button" class="btn btn-outline-danger btn-sm rounded-circle border-0 delete-option" style="width: 32px; height: 32px; padding: 0;">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>

                        <button type="button" class="btn btn-outline-primary rounded-pill btn-sm add-option">
                            <i class="bi bi-plus-lg me-1"></i>Add Option
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-3 mt-4">
            <button type="button" id="addQ" class="btn btn-outline-primary rounded-pill px-4">
                <i class="bi bi-plus-lg me-1"></i>Add Question
            </button>
            <button type="submit" class="btn btn-primary rounded-pill px-5 ms-sm-auto">
                <i class="bi bi-check-lg me-1"></i>Save All Questions
            </button>
        </div>
    </form>
</div>

<script>
let questionCount = 1;
const maxQuestions = parseInt("{{ $test->total_questions }}");

function updateQuestionCountDisplay() {
    document.getElementById('questionCount').textContent = questionCount;
    const pct = (questionCount / maxQuestions) * 100;
    document.getElementById('progressBar').style.width = pct + '%';
}

function updateAddButtonState() {
    const addBtn = document.getElementById('addQ');
    if (questionCount >= maxQuestions) {
        addBtn.disabled = true;
        addBtn.classList.add('disabled');
        addBtn.innerHTML = '<i class="bi bi-check-all me-1"></i>Limit Reached';
    } else {
        addBtn.disabled = false;
        addBtn.classList.remove('disabled');
        addBtn.innerHTML = '<i class="bi bi-plus-lg me-1"></i>Add Question';
    }
}

function updateQuestionNumbers() {
    document.querySelectorAll('.question-block').forEach((block, idx) => {
        block.querySelector('.q-number').textContent = idx + 1;
        block.dataset.index = idx;
        block.querySelector('.delete-question').disabled = document.querySelectorAll('.question-block').length <= 1;
    });
}

document.addEventListener('DOMContentLoaded', function() {
    updateQuestionCountDisplay();
    updateAddButtonState();
});

document.getElementById('addQ').addEventListener('click', function() {
    if (questionCount >= maxQuestions) {
        alert(`Maximum ${maxQuestions} questions allowed`);
        return;
    }

    const container = document.getElementById('questionss');
    const index = questionCount;

    const block = document.createElement('div');
    block.className = 'question-block mb-4';
    block.dataset.index = index;
    block.style.animation = 'fadeInUp 0.3s ease';

    block.innerHTML = `
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white border-bottom-0 pt-4 px-4 pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">
                        <span class="badge bg-primary rounded-pill me-2 q-number">${index + 1}</span>
                        Question
                    </h5>
                    <button type="button" class="btn btn-light btn-sm rounded-circle text-danger border-0 delete-question" style="width: 36px; height: 36px;">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="mb-4">
                    <label class="form-label fw-medium small text-secondary">Question Text</label>
                    <input type="text" name="questions[${index}][question_text]" class="form-control form-control-lg rounded-3" placeholder="Type your question here..." required>
                </div>
                <label class="form-label fw-medium small text-secondary mb-3">Answer Options <span class="text-muted fw-normal">(select correct one)</span></label>
                <div class="options-list">
                    <div class="option-row mb-3 d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                        <div class="form-check m-0">
                            <input class="form-check-input" type="radio" name="questions[${index}][correct_option]" value="0" required id="q${index}o0">
                        </div>
                        <input type="text" name="questions[${index}][options][]" class="form-control border-0 bg-transparent" placeholder="Option A" required>
                        <button type="button" class="btn btn-outline-danger btn-sm rounded-circle border-0 delete-option" style="width: 32px; height: 32px; padding: 0;">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="option-row mb-3 d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                        <div class="form-check m-0">
                            <input class="form-check-input" type="radio" name="questions[${index}][correct_option]" value="1" id="q${index}o1">
                        </div>
                        <input type="text" name="questions[${index}][options][]" class="form-control border-0 bg-transparent" placeholder="Option B" required>
                        <button type="button" class="btn btn-outline-danger btn-sm rounded-circle border-0 delete-option" style="width: 32px; height: 32px; padding: 0;">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="option-row mb-3 d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                        <div class="form-check m-0">
                            <input class="form-check-input" type="radio" name="questions[${index}][correct_option]" value="2" id="q${index}o2">
                        </div>
                        <input type="text" name="questions[${index}][options][]" class="form-control border-0 bg-transparent" placeholder="Option C" required>
                        <button type="button" class="btn btn-outline-danger btn-sm rounded-circle border-0 delete-option" style="width: 32px; height: 32px; padding: 0;">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary rounded-pill btn-sm add-option">
                    <i class="bi bi-plus-lg me-1"></i>Add Option
                </button>
            </div>
        </div>
    `;
    container.appendChild(block);
    questionCount++;
    updateQuestionCountDisplay();
    updateAddButtonState();
    updateQuestionNumbers();
    block.scrollIntoView({ behavior: 'smooth', block: 'center' });
});

document.addEventListener('click', function(e) {
    const addBtn = e.target.closest('.add-option');
    if (addBtn) {
        const block = addBtn.closest('.question-block');
        const optionsList = block.querySelector('.options-list');
        const index = block.dataset.index;
        const currentOptions = optionsList.querySelectorAll('.option-row').length;
        const labels = ['A','B','C','D','E','F','G','H'];
        const label = labels[currentOptions] || String.fromCharCode(65 + currentOptions);

        const div = document.createElement('div');
        div.className = 'option-row mb-3 d-flex align-items-center gap-3 p-3 rounded-3 bg-light';
        div.style.animation = 'fadeIn 0.2s ease';
        div.innerHTML = `
            <div class="form-check m-0">
                <input class="form-check-input" type="radio" name="questions[${index}][correct_option]" value="${currentOptions}" id="q${index}o${currentOptions}">
            </div>
            <input type="text" name="questions[${index}][options][]" class="form-control border-0 bg-transparent" placeholder="Option ${label}" required>
            <button type="button" class="btn btn-outline-danger btn-sm rounded-circle border-0 delete-option" style="width: 32px; height: 32px; padding: 0;">
                <i class="bi bi-x-lg"></i>
            </button>
        `;
        optionsList.appendChild(div);
    }

    const delOpt = e.target.closest('.delete-option');
    if (delOpt) {
        const optionsList = delOpt.closest('.options-list');
        if (optionsList.querySelectorAll('.option-row').length > 2) {
            delOpt.closest('.option-row').remove();
        } else {
            alert('Minimum 2 options required');
        }
    }

    const delQ = e.target.closest('.delete-question');
    if (delQ && !delQ.disabled) {
        if (confirm('Delete this question?')) {
            delQ.closest('.question-block').remove();
            questionCount--;
            updateQuestionCountDisplay();
            updateAddButtonState();
            updateQuestionNumbers();
        }
    }
});
</script>

<style>
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
.option-row:focus-within {
    background-color: #e7f1ff !important;
    box-shadow: 0 0 0 2px #0d6efd20;
}
.form-check-input:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}
</style>

@section('content')
@endsection