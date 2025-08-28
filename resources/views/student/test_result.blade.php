@extends('learner.index')

@section('content')
<style>
    body, .result-bg {
        background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%) !important;
        min-height: 100vh;
    }
    .result-card {
        border-radius: 2rem;
        box-shadow: 0 8px 32px 0 rgba(1,41,112,0.13);
        margin-top: 1rem;
        animation: popIn 0.7s cubic-bezier(.23,1.12,.72,.98);
        background: #fff;
    }
    @keyframes popIn {
        0% { transform: scale(0.95); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
    .result-header {
        background: #012970;
        color: #fff;
        border-radius: 2rem 2rem 0 0;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-align: center;
        padding: 0.7rem 0 0.4rem 0;
        box-shadow: 0 2px 8px #01297011;
    }
    .result-icon {
        font-size: 3.2rem;
        margin-top: -1.2rem;
        margin-bottom: 0.7rem;
        display: inline-block;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 2px 12px #01297011;
        padding: 0.7rem 1rem;
        color: #198754;
        border: 2px solid #e9ecef;
    }
    .result-icon.fail {
        color: #dc3545;
    }
    .result-icon.bounce {
        animation: scaleTrophy 1.2s infinite cubic-bezier(.68,-0.55,.27,1.55);
    }
    .result-icon.bounce i {
        animation: scaleTrophy 5s infinite cubic-bezier(.68,-0.55,.27,1.55);
    }
    @keyframes scaleTrophy {
        0%, 100% { transform: scale(1); }
        30% { transform: scale(1.08, 0.92); }
        50% { transform: scale(0.96, 1.04); }
        70% { transform: scale(1.04, 0.96); }
    }
    .result-badge {
        font-size: 1.1rem;
        padding: 0.4rem 1.2rem;
        border-radius: 2rem;
        font-weight: 700;
        margin-top: 0.3rem;
        margin-bottom: 0.3rem;
        letter-spacing: 1px;
    }
    .result-list .list-group-item {
        font-size: 1rem;
        padding: 0.5rem 1rem;
        border: none;
        border-bottom: 1px solid #f0f0f0;
        background: transparent;
    }
    .result-list .list-group-item:last-child {
        border-bottom: none;
    }
    .score-circle {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: #e0e7ff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1.2rem auto 0.7rem auto;
        box-shadow: 0 2px 12px #01297011;
        border: 4px solid #01297022;
        position: relative;
    }
    .score-circle .score {
        font-size: 2.2rem;
        font-weight: 800;
        color: #012970;
        line-height: 1;
    }
    .score-circle .percent {
        font-size: 1.1rem;
        color: #198754;
        font-weight: 700;
        position: absolute;
        bottom: 18px;
        left: 0; right: 0;
        text-align: center;
    }
    .motivation {
        font-size: 1.05rem;
        font-weight: 500;
        margin: 0.7rem 0 0.3rem 0;
        color: #012970;
    }
    .motivation.fail {
        color: #dc3545;
    }
    .card-footer.text-center.bg-white.rounded-bottom-4 {
        padding-top: 0.4rem !important;
        padding-bottom: 0.4rem !important;
        border-radius: 0 0 2rem 2rem;
    }
    .confetti-canvas {
        position: fixed;
        top: 0; left: 0; width: 100vw; height: 100vh;
        pointer-events: none;
        z-index: 9999;
    }
    .result-icon-holder {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0.7rem;
    }
    .result-icon-holder .result-icon {
        box-shadow: 0 4px 24px 0 rgba(1,41,112,0.18), 0 1.5px 6px 0 #19875433;
    }
</style>
<div class="result-bg">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card result-card mx-auto" style="max-width: 600px;">
                <div class="result-header">
                    Test Result
                </div>
                <div class="card-body text-center">
                    @if($testResult->percentage >= 50)
                        <div class="result-icon-holder">
                            <span class="result-icon"><i class="bi bi-trophy-fill"></i></span>
                        </div>
                    @else
                        <span class="result-icon fail" style="box-shadow:none;"><i class="bi bi-emoji-frown-fill"></i></span>
                    @endif
                    <h4 class="mb-2 fw-bold" style="color: #012970;">{{ $test->title ?? 'Test' }}</h4>
                    <ul class="list-group mb-3 result-list">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Name:</span>
                            <span class="fw-bold">{{ $user->name ?? $testResult->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Score:</span>
                            <span class="fw-bold text-success">{{ $testResult->score }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Percentage:</span>
                            <span class="fw-bold text-success">{{ number_format($testResult->percentage, 2) }}%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Date:</span>
                            <span class="fw-bold">{{ $testResult->created_at->format('F j, Y, g:i a') }}</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        @if($testResult->percentage >= 50)
                            <span class="badge bg-success result-badge">Passed</span>
                            <div class="motivation">Congratulations! You did great. Keep up the good work! <i class="bi bi-stars"></i></div>
                        @else
                            <span class="badge bg-danger result-badge">Failed</span>
                            <div class="motivation fail">Don't give up! Review the material and try again. <i class="bi bi-emoji-smile"></i></div>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-center bg-white rounded-bottom-4">
                    <a href="{{ route('learner.dashboard') }}" class="btn btn-outline-primary mt-2">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    @if($testResult->percentage >= 50)
        <canvas id="confetti-canvas" class="confetti-canvas"></canvas>
        <script>
        // Simple confetti effect
        (function() {
            const canvas = document.getElementById('confetti-canvas');
            const ctx = canvas.getContext('2d');
            let W = window.innerWidth, H = window.innerHeight;
            canvas.width = W; canvas.height = H;
            let particles = [];
            let colors = ['#198754', '#012970', '#ffc107', '#0d6efd', '#dc3545'];
            for(let i=0; i<120; i++) {
                particles.push({
                    x: Math.random()*W,
                    y: Math.random()*H - H,
                    r: Math.random()*8+4,
                    d: Math.random()*W/60,
                    color: colors[Math.floor(Math.random()*colors.length)],
                    tilt: Math.floor(Math.random()*10)-10
                });
            }
            function draw() {
                ctx.clearRect(0,0,W,H);
                for(let i=0; i<particles.length; i++) {
                    let p = particles[i];
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.r, 0, Math.PI*2, false);
                    ctx.fillStyle = p.color;
                    ctx.fill();
                }
                update();
            }
            function update() {
                for(let i=0; i<particles.length; i++) {
                    let p = particles[i];
                    p.y += Math.cos(p.d) + 2 + p.r/2;
                    p.x += Math.sin(0) + Math.sin(p.d);
                    if(p.y > H) {
                        particles[i] = {x: Math.random()*W, y: -10, r: p.r, d: p.d, color: p.color, tilt: p.tilt};
                    }
                }
            }
            function loop() {
                draw();
                requestAnimationFrame(loop);
            }
            loop();
            setTimeout(() => { canvas.style.display = 'none'; }, 4500);
            window.addEventListener('resize', function() {
                W = window.innerWidth; H = window.innerHeight;
                canvas.width = W; canvas.height = H;
            });
        })();
        </script>
    @endif
</div>
@endsection
