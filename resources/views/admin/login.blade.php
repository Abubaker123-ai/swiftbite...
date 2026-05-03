<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — SwiftBite</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: #0f1117;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .login-card {
            background: #1a1d27;
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 16px;
            padding: 48px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 24px 64px rgba(0,0,0,.4);
        }
        .login-brand {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-brand__name {
            font-size: 1.6rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -.3px;
        }
        .login-brand__name span { color: #3ecf8e; }
        .login-brand__sub {
            font-size: .8rem;
            color: rgba(255,255,255,.35);
            margin-top: 6px;
            text-transform: uppercase;
            letter-spacing: .8px;
            font-weight: 600;
        }
        .form-group { margin-bottom: 20px; }
        .form-label {
            display: block;
            font-size: .82rem;
            font-weight: 600;
            color: rgba(255,255,255,.6);
            margin-bottom: 8px;
            letter-spacing: .2px;
        }
        .form-control {
            width: 100%;
            padding: 12px 14px;
            background: rgba(255,255,255,.05);
            border: 1.5px solid rgba(255,255,255,.1);
            border-radius: 8px;
            font-size: .92rem;
            font-family: inherit;
            color: #fff;
            outline: none;
            transition: border-color .2s;
        }
        .form-control:focus { border-color: #3ecf8e; }
        .form-control::placeholder { color: rgba(255,255,255,.2); }
        .error-msg {
            font-size: .8rem;
            color: #f87171;
            margin-top: 6px;
            display: block;
        }
        .btn-login {
            width: 100%;
            padding: 13px;
            background: #3ecf8e;
            color: #0f1117;
            border: none;
            border-radius: 8px;
            font-size: .95rem;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            transition: background .2s;
            margin-top: 4px;
        }
        .btn-login:hover { background: #2aa870; }
        .back-link {
            text-align: center;
            margin-top: 20px;
            font-size: .82rem;
            color: rgba(255,255,255,.3);
        }
        .back-link a { color: #3ecf8e; }
        .back-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-brand">
            <p class="login-brand__name">Swift<span>Bite</span></p>
            <p class="login-brand__sub">Admin Panel</p>
        </div>

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Admin Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter admin password"
                    autofocus
                >
                @error('password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn-login">Login to Admin →</button>
        </form>

        <p class="back-link"><a href="{{ route('home') }}">← Back to website</a></p>
    </div>
</body>
</html>
