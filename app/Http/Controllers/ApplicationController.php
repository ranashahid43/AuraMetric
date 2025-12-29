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

{{-- 1. Standard Hero (Matches your other pages exactly) --}}
<section class="hero services-hero">
    <div class="hero-content">
        <h1>{!! __('messages.services_hero_title') !!}</h1>
        <p>{{ __('messages.services_hero_subtitle') }}</p>
    </div>
</section>

{{-- 2. Floating Navigation --}}
<div class="vertical-dots-nav">
    @foreach($services as $dot)
        <a href="#{{ $dot['id'] }}" class="nav-dot"></a>
    @endforeach
</div>

<main class="services-wrapper">
    @foreach($services as $service)
    <section class="snap-section" id="{{ $service['id'] }}">
        {{-- "glass-themed" box that adapts to page background --}}
        <div class="service-card glass-themed">
            <div class="service-card-inner">
                
                <div class="card-top">
                    <div class="service-card-icon">
                        <i class="fa-solid {{ $service['icon'] }}"></i>
                    </div>
                    <div class="header-box">
                        <h2 class="theme-text">{{ __('messages.' . $service['title']) }}</h2>
                        <p class="service-card-subtitle">{{ __('messages.' . $service['subtitle']) }}</p>
                    </div>
                </div>

                <div class="features-wrapper">
                    <ul class="service-features">
                        @for($i = 1; $i <= $service['features']; $i++)
                            <li>
                                <span class="small-bullet"></span> 
                                <span class="feature-text">{{ __('messages.' . str_replace('_title', '', $service['title']) . '_feature_' . $i) }}</span>
                            </li>
                        @endfor
                    </ul>
                </div>

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
    /* PAGE CORE - NO FORCED BACKGROUND COLOR */
    html { scroll-behavior: smooth; scroll-snap-type: y mandatory; }
    
    /* HERO STYLE - Using standard page spacing */
    .services-hero {
        min-height: 40vh;
        display: flex; align-items: center; justify-content: center;
        text-align: center; padding: 80px 20px;
        scroll-snap-align: start;
    }
    
    /* THE CARD - Now matches page background better */
    .snap-section {
        height: 100vh; width: 100%;
        display: flex; align-items: center; justify-content: center;
        scroll-snap-align: start; padding: 20px;
    }

    .service-card {
        width: 100%;
        max-width: 1000px;
        height: 80vh;
        max-height: 750px;
        border-radius: 30px;
        /* Using rgba so it works on light OR dark themes */
        background: rgba(186, 104, 200, 0.02); 
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(186, 104, 200, 0.3);
        transition: all 0.4s ease;
        display: flex; flex-direction: column;
    }

    /* Glamourous Hover matches brand colors */
    .service-card:hover {
        border-color: #ba68c8;
        box-shadow: 0 15px 40px rgba(186, 104, 200, 0.15);
        transform: translateY(-5px);
    }

    .service-card-inner {
        padding: clamp(30px, 5vw, 60px);
        height: 100%;
        display: flex; flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    /* ICON STYLE - Brand Purple */
    .service-card-icon {
        font-size: 3rem; color: #ba68c8;
        background: rgba(186, 104, 200, 0.1);
        width: 100px; height: 100px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 20px; border: 1px solid rgba(186, 104, 200, 0.2);
        margin: 0 auto 20px;
        transition: 0.5s;
    }
    .service-card:hover .service-card-icon {
        transform: rotateY(180deg);
        background: #ba68c8;
        color: #fff;
    }

    /* TEXT COLORS - Inherits from your theme's default text */
    .theme-text { font-weight: 700; margin-bottom: 10px; }
    .service-card-subtitle { opacity: 0.7; font-size: 1rem; max-width: 550px; margin: 0 auto; line-height: 1.6; }

    /* SYMMETRIC FEATURES */
    .features-wrapper { flex-grow: 1; display: flex; align-items: center; width: 100%; padding: 20px 0; }
    .service-features {
        display: grid; grid-template-columns: 1fr 1fr;
        gap: 15px 40px; width: 100%; max-width: 800px;
        list-style: none; padding: 0;
    }
    .service-features li {
        display: flex; align-items: center; gap: 12px;
        font-size: 1.05rem;
    }

    .small-bullet {
        width: 6px; height: 6px;
        background: #ba68c8;
        border-radius: 50%;
        flex-shrink: 0;
    }

    /* BUTTON STYLE */
    .service-card-btn-wrapper { width: 100%; display: flex; justify-content: center; }
    .service-card-btn {
        width: 100%; max-width: 280px; text-align: center;
        padding: 15px 0; border: 2px solid #ba68c8;
        color: #ba68c8; text-decoration: none; border-radius: 50px;
        font-weight: 700; transition: 0.3s;
        text-transform: uppercase; letter-spacing: 1.5px;
    }
    .service-card-btn:hover {
        background: #ba68c8;
        color: #fff !important;
        box-shadow: 0 8px 25px rgba(186, 104, 200, 0.3);
    }

    /* BUBBLE NAV - Uses Brand Color */
    .vertical-dots-nav {
        position: fixed; right: 25px; top: 50%; transform: translateY(-50%);
        display: flex; flex-direction: column; gap: 15px; z-index: 100;
    }
    .nav-dot { width: 10px; height: 10px; border-radius: 50%; border: 1px solid #ba68c8; transition: 0.3s; }
    .nav-dot.active { background: #ba68c8; transform: scale(1.3); }

    /* MOBILE ADJUSTMENTS */
    @media (max-width: 850px) {
        html { scroll-snap-type: none; }
        .snap-section { height: auto; min-height: 100vh; padding: 40px 15px; }
        .service-card { height: auto; max-height: none; padding: 20px 0; }
        .service-features { grid-template-columns: 1fr; gap: 10px; }
        .vertical-dots-nav { display: none; }
    }
</style>
@endpush
