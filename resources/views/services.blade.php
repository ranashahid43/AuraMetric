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

{{-- 1. Standard Hero --}}
<section class="hero services-hero">
    <div class="hero-content">
        <h1>{!! __('messages.services_hero_title') !!}</h1>
        <p>{{ __('messages.services_hero_subtitle') }}</p>
    </div>
</section>

{{-- 2. Floating Bubbles (Hidden on small mobile) --}}
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

                {{-- Features (Symmetric Grid) --}}
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

                {{-- Button --}}
                <div class="footer-box">
                    <a href="/contact" class="quote-btn">{{ __('messages.request_quote') }}</a>
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
    }, { threshold: 0.5 });

    sections.forEach(s => observer.observe(s));
</script>

@endsection

@push('styles')
<style>
    /* CORE SNAPPING */
    html { scroll-behavior: smooth; scroll-snap-type: y mandatory; }
    body { margin: 0; background: #0a0a0a; }

    /* HERO (Original) */
    .services-hero {
        min-height: 45vh;
        display: flex; align-items: center; justify-content: center;
        text-align: center; padding: 60px 20px;
        scroll-snap-align: start;
    }
    .services-hero h1 {
        font-size: clamp(2.2rem, 6vw, 3.8rem);
        background: linear-gradient(135deg, #ba68c8, #e1bee7);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    }

    /* FULL SCREEN SECTION */
    .snap-section {
        height: 100vh;
        width: 100%;
        display: flex; align-items: center; justify-content: center;
        scroll-snap-align: start;
        padding: 20px;
        box-sizing: border-box;
    }

    /* THE CARD */
    .service-card {
        width: 100%;
        max-width: 1000px;
        /* Dynamic Height: fit screen on desktop, grow on mobile */
        height: 80vh;
        max-height: 750px;
        border-radius: 40px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        display: flex; flex-direction: column;
        transition: 0.3s ease;
    }

    .glass { background: rgba(255, 255, 255, 0.04); backdrop-filter: blur(20px); }

    .card-inner {
        padding: clamp(20px, 5vw, 50px);
        height: 100%;
        display: flex; flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
    }

    /* COMPONENTS */
    .icon-box {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        color: #ba68c8; background: rgba(186, 104, 200, 0.1);
        width: clamp(70px, 10vw, 100px); height: clamp(70px, 10vw, 100px);
        display: flex; align-items: center; justify-content: center;
        border-radius: 20px; transition: 0.6s;
    }
    .service-card:hover .icon-box { transform: rotateY(180deg); }

    .header-box h2 { font-size: clamp(1.5rem, 4vw, 2.5rem); color: #fff; margin: 10px 0; }
    .header-box .subtitle { color: rgba(255,255,255,0.6); font-size: 0.95rem; max-width: 500px; }

    .features-container { flex-grow: 1; display: flex; align-items: center; width: 100%; }
    
    .features-grid {
        display: grid;
        grid-template-columns: 1fr 1fr; /* 2 columns on desktop */
        gap: 15px 40px;
        width: 100%;
        list-style: none; padding: 0; text-align: left;
    }

    .features-grid li {
        color: #e0e0e0; font-size: clamp(0.85rem, 1.5vw, 1.05rem);
        display: flex; align-items: center; gap: 10px;
    }
    .features-grid li i { color: #ba68c8; }

    .quote-btn {
        padding: clamp(12px, 2vw, 16px) clamp(30px, 5vw, 50px);
        background: #ba68c8; color: #000; border-radius: 50px;
        text-decoration: none; font-weight: 800; transition: 0.3s;
    }

    /* BUBBLE NAV */
    .vertical-dots-nav {
        position: fixed; right: 25px; top: 50%; transform: translateY(-50%);
        display: flex; flex-direction: column; gap: 15px; z-index: 100;
    }
    .nav-dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.2); }
    .nav-dot.active { background: #ba68c8; transform: scale(1.3); }

    /* MOBILE RESPONSIVE FIXES */
    @media (max-width: 768px) {
        html { scroll-snap-type: none; } /* Disable snap on mobile for better scrolling */
        .snap-section { height: auto; min-height: 100vh; padding: 40px 15px; }
        
        .service-card {
            height: auto; /* Let it grow with content */
            max-height: none;
            padding-bottom: 30px;
        }

        .features-grid {
            grid-template-columns: 1fr; /* Stack features in 1 column */
            gap: 12px;
            margin: 20px 0;
        }

        .vertical-dots-nav { display: none; } /* Hide bubbles on mobile */
        
        .card-inner { justify-content: center; gap: 20px; }
    }
</style>
@endpush
