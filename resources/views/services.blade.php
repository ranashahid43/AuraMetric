@extends('layouts.app')

@section('title', __('messages.our_services_title'))

@section('content')

<!-- HERO SECTION - Matches homepage blue theme -->
<section class="hero" style="min-height: 40vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), #2da9ff;">
  <div class="hero-content">
    <h1 style="background: linear-gradient(135deg, #2da9ff, #7ed3ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 3.2rem; font-weight: 800;">
      {!! __('messages.services_hero_title') !!}
    </h1>
    <p style="color: #fff; font-size: 1.2rem; max-width: 800px; margin: 20px auto 0;">
      {{ __('messages.services_hero_subtitle') }}
    </p>
  </div>
</section>

<!-- MAIN SERVICES CONTENT -->
<main class="services-container">

  <!-- Manual Testing -->
  <div class="service-card glass" id="manual">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-bug"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_manual_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_manual_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_manual_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_manual_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_manual_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_manual_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_manual_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

  <!-- Automation Testing -->
  <div class="service-card glass" id="automation">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-robot"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_automation_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_automation_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_automation_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_automation_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_automation_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_automation_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_automation_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

  <!-- Web & Mobile Testing -->
  <div class="service-card glass" id="mobile-web">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-mobile-screen"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_mobile_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_mobile_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_mobile_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_mobile_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_mobile_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_mobile_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_mobile_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

  <!-- AI & ML Testing -->
  <div class="service-card glass" id="ai-ml">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-brain"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_ai_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_ai_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_ai_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_ai_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_ai_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_ai_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_ai_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

  <!-- Security Testing -->
  <div class="service-card glass" id="security">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-shield-halved"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_security_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_security_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_security_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_security_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_security_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_security_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_security_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

  <!-- Performance Testing -->
  <div class="service-card glass" id="performance">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-gauge-high"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_performance_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_performance_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_performance_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_performance_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_performance_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_performance_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_performance_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

  <!-- Digital Marketing -->
  <div class="service-card glass" id="digital-marketing">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-chart-line"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_digital_marketing_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_digital_marketing_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_digital_marketing_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_digital_marketing_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_digital_marketing_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_digital_marketing_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_digital_marketing_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

  <!-- SEO Optimization -->
  <div class="service-card glass" id="seo">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-magnifying-glass-chart"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_seo_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_seo_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_seo_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_seo_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_seo_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_seo_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_seo_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

  <!-- Content Writing & Strategy -->
  <div class="service-card glass" id="content-writing">
    <div class="service-card-inner">
      <div class="service-card-icon">
        <i class="fa-solid fa-pen-nib"></i>
      </div>
      <div class="service-card-content">
        <h2>{{ __('messages.service_content_writing_title') }}</h2>
        <p class="service-card-subtitle">{{ __('messages.service_content_writing_subtitle') }}</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_content_writing_feature_1') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_content_writing_feature_2') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_content_writing_feature_3') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_content_writing_feature_4') }}</li>
          <li><i class="fa-solid fa-check"></i> {{ __('messages.service_content_writing_feature_5') }}</li>
        </ul>
      </div>
      <div class="service-card-btn-wrapper">
        <a href="/contact" class="service-card-btn">{{ __('messages.request_quote') }}</a>
      </div>
    </div>
  </div>

</main>

@endsection

@push('styles')
<style>
  .hero-content {
    text-align: center;
    padding: 80px 20px;
  }

  .services-container {
    max-width: 1400px;
    margin: 100px auto;
    padding: 0 5%;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 50px;
  }

  .service-card {
    position: relative;
    overflow: hidden;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: flex;
    flex-direction: column;
  }

  .service-card:hover {
    transform: translateY(-20px);
    box-shadow: 0 30px 70px rgba(45, 169, 255, 0.25);
    border-color: rgba(45, 169, 255, 0.4);
  }

  .service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #2da9ff, #7ed3ff);
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .service-card:hover::before {
    opacity: 1;
  }

  .service-card-inner {
    padding: 50px 40px 0 40px; /* Original padding - no increase */
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .service-card-icon {
    font-size: 4.5rem; /* Original size */
    color: #2da9ff;
    margin-bottom: 30px;
    align-self: center;
    background: rgba(45, 169, 255, 0.1);
    width: 120px;
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 2px solid rgba(45, 169, 255, 0.3);
    transition: all 0.4s ease;
  }

  .service-card:hover .service-card-icon {
    background: rgba(45, 169, 255, 0.2);
    border-color: #2da9ff;
    transform: scale(1.1);
    box-shadow: 0 0 30px rgba(45, 169, 255, 0.4);
  }

  .service-card-content h2 {
    font-size: 2.4rem; /* Original size */
    margin-bottom: 20px;
    color: #fff;
    text-align: center;
  }

  .service-card-subtitle {
    font-size: 1.1rem;
    color: #ccc;
    text-align: center;
    margin-bottom: 35px;
    line-height: 1.6;
  }

  .service-features {
    list-style: none;
    padding: 0;
    margin: 0;
    flex-grow: 1;
  }

  .service-features li {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 1.05rem;
    color: #ddd;
    margin-bottom: 18px;
    padding-left: 10px;
    transition: all 0.3s ease;
  }

  .service-features li i {
    color: #2da9ff;
    font-size: 1.3rem;
    width: 28px;
    text-align: center;
  }

  .service-card:hover .service-features li {
    transform: translateX(10px);
    color: #fff;
  }

  .service-card-btn-wrapper {
    padding: 0 40px 50px 40px; /* Original bottom padding */
    display: flex;
    justify-content: center;
  }

  .service-card-btn {
    background: transparent;
    color: #2da9ff;
    border: 2px solid #2da9ff;
    padding: 14px 40px; /* Original button size */
    border-radius: 50px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.4s ease;
  }

  .service-card-btn:hover {
    background: #2da9ff;
    color: #000;
    box-shadow: 0 0 25px rgba(45, 169, 255, 0.6);
    transform: translateY(-3px);
  }

  @media (max-width: 992px) {
    .services-container {
      grid-template-columns: 1fr;
    }
  }
</style>
@endpush