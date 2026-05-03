<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SwiftBite - Fast, Fresh, and Reliable Service">
    <title>@yield('title', 'SwiftBite')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green:       #3ecf8e;
            --green-dark:  #2aa870;
            --green-dim:   #1a6b47;
            --green-light: #e8f5ee;
            --dark:        #0f1117;
            --dark-2:      #1a1d27;
            --dark-3:      #22263a;
            --dark-card:   #1e2235;
            --gray-100:    #f8f9fa;
            --gray-200:    #e9ecef;
            --gray-400:    #9ca3af;
            --gray-500:    #6c757d;
            --gray-700:    #495057;
            --gray-900:    #212529;
            --white:       #ffffff;
            --radius:      8px;
            --shadow:      0 2px 16px rgba(0,0,0,.12);
            --transition:  .2s ease;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: var(--gray-900);
            background: var(--white);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }

        .container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ═══════════════════════════
           NAVBAR — Dark
        ═══════════════════════════ */
        .navbar {
            background: var(--dark);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 0 rgba(255,255,255,.06);
        }

        .navbar__inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 66px;
        }

        .navbar__brand {
            font-size: 1.45rem;
            font-weight: 800;
            letter-spacing: -.4px;
            color: var(--white);
        }

        .navbar__brand span {
            color: var(--green);
        }

        .navbar__brand::before {
            content: '⚡';
            margin-right: 6px;
            font-size: 1.1rem;
        }

        .navbar__links {
            display: flex;
            gap: 4px;
            list-style: none;
        }

        .navbar__links a {
            padding: 8px 18px;
            border-radius: var(--radius);
            font-size: .875rem;
            font-weight: 500;
            color: rgba(255,255,255,.65);
            transition: background var(--transition), color var(--transition);
            letter-spacing: .1px;
        }

        .navbar__links a:hover {
            background: rgba(255,255,255,.08);
            color: var(--white);
        }

        .navbar__links a.active {
            background: var(--green);
            color: var(--dark);
            font-weight: 700;
        }

        /* ═══════════════════════════
           MAIN
        ═══════════════════════════ */
        main { flex: 1; }

        /* ═══════════════════════════
           FOOTER — Rich Dark
        ═══════════════════════════ */
        .footer {
            background: var(--dark-2);
            color: var(--gray-400);
            padding: 56px 0 32px;
            margin-top: auto;
        }

        .footer__top {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255,255,255,.07);
            margin-bottom: 28px;
        }

        @media (max-width: 640px) {
            .footer__top { grid-template-columns: 1fr; gap: 28px; }
        }

        .footer__brand-name {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 10px;
            letter-spacing: -.3px;
        }

        .footer__brand-name span { color: var(--green); }

        .footer__tagline {
            font-size: .875rem;
            line-height: 1.65;
            color: var(--gray-400);
        }

        .footer__col-title {
            font-size: .78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: var(--white);
            margin-bottom: 16px;
        }

        .footer__col-links { list-style: none; }

        .footer__col-links li { margin-bottom: 10px; }

        .footer__col-links a {
            font-size: .875rem;
            color: var(--gray-400);
            transition: color var(--transition);
        }

        .footer__col-links a:hover { color: var(--green); }

        .footer__copy {
            text-align: center;
            font-size: .8rem;
            color: rgba(255,255,255,.3);
        }

        /* ═══════════════════════════
           ALERTS
        ═══════════════════════════ */
        .alert {
            padding: 14px 20px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-size: .9rem;
        }
        .alert-success {
            background: var(--green-light);
            color: var(--green-dim);
            border: 1px solid #b7deca;
        }
        .alert-error {
            background: #fdecea;
            color: #b91c1c;
            border: 1px solid #fca5a5;
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- ── Navigation ── --}}
    <nav class="navbar">
        <div class="container">
            <div class="navbar__inner">
                <a href="{{ route('home') }}" class="navbar__brand">
                    Swift<span>Bite</span>
                </a>
                <ul class="navbar__links">
                    <li>
                        <a href="{{ route('home') }}"
                           class="{{ request()->routeIs('home') ? 'active' : '' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                           class="{{ request()->routeIs('about') ? 'active' : '' }}">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                           class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ── Page Content ── --}}
    <main>
        @yield('content')
    </main>

    {{-- ── Footer ── --}}
    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div>
                    <p class="footer__brand-name">Swift<span>Bite</span></p>
                    <p class="footer__tagline">Fast, Fresh, and Reliable.<br>Your favourite meals delivered with care.</p>
                </div>
                <div>
                    <p class="footer__col-title">Navigation</p>
                    <ul class="footer__col-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <p class="footer__col-title">Contact</p>
                    <ul class="footer__col-links">
                        <li><a href="#">hello@swiftbite.com</a></li>
                        <li><a href="#">+92 300 1234567</a></li>
                        <li><a href="#">Lahore, Pakistan</a></li>
                    </ul>
                </div>
            </div>
            <p class="footer__copy">
                &copy; {{ date('Y') }} SwiftBite. All rights reserved.
            </p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
