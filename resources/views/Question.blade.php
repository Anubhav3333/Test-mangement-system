
<style>
      * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #FFE5E5 0%, #E5F1FF 100%);
            padding: 20px;
        }

        .quiz-container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            height: 5px;
            background-color: #e0e0e0;
            border-radius: 10px;
            margin-bottom: 30px;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            background: linear-gradient(to right, #FFB5B5, #B5D8FF);
            transition: width 0.3s ease;
            width: 0%;
        }

        .step {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .step.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        .option {
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .option:hover {
            border-color: #FFB5B5;
            background-color: #f8f9ff;
        }

        .option.selected {
            border-color: #667eea;
            background-color: #f8f9ff;
        }

        .option input[type="radio"] {
            display: none;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        button {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .prev-btn {
            background-color: #e0e0e0;
            color: #333;
        }

        .next-btn {
            background-color: #FFB5B5;
            color: white;
        }

        .prev-btn:hover:not(:disabled) {
            background-color: #d0d0d0;
        }

        .next-btn:hover:not(:disabled) {
            background-color: #FFA0A0;
        }

        .result {
            text-align: center;
            display: none;
        }

        .result h2 {
            color: #FFB5B5;
            margin-bottom: 15px;
        }

        .result p {
            color: #666;
            margin-bottom: 20px;
        }

        .restart-btn {
            background-color: #667eea;
            color: white;
            width: 100%;
        }
</style>
<body>
    <div class="quiz-container">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>

        <div class="step active" data-step="1,2">
            <h2>{{ $question->question_text }}</h2>
               @foreach($question->question_options as $option)
            <div class="options">
                <label class="option">
                    <input type="radio" name="q1" value="javascript">
                  {{($option->option_text)}}
                </label>
            </div>
              @endforeach
            <div class="buttons">
                <button class="prev-btn" disabled>Previous</button>
                <button class="next-btn">Next</button>
            </div>
        </div>
        <div class="result">
            <h2>Quiz Completed!</h2>
            <p>Thank you for participating in our quiz.</p>
            <div id="answers-summary"></div>
            <button class="restart-btn">Restart Quiz</button>
        </div>
    </div>

    <script>
          const quizContainer = document.querySelector('.quiz-container');
        const steps = document.querySelectorAll('.step');
        const progressBar = document.querySelector('.progress');
        const result = document.querySelector('.result');
        const answersSummary = document.getElementById('answers-summary');
        let currentStep = 1;
        const totalSteps = steps.length;
        const answers = {};

        // Initialize progress bar
        updateProgress();

        // Add click event for options
        document.querySelectorAll('.option').forEach(option => {
            option.addEventListener('click', function() {
                const stepElement = this.closest('.step');
                const radioInput = this.querySelector('input[type="radio"]');
                
                // Deselect all options in current step
                stepElement.querySelectorAll('.option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Select clicked option
                this.classList.add('selected');
                radioInput.checked = true;
                
                // Enable next button
                stepElement.querySelector('.next-btn').disabled = false;
            });
        });

        // Add click event for next buttons
        document.querySelectorAll('.next-btn').forEach(button => {
            button.addEventListener('click', function() {
                const currentStepElement = this.closest('.step');
                const selectedOption = currentStepElement.querySelector('input[type="radio"]:checked');
                
                if (selectedOption) {
                    // Store answer
                    answers[`q${currentStep}`] = selectedOption.value;
                    
                    if (currentStep < totalSteps) {
                        // Move to next step
                        currentStep++;
                        updateStep();
                    } else {
                        // Show results
                        showResult();
                    }
                }
            });
        });

        // Add click event for previous buttons
        document.querySelectorAll('.prev-btn').forEach(button => {
            button.addEventListener('click', function() {
                if (currentStep > 1) {
                    currentStep--;
                    updateStep();
                }
            });
        });

        // Add click event for restart button
        document.querySelector('.restart-btn').addEventListener('click', function() {
            // Reset all selections
            document.querySelectorAll('input[type="radio"]').forEach(input => {
                input.checked = false;
            });
            document.querySelectorAll('.option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Reset step to 1
            currentStep = 1;
            updateStep();
            
            // Clear answers
            Object.keys(answers).forEach(key => delete answers[key]);
            
            // Hide result
            result.style.display = 'none';
            
            // Show first step
            steps[0].classList.add('active');
            
            // Reset progress
            updateProgress();
        });

        function updateStep() {
            // Update active step
            steps.forEach(step => {
                step.classList.remove('active');
            });
            document.querySelector(`[data-step="${currentStep}"]`).classList.add('active');
            
            // Update progress
            updateProgress();
            
            // Update button states
            const prevBtn = document.querySelector('.step.active .prev-btn');
            const nextBtn = document.querySelector('.step.active .next-btn');
            
            prevBtn.disabled = currentStep === 1;
            nextBtn.disabled = !document.querySelector(`.step.active input[name="q${currentStep}"]:checked`);
        }

        function updateProgress() {
            const progress = ((currentStep - 1) / totalSteps) * 100;
            progressBar.style.width = `${progress}%`;
        }

        function showResult() {
            // Hide all steps
            steps.forEach(step => step.classList.remove('active'));
            
            // Show result section
            result.style.display = 'block';
            
            // Update progress to 100%
            progressBar.style.width = '100%';
            
            // Create summary
            const summary = document.createElement('div');
            summary.style.marginBottom = '20px';
            summary.style.textAlign = 'left';
            
            Object.entries(answers).forEach(([question, answer]) => {
                const p = document.createElement('p');
                p.style.margin = '10px 0';
                p.style.color = '#666';
                p.textContent = `Question ${question.slice(1)}: ${answer}`;
                summary.appendChild(p);
            });
            
            // Clear previous summary and add new one
            answersSummary.innerHTML = '';
            answersSummary.appendChild(summary);
        }
    </script>
</body>
