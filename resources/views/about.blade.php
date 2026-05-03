@extends('layouts.app')

@section('title', 'About Us — SwiftBite')

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
    .page-hero__label {
        font-size: .78rem; font-weight: 600; letter-spacing: .8px;
        text-transform: uppercase; color: var(--green); margin-bottom: 12px;
        display: block;
    }
    .page-hero__title {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
        font-weight: 800; color: var(--white);
        letter-spacing: -.4px; margin-bottom: 14px;
    }
    .page-hero__sub {
        font-size: 1rem; color: rgba(255,255,255,.5);
        max-width: 500px; margin: 0 auto;
    }

    /* ── Intro ── */
    .intro { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center; padding: 72px 0; }
    @media (max-width: 700px) { .intro { grid-template-columns: 1fr; } }
    .intro__image {
        background: linear-gradient(135deg, var(--green-light), #d0edd9);
        border-radius: 16px; height: 320px;
        display: flex; align-items: center; justify-content: center;
        font-size: 5rem;
    }
    .intro__label {
        font-size: .78rem; font-weight: 600; letter-spacing: .8px;
        text-transform: uppercase; color: var(--green); margin-bottom: 12px; display: block;
    }
    .intro__title { font-size: 1.7rem; font-weight: 700; color: var(--gray-900); margin-bottom: 16px; letter-spacing: -.3px; }
    .intro__text { font-size: .95rem; color: var(--gray-700); line-height: 1.8; margin-bottom: 14px; }

    /* ── Stats ── */
    .stats {
        background: var(--green);
        border-radius: 16px;
        padding: 48px 40px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 24px;
        text-align: center;
        margin-bottom: 72px;
    }
    .stat__number { font-size: 2.2rem; font-weight: 700; color: white; display: block; }
    .stat__label { font-size: .85rem; color: rgba(255,255,255,.75); margin-top: 4px; }

    /* ── Mission & Vision ── */
    .mv-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 72px; }
    @media (max-width: 600px) { .mv-grid { grid-template-columns: 1fr; } }
    .mv-card {
        border-radius: 12px; padding: 36px 32px;
        border: 1px solid var(--gray-200);
    }
    .mv-card--mission { background: var(--green-light); border-color: #b7deca; }
    .mv-card--vision { background: #f0f4ff; border-color: #c7d2fe; }
    .mv-card__icon { font-size: 2rem; margin-bottom: 16px; display: block; }
    .mv-card__title { font-size: 1.1rem; font-weight: 700; color: var(--gray-900); margin-bottom: 12px; }
    .mv-card__text { font-size: .92rem; color: var(--gray-700); line-height: 1.75; }

    /* ── Values ── */
    .values-section { background: var(--gray-100); width: 100%; padding: 64px 24px; margin-bottom: 72px; }
    .values-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
    .value-card {
        background: white; border-radius: 10px; padding: 24px 20px;
        border: 1px solid var(--gray-200); text-align: center;
    }
    .value-card__icon { font-size: 1.8rem; margin-bottom: 12px; display: block; }
    .value-card__title { font-size: .95rem; font-weight: 600; color: var(--gray-900); }

    /* ── Team ── */
    .team-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 28px; }
    .team-card {
        background: var(--white); border: 1px solid var(--gray-200);
        border-radius: 12px; padding: 32px 24px;
        text-align: center;
        transition: box-shadow var(--transition), transform var(--transition);
    }
    .team-card:hover { box-shadow: 0 8px 30px rgba(0,0,0,.09); transform: translateY(-3px); }
    .team-card__avatar {
        width: 80px; height: 80px; border-radius: 50%;
        background: linear-gradient(135deg, var(--green-light), #d0edd9);
        display: flex; align-items: center; justify-content: center;
        font-size: 2rem; margin: 0 auto 20px;
        border: 3px solid white;
        box-shadow: 0 4px 12px rgba(58,158,111,.2);
    }
    .team-card__name { font-size: 1rem; font-weight: 700; color: var(--gray-900); margin-bottom: 4px; }
    .team-card__role { font-size: .82rem; color: var(--green); font-weight: 600; margin-bottom: 12px; text-transform: uppercase; letter-spacing: .4px; }
    .team-card__bio { font-size: .88rem; color: var(--gray-500); line-height: 1.65; }

    .section__header { text-align: center; margin-bottom: 40px; }
    .section__label { display: inline-block; font-size: .78rem; font-weight: 600; letter-spacing: .8px; text-transform: uppercase; color: var(--green); margin-bottom: 10px; }
    .section__title { font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 700; color: var(--gray-900); letter-spacing: -.3px; margin-bottom: 12px; }
    .section__sub { font-size: .95rem; color: var(--gray-500); max-width: 500px; margin: 0 auto; }
</style>
@endpush

@section('content')

{{-- Page Hero --}}
<section class="page-hero">
    <span class="page-hero__label">Our Story</span>
    <h1 class="page-hero__title">About SwiftBite</h1>
    <p class="page-hero__sub">We started with a simple mission — make great food accessible to everyone, fast and fresh.</p>
</section>

<div class="container">
{{-- Company Intro --}}
<div class="intro">
    <div class="intro__image">🍽️</div>
    <div>
        <span class="intro__label">Who We Are</span>
        <h2 class="intro__title">A Brand Built on Speed & Quality</h2>
        <p class="intro__text">
            SwiftBite was founded in 2021 by a group of food enthusiasts who believed that fast food
            doesn't have to mean low quality. We set out to build a service that brings fresh,
            restaurant-quality meals to your table in record time.
        </p>
        <p class="intro__text">
            Today, we serve thousands of happy customers daily, working with the best local chefs
            and suppliers to ensure every bite meets our high standards. From individual meals
            to large catering orders, SwiftBite delivers with care.
        </p>
    </div>
</div>

{{-- Stats --}}
</div>{{-- /container --}}
<div class="container">
<div class="stats">
    <div>
        <span class="stat__number">5,000+</span>
        <span class="stat__label">Happy Customers</span>
    </div>
    <div>
        <span class="stat__number">30 min</span>
        <span class="stat__label">Average Delivery</span>
    </div>
    <div>
        <span class="stat__number">50+</span>
        <span class="stat__label">Partner Restaurants</span>
    </div>
    <div>
        <span class="stat__number">4.9 ⭐</span>
        <span class="stat__label">Customer Rating</span>
    </div>
</div>

{{-- Mission & Vision --}}
</div>{{-- /container --}}
<div class="container">
<div class="section__header">
    <span class="section__label">What Drives Us</span>
    <h2 class="section__title">Mission & Vision</h2>
</div>
<div class="mv-grid">
    <div class="mv-card mv-card--mission">
        <span class="mv-card__icon">🎯</span>
        <h3 class="mv-card__title">Our Mission</h3>
        <p class="mv-card__text">
            To provide every customer with a fast, reliable, and delightful food experience
            by connecting them with the best local restaurants and ensuring timely,
            quality deliveries every single time.
        </p>
    </div>
    <div class="mv-card mv-card--vision">
        <span class="mv-card__icon">🔭</span>
        <h3 class="mv-card__title">Our Vision</h3>
        <p class="mv-card__text">
            To become the most trusted food delivery brand in the region — a name synonymous
            with freshness, speed, and customer satisfaction. We envision a world where
            great food is always just minutes away.
        </p>
    </div>
</div>

{{-- Core Values --}}
</div>{{-- /container --}}
<div class="values-section">
    <div class="container">
    <div class="section__header">
        <span class="section__label">What We Stand For</span>
        <h2 class="section__title">Our Core Values</h2>
    </div>
    <div class="values-grid">
        <div class="value-card">
            <span class="value-card__icon">🌿</span>
            <p class="value-card__title">Freshness First</p>
        </div>
        <div class="value-card">
            <span class="value-card__icon">⚡</span>
            <p class="value-card__title">Speed & Efficiency</p>
        </div>
        <div class="value-card">
            <span class="value-card__icon">🤝</span>
            <p class="value-card__title">Customer Trust</p>
        </div>
        <div class="value-card">
            <span class="value-card__icon">💎</span>
            <p class="value-card__title">Uncompromised Quality</p>
        </div>
    </div>
    </div>{{-- /container --}}
</div>

<div class="container">
{{-- Team --}}
<div style="padding: 72px 0 48px;">
    <div class="section__header">
        <span class="section__label">The People Behind SwiftBite</span>
        <h2 class="section__title">Meet Our Team</h2>
        <p class="section__sub">A passionate group of individuals committed to making your experience exceptional.</p>
    </div>
    <div class="team-grid">
        <div class="team-card">
            <div class="team-card__avatar">👨‍💼</div>
            <p class="team-card__name">Ahmed Raza</p>
            <p class="team-card__role">Founder & CEO</p>
            <p class="team-card__bio">Ahmed built SwiftBite from the ground up with a passion for food and technology. He leads the team with a clear vision for quality and speed.</p>
        </div>
        <div class="team-card">
            <div class="team-card__avatar">👩‍🍳</div>
            <p class="team-card__name">Sara Khan</p>
            <p class="team-card__role">Head of Operations</p>
            <p class="team-card__bio">Sara ensures every order is processed smoothly from kitchen to door. Her attention to detail keeps our service running like clockwork.</p>
        </div>
        <div class="team-card">
            <div class="team-card__avatar">👨‍💻</div>
            <p class="team-card__name">Bilal Hassan</p>
            <p class="team-card__role">Lead Developer</p>
            <p class="team-card__bio">Bilal powers the technology behind SwiftBite. From our ordering platform to delivery tracking, he keeps everything running seamlessly.</p>
        </div>
    </div>
</div>
</div>{{-- /container --}}

@endsection
