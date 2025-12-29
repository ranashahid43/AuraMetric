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

{{-- Hero Section --}}
<section class="hero services-hero">
    <div class="hero-content">
        <h1>{!! __('messages.services_hero_title') !!}</h1>
        <p>{{ __('messages.services_hero_subtitle') }}</p>
    </div>
</section>

<div class="vertical-dots-nav">
    @foreach($services as $dot)
        <a href="#{{ $dot['id'] }}" class="nav-dot"></a>
    @endforeach
</div>

<main class="book-container">
    @foreach($services as $service)
    <section class="book-page" id="{{ $service['id'] }}">
        <div class="service-card glass page-turn-element">
            <div class="card-inner">
                
                <div class="icon-box">
                    <i class="fa-solid {{ $service['icon'] }}"></i>
                </div>
                
                <div class="header-box">
                    <h2>{{ __('messages.' . $service['title']) }}</h2>
                    <p class="subtitle">{{ __('messages.' . $service['subtitle']) }}</p>
                </div>

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

                <div class="footer-box">
                    <a href="/contact" class="quote-btn">{{ __('messages.request_quote') }}</a>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</main>

<script>
    const pages = document.querySelectorAll('.page-turn-element');
    const dots = document.querySelectorAll('.nav-dot');
    const sections = document.querySelectorAll('.book-page');

    window.addEventListener('scroll', () => {
        const viewportHeight = window.innerHeight;

        sections.forEach((section, index) => {
            const rect = section.getBoundingClientRect();
            const page = pages[index];
            
            // Calculate how far the section is from the center of the screen
            // 0 = centered, 1 = scrolled out completely
            let progress = rect.top / viewportHeight;
            
            if (progress > -1 && progress < 1) {
                // Apply 3D Rotation (Book Flip Logic)
                // Rotating around X axis for vertical "page turn"
                const rotation = progress * 90; 
                const opacity = 1 - Math.abs(progress);
                const scale = 1 - (Math.abs(progress) * 0.2);

                page.style.transform = `perspective(1200px) rotateX(${rotation}deg) scale(${scale})`;
                page.style.opacity = opacity;
            }

            // Sync dots
            if (rect.top >= -viewportHeight/2 && rect.top <= viewportHeight/2) {
                dots.forEach(d => d.classList.remove('active'));
                dots[index].classList.add('active');
            }
        });
    });
</script>

@endsection

@push('styles')
<style>
    html { 
        scroll-snap-type: y mandatory; 
        scroll-behavior: smooth; 
        background: #0a0a0a; 
    }

    /* Standard Hero */
    .services-hero {
        min-height: 45vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        scroll-snap-align: start;
    }

    .services-hero h1 {
        font-size: clamp(2.5rem, 6vw, 3.8rem);
        background: linear-gradient(135deg, #ba68c8, #e1bee7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Container for the 3D Effect */
    .book-container {
        perspective: 1500px;
    }

    .book-page {
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        scroll-snap-align: start;
        position: relative;
        overflow: hidden;
    }

    /* The Flip Card */
    .page-turn-element {
        width: 100%;
        max-width: 1000px;
        height: 80vh;
        max-height: 700px;
        border-radius: 40px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        transition: transform 0.1s linear, opacity 0.1s linear; /* Smooth real-time update */
        transform-origin: center center;
        backface-visibility: hidden;
    }

    .glass {
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(20px);
    }

    .card-inner {
        padding: 50px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
    }

    /* Content Styling */
    .icon-box {
        font-size: 3.5rem; color: #ba68c8;
        background: rgba(186, 104, 200, 0.1);
        width: 90px; height: 90px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 20px;
    }

    .header-box h2 { font-size: 2.5rem; color: #fff; margin-bottom: 5px; }
    .header-box .subtitle { color: rgba(255,255,255,0.6); }

    .features-grid {
        display: grid; grid-template-columns: 1fr 1fr;
        gap: 20px 50px; list-style: none; padding: 0;
    }

    .features-grid li {
        color: #e0e0e0; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;
    }

    .features-grid li i { color: #ba68c8; }

    .quote-btn {
        padding: 16px 50px; background: #ba68c8; color: #000;
        border-radius: 50px; text-decoration: none; font-weight: 800;
        box-shadow: 0 10px 20px rgba(186, 104, 200, 0.3);
    }

    /* Navigation Bubbles */
    .vertical-dots-nav {
        position: fixed; right: 30px; top: 50%;
        transform: translateY(-50%); display: flex;
        flex-direction: column; gap: 15px; z-index: 1000;
    }

    .nav-dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.2); transition: 0.3s; }
    .nav-dot.active { background: #ba68c8; transform: scale(1.4); }

    @media (max-width: 850px) {
        .features-grid { grid-template-columns: 1fr; }
        .page-turn-element { height: 90vh; }
        html { scroll-snap-type: none; }
    }
</style>
@endpush
