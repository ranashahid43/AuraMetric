@extends('layouts.app')

@section('title', __('messages.our_services_title'))

@section('content')

{{-- 1. DEFINE DATA FIRST (Prevents Error 500) --}}
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

{{-- 2. FLOATING NAVIGATION --}}
<div class="vertical-dots-nav" id="verticalNav">
    <a href="#hero" class="nav-dot active" data-id="hero">
        <span class="dot-label">Top</span>
    </a>
    @foreach($services as $dot)
        <a href="#{{ $dot['id'] }}" class="nav-dot" data-id="{{ $dot['id'] }}">
            <span class="dot-label">{{ __('messages.' . $dot['title']) }}</span>
        </a>
    @endforeach
</div>

{{-- 3. MAIN CONTENT CONTAINER --}}
<main class="services-snap-container">
    
    {{-- Hero Screen --}}
    <section class="snap-section" id="hero">
        <div class="hero-content">
            <h1 class="responsive-h1">{!! __('messages.services_hero_title') !!}</h1>
            <p class="responsive-p">{{ __('messages.services_hero_subtitle') }}</p>
            <div class="scroll-indicator">
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </section>

    {{-- Services Screens --}}
    @foreach($services as $service)
    <section class="snap-section" id="{{ $service['id'] }}">
        <div class="service-card glass">
            <div class="service-card-inner">
                <div class="service-card-icon">
                    <i class="fa-solid {{ $service['icon'] }}"></i>
                </div>
                
                <div class="service-card-content">
                    <h2 class="responsive-h2">{{ __('messages.' . $service['title']) }}</h2>
                    <p class="service-card-subtitle">{{ __('messages.' . $service['subtitle']) }}</p>
                    
                    <ul class="service-features">
                        @for($i = 1; $i <= $service['features']; $i++)
                            @php 
                                $featureKey = 'messages.' . str_replace('_title', '', $service['title']) . '_feature_' . $i;
                            @endphp
                            <li>
                                <i class="fa-solid fa-check"></i> 
                                <span>{{ __($featureKey) }}</span>
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
    // Intersection Observer to highlight dots during scroll
    const sections = document.querySelectorAll('.snap-section');
    const navDots = document.querySelectorAll('.nav-dot');

    const options = { threshold: 0.5 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navDots.forEach(dot => {
                    dot.classList.toggle('active', dot.getAttribute('href') === `#${entry.target.id}`);
                });
            }
        });
    }, options);

    sections.forEach(section => observer.observe(section));
</script>

@endsection

@push('styles')
<style>
    /* 1. SCROLL SNAPPING SETUP */
    html {
        scroll-snap-type: y mandatory;
        scroll-behavior: smooth;
    }

    body { margin: 0; overflow-x: hidden; }

    .snap-section {
        height: 100vh;
        height: 100dvh; /* Dynamic height for mobile browsers */
        width: 100%;
        scroll-snap-align: start;
        scroll-snap-stop: always;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: clamp(15px, 5vw, 40px);
        position: relative;
    }

    /* 2. RESPONSIVE CARD */
    .service-card {
        width: 100%;
        max-width: clamp(300px, 95%, 1100px);
        max-height: 85dvh;
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(186, 104, 200, 0.2);
        border-radius: clamp(20px, 4vw, 40px);
        overflow-y: auto; /* Internal scroll if content is too tall */
    }

    .service-card-inner {
        padding: clamp(20px, 5vw, 60px);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    /* 3. TYPOGRAPHY */
    .responsive-h1 { font-size: clamp(2.2rem, 8vw, 4.5rem); font-weight: 800; background: linear-gradient(135deg, #ba68c8, #e1bee7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-align: center; }
    .responsive-h2 { font-size: clamp(1.5rem, 4vw, 2.5rem); color: #fff; text-align: center; margin: 10px 0; }
    .responsive-p { font-size: clamp(1rem, 2vw, 1.25rem); color: rgba(255, 255, 255, 0.7); text-align: center; max-width: 800px; margin: 0 auto; }

    /* 4. GRID FEATURES */
    .service-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 15px;
        list-style: none;
        padding: 0;
        margin: 30px 0;
    }

    .service-features li {
        color: #e0e0e0;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: clamp(0.9rem, 1.5vw, 1.1rem);
    }

    .service-features li i { color: #ba68c8; margin-top: 4px; }

    /* 5. VERTICAL BUBBLES */
    .vertical-dots-nav {
        position: fixed;
        right: clamp(10px, 3vw, 40px);
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 1000;
    }

    .nav-dot {
        width: 12px;
        height: 12px;
        background: rgba(186, 104, 200, 0.3);
        border-radius: 50%;
        position: relative;
        transition: 0.3s;
    }

    .nav-dot.active {
        background: #ba68c8;
        transform: scale(1.4);
        box-shadow: 0 0 10px rgba(186, 104, 200, 0.5);
    }

    .dot-label {
        position: absolute;
        right: 25px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 12px;
        opacity: 0;
        pointer-events: none;
        white-space: nowrap;
    }

    .nav-dot:hover .dot-label { opacity: 1; }

    /* 6. MISC */
    .service-card-icon { font-size: 3rem; color: #ba68c8; margin: 0 auto 20px; width: 90px; height: 90px; background: rgba(186, 104, 200, 0.1); display: flex; align-items: center; justify-content: center; border-radius: 20px; }
    .service-card-btn { display: block; width: fit-content; margin: 0 auto; padding: 15px 40px; border: 2px solid #ba68c8; color: white; border-radius: 50px; text-decoration: none; font-weight: bold; transition: 0.3s; }
    .service-card-btn:hover { background: #ba68c8; }
    
    .scroll-indicator { position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); animation: bounce 2s infinite; color: #ba68c8; font-size: 1.5rem; }
    @keyframes bounce { 0%, 100% { bottom: 30px; } 50% { bottom: 40px; } }

    /* Disable Snap for Mobile to avoid 500-like "freezing" bugs on low-end phones */
    @media (max-width: 768px) {
        html { scroll-snap-type: none; }
        .snap-section { height: auto; min-height: 100vh; padding: 80px 15px; }
        .vertical-dots-nav { display: none; }
    }
</style>
@endpush
