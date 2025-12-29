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

{{-- Floating Bubble Navigation --}}
<div class="vertical-dots-nav">
    <a href="#hero" class="nav-dot active"></a>
    @foreach($services as $dot)
        <a href="#{{ $dot['id'] }}" class="nav-dot"></a>
    @endforeach
</div>

<main class="snap-wrapper">
    {{-- Hero --}}
    <section class="snap-section hero-section" id="hero">
        <div class="hero-content">
            <h1>{!! __('messages.services_hero_title') !!}</h1>
            <p>{{ __('messages.services_hero_subtitle') }}</p>
            <div class="mouse-scroll"></div>
        </div>
    </section>

    {{-- Service Cards --}}
    @foreach($services as $service)
    <section class="snap-section" id="{{ $service['id'] }}">
        <div class="service-card glass">
            <div class="card-inner">
                {{-- Top: Icon --}}
                <div class="icon-wrapper">
                    <i class="fa-solid {{ $service['icon'] }}"></i>
                </div>
                
                {{-- Middle: Content --}}
                <div class="text-content">
                    <h2>{{ __('messages.' . $service['title']) }}</h2>
                    <p class="subtitle">{{ __('messages.' . $service['subtitle']) }}</p>
                </div>

                {{-- Center: Features (Symmetric Grid) --}}
                <div class="features-box">
                    <ul class="features-list">
                        @for($i = 1; $i <= $service['features']; $i++)
                            <li>
                                <i class="fa-solid fa-check-circle"></i> 
                                <span>{{ __('messages.' . str_replace('_title', '', $service['title']) . '_feature_' . $i) }}</span>
                            </li>
                        @endfor
                    </ul>
                </div>

                {{-- Bottom: Button --}}
                <div class="btn-box">
                    <a href="/contact" class="quote-btn">{{ __('messages.request_quote') }}</a>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</main>

<script>
    // Logic to sync bubbles with current screen
    const sections = document.querySelectorAll('.snap-section');
    const dots = document.querySelectorAll('.nav-dot');

    window.addEventListener('scroll', () => {
        let current = "";
        sections.forEach(section => {
            if (pageYOffset >= (section.offsetTop - section.clientHeight / 2)) {
                current = section.getAttribute('id');
            }
        });
        dots.forEach(dot => {
            dot.classList.remove('active');
            if (dot.getAttribute('href') === `#${current}`) dot.classList.add('active');
        });
    });
</script>

@endsection

@push('styles')
<style>
    /* RESET & SNAPPING */
    html { scroll-snap-type: y mandatory; scroll-behavior: smooth; }
    body { margin: 0; background: #0f0c29; overflow-x: hidden; }

    .snap-section {
        height: 100vh;
        width: 100vw;
        scroll-snap-align: start;
        scroll-snap-stop: always;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        box-sizing: border-box;
    }

    /* THE FULL SCREEN CARD */
    .service-card {
        width: 100%;
        max-width: 1100px;
        height: 85vh; /* Covers most of the screen height */
        border-radius: 40px;
        position: relative;
        overflow: hidden; /* No internal scroll */
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(186, 104, 200, 0.2);
    }

    .glass {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }

    .card-inner {
        padding: 60px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* This creates the symmetry */
        align-items: center;
        text-align: center;
    }

    /* TOP SECTION: ICON */
    .icon-wrapper {
        width: 100px;
        height: 100px;
        background: rgba(186, 104, 200, 0.1);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        color: #ba68c8;
        border: 1px solid rgba(186, 104, 200, 0.3);
        transition: 0.6s ease;
    }
    .service-card:hover .icon-wrapper { transform: rotateY(180deg); background: rgba(186, 104, 200, 0.2); }

    /* MIDDLE SECTION: TITLES */
    .text-content h2 {
        font-size: 2.8rem;
        margin: 20px 0 10px;
        color: #fff;
        font-weight: 800;
    }
    .subtitle {
        color: rgba(255, 255, 255, 0.6);
        font-size: 1.1rem;
        max-width: 600px;
    }

    /* CENTER SECTION: FEATURES (SYMMETRIC GRID) */
    .features-box {
        width: 100%;
        max-width: 800px;
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .features-list {
        display: grid;
        grid-template-columns: 1fr 1fr; /* Symmetric split */
        gap: 20px 40px;
        list-style: none;
        padding: 0;
        text-align: left;
    }

    .features-list li {
        color: #e0e0e0;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .features-list li i { color: #ba68c8; font-size: 1.2rem; }

    /* BOTTOM SECTION: BUTTON */
    .quote-btn {
        padding: 18px 60px;
        background: #ba68c8;
        color: #000;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.4s;
        box-shadow: 0 10px 30px rgba(186, 104, 200, 0.3);
    }
    .quote-btn:hover { background: #e1bee7; transform: translateY(-5px); box-shadow: 0 15px 40px rgba(186, 104, 200, 0.5); }

    /* BUBBLE NAVIGATION */
    .vertical-dots-nav {
        position: fixed;
        right: 40px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 20px;
        z-index: 100;
    }
    .nav-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        transition: 0.3s;
    }
    .nav-dot.active { background: #ba68c8; transform: scale(1.5); box-shadow: 0 0 15px #ba68c8; }

    /* HERO STYLING */
    .hero-section h1 { font-size: 5rem; background: linear-gradient(to right, #ba68c8, #fff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .hero-section p { color: rgba(255,255,255,0.7); font-size: 1.5rem; }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .features-list { grid-template-columns: 1fr; }
        .text-content h2 { font-size: 2rem; }
        .service-card { height: 90vh; }
        .card-inner { padding: 30px; }
    }
</style>
@endpush
