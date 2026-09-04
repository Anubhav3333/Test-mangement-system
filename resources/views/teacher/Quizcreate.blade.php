@extends('layouts.dashboard')
<form action="{{ route('Quizstore') }}" style="margin-top: 5rem !important" method="POST" class="container-md mt-5" id="quizForm">
    @csrf

    <input type="hidden" name="test_id" value="{{ $test->id }}">

    <div id="questionss">
        <div class="question-block mb-5" data-index="0">
            <div class="question-box card shadow-sm border-0 mt-5 mb-4 p-4">
                <label class="form-label fw-semibold">Question:</label>
                <input type="text"
                    name="questions[0][question_text]"
                    class="form-control"
                    placeholder="Enter your question"
                    required>
            </div>

            <div class="options-list">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <input class="form-check-input"
                        type="radio"
                        name="questions[0][correct_option]"
                        value="0"
                        required>

                    <input type="text"
                        name="questions[0][options][]"
                        class="form-control"
                        placeholder="Enter option 1"
                        required>

                    <button type="button" class="btn btn-danger delete-option bi bi-trash">Delete</button>
                </div>

                <div class="mb-3 d-flex align-items-center gap-2">
                    <input class="form-check-input"
                        type="radio"
                        name="questions[0][correct_option]"
                        value="1">

                    <input type="text"
                        name="questions[0][options][]"
                        class="form-control"
                        placeholder="Enter option 2"
                        required>

                    <button type="button" class="btn btn-danger delete-option">Delete</button>
                </div>

                <div class="mb-3 d-flex align-items-center gap-2">
                    <input class="form-check-input"
                        type="radio"
                        name="questions[0][correct_option]"
                        value="2">

                    <input type="text"
                        name="questions[0][options][]"
                        class="form-control"
                        placeholder="Enter option 3"
                        required>

                    <button type="button" class="btn btn-danger delete-option">Delete</button>
                </div>
            </div>

            <button type="button" class="btn btn-outline-primary btn-sm mt-2 add-option">
                + Add Option
            </button>
        </div>
    </div>

    <button type="button" id="addQ" class="btn btn-outline-primary btn-sm mt-2">
        + Add more Question
    </button>

    <button type="submit" class="btn btn-primary w-100 mt-3">
        Submit Data
    </button>
</form>



<script>
    let questionCount = 1;

    document.getElementById('addQ').addEventListener('click', function() {
        const container = document.getElementById('questionss');
        const index = questionCount;

        const block = document.createElement('div');
        block.className = 'question-block mb-5';
        block.dataset.index = index;

        block.innerHTML = `
        <div class="question-box card shadow-sm border-0 mt-5 mb-4 p-4">
            <label class="form-label fw-semibold">Question:</label>
            <input type="text"
                   name="questions[${index}][question_text]"
                   class="form-control"
                   placeholder="Enter your question"
                   required>
        </div>

        <div class="options-list">
            <div class="mb-3 d-flex align-items-center gap-2">
                <input class="form-check-input"
                       type="radio"
                       name="questions[${index}][correct_option]"
                       value="0"
                       required>

                <input type="text"
                       name="questions[${index}][options][]"
                       class="form-control"
                       placeholder="Enter option 1"
                       required>

                <button type="button" class="btn btn-danger delete-option">Delete</button>
            </div>

            <div class="mb-3 d-flex align-items-center gap-2">
                <input class="form-check-input"
                       type="radio"
                       name="questions[${index}][correct_option]"
                       value="1">

                <input type="text"
                       name="questions[${index}][options][]"
                       class="form-control"
                       placeholder="Enter option 2"
                       required>

                <button type="button" class="btn btn-danger delete-option">Delete</button>
            </div>

            <div class="mb-3 d-flex align-items-center gap-2">
                <input class="form-check-input"
                       type="radio"
                       name="questions[${index}][correct_option]"
                       value="2">

                <input type="text"
                       name="questions[${index}][options][]"
                       class="form-control"
                       placeholder="Enter option 3"
                       required>

                <button type="button" class="btn btn-danger delete-option">Delete</button>
            </div>
        </div>

        <button type="button" class="btn btn-outline-primary btn-sm mt-2 add-option">
            + Add Option
        </button>
    `;

        container.appendChild(block);
        questionCount++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-option')) {
            const block = e.target.closest('.question-block');
            const optionsList = block.querySelector('.options-list');
            const index = block.dataset.index;
            const currentOptions = optionsList.querySelectorAll('.mb-3').length;

            const div = document.createElement('div');
            div.className = 'mb-3 d-flex align-items-center gap-2';

            div.innerHTML = `
            <input class="form-check-input"
                   type="radio"
                   name="questions[${index}][correct_option]"
                   value="${currentOptions}">

            <input type="text"
                   name="questions[${index}][options][]"
                   class="form-control"
                   placeholder="Enter option ${currentOptions + 1}"
                   required>

            <button type="button" class="btn btn-danger delete-option">Delete</button>
        `;

            optionsList.appendChild(div);
        }

        if (e.target.classList.contains('delete-option')) {
            e.target.parentElement.remove();
        }
    });
</script>

@section('content')
@endsection