@extends('layouts.app')

@section('title', __('messages.our_services_title'))

@section('content')

<section class="hero services-hero">
  <div class="hero-content">
    <h1>{!! __('messages.services_hero_title') !!}</h1>
    <p>{{ __('messages.services_hero_subtitle') }}</p>
  </div>
</section>

<main class="services-container">
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
  <div class="service-card glass" id="{{ $service['id'] }}">
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
  @endforeach
</main>

@endsection

@push('styles')
<style>
  /* Hero Section */
  .services-hero {
    min-height: 50vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
  }

  .services-hero .hero-content {
    text-align: center;
    max-width: 900px;
  }

  /* CHANGED: Match Homepage Purple Gradient */
  .services-hero h1 {
    font-size: clamp(2.5rem, 8vw, 3.8rem);
    font-weight: 800;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
  }

  .services-hero p {
    font-size: clamp(1.1rem, 3vw, 1.3rem);
    color: rgba(255, 255, 255, 0.8);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
  }

  /* CHANGED: Flexbox layout for centered last row (Diamond alignment) */
  .services-container {
    max-width: 1400px;
    margin: 80px auto;
    padding: 0 5%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Centers the last row */
    gap: 40px;
  }

  .service-card {
    flex: 0 1 calc(33.333% - 40px); /* 3 per row on desktop */
    min-width: 350px;
    position: relative;
    overflow: hidden;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(186, 104, 200, 0.2); /* Soft purple border */
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: flex;
    flex-direction: column;
  }

  /* Glamorous Hover Effect */
  .service-card:hover {
    transform: translateY(-15px);
    background: rgba(255, 255, 255, 0.07);
    box-shadow: 0 20px 50px rgba(186, 104, 200, 0.15);
    border-color: rgba(186, 104, 200, 0.5);
  }

  /* Animated Top Line */
  .service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #ba68c8, #7b1fa2);
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .service-card:hover::before {
    opacity: 1;
  }

  .service-card-inner {
    padding: 40px 30px 0;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  /* Glamorous Icon Box */
  .service-card-icon {
    font-size: 3rem;
    color: #ba68c8;
    margin-bottom: 25px;
    align-self: center;
    background: rgba(186, 104, 200, 0.1);
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 24px; /* Squircle shape */
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.4s ease;
  }

  .service-card:hover .service-card-icon {
    transform: rotateY(180deg); /* Modern flip effect */
    background: rgba(186, 104, 200, 0.2);
    color: #e1bee7;
  }

  .service-card-content h2 {
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: #fff;
    text-align: center;
  }

  .service-card-subtitle {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.6);
    text-align: center;
    margin-bottom: 30px;
    line-height: 1.5;
    min-height: 3rem;
  }

  .service-features {
    list-style: none;
    padding: 0;
    margin: 0 0 30px;
    flex-grow: 1;
  }

  .service-features li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 15px;
    transition: transform 0.3s ease;
  }

  .service-features li i {
    color: #ba68c8;
    font-size: 1.1rem;
    margin-top: 3px;
  }

  .service-card:hover .service-features li {
    transform: translateX(5px);
  }

  .service-card-btn-wrapper {
    padding: 0 30px 40px;
    display: flex;
    justify-content: center;
  }

  .service-card-btn {
    background: transparent;
    color: #fff;
    border: 1px solid rgba(186, 104, 200, 0.5);
    padding: 12px 35px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.4s ease;
    backdrop-filter: blur(5px);
  }

  .service-card-btn:hover {
    background: #ba68c8;
    color: #fff;
    box-shadow: 0 0 20px rgba(186, 104, 200, 0.4);
    border-color: #ba68c8;
  }

  /* Responsive Adjustments */
  @media (max-width: 1100px) {
    .service-card {
      flex: 0 1 calc(50% - 40px); /* 2 per row */
    }
  }

  @media (max-width: 768px) {
    .service-card {
      flex: 0 1 100%; /* 1 per row */
      min-width: unset;
    }
    .services-hero h1 {
      font-size: 2.8rem;
    }
  }
</style>
@endpush
