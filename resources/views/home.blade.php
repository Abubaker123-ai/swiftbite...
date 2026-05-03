@extends('layouts.app')

@section('title', 'SwiftBite — Fast, Fresh, and Reliable')

@push('styles')
<style>
    /* ── Hero ── */
    .hero {
        background: linear-gradient(160deg, var(--dark) 0%, var(--dark-2) 60%, #0d2018 100%);
        padding: 100px 24px 90px;
        text-align: center;
        position: relative;
        overflow: hidden;
        width: 100%;
    }
    .hero::before {
        content: '';
        position: absolute;
        top: -80px; left: 50%; transform: translateX(-50%);
        width: 700px; height: 450px;
        background: radial-gradient(ellipse, rgba(62,207,142,.15) 0%, transparent 70%);
        pointer-events: none;
    }
    .hero__badge {
        display: inline-block;
        background: rgba(62,207,142,.12);
        color: var(--green);
        font-size: .8rem;
        font-weight: 600;
        letter-spacing: .6px;
        text-transform: uppercase;
        padding: 6px 18px;
        border-radius: 50px;
        margin-bottom: 24px;
        border: 1px solid rgba(62,207,142,.3);
    }
    .hero__title {
        font-size: clamp(2rem, 5vw, 3.4rem);
        font-weight: 800;
        color: var(--white);
        line-height: 1.15;
        margin-bottom: 16px;
        letter-spacing: -.5px;
    }
    .hero__title span { color: var(--green); }
    .hero__tagline {
        font-size: 1.15rem;
        color: rgba(255,255,255,.55);
        margin-bottom: 20px;
        font-weight: 400;
    }
    .hero__desc {
        max-width: 560px;
        margin: 0 auto 36px;
        font-size: .97rem;
        color: rgba(255,255,255,.6);
        line-height: 1.8;
    }
    .hero__actions { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
    .btn {
        display: inline-block;
        padding: 13px 30px;
        border-radius: var(--radius);
        font-size: .92rem;
        font-weight: 600;
        transition: all var(--transition);
        cursor: pointer;
    }
    .btn-primary { background: var(--green); color: var(--dark); border: 2px solid var(--green); }
    .btn-primary:hover { background: var(--green-dark); border-color: var(--green-dark); }
    .btn-outline { background: transparent; color: var(--white); border: 2px solid rgba(255,255,255,.35); }
    .btn-outline:hover { background: rgba(255,255,255,.08); border-color: rgba(255,255,255,.6); }

    /* ── Section shared ── */
    .section { padding: 72px 0; }
    .section__header { text-align: center; margin-bottom: 48px; }
    .section__label {
        display: inline-block;
        font-size: .78rem; font-weight: 600; letter-spacing: .8px;
        text-transform: uppercase; color: var(--green); margin-bottom: 10px;
    }
    .section__title {
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 700; color: var(--gray-900);
        letter-spacing: -.3px; margin-bottom: 12px;
    }
    .section__sub { font-size: .97rem; color: var(--gray-500); max-width: 500px; margin: 0 auto; }

    /* ── Service Cards ── */
    .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; }
    .card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 12px; padding: 32px 28px;
        transition: box-shadow var(--transition), transform var(--transition);
    }
    .card:hover { box-shadow: 0 8px 30px rgba(0,0,0,.1); transform: translateY(-3px); }
    .card__icon {
        width: 52px; height: 52px;
        background: var(--green-light); border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem; margin-bottom: 20px;
    }
    .card__title { font-size: 1.05rem; font-weight: 700; color: var(--gray-900); margin-bottom: 10px; }
    .card__text { font-size: .9rem; color: var(--gray-500); line-height: 1.7; }

    /* ── Why Choose Us — Dark ── */
    .why-section {
        background: var(--dark-2);
        width: 100%;
        padding: 72px 24px;
    }
    .why-section .section__label { color: var(--green); }
    .why-section .section__title { color: var(--white); }
    .why-section .section__sub { color: rgba(255,255,255,.45); }
    .why-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; }
    .why-item {
        background: rgba(255,255,255,.04);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 12px; padding: 24px 20px;
        display: flex; gap: 14px; align-items: flex-start;
        transition: border-color var(--transition), background var(--transition);
    }
    .why-item:hover { background: rgba(62,207,142,.07); border-color: rgba(62,207,142,.25); }
    .why-item__check {
        width: 38px; height: 38px; min-width: 38px;
        background: var(--green); border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: var(--dark); font-size: 1rem; font-weight: 700;
    }
    .why-item__title { font-weight: 600; color: var(--white); margin-bottom: 5px; font-size: .97rem; }
    .why-item__text { font-size: .87rem; color: rgba(255,255,255,.45); line-height: 1.6; }

    /* ── CTA Banner ── */
    .cta-wrap { padding: 72px 0; }
    .cta-banner {
        background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%);
        border-radius: 16px; padding: 56px 40px;
        text-align: center; color: white;
    }
    .cta-banner h2 { font-size: 1.8rem; font-weight: 700; margin-bottom: 12px; }
    .cta-banner p { font-size: .97rem; opacity: .85; margin-bottom: 28px; }
    .btn-white {
        display: inline-block;
        background: white; color: var(--green-dark);
        border: 2px solid white;
        padding: 13px 30px; border-radius: var(--radius);
        font-weight: 600; font-size: .92rem;
        transition: all var(--transition);
    }
    .btn-white:hover { background: var(--green-light); border-color: var(--green-light); }
