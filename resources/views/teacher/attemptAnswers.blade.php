@extends('layouts.dashboard')

    <style>
        :root {
            --green-700: #137a48;
            --green-600: #169b5b;
            --green-100: #dcf5e7;
            --green-50: #f2fbf6;
            --white: #ffffff;
            --text: #203129;
            --muted: #6b7d73;
            --border: #dce9e1;
            --wrong: #c94b52;
            --wrong-soft: #fff3f3;
            --shadow: 0 10px 30px rgba(25, 113, 69, 0.08);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(180deg, #edf9f2 0, #ffffff 360px);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
        }

        .review-page {
            width: min(1040px, calc(100% - 32px));
            margin: 0 auto;
            padding: 48px 0 64px;
        }

        .review-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 28px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            color: var(--green-700);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            width: 8px;
            height: 8px;
            content: "";
            border-radius: 50%;
            background: var(--green-600);
            box-shadow: 0 0 0 5px var(--green-100);
        }

        h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 42px);
            line-height: 1.15;
            letter-spacing: -.03em;
        }

        .subtitle {
            max-width: 620px;
            margin: 10px 0 0;
            color: var(--muted);
        }

        .score-card {
            min-width: 170px;
            padding: 18px 20px;
            border: 1px solid #cfe7d8;
            border-radius: 12px;
            background: var(--white);
            box-shadow: var(--shadow);
        }

        .score-label {
            display: block;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .score-value {
            display: block;
            margin-top: 2px;
            color: var(--green-700);
            font-size: 30px;
            font-weight: 800;
        }

        .answers-list {
            display: grid;
            gap: 16px;
        }

        .answer-card {
            position: relative;
            overflow: hidden;
            padding: 24px 24px 22px 30px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--white);
            box-shadow: 0 4px 18px rgba(38, 78, 55, 0.06);
        }

        .answer-card::before {
            position: absolute;
            inset: 0 auto 0 0;
            width: 5px;
            content: "";
            background: var(--green-600);
        }

        .answer-card.is-wrong::before { background: var(--wrong); }

        .card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
        }

        .question-meta {
            margin-bottom: 6px;
            color: var(--green-700);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
        }

        .question-title {
            margin: 0;
            font-size: 19px;
            line-height: 1.4;
        }

        .status-badge {
            display: inline-flex;
            flex: 0 0 auto;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            border-radius: 999px;
            background: var(--green-100);
            color: var(--green-700);
            font-size: 13px;
            font-weight: 700;
        }

        .status-badge::before {
            content: "✓";
            font-size: 14px;
        }

        .is-wrong .status-badge {
            background: var(--wrong-soft);
            color: var(--wrong);
        }

        .is-wrong .status-badge::before { content: "×"; }

        .selected-answer {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 14px;
            margin-top: 20px;
            padding: 15px 16px;
            border: 1px solid #d6eadf;
            border-radius: 10px;
            background: var(--green-50);
        }

        .is-wrong .selected-answer {
            border-color: #f0d6d8;
            background: #fffafa;
        }

        .answer-label {
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
        }

        .answer-value {
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .empty-state {
            padding: 52px 24px;
            border: 1px dashed #bcdcc9;
            border-radius: 12px;
            background: var(--white);
            text-align: center;
        }

        .empty-state strong {
            display: block;
            margin-bottom: 6px;
            color: var(--green-700);
            font-size: 20px;
        }

        @media (max-width: 720px) {
            .review-page { padding-top: 28px; }
            .review-header { align-items: stretch; flex-direction: column; }
            .score-card { min-width: 0; }
            .card-top { flex-direction: column-reverse; gap: 12px; }
            .selected-answer { grid-template-columns: 1fr; gap: 4px; }
        }
    </style>

<body>
    @php
     
        $totalAnswers = $answers->count();
        $correctAnswers = $answers->where('is_correct', true)->count();
        $scorePercentage = $totalAnswers > 0
            ? round(($correctAnswers / $totalAnswers) * 100)
            : 0;
    @endphp

    <main class="review-page">
        <header class="review-header">
            <div>
                <span class="eyebrow">Quiz result</span>
                <h1>Student Answer Review</h1>
                <p class="subtitle">Review every question, the option selected by the student, and whether the submitted answer was correct.</p>
            </div>

            <div class="score-card " aria-label="Quiz score">
                <span class="score-label">Score</span>
                <span class="score-value">{{ $correctAnswers }}/{{ $totalAnswers }}</span>
                <span class="score-label">{{ $scorePercentage }}% correct</span>
            </div>
        </header>

        @if($answers->isEmpty())
            <section class="empty-state">
                <strong>No answers found</strong>
                <span>The student has not submitted any answers yet.</span>
            </section>
        @else
            <section class="answers-list" aria-label="Student answers">

    @foreach($answers as $index => $answer)
        <div class="card answer-card mb-3 {{ $answer->is_correct ? 'is-correct' : 'is-wrong' }}">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                    <div>
                        <div class="question-meta">
                            Question {{ $index + 1 }}
                        </div>

                        <h5 class="question-title mb-0">
                            {{ $answer->question->question_text ?? 'Question unavailable' }}
                        </h5>
                    </div>

                    <span class="status-badge">
                        {{ $answer->is_correct ? '✓ Correct' : '✕ Wrong' }}
                    </span>
                </div>

                <div class="selected-answer">
                    <span class="answer-label">
                        Student selected
                    </span>

                    <span class="answer-value">
                        {{ $answer->selectedOption->option_text ?? 'No option selected' }}
                    </span>
                </div>

            </div>
        </div>
    @endforeach

</section>
        @endif
    </main>

@section('content')
@endsection