@extends('layouts.app')

@section('title', '404 — Page Not Found')

@section('content')
<style>
    .error-page { text-align: center; padding: 80px 24px; }
    .error-page__code {
        font-size: 7rem;
        font-weight: 800;
        color: var(--green);
        line-height: 1;
        margin-bottom: 8px;
        opacity: .15;
    }
    .error-page__title { font-size: 1.8rem; font-weight: 700; color: var(--gray-900); margin-bottom: 14px; }
    .error-page__text { font-size: .97rem; color: var(--gray-500); margin-bottom: 32px; max-width: 420px; margin-left: auto; margin-right: auto; }
    .btn-home {
        display: inline-block;
        padding: 13px 30px;
        background: var(--green);
        color: var(--dark);
        border-radius: var(--radius);
        font-weight: 700;
        font-size: .92rem;
        transition: background .2s;
    }
    .btn-home:hover { background: var(--green-dark); }
</style>
<div class="container">
    <div class="error-page">
        <p class="error-page__code">404</p>
        <h1 class="error-page__title">Page Not Found</h1>
        <p class="error-page__text">Oops! The page you're looking for doesn't exist. It may have been moved or the URL might be incorrect.</p>
        <a href="{{ route('home') }}" class="btn-home">← Back to Home</a>
    </div>
</div>
@endsection
