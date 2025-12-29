@extends('layouts.app')

@section('title', __('messages.our_services_title'))

@section('content')

{{-- Floating Bubble Navigation --}}
<div class="vertical-dots-nav" id="verticalNav">
    <a href="#hero" class="nav-dot active" data-id="hero"><span class="dot-label">Top</span></a>
    @foreach($services as $service)
        <a href="#{{ $service['id'] }}" class="nav-dot" data-id="{{ $service['id'] }}">
            <span class="dot-label">{{ __('messages.' . $service['title']) }}</span>
        </a>
    @endforeach
</div>

<main class="services-snap-container">
    {{-- Hero Section --}}
    <section class="snap-section" id="hero">
        <div class="hero-content">
            <h1 class="responsive-h1">{!! __('messages.services_hero_title') !!}</h1>
            <p class="responsive-p">{{ __('messages.services_hero_subtitle') }}</p>
            <div class="scroll-indicator">
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </section>

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
                            <li><i class="fa-solid fa-check"></i> <span>{{ __('messages.' . str_replace('_title', '', $service['title']) . '_feature_' . $i) }}</span></li>
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
    // Robust Intersection Observer for Active States
    const observerOptions = { threshold: 0.6 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                document.querySelectorAll('.nav-dot').forEach(dot => {
                    dot.classList.toggle('active', dot.getAttribute('href') === `#${entry.target.id}`);
                });
            }
        });
    }, observerOptions);

    document.querySelectorAll('.snap-section').forEach(section => observer.observe(section));
</script>

@endsection

@push('styles')
<style>
    /* 1. FLUID SCROLLING & SNAPPING */
    html {
        scroll-snap-type: y mandatory;
        scroll-behavior: smooth;
        height: 100%;
    }

    body { margin: 0; padding: 0; }

    .snap-section {
        min-height: 100vh; /* Fallback */
        min-height: 100dvh; /* Modern mobile height */
        width: 100%;
        scroll-snap-align: start;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: clamp(1rem, 5vw, 3rem);
        position: relative;
    }

    /* 2. AUTOMATIC CARD SCALING */
    .service-card {
        width: 100%;
        /* Dynamic width: wider on big screens, full width on small */
        max-width: clamp(320px, 90%, 1100px); 
        /* Dynamic height: fits within screen but allows content to grow */
        max-height: 90dvh; 
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(186, 104, 200, 0.2);
        border-radius: clamp(20px, 4vw, 40px);
        overflow-y: auto; /* Internal scroll if content exceeds small laptops */
        transition: transform 0.4s ease;
    }

    .service-card::-webkit-scrollbar { width: 4px; }
    .service-card::-webkit-scrollbar-thumb { background: rgba(186, 104, 200, 0.5); border-radius: 10px; }

    .service-card-inner {
        padding: clamp(1.5rem, 5vw, 4rem);
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* 3. FLUID TYPOGRAPHY (Adjusts per resolution) */
    .responsive-h1 { font-size: clamp(2.5rem, 8vw, 4.5rem); font-weight: 800; background: linear-gradient(135deg, #ba68c8, #e1bee7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .responsive-h2 { font-size: clamp(1.5rem, 4vw, 2.5rem); color: #fff; text-align: center; }
    .responsive-p { font-size: clamp(1rem, 2vw, 1.25rem); color: rgba(255, 255, 255, 0.7); max-width: 800px; margin: 0 auto; }

    /* 4. GRID ADAPTATION */
    .service-features {
        display: grid;
        /* Automatically switch columns based on space available */
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: clamp(10px, 2vw, 25px);
        list-style: none;
        padding: 0;
    }

    .service-features li {
        color: #e0e0e0;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: clamp(0.9rem, 1.5vw, 1.1rem);
    }

    /* 5. VERTICAL NAV (Hides when too small) */
    .vertical-dots-nav {
        position: fixed;
        right: clamp(10px, 3vw, 40px);
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 20px;
        z-index: 1000;
    }

    @media (max-width: 600px) {
        .vertical-dots-nav { display: none; } /* Better UX for mobile */
        html { scroll-snap-type: none; } /* Disable snap on phones */
        .service-card { max-height: none; }
    }

    /* ICON SCALING */
    .service-card-icon {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        width: clamp(80px, 10vw, 110px);
        height: clamp(80px, 10vw, 110px);
        margin: 0 auto;
        background: rgba(186, 104, 200, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20%;
        border: 1px solid rgba(186, 104, 200, 0.2);
        color: #ba68c8;
    }

    .service-card-btn {
        display: block;
        width: fit-content;
        min-width: 200px;
        margin: 0 auto;
        padding: clamp(12px, 2vw, 18px) clamp(20px, 4vw, 40px);
        border: 2px solid #ba68c8;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border-radius: 50px;
        font-weight: bold;
        transition: 0.3s;
    }
</style>
@endpush
