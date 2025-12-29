@extends('layouts.app')

@section('title', __('messages.our_services_title'))

@section('content')

@php
    $services = [
        ['id' => 'manual', 'icon' => 'fa-bug', 'title' => 'service_manual_title', 'subtitle' => 'service_manual_subtitle', 'features' => 5],
        ['id' => 'automation', 'icon' => 'fa-robot', 'title' => 'service_automation_title', 'subtitle' => 'service_automation_subtitle', 'features' => 5],
        ['id' => 'mobile-web', 'icon' => 'fa-mobile-screen', 'title' => 'service_mobile_title', 'subtitle' => 'service_mobile_subtitle', 'features' => 5],
        ['id' => 'ai-ml', 'icon' => 'fa-brain', 'title' => 'service_ai_title', 'subtitle' => 'service_ai_subtitle', 'features' => 5],
        ['id' => 'security', 'icon' => 'fa-shield-halved', 'title' => 'service_security_title', 'subtitle' => 'service_security_subtitle', 'features' => 5],
        ['id' => 'performance', 'icon' => 'fa-gauge-high', 'title' => 'service_performance_title', 'subtitle' => 'service_performance_subtitle', 'features' => 5],
        ['id' => 'digital-marketing', 'icon' => 'fa-chart-line', 'title' => 'service_digital_marketing_title', 'subtitle' => 'service_digital_marketing_subtitle', 'features' => 5],
        ['id' => 'seo', 'icon' => 'fa-magnifying-glass-chart', 'title' => 'service_seo_title', 'subtitle' => 'service_seo_subtitle', 'features' => 5],
        ['id' => 'content-writing', 'icon' => 'fa-pen-nib', 'title' => 'service_content_writing_title', 'subtitle' => 'service_content_writing_subtitle', 'features' => 5],
    ];
@endphp

{{-- 1. Hero Section (Restored to original style) --}}
<section class="hero services-hero">
    <div class="hero-content">
        <h1>{!! __('messages.services_hero_title') !!}</h1>
        <p>{{ __('messages.services_hero_subtitle') }}</p>
    </div>
</section>

{{-- 2. Floating Navigation Bubbles --}}
<div class="vertical-dots-nav">
    @foreach($services as $dot)
        <a href="#{{ $dot['id'] }}" class="nav-dot"></a>
    @endforeach
</div>

<main class="services-wrapper">
    @foreach($services as $service)
    <section class="snap-section" id="{{ $service['id'] }}">
        <div class="service-card glass">
            <div class="service-card-inner">
                
                {{-- Top: Icon and Titles --}}
                <div class="card-top">
                    <div class="service-card-icon">
                        <i class="fa-solid {{ $service['icon'] }}"></i>
                    </div>
                    <div class="header-box">
                        <h2>{{ __('messages.' . $service['title']) }}</h2>
                        <p class="service-card-subtitle">{{ __('messages.' . $service['subtitle']) }}</p>
                    </div>
                </div>

                {{-- Middle: Features (Symmetric) --}}
                <div class="features-wrapper">
                    <ul class="service-features">
                        @for($i = 1; $i <= $service['features']; $i++)
                            <li>
                                <span class="small-bullet"></span> 
                                <span>{{ __('messages.' . str_replace('_title', '', $service['title']) . '_feature_' . $i) }}</span>
                            </li>
                        @endfor
                    </ul>
                </div>

                {{-- Bottom: Button (Pinned to bottom) --}}
                <div class="service-card-btn-wrapper">
                    <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</main>

<script>
    const dots = document.querySelectorAll('.nav-dot');
    const sections = document.querySelectorAll('.snap-section');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                dots.forEach(dot => {
                    dot.classList.toggle('active', dot.getAttribute('href') === `#${entry.target.id}`);
                });
            }
        });
    }, { threshold: 0.6 });

    sections.forEach(s => observer.observe(s));
</script>

@endsection

