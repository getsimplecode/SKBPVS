<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Key — SK Balintarak</title>
    <link href="{{ asset('sklogo.png') }}" rel="icon">
    <link href="{{ asset('sklogo.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background: #f2faf5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Decorative background circles */
        body::before {
            content: '';
            position: fixed;
            top: -120px; left: -120px;
            width: 420px; height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,51,26,0.10) 0%, transparent 70%);
            pointer-events: none;
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -100px; right: -100px;
            width: 380px; height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,166,81,0.10) 0%, transparent 70%);
            pointer-events: none;
        }

        /* ── CARD ────────────────────────────────────────────── */
        .ek-card {
            display: flex;
            width: 100%;
            max-width: 880px;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(0,51,26,0.18), 0 4px 16px rgba(0,0,0,0.08);
            position: relative;
            z-index: 1;
            animation: cardIn 0.6s cubic-bezier(.22,.68,0,1.2) both;
        }
        @keyframes cardIn {
            from { opacity: 0; transform: translateY(28px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* ── LEFT PANEL ──────────────────────────────────────── */
        .ek-left {
            background: linear-gradient(160deg, #00331a 0%, #005c30 60%, #004d28 100%);
            width: 45%;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 36px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Decorative pattern on left panel */
        .ek-left::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 220px; height: 220px;
            border-radius: 50%;
            border: 40px solid rgba(255,255,255,0.04);
            pointer-events: none;
        }
        .ek-left::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -40px;
            width: 260px; height: 260px;
            border-radius: 50%;
            border: 50px solid rgba(255,255,255,0.03);
            pointer-events: none;
        }

        /* Logo */
        .ek-logo-ring {
            position: relative;
            width: 110px; height: 110px;
            margin: 0 auto 28px;
            flex-shrink: 0;
        }
        .ek-logo-ring::before {
            content: '';
            position: absolute;
            inset: -5px;
            border-radius: 50%;
            background: conic-gradient(rgba(255,255,255,0.8), rgba(0,166,81,0.6), rgba(255,255,255,0.8));
            animation: spinRing 6s linear infinite;
            z-index: 0;
        }
        @keyframes spinRing { to { transform: rotate(360deg); } }
        .ek-logo-ring img {
            position: relative;
            z-index: 1;
            width: 110px; height: 110px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #00331a;
            display: block;
        }

        /* EASY KEY brand */
        .ek-brand {
            margin-bottom: 6px;
            line-height: 1;
        }
        .ek-brand-text {
            font-family: 'Rajdhani', sans-serif;
            font-size: 3rem;
            font-weight: 700;
            letter-spacing: 3px;
            color: rgba(255,255,255,0.30);
            display: inline-block;
        }
        /* The E and K stand out */
        .ek-brand-text .ek-letter {
            color: #ffffff;
            font-size: 3.6rem;
            text-shadow: 0 0 24px rgba(255,255,255,0.35);
            display: inline-block;
            animation: letterPop 0.5s cubic-bezier(.22,.68,0,1.4) both;
        }
        .ek-brand-text .ek-letter:nth-child(1) { animation-delay: 0.5s; }
        .ek-brand-text .ek-letter:nth-child(2) { animation-delay: 0.65s; }
        @keyframes letterPop {
            from { transform: translateY(-8px) scale(0.8); opacity: 0; }
            to   { transform: translateY(0) scale(1); opacity: 1; }
        }

        .ek-brand-sub {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.40);
            margin-bottom: 20px;
        }

        .ek-divider {
            width: 40px; height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            margin: 0 auto 18px;
        }

        .ek-system-name {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: rgba(255,255,255,0.85);
            letter-spacing: 1px;
            text-transform: uppercase;
            line-height: 1.4;
            margin-bottom: 4px;
        }
        .ek-barangay {
            font-size: 0.70rem;
            color: rgba(255,255,255,0.45);
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* Live dot */
        .ek-live {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 20px;
            padding: 5px 14px;
            font-size: 0.68rem;
            color: rgba(255,255,255,0.55);
            letter-spacing: 0.5px;
            margin-top: 22px;
        }
        .ek-live span {
            width: 6px; height: 6px;
            background: #4ade80;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%   { box-shadow: 0 0 0 0 rgba(74,222,128,0.6); }
            70%  { box-shadow: 0 0 0 6px rgba(74,222,128,0); }
            100% { box-shadow: 0 0 0 0 rgba(74,222,128,0); }
        }

        /* ── RIGHT PANEL ─────────────────────────────────────── */
        .ek-right {
            background: #ffffff;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 44px;
        }
        .ek-form-wrap { width: 100%; }

        .ek-form-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #0f2d1a;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 4px;
        }
        .ek-form-sub {
            font-size: 0.78rem;
            color: #6b8a74;
            margin-bottom: 28px;
        }

        /* Form inputs */
        .ek-input-group { margin-bottom: 18px; }
        .ek-label {
            display: block;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #4b6057;
            margin-bottom: 6px;
        }
        .ek-input {
            width: 100%;
            background: #f8fafb;
            border: 1.5px solid #d4e6da;
            border-radius: 10px;
            padding: 11px 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: #0f2d1a;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }
        .ek-input:focus {
            border-color: #00331a;
            box-shadow: 0 0 0 3px rgba(0,51,26,0.10);
            background: #ffffff;
        }
        .ek-input::placeholder { color: #9aada0; }

        /* Login button */
        .ek-btn {
            width: 100%;
            background: #00331a;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(0,51,26,0.25);
            margin-top: 8px;
        }
        .ek-btn:hover {
            background: #004d28;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,51,26,0.30);
        }
        .ek-btn:active { transform: translateY(0); }

        /* Error */
        .ek-error {
            background: #fff0f0;
            border: 1px solid #ffc8c8;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.8rem;
            color: #dc3545;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Footer note */
        .ek-footer-note {
            text-align: center;
            margin-top: 24px;
            font-size: 0.68rem;
            color: #9aada0;
            letter-spacing: 0.5px;
        }
        .ek-footer-note strong { color: #00331a; }

        /* ── RESPONSIVE ──────────────────────────────────────── */
        @media (max-width: 640px) {
            .ek-card { flex-direction: column; }
            .ek-left { width: 100%; padding: 36px 24px; }
            .ek-right { padding: 32px 24px; }
            .ek-logo-ring { width: 80px; height: 80px; }
            .ek-logo-ring img { width: 80px; height: 80px; }
            .ek-brand-text { font-size: 2.2rem; }
            .ek-brand-text .ek-letter { font-size: 2.8rem; }
        }
    </style>
</head>

<body>

    <div class="ek-card">

        <!-- ── LEFT PANEL ─────────────────────────────────── -->
        <div class="ek-left">

            <div class="ek-logo-ring">
                <img src="{{ asset('sklogo.png') }}"
                     alt="SK Logo"
                     onerror="this.style.opacity='0.5'">
            </div>

            <!-- EASY KEY Brand -->
            <div class="ek-brand">
                <div class="ek-brand-text">
                    Ea<span class="ek-letter">S</span>y<span class="ek-letter">K</span>ey
                </div>
            </div>
            <div class="ek-brand-sub">Youth Management System</div>

            <div class="ek-divider"></div>

            <div class="ek-system-name">
                Sangguniang Kabataan<br>Barangay Balintawak
            </div>
            <div class="ek-barangay">Profiling &amp; Verification System</div>

            <div class="ek-live">
                <span></span> System Active
            </div>

        </div>

        <!-- ── RIGHT PANEL ────────────────────────────────── -->
        <div class="ek-right">
            <div class="ek-form-wrap">

                <div class="ek-form-title">Welcome Back 👋</div>
                <div class="ek-form-sub">Sign in to access the Easy Key dashboard</div>

                {{-- Error message --}}
                @if ($errors->any())
                <div class="ek-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="ek-input-group">
                        <label class="ek-label">Email Address</label>
                        <input type="email" name="email"
                               class="ek-input"
                               placeholder="name@example.com"
                               value="{{ old('email') }}"
                               required>
                    </div>

                    <div class="ek-input-group">
                        <label class="ek-label">Password</label>
                        <input type="password" name="password"
                               class="ek-input"
                               placeholder="••••••••"
                               required>
                    </div>

                    <button type="submit" class="ek-btn">
                        🔑 &nbsp; Sign In
                    </button>

                </form>

                <div class="ek-footer-note">
                    <strong>Easy Key</strong> &nbsp;·&nbsp; SK Barangay Balintarak &nbsp;·&nbsp; Authorized Access Only
                </div>

            </div>
        </div>

    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>