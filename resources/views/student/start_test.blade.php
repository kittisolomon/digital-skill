@extends('learner.index')
@section('content')
<style>
    .progress {
        height: 10px;
        border-radius: 5px;
        margin-bottom: 1rem;
    }
    .question-animate {
        animation: fadeIn 0.5s;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .current-question {
        /* border: 2px solid #0d6efd; */
        box-shadow: 0 0 0 2px #01297022;
        border-radius: 1rem;
        transition: border 0.2s, box-shadow 0.2s;
    }
    .btn-circle {
        border-radius: 50% !important;
        width: 40px;
        height: 40px;
        padding: 0;
        text-align: center;
        line-height: 38px;
        font-size: 1.1rem;
        font-weight: 600;
        background: #f8f9fa;
        color: #012970;
        border: none;
        margin: 0 2px;
        transition: background 0.2s, color 0.2s;
    }
    .btn-circle.active, .btn-circle:focus {
        background: #012970;
        color: #fff;
        outline: none;
    }
    .form-check.bg-light {
        margin-bottom: 1rem;
        margin-left: 0.5rem;
        margin-right: 0.5rem;
        padding: 1.25rem 1rem;
    }
    .card-header .timer-box {
        background: #198754;
        color: #fff;
        border-radius: 2rem;
        padding: 0.5rem 1.5rem;
        font-weight: 700;
        font-size: 1.2rem;
        display: inline-flex;
        align-items: center;
        box-shadow: 0 2px 8px #19875422;
    }
    .progress-bar.bg-primary, .progress-bar.bg-primary {
        background-color: #012970 !important;
    }
    .btn-next-custom {
        background: #012970;
        color: #fff;
        border-radius: 2rem;
        font-weight: 600;
        border: none;
        transition: background 0.2s;
    }
    .btn-next-custom:hover {
        background: #0a1a3c;
        color: #fff;
    }
    .card-body.p-4.pb-2 {
        padding-top: 1rem !important;
        padding-bottom: 0.5rem !important;
    }
    .px-4.pt-4 {
        padding-top: 1rem !important;
        padding-left: 1.5rem !important;
        padding-right: 1.5rem !important;
    }
    .card-footer.bg-white.d-flex.flex-wrap.justify-content-center.gap-2.py-3 {
        padding-top: 0.5rem !important;
        padding-bottom: 0.5rem !important;
    }
    .d-flex.justify-content-between.align-items-center.px-4.pb-4.pt-2 {
        padding-top: 0.5rem !important;
        padding-bottom: 1rem !important;
        padding-left: 1.5rem !important;
        padding-right: 1.5rem !important;
    }
</style>
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card shadow-sm border-0 rounded-4 mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 rounded-top-4 border-bottom">
                <div class="fw-bold fs-5 timer-box">
                    <i class="bi bi-clock-history me-2"></i>Time Left: <span id="timer"><span id="timer-hours">--</span> <span style="margin:0 2px;">:</span> <span id="timer-minutes">--</span> <span style="margin:0 2px;">:</span> <span id="timer-seconds">--</span></span>
                </div>
                <div class="fw-bold">
                    <i class="bi bi-list-ol me-1"></i> {{ count($questions) }} Questions
                </div>
            </div>
            <div class="px-4 pt-4">
                <div class="progress">
                    <div class="progress-bar bg-primary" id="progress-bar" role="progressbar" style="width: 0%"></div>
                </div>
            </div>
            <div id="answer-alert" class="alert alert-warning text-center py-2" style="display:none; position:fixed; top:80px; left:50%; transform:translateX(-50%); z-index:9999; min-width:250px; max-width:90%;">
                Please select an answer before proceeding to the next question.
            </div>
            <form id="test-form" action="{{ route('learner.test.submit', $test) }}" method="POST">
                @csrf
                <div class="card-body p-4 pb-2">
                    <div id="questions-container">
                        @foreach ($questions as $index => $question)
                            <div class="question-item question-animate {{ $index === 0 ? 'current-question' : '' }}" data-index="{{ $index }}" style="{{ $index === 0 ? '' : 'display:none;' }}">
                                <div class="mb-4">
                                    <span class="badge bg-primary fs-6 mb-2">Question {{ $index + 1 }} of {{ count($questions) }}</span>
                                    <p class="card-text fs-5 fw-bold mt-2">{{ $question->question_text }}</p>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-check bg-light rounded-3 p-3">
                                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="q{{ $question->id }}_a" value="a">
                                            <label class="form-check-label" for="q{{ $question->id }}_a">
                                                {{ $question->option_a }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check bg-light rounded-3 p-3">
                                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="q{{ $question->id }}_b" value="b">
                                            <label class="form-check-label" for="q{{ $question->id }}_b">
                                                {{ $question->option_b }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check bg-light rounded-3 p-3">
                                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="q{{ $question->id }}_c" value="c">
                                            <label class="form-check-label" for="q{{ $question->id }}_c">
                                                {{ $question->option_c }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check bg-light rounded-3 p-3">
                                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="q{{ $question->id }}_d" value="d">
                                            <label class="form-check-label" for="q{{ $question->id }}_d">
                                                {{ $question->option_d }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="question_ids[]" value="{{ $question->id }}">
                                <input type="hidden" name="correct_answers[{{ $question->id }}]" value="{{ strtolower($question->correct_answer) }}">
                                <input type="hidden" name="marks[{{ $question->id }}]" value="{{ $question->marks }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer bg-white d-flex flex-wrap justify-content-center gap-2 py-3">
                    @foreach ($questions as $index => $question)
                        <button type="button" class="btn-circle question-nav-btn {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                            {{ $index + 1 }}
                        </button>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between align-items-center px-4 pb-4 pt-2">
                    <button type="button" id="prev-btn" class="btn btn-next-custom btn-lg px-4" disabled>
                        <i class="bi bi-arrow-left-circle me-2"></i> Previous
                    </button>
                    <button type="button" id="next-btn" class="btn btn-next-custom btn-lg px-4">
                        Next <i class="bi bi-arrow-right-circle ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
(function() {
    const questions = document.querySelectorAll('.question-item');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const navButtons = document.querySelectorAll('.question-nav-btn');
    const totalQuestions = questions.length;
    let currentIndex = 0;
    const answerAlert = document.getElementById('answer-alert');

    function showAlert() {
        answerAlert.style.display = 'block';
        setTimeout(() => { answerAlert.style.display = 'none'; }, 1800);
    }

    function isAnswered(index) {
        const radios = questions[index].querySelectorAll('input[type="radio"]');
        return Array.from(radios).some(radio => radio.checked);
    }

    function showQuestion(index) {
        questions.forEach((q, i) => {
            q.style.display = (i === index) ? '' : 'none';
            q.classList.toggle('current-question', i === index);
        });
        navButtons.forEach((btn, i) => {
            btn.classList.toggle('active', i === index);
        });
        prevBtn.disabled = (index === 0);
        nextBtn.innerHTML = (index === totalQuestions - 1) ? 'Submit <i class="bi bi-check-circle ms-2"></i>' : 'Next <i class="bi bi-arrow-right-circle ms-2"></i>';
        // Progress bar
        const progress = ((index + 1) / totalQuestions) * 100;
        document.getElementById('progress-bar').style.width = progress + '%';
    }

    function markAnswered(questionIndex) {
        const btn = navButtons[questionIndex];
        btn.dataset.answered = "true";
    }

    questions.forEach((questionDiv, index) => {
        const radios = questionDiv.querySelectorAll('input[type="radio"]');
        radios.forEach(radio => {
            radio.addEventListener('change', () => {
                markAnswered(index);
            });
            if (radio.checked) {
                markAnswered(index);
            }
        });
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            showQuestion(currentIndex);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (!isAnswered(currentIndex)) {
            showAlert();
            return;
        }
        if (currentIndex < totalQuestions - 1) {
            currentIndex++;
            showQuestion(currentIndex);
        } else {
            document.getElementById('test-form').submit();
        }
    });

    navButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const index = parseInt(btn.getAttribute('data-index'));
            if (index !== currentIndex && !isAnswered(currentIndex)) {
                showAlert();
                return;
            }
            currentIndex = index;
            showQuestion(currentIndex);
        });
    });

    let duration = {{ $duration * 60 }};
    let timerHours = document.getElementById('timer-hours');
    let timerMinutes = document.getElementById('timer-minutes');
    let timerSeconds = document.getElementById('timer-seconds');
    let interval = setInterval(function() {
        let hours = Math.floor(duration / 3600);
        let minutes = Math.floor((duration % 3600) / 60);
        let seconds = duration % 60;
        timerHours.textContent = String(hours).padStart(2, '0');
        timerMinutes.textContent = String(minutes).padStart(2, '0');
        timerSeconds.textContent = String(seconds).padStart(2, '0');
        if (--duration < 0) {
            clearInterval(interval);
            document.getElementById('test-form').submit();
        }
    }, 1000);
    showQuestion(currentIndex);
})();

window.addEventListener('beforeunload', function(e) {
    if (!window.formSubmitted) {
        window.formSubmitted = true;
        document.getElementById('test-form').submit();
    }
});
</script>
@endsection