@push('styles')
<style>
    /* CORE SETUP */
    html { scroll-behavior: smooth; scroll-snap-type: y mandatory; }
    body { margin: 0; background: #0f0c29; }

    /* HERO STYLE (Restored exactly from your provide code) */
    .services-hero {
        min-height: 45vh;
        display: flex; align-items: center; justify-content: center;
        text-align: center; padding: 60px 20px;
        scroll-snap-align: start;
    }
    .services-hero h1 {
        font-size: clamp(2.5rem, 6vw, 3.8rem);
        font-weight: 800;
        background: linear-gradient(135deg, #ba68c8, #e1bee7);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        margin-bottom: 20px;
    }
    .services-hero p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1.1rem; max-width: 700px; margin: 0 auto;
    }

    /* SNAP SECTIONS */
    .snap-section {
        height: 100vh; width: 100%;
        display: flex; align-items: center; justify-content: center;
        scroll-snap-align: start; padding: 20px;
    }

    /* GLAMOROUS CARD STYLE (Restored from your original) */
    .service-card {
        width: 100%;
        max-width: 1100px;
        height: 82vh;
        max-height: 780px;
        border-radius: 30px;
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(186, 104, 200, 0.2);
        transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: flex; flex-direction: column;
    }
    .service-card:hover {
        transform: translateY(-10px);
        border-color: rgba(186, 104, 200, 0.5);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        background: rgba(255, 255, 255, 0.06);
    }

    .service-card-inner {
        padding: 50px;
        height: 100%;
        display: flex; flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    /* ICON STYLE */
    .service-card-icon {
        font-size: 3.5rem; color: #ba68c8;
        background: rgba(186, 104, 200, 0.1);
        width: 110px; height: 110px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 24px; border: 1px solid rgba(186, 104, 200, 0.2);
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        margin: 0 auto 20px;
    }
    .service-card:hover .service-card-icon {
        transform: rotateY(180deg);
        background: rgba(186, 104, 200, 0.25);
        color: #e1bee7;
        box-shadow: 0 0 20px rgba(186, 104, 200, 0.3);
    }

    /* TITLES */
    .header-box h2 { font-size: 2.2rem; color: #fff; text-align: center; margin-bottom: 10px; }
    .service-card-subtitle { font-size: 1rem; color: #b0b0b0; text-align: center; max-width: 600px; margin: 0 auto; line-height: 1.6; }

    /* SYMMETRIC FEATURES GRID */
    .features-wrapper { flex-grow: 1; display: flex; align-items: center; width: 100%; }
    .service-features {
        display: grid; grid-template-columns: 1fr 1fr;
        gap: 15px 50px; width: 100%; max-width: 850px;
        list-style: none; padding: 0; text-align: left;
    }
    .service-features li {
        color: #e0e0e0; font-size: 1.05rem;
        display: flex; align-items: center; gap: 12px;
        transition: 0.3s;
    }
    .service-card:hover .service-features li { color: #fff; transform: translateX(5px); }

    /* SMALL BULLET STYLE */
    .small-bullet {
        width: 6px; height: 6px;
        background: #ba68c8;
        border-radius: 50%;
        flex-shrink: 0;
        box-shadow: 0 0 5px rgba(186, 104, 200, 0.8);
    }

    /* BUTTON STYLE (Pinned Down) */
    .service-card-btn-wrapper { padding-top: 30px; width: 100%; display: flex; justify-content: center; }
    .service-card-btn {
        width: 100%; max-width: 280px; text-align: center;
        padding: 16px 0; border: 2px solid #ba68c8;
        color: #fff; text-decoration: none; border-radius: 50px;
        font-weight: 700; transition: 0.4s all ease;
        background: transparent; text-transform: uppercase; letter-spacing: 1px;
    }
    .service-card-btn:hover {
        background: #ba68c8;
        box-shadow: 0 10px 20px rgba(186, 104, 200, 0.4);
        transform: translateY(-3px);
    }

    /* BUBBLE NAV */
    .vertical-dots-nav {
        position: fixed; right: 30px; top: 50%; transform: translateY(-50%);
        display: flex; flex-direction: column; gap: 15px; z-index: 100;
    }
    .nav-dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.2); transition: 0.3s; }
    .nav-dot.active { background: #ba68c8; transform: scale(1.4); box-shadow: 0 0 10px #ba68c8; }

    /* MOBILE RESPONSIVE FIXES */
    @media (max-width: 850px) {
        html { scroll-snap-type: none; }
        .snap-section { height: auto; min-height: 100vh; padding: 60px 15px; }
        .service-card { height: auto; max-height: none; padding-bottom: 20px; }
        .service-features { grid-template-columns: 1fr; gap: 12px; }
        .service-card-inner { padding: 40px 25px; }
        .vertical-dots-nav { display: none; }
        .header-box h2 { font-size: 1.8rem; }
    }
</style>
@endpush
