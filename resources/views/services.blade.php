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
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 800;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
  }

  /* Services Grid - Wider Cards & Centered Last Item */
  .services-container {
    max-width: 1600px; /* Increased width for wider look */
    margin: 60px auto 100px;
    padding: 0 4%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Ensures the 9th card is centered */
    gap: 30px;
  }

  .service-card {
    /* WIDER CARDS: Desktop defaults to roughly 3 per row with room for gaps */
    flex: 1 1 450px; 
    max-width: 500px; 
    border-radius: 24px;
    background: rgba(255, 255, 255, 0.04);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.4s ease;
    display: flex;
    flex-direction: column;
    min-height: 650px; /* Ensures vertical symmetry */
  }

  .service-card:hover {
    transform: translateY(-10px);
    border-color: rgba(186, 104, 200, 0.5);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
  }

  .service-card-inner {
    padding: 50px 40px;
    display: flex;
    flex-direction: column;
    height: 100%; /* Important for button alignment */
    flex-grow: 1;
  }

  .service-card-icon {
    font-size: 3.5rem;
    color: #ba68c8;
    margin-bottom: 30px;
    text-align: center;
  }

  .service-card-content {
    display: flex;
    flex-direction: column;
    flex-grow: 1; /* Fills the space */
  }

  .service-card-content h2 {
    font-size: 1.8rem;
    color: #fff;
    margin-bottom: 15px;
    text-align: center;
  }

  .service-card-subtitle {
    font-size: 1.05rem;
    color: #b0b0b0;
    text-align: center;
    margin-bottom: 30px;
    line-height: 1.6;
  }

  /* SYMMETRY FIX: This pushes the button to the bottom */
  .service-features {
    list-style: none;
    padding: 0;
    margin: 0;
    flex-grow: 1; /* Pushes the next element (button) to the bottom */
  }

  .service-features li {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    font-size: 1rem;
    color: #e0e0e0;
    margin-bottom: 15px;
  }

  .service-features li i {
    color: #ba68c8;
    margin-top: 5px;
  }

  .service-card-btn-wrapper {
    margin-top: 40px; /* Space above the button */
    display: flex;
    justify-content: center;
  }

  .service-card-btn {
    width: 100%;
    max-width: 250px;
    text-align: center;
    padding: 15px 0;
    border: 2px solid #ba68c8;
    color: #fff;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 700;
    transition: 0.3s;
  }

  .service-card-btn:hover {
    background: #ba68c8;
    box-shadow: 0 0 20px rgba(186, 104, 200, 0.4);
  }

  /* Responsive Logic */
  @media (max-width: 1024px) {
    .service-card {
      flex: 1 1 45%; /* 2 per row */
    }
  }

  @media (max-width: 768px) {
    .service-card {
      flex: 1 1 100%; /* 1 per row */
      min-height: auto;
      max-width: 100%;
    }
    
    .service-card-inner {
      padding: 40px 25px;
    }

    .services-hero h1 {
      font-size: 2.5rem;
    }
  }
</style>
@endpush
