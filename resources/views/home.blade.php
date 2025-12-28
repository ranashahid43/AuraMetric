@extends('layouts.app')

@section('title', __('messages.hero_home_title') . ' | AuraMetric')

@section('content')

<section class="hero">
  <div class="hero-content">
    <h1>{!! __('messages.hero_home_main_title') !!}</h1>
    <p>{{ __('messages.hero_home_subtitle') }}</p>
    <div class="hero-btns">
      <a href="/contact" class="btn learn-more-btn">
        {{ __('messages.hero_btn_consultation') }}
      </a>
      <a href="/services" class="btn learn-more-btn">
        {{ __('messages.hero_btn_services') }}
      </a>
    </div>
  </div>
</section>

<section id="services">
  <h2 class="services-title">{{ __('messages.services_home_title') }}</h2>
  <p class="services-subtitle">
    {{ __('messages.services_home_subtitle') }}
  </p>

  <div class="services">
    <div class="glass service">
      <i class="fa-solid fa-bug fa-flip"></i>
      <h3>{{ __('messages.service_manual_title') }}</h3>
      <p>{{ __('messages.service_manual_short_desc') }}</p>
      <a href="/services#manual" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-robot fa-flip"></i>
      <h3>{{ __('messages.service_automation_title') }}</h3>
      <p>{{ __('messages.service_automation_short_desc') }}</p>
      <a href="/services#automation" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-mobile-screen fa-flip"></i>
      <h3>{{ __('messages.service_mobile_title') }}</h3>
      <p>{{ __('messages.service_mobile_short_desc') }}</p>
      <a href="/services#mobile-web" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-brain fa-flip"></i>
      <h3>{{ __('messages.service_ai_title') }}</h3>
      <p>{{ __('messages.service_ai_short_desc') }}</p>
      <a href="/services#ai-ml" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-shield-halved fa-flip"></i>
      <h3>{{ __('messages.service_security_title') }}</h3>
      <p>{{ __('messages.service_security_short_desc') }}</p>
      <a href="/services#security" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-gauge-high fa-flip"></i>
      <h3>{{ __('messages.service_performance_title') }}</h3>
      <p>{{ __('messages.service_performance_short_desc') }}</p>
      <a href="/services#performance" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-chart-line fa-flip"></i>
      <h3>{{ __('messages.service_digital_marketing_title') }}</h3>
      <p>{{ __('messages.service_digital_marketing_short_desc') }}</p>
      <a href="/services#digital-marketing" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-magnifying-glass-chart fa-flip"></i>
      <h3>{{ __('messages.service_seo_title') }}</h3>
      <p>{{ __('messages.service_seo_short_desc') }}</p>
      <a href="/services#seo" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-pen-nib fa-flip"></i>
      <h3>{{ __('messages.service_content_writing_title') }}</h3>
      <p>{{ __('messages.service_content_writing_short_desc') }}</p>
      <a href="/services#content-writing" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>
  </div>
</section>

@endsection

@push('styles')
<style>
  /* Hero Section */
  .hero {
    min-height: 80vh; 
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
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

  .hero-btns {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
  }

  /* Services Section Title */
  .services-title {
    text-align: center;
    font-weight: 700;
    font-size: clamp(1.8rem, 5vw, 2.5rem);
    margin-bottom: 10px;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .services-subtitle {
    text-align: center;
    font-size: clamp(1rem, 2.5vw, 1.1rem);
    color: var(--text-dim);
    margin-bottom: 50px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
  }

  .services {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    padding: 20px;
    max-width: 1400px;
    margin: 0 auto;
  }

  .glass.service {
    flex: 0 1 calc(25% - 30px);
    min-width: 280px;
    padding: 40px 25px;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .glass.service i {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #ba68c8;
    /* Control flip speed */
    --fa-animation-duration: 2s; 
    --fa-animation-iteration-count: 1;
  }

  /* Flip icon on card hover */
  .glass.service:hover i {
    animation: fa-flip 1s ease-in-out;
  }

  .glass.service h3 {
    margin-bottom: 15px;
    font-size: 1.3rem;
  }

  .glass.service p {
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 30px;
    color: var(--text-dim);
    flex-grow: 1;
  }

  .glass.service:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(186, 104, 200, 0.25);
  }

  @media (max-width: 1200px) {
    .glass.service { flex: 0 1 calc(33.333% - 30px); }
  }

  @media (max-width: 900px) {
    .glass.service { flex: 0 1 calc(50% - 30px); }
  }

  @media (max-width: 600px) {
    .glass.service { flex: 0 1 100%; }
    .hero-btns { flex-direction: column; align-items: center; }
    .btn.learn-more-btn { width: 100%; max-width: 300px; }
  }
</style>
@endpush
