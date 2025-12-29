@extends('layouts.app')

@section('title', __('messages.our_services_title') . ' | AuraMetric')

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

{{-- HERO SECTION (Exact Career Page Spacing & Height) --}}
<section class="hero career-style-hero">
  <div class="hero-content">
    <h1>{!! __('messages.services_hero_title') !!}</h1>
    <p>{{ __('messages.services_hero_subtitle') }}</p>
  </div>
</section>

{{-- Navigation Dots --}}
<div class="vertical-dots-nav">
    @foreach($services as $dot)
        <a href="#{{ $dot['id'] }}" class="nav-dot"></a>
    @endforeach
</div>

<main class="services-wrapper">
    @foreach($services as $service)
    <section class="snap-section" id="{{ $service['id'] }}">
        <div class="glass service-card">
            <div class="card-inner">
                
                {{-- Top: Icon & Header --}}
                <div class="card-header-top">
                    <i class="fa-solid {{ $service['icon'] }} fa-flip"></i>
                    <h3>{{ __('messages.' . $service['title']) }}</h3>
                    <p class="services-subtitle-dim">{{ __('messages.' . $service['subtitle']) }}</p>
                </div>

                {{-- Middle: Symmetric Features --}}
                <div class="features-wrapper">
                    <ul class="features-grid">
                        @for($i = 1; $i <= $service['features']; $i++)
                            <li>
                                <span class="small-bullet"></span> 
                                <span>{{ __('messages.' . str_replace('_title', '', $service['title']) . '_feature_' . $i) }}</span>
                            </li>
                        @endfor
                    </ul>
                </div>

                {{-- Bottom: Button --}}
                <div class="footer-box">
                    <a href="/contact" class="btn learn-more-btn">
                        {{ __('messages.request_quote') }}
                    </a>
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
  html { scroll-behavior: smooth; scroll-snap-type: y mandatory; }

  /* CAREER-STYLE HERO GEOMETRY (Fixed Spacing & Height) */
  .career-style-hero {
    min-height: 35vh; /* Reduced height to match Career page */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 20px 40px; /* Precise top/bottom spacing */
    text-align: center;
    scroll-snap-align: start;
  }

  .career-style-hero h1 {
    font-size: clamp(2.2rem, 5vw, 3.2rem); /* Career page scale */
    font-weight: 800;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 15px;
  }

  .career-style-hero p {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.7);
    max-width: 750px;
    margin: 0 auto;
  }

  /* SNAP SECTION */
  .snap-section {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    scroll-snap-align: start;
    padding: 20px;
  }

  /* GLASS CARD (Same as your provided Home/About style) */
  .service-card {
    width: 100%;
    max-width: 1000px;
    height: 78vh; /* Fits screen without hitting footer */
    max-height: 720px;
    border-radius: 30px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    display: flex;
    flex-direction: column;
    padding: 50px 40px !important;
  }

  .card-inner {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    text-align: center;
  }

  /* CONTENT STYLING */
  .service-card i { font-size: 2.8rem; color: #ba68c8; margin-bottom: 15px; }
  .service-card h3 { font-size: 1.7rem; margin-bottom: 8px; }
  .services-subtitle-dim { color: rgba(255, 255, 255, 0.65); font-size: 0.95rem; max-width: 580px; margin: 0 auto; }

  /* SYMMETRIC GRID (2 Columns Desktop, 1 Column Mobile) */
  .features-wrapper { flex-grow: 1; display: flex; align-items: center; width: 100%; }
  .features-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px 50px;
    width: 100%;
    max-width: 820px;
    list-style: none; padding: 0; text-align: left;
  }

  .features-grid li {
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 12px;
    color: rgba(255, 255, 255, 0.8);
  }

  .small-bullet {
    width: 5px; height: 5px;
    background: #ba68c8;
    border-radius: 50%;
    flex-shrink: 0;
  }

  /* BUTTONS & DOTS */
  .footer-box { padding-top: 25px; }
  .vertical-dots-nav {
    position: fixed; right: 25px; top: 50%; transform: translateY(-50%);
    display: flex; flex-direction: column; gap: 15px; z-index: 1000;
  }
  .nav-dot { width: 9px; height: 9px; border-radius: 50%; border: 1px solid #ba68c8; transition: 0.3s; }
  .nav-dot.active { background: #ba68c8; transform: scale(1.4); }

  /* RESPONSIVE */
  @media (max-width: 850px) {
    html { scroll-snap-type: none; }
    .snap-section { height: auto; min-height: 100vh; padding: 50px 15px; }
    .service-card { 
      height: auto; 
      max-height: none; 
      padding: 40px 20px !important; 
    }
    .features-grid { grid-template-columns: 1fr; }
    .vertical-dots-nav { display: none; }
  }
</style>
@endpush
