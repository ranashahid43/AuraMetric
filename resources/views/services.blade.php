@extends('layouts.app')

@section('title', __('messages.our_services_title'))

@section('content')

{{-- Floating Bubble Navigation --}}
<div class="vertical-dots-nav" id="verticalNav">
    @foreach($services as $index => $service)
        <a href="#{{ $service['id'] }}" class="nav-dot {{ $index === 0 ? 'active' : '' }}" data-id="{{ $service['id'] }}">
            <span class="dot-label">{{ __('messages.' . $service['title']) }}</span>
        </a>
    @endforeach
</div>

<main class="services-snap-container">
    {{-- Hero Section as the First Screen --}}
    <section class="hero services-hero snap-section" id="hero">
        <div class="hero-content">
            <h1>{!! __('messages.services_hero_title') !!}</h1>
            <p>{{ __('messages.services_hero_subtitle') }}</p>
            <div class="scroll-indicator">
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </section>

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

    @foreach($services as $service)
    <section class="snap-section" id="{{ $service['id'] }}">
        <div class="service-card glass">
            <div class="service-card-inner">
                <div class="service-card-icon">
                    <i class="fa-solid {{ $service['icon'] }}"></i>
                </div>
                
                <div class="service-card-content">
                    <h2>{{ __('messages.' . $service['title']) }}</h2>
                    <p class="service-card-subtitle">{{ __('messages.' . $service['subtitle']) }}</p>
                    
                    <ul class="service-features">
                        @for($i = 1; $i <= $service['features']; $i++)
                            <li><i class="fa-solid fa-check"></i> {{ __('messages.' . str_replace('_title', '', $service['title']) . '_feature_' . $i) }}</li>
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
    // Logic to update active bubble on scroll
    const sections = document.querySelectorAll('.snap-section');
    const navDots = document.querySelectorAll('.nav-dot');

    window.addEventListener('scroll', () => {
        let current = "";
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
                current = section.getAttribute('id');
            }
        });

        navDots.forEach(dot => {
            dot.classList.remove('active');
            if (dot.getAttribute('href').includes(current)) {
                dot.classList.add('active');
            }
        });
    });
</script>

@endsection

@push('styles')
<style>
    /* ENABLE FULL PAGE SCROLL SNAPPING */
    html {
        scroll-snap-type: y mandatory;
        scroll-behavior: smooth;
    }

    .snap-section {
        height: 100vh; /* Exactly one screen height */
        width: 100%;
        scroll-snap-align: start;
        scroll-snap-stop: always;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    /* VERTICAL BUBBLE NAV */
    .vertical-dots-nav {
        position: fixed;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 20px;
        z-index: 1000;
    }

    .nav-dot {
        width: 12px;
        height: 12px;
        background: rgba(186, 104, 200, 0.3);
        border-radius: 50%;
        position: relative;
        transition: 0.3s;
        text-decoration: none;
    }

    .nav-dot.active {
        background: #ba68c8;
        transform: scale(1.5);
        box-shadow: 0 0 15px rgba(186, 104, 200, 0.6);
    }

    .dot-label {
        position: absolute;
        right: 25px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: #fff;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 0.8rem;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: 0.3s;
    }

    .nav-dot:hover .dot-label {
        opacity: 1;
        right: 35px;
    }

    /* CARD ADJUSTMENTS FOR FULL SCREEN */
    .service-card {
        width: 100%;
        max-width: 900px; /* Wider card for the single view */
        height: 80vh; /* Fits comfortably in screen */
        max-height: 700px;
        margin: 0 auto;
        border-radius: 40px;
    }

    /* Hero Section Specifics */
    .services-hero {
        text-align: center;
        flex-direction: column;
    }

    .scroll-indicator {
        margin-top: 50px;
        animation: bounce 2s infinite;
        color: #ba68c8;
        font-size: 2rem;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
        40% {transform: translateY(-10px);}
        60% {transform: translateY(-5px);}
    }

    /* Re-using your existing styles with small tweaks */
    .glass {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(186, 104, 200, 0.2);
    }

    .service-card-inner { padding: 40px 60px; display: flex; flex-direction: column; height: 100%; }
    .service-card-icon { font-size: 3.5rem; color: #ba68c8; background: rgba(186, 104, 200, 0.1); width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; border-radius: 24px; align-self: center; margin-bottom: 20px; transition: 0.6s; }
    .service-card:hover .service-card-icon { transform: rotateY(180deg); background: rgba(186, 104, 200, 0.25); }
    .service-card-content h2 { font-size: 2.2rem; color: #fff; text-align: center; margin-bottom: 10px; }
    .service-card-subtitle { color: #b0b0b0; text-align: center; margin-bottom: 30px; }
    .service-features { list-style: none; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: 15px; flex-grow: 1; }
    .service-features li { color: #e0e0e0; display: flex; align-items: center; gap: 10px; font-size: 1.05rem; }
    .service-features li i { color: #ba68c8; }
    .service-card-btn { display: block; width: 100%; max-width: 300px; margin: 0 auto; padding: 15px; border: 2px solid #ba68c8; color: #fff; text-align: center; text-decoration: none; border-radius: 50px; font-weight: bold; transition: 0.4s; }
    .service-card-btn:hover { background: #ba68c8; box-shadow: 0 10px 20px rgba(186, 104, 200, 0.4); }

    /* Mobile handling: disable snap to allow normal scrolling on small screens */
    @media (max-width: 768px) {
        html { scroll-snap-type: none; }
        .snap-section { height: auto; min-height: 100vh; padding: 60px 20px; }
        .service-features { grid-template-columns: 1fr; }
        .vertical-dots-nav { display: none; }
    }
</style>
@endpush
