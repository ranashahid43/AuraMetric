@extends('layouts.app')

@section('title', __('messages.hero_home_title') . ' | AuraMetric')

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

{{-- Hero Section (Identical to Home Page Code) --}}
<section class="hero">
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
        {{-- Exact Glass Class and Formatting --}}
        <div class="glass service service-card">
            <div class="card-inner">
                
                {{-- Top: Icon --}}
                <div class="card-header-top">
                    <i class="fa-solid {{ $service['icon'] }} fa-flip"></i>
                    <h3>{{ __('messages.' . $service['title']) }}</h3>
                    <p class="services-subtitle-dim">{{ __('messages.' . $service['subtitle']) }}</p>
                </div>

                {{-- Middle: Symmetric Feature Grid --}}
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

                {{-- Bottom: Exact Home Page Button --}}
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
  /* Page Snapping Logic */
  html { scroll-behavior: smooth; scroll-snap-type: y mandatory; }

  /* Hero Section (Copied exactly from your Home Page code) */
  .hero {
    min-height: 80vh; 
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    scroll-snap-align: start;
  }

  .hero-content {
    text-align: center;
    max-width: 900px;
  }

  .hero-content h1 {
    font-size: clamp(2.2rem, 6vw, 3.2rem); 
    margin-bottom: 20px;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .hero-content p {
    font-size: clamp(1.1rem, 3vw, 1.3rem);
    margin-bottom: 40px;
    color: var(--text-dim);
  }

  /* Full Screen Card Sections */
  .snap-section {
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    scroll-snap-align: start;
    padding: 40px 20px;
  }

  /* Symmetric Card Formatting */
  .service-card {
    width: 100%;
    max-width: 1000px;
    height: 80vh;
    max-height: 750px;
    display: flex;
    flex-direction: column;
    padding: 60px 40px !important; /* Standardized card spacing */
  }

  .card-inner {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
  }

  /* Icon Logic (from Home Page) */
  .service-card i {
    font-size: 3rem;
    color: #ba68c8;
    margin-bottom: 15px;
    --fa-animation-duration: 2s;
  }

  .service-card:hover i { animation: fa-flip 1s ease-in-out; }

  .services-subtitle-dim {
    color: var(--text-dim);
    font-size: 1rem;
    max-width: 600px;
    margin: 0 auto;
  }

  /* Features Grid (Perfect Symmetry) */
  .features-wrapper {
    flex-grow: 1;
    display: flex;
    align-items: center;
    width: 100%;
  }

  .features-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px 60px;
    width: 100%;
    max-width: 800px;
    list-style: none;
    padding: 0;
    text-align: left;
  }

  .features-grid li {
    font-size: 1.05rem;
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-dim);
  }

  .small-bullet {
    width: 6px;
    height: 6px;
    background: #ba68c8;
    border-radius: 50%;
    flex-shrink: 0;
  }

  /* Dot Navigation */
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

  .nav-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 1px solid #ba68c8;
    transition: 0.3s;
  }

  .nav-dot.active {
    background: #ba68c8;
    transform: scale(1.4);
  }

  /* Responsive Fixes */
  @media (max-width: 850px) {
    html { scroll-snap-type: none; }
    .snap-section { height: auto; min-height: 100vh; padding: 60px 15px; }
    .service-card { height: auto; max-height: none; }
    .features-grid { grid-template-columns: 1fr; }
    .vertical-dots-nav { display: none; }
  }
</style>
@endpush
