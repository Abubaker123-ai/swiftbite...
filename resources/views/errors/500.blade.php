@extends('layouts.app')

@section('title', '500 — Server Error')

@section('content')
<style>
    .error-page { text-align: center; padding: 80px 24px; }
    .error-page__code { font-size: 7rem; font-weight: 800; color: var(--green); line-height: 1; margin-bottom: 8px; opacity: .15; }
    .error-page__title { font-size: 1.8rem; font-weight: 700; color: var(--gray-900); margin-bottom: 14px; }
    .error-page__text { font-size: .97rem; color: var(--gray-500); margin-bottom: 32px; max-width: 420px; margin-left: auto; margin-right: auto; }
    .btn-home { display: inline-block; padding: 13px 30px; background: var(--green); color: var(--dark); border-radius: var(--radius); font-weight: 700; font-size: .92rem; transition: background .2s; }
    .btn-home:hover { background: var(--green-dark); }
</style>
<div class="container">
    <div class="error-page">
        <p class="error-page__code">500</p>
        <h1 class="error-page__title">Something Went Wrong</h1>
        <p class="error-page__text">We're experiencing a technical issue on our end. Our team has been notified. Please try again in a few moments.</p>
        <a href="{{ route('home') }}" class="btn-home">← Back to Home</a>
    </div>
</div>
@endsection
