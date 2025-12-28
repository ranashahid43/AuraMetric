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
    min-height: 45vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    text-align: center;
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

  /* Wide Container & Centered Flex Layout */
  .services-container {
    max-width: 1600px; 
    margin: 40px auto 100px;
    padding: 0 4%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* This centers the 9th card on the last row */
    gap: 30px;
  }

  .service-card {
    /* Wide Card logic: attempts 3 per row on big screens */
    flex: 1 1 450px; 
    max-width: 500px; 
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: flex;
    flex-direction: column;
    min-height: 700px; /* High min-height for symmetrical rows */
  }

  .service-card:hover {
    transform: translateY(-15px);
    border-color: rgba(186, 104, 200, 0.5);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
    background: rgba(255, 255, 255, 0.06);
  }

  .service-card-inner {
    padding: 50px 40px;
    display: flex;
    flex-direction: column;
    height: 100%;
    flex-grow: 1;
  }

  /* FLIP ICON FEATURE */
  .service-card-icon {
    font-size: 3.5rem;
    color: #ba68c8;
    margin-bottom: 30px;
    align-self: center;
    background: rgba(186, 104, 200, 0.1);
    width: 110px;
    height: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 24px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
  }

  /* Flip on card hover or direct icon click/hover */
  .service-card:hover .service-card-icon,
  .service-card-icon:hover {
    transform: rotateY(180deg);
    background: rgba(186, 104, 200, 0.25);
    color: #e1bee7;
    box-shadow: 0 0 20px rgba(186, 104, 200, 0.3);
  }

  .service-card-content {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .service-card-content h2 {
    font-size: 1.9rem;
    color: #fff;
    margin-bottom: 15px;
    text-align: center;
  }

  .service-card-subtitle {
    font-size: 1rem;
    color: #b0b0b0;
    text-align: center;
    margin-bottom: 35px;
    line-height: 1.6;
    min-height: 3.2rem;
  }

  /* SYMMETRY LOGIC: List pushes the button to the bottom */
  .service-features {
    list-style: none;
    padding: 0;
    margin: 0;
    flex-grow: 1; 
  }

  .service-features li {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    font-size: 1rem;
    color: #e0e0e0;
    margin-bottom: 18px;
    transition: 0.3s;
  }

  .service-features li i {
    color: #ba68c8;
    margin-top: 5px;
  }

  .service-card:hover .service-features li {
    color: #fff;
    transform: translateX(5px);
  }

  .service-card-btn-wrapper {
    margin-top: 40px;
    display: flex;
    justify-content: center;
  }

  .service-card-btn {
    width: 100%;
    max-width: 280px;
    text-align: center;
    padding: 16px 0;
    border: 2px solid #ba68c8;
    color: #fff;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 700;
    transition: 0.4s all ease;
    background: transparent;
  }

  .service-card-btn:hover {
    background: #ba68c8;
    color: #fff;
    box-shadow: 0 10px 20px rgba(186, 104, 200, 0.4);
    transform: translateY(-3px);
  }

  /* Responsive Adjustments */
  @media (max-width: 1200px) {
    .service-card {
      flex: 1 1 calc(50% - 30px); /* 2 per row */
    }
  }

  @media (max-width: 850px) {
    .service-card {
      flex: 1 1 100%; /* 1 per row */
      min-height: auto;
      max-width: 100%;
    }
    
    .service-card-inner {
      padding: 40px 25px;
    }
  }
</style>
@endpush