</style>
@endpush

@section('content')

{{-- Hero — Full Width --}}
<section class="hero">
    <div class="hero__badge">🚀 Now Serving Fresh & Fast</div>
    <h1 class="hero__title">Welcome to <span>SwiftBite</span></h1>
    <p class="hero__tagline">Fast, Fresh, and Reliable Service</p>
    <p class="hero__desc">
        SwiftBite is your go-to destination for quick, quality food delivered with care.
        We believe every meal should be an experience — fresh ingredients, fast delivery,
        and a smile with every order.
    </p>
    <div class="hero__actions">
        <a href="{{ route('contact') }}" class="btn btn-primary">Get in Touch</a>
        <a href="{{ route('about') }}" class="btn btn-outline">Learn More</a>
    </div>
</section>

{{-- Services — Contained --}}
<section class="section">
    <div class="container">
        <div class="section__header">
            <span class="section__label">What We Offer</span>
            <h2 class="section__title">Our Services</h2>
            <p class="section__sub">Everything you need for a great food experience, all in one place.</p>
        </div>
        <div class="cards">
            <div class="card">
                <div class="card__icon">🍔</div>
                <h3 class="card__title">Fresh Food Delivery</h3>
                <p class="card__text">Get your favourite meals delivered hot and fresh right to your doorstep. We partner with top local restaurants to bring you the best.</p>
            </div>
            <div class="card">
                <div class="card__icon">⚡</div>
                <h3 class="card__title">Express Service</h3>
                <p class="card__text">Need it fast? Our express option ensures your order arrives in under 30 minutes. No compromises on speed or quality.</p>
            </div>
            <div class="card">
                <div class="card__icon">📦</div>
                <h3 class="card__title">Bulk & Catering Orders</h3>
                <p class="card__text">Planning an event or office lunch? We handle bulk orders with ease — professionally packed and delivered on time.</p>
            </div>
        </div>
    </div>
</section>

{{-- Why Choose Us — Full Width Dark --}}
<section class="why-section">
    <div class="container">
        <div class="section__header">
            <span class="section__label">Our Strengths</span>
            <h2 class="section__title">Why Choose SwiftBite?</h2>
            <p class="section__sub">We're not just another food service — here's what sets us apart.</p>
        </div>
        <div class="why-grid">
            <div class="why-item">
                <div class="why-item__check">✓</div>
                <div>
                    <p class="why-item__title">100% Fresh Ingredients</p>
                    <p class="why-item__text">Every item is prepared using fresh, quality ingredients sourced daily.</p>
                </div>
            </div>
            <div class="why-item">
                <div class="why-item__check">✓</div>
                <div>
                    <p class="why-item__title">Lightning Fast Delivery</p>
                    <p class="why-item__text">Our optimised delivery network ensures your food arrives hot every time.</p>
                </div>
            </div>
            <div class="why-item">
                <div class="why-item__check">✓</div>
                <div>
                    <p class="why-item__title">Affordable Pricing</p>
                    <p class="why-item__text">Great food doesn't have to break the bank. Our prices are fair and transparent.</p>
                </div>
            </div>
            <div class="why-item">
                <div class="why-item__check">✓</div>
                <div>
                    <p class="why-item__title">24/7 Customer Support</p>
                    <p class="why-item__text">Have an issue? Our support team is available around the clock to help.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA — Contained --}}
<div class="cta-wrap">
    <div class="container">
        <div class="cta-banner">
            <h2>Ready to Experience SwiftBite?</h2>
            <p>Join thousands of happy customers who trust SwiftBite for their daily meals.</p>
            <a href="{{ route('contact') }}" class="btn-white">Contact Us Today</a>
        </div>
    </div>
</div>

@endsection
