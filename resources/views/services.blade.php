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

{{-- 1. ORIGINAL HERO SECTION (Same as other pages) --}}
<section class="hero services-hero">
    <div class="hero-content">
        <h1>{!! __('messages.services_hero_title') !!}</h1>
        <p>{{ __('messages.services_hero_subtitle') }}</p>
    </div>
</section>

{{-- 2. FLOATING BUBBLES --}}
<div class="vertical-dots-nav">
    @foreach($services as $dot)
        <a href="#{{ $dot['id'] }}" class="nav-dot"></a>
    @endforeach
</div>

<main class="services-wrapper">
    @foreach($services as $service)
    <section class="snap-section" id="{{ $service['id'] }}">
        <div class="service-card glass">
            <div class="card-inner">
                
                {{-- Icon --}}
                <div class="icon-box">
                    <i class="fa-solid {{ $service['icon'] }}"></i>
                </div>
                
                {{-- Header --}}
                <div class="header-box">
                    <h2>{{ __('messages.' . $service['title']) }}</h2>
                    <p class="subtitle">{{ __('messages.' . $service['subtitle']) }}</p>
                </div>

                {{-- Symmetric Features List --}}
                <div class="features-container">
                    <ul class="features-grid">
                        @for($i = 1; $i <= $service['features']; $i++)
                            <li>
                                <i class="fa-solid fa-check-circle"></i> 
                                <span>{{ __('messages.' . str_replace('_title', '', $service['title']) . '_feature_' . $i) }}</span>
                            </li>
                        @endfor
                    </ul>
                </div>

                {{-- Bottom Button --}}
                <div class="footer-box">
                    <a href="/contact" class="quote-btn">{{ __('messages.request_quote') }}</a>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</main>

<script>
    // Sync dots with section visibility
    const dots = document.querySelectorAll('.nav-dot');
    const cards = document.querySelectorAll('.snap-section');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                dots.forEach(dot => {
                    dot.classList.remove('active');
                    if (dot.getAttribute('href') === `#${entry.target.id}`) dot.classList.add('active');
                });
            }
        });
    }, { threshold: 0.6 });

    cards.forEach(card => observer.observe(card));
</script>

@endsection

@push('styles')
<style>
    /* PAGE SETUP */
    html { scroll-behavior: smooth; scroll-snap-type: y mandatory; }
    
    /* ORIGINAL HERO STYLE */
    .services-hero {
        min-height: 45vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        text-align: center;
        scroll-snap-align: start; /* Start snapping from hero */
    }

    .services-hero h1 {
        font-size: clamp(2.5rem, 6vw, 3.8rem);
        font-weight: 800;
        background: linear-gradient(135deg, #ba68c8, #e1bee7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 20px;
    }

    .services-hero p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto;
    }

    /* SNAP SECTIONS */
    .snap-section {
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        scroll-snap-align: start;
        padding: 20px;
    }

    /* THE SYMMETRIC CARD */
    .service-card {
        width: 100%;
        max-width: 1000px;
        height: 80vh;
        max-height: 750px;
        border-radius: 40px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        display: flex;
        flex-direction: column;
    }

    .glass {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }

    .card-inner {
        padding: 50px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Keeps top and bottom separate */
        align-items: center;
        text-align: center;
    }

    /* Icon Flip Logic */
    .icon-box {
        font-size: 3.5rem;
        color: #ba68c8;
        background: rgba(186, 104, 200, 0.1);
        width: 100px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 24px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        transition: 0.6s ease;
    }
    .service-card:hover .icon-box { transform: rotateY(180deg); background: rgba(186, 104, 200, 0.25); }

    .header-box h2 { font-size: 2.4rem; color: #fff; margin: 15px 0 5px; }
    .header-box .subtitle { color: rgba(255,255,255,0.6); font-size: 1rem; }

    /* FEATURES GRID - SYMMETRIC */
    .features-container {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 20px 0;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px 40px;
        list-style: none;
        padding: 0;
        text-align: left;
    }

    .features-grid li {
        color: #e0e0e0;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1.05rem;
    }

    .features-grid li i { color: #ba68c8; font-size: 1.1rem; }

    /* QUOTE BUTTON */
    .quote-btn {
        padding: 16px 50px;
        background: #ba68c8;
        color: #000;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 800;
        transition: 0.4s;
        display: inline-block;
        box-shadow: 0 10px 20px rgba(186, 104, 200, 0.2);
    }
    .quote-btn:hover { background: #e1bee7; transform: translateY(-3px); }

    /* NAVIGATION BUBBLES */
    .vertical-dots-nav {
        position: fixed;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 1000;
    }

    .nav-dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.2); transition: 0.3s; }
    .nav-dot.active { background: #ba68c8; transform: scale(1.4); }

    /* RESPONSIVITY */
    @media (max-width: 850px) {
        .features-grid { grid-template-columns: 1fr; }
        .service-card { height: 90vh; max-height: none; }
        .card-inner { padding: 30px 20px; }
        .vertical-dots-nav { display: none; }
        html { scroll-snap-type: none; }
    }
</style>
@endpush
