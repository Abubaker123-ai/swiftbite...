@extends('layouts.app')

@section('title', 'Contact Us — SwiftBite')

@push('styles')
<style>
    /* ── Page Hero ── */
    .page-hero {
        background: linear-gradient(160deg, var(--dark) 0%, var(--dark-2) 100%);
        padding: 72px 24px 64px;
        text-align: center;
        width: 100%;
        position: relative; overflow: hidden;
    }
    .page-hero::before {
        content: '';
        position: absolute;
        top: -60px; left: 50%; transform: translateX(-50%);
        width: 500px; height: 300px;
        background: radial-gradient(ellipse, rgba(62,207,142,.12) 0%, transparent 70%);
        pointer-events: none;
    }
    .page-hero__label { font-size: .78rem; font-weight: 600; letter-spacing: .8px; text-transform: uppercase; color: var(--green); margin-bottom: 12px; display: block; }
    .page-hero__title { font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; color: var(--white); letter-spacing: -.4px; margin-bottom: 14px; }
    .page-hero__sub { font-size: 1rem; color: rgba(255,255,255,.5); max-width: 500px; margin: 0 auto; }

    /* ── Contact Layout ── */
    .contact-wrap {
        display: grid;
        grid-template-columns: 1fr 1.6fr;
        gap: 48px;
        padding: 64px 0 48px;
        align-items: start;
    }
    @media (max-width: 720px) { .contact-wrap { grid-template-columns: 1fr; } }

    /* ── Info Side ── */
    .contact-info__title { font-size: 1.35rem; font-weight: 700; color: var(--gray-900); margin-bottom: 12px; }
    .contact-info__text { font-size: .92rem; color: var(--gray-500); line-height: 1.75; margin-bottom: 32px; }
    .info-item { display: flex; gap: 14px; align-items: flex-start; margin-bottom: 22px; }
    .info-item__icon {
        width: 44px; height: 44px; min-width: 44px;
        background: var(--green-light);
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        border: 1px solid #b7deca;
    }
    .info-item__label { font-size: .78rem; color: var(--gray-500); text-transform: uppercase; letter-spacing: .5px; font-weight: 600; margin-bottom: 2px; }
    .info-item__value { font-size: .92rem; color: var(--gray-900); font-weight: 500; }

    /* ── Form Card ── */
    .form-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 16px;
        padding: 40px 36px;
        box-shadow: var(--shadow);
    }
    .form-card__title { font-size: 1.2rem; font-weight: 700; color: var(--gray-900); margin-bottom: 24px; }
    .form-group { margin-bottom: 20px; }
    .form-label {
        display: block;
        font-size: .85rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 7px;
    }
    .form-label span { color: #e53e3e; margin-left: 2px; }
    .form-control {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid var(--gray-200);
        border-radius: var(--radius);
        font-size: .92rem;
        font-family: inherit;
        color: var(--gray-900);
        background: var(--white);
        transition: border-color var(--transition), box-shadow var(--transition);
        outline: none;
    }
    .form-control:focus {
        border-color: var(--green);
        box-shadow: 0 0 0 3px rgba(58,158,111,.12);
    }
    .form-control.is-invalid { border-color: #e53e3e; }
    .invalid-feedback { font-size: .8rem; color: #e53e3e; margin-top: 5px; display: block; }
    textarea.form-control { resize: vertical; min-height: 130px; }
    .btn-submit {
        width: 100%;
        padding: 13px;
        background: var(--green);
        color: white;
        border: none;
        border-radius: var(--radius);
        font-size: .95rem;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        transition: background var(--transition);
    }
    .btn-submit:hover { background: var(--green-dark); }

    /* ── Success Message ── */
    .success-box {
        text-align: center;
        padding: 48px 32px;
    }
    .success-box__icon { font-size: 3.5rem; margin-bottom: 20px; display: block; }
    .success-box__title { font-size: 1.3rem; font-weight: 700; color: var(--gray-900); margin-bottom: 10px; }
    .success-box__text { font-size: .93rem; color: var(--gray-500); margin-bottom: 24px; }
</style>
@endpush

@section('content')

{{-- Page Hero --}}
<section class="page-hero">
    <span class="page-hero__label">Get In Touch</span>
    <h1 class="page-hero__title">Contact Us</h1>
    <p class="page-hero__sub">Have a question or want to place a special order? We'd love to hear from you.</p>
</section>

<div class="container">
<div class="contact-wrap">

    {{-- Left: Contact Info --}}
    <div class="contact-info">
        <h2 class="contact-info__title">Let's Talk</h2>
        <p class="contact-info__text">
            Whether you have a question, feedback, or a catering request —
            our team is here to help. Fill out the form and we'll get back to you within 24 hours.
        </p>

        <div class="info-item">
            <div class="info-item__icon">📍</div>
            <div>
                <p class="info-item__label">Address</p>
                <p class="info-item__value">123 Food Street, Lahore, Pakistan</p>
            </div>
        </div>
        <div class="info-item">
            <div class="info-item__icon">📞</div>
            <div>
                <p class="info-item__label">Phone</p>
                <p class="info-item__value">+92 300 1234567</p>
            </div>
        </div>
        <div class="info-item">
            <div class="info-item__icon">✉️</div>
            <div>
                <p class="info-item__label">Email</p>
                <p class="info-item__value">hello@swiftbite.com</p>
            </div>
        </div>
        <div class="info-item">
            <div class="info-item__icon">🕐</div>
            <div>
                <p class="info-item__label">Working Hours</p>
                <p class="info-item__value">Mon – Sat: 9:00 AM – 10:00 PM</p>
            </div>
        </div>
    </div>

    {{-- Right: Form --}}
    <div class="form-card">

        @if(session('success'))
            <div class="success-box">
                <span class="success-box__icon">✅</span>
                <h3 class="success-box__title">Message Sent Successfully!</h3>
                <p class="success-box__text">Thank you for reaching out. We'll get back to you within 24 hours.</p>
                <a href="{{ route('contact') }}" class="btn-submit" style="display:inline-block; width:auto; padding: 12px 28px; text-decoration:none;">Send Another Message</a>
            </div>
        @else
            <h3 class="form-card__title">Send Us a Message</h3>

            <form action="{{ route('contact.store') }}" method="POST" novalidate>
                @csrf

                <div class="form-group">
                    <label class="form-label" for="name">Your Name <span>*</span></label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="e.g. Ahmed Raza"
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email Address <span>*</span></label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        placeholder="e.g. ahmed@example.com"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="message">Message <span>*</span></label>
                    <textarea
                        id="message"
                        name="message"
                        class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                        placeholder="Write your message here..."
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Send Message →</button>
            </form>
        @endif

    </div>
</div>
</div>{{-- /container --}}

@endsection
