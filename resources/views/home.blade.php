@extends('layouts.app')

@section('title', __('messages.hero_home_title') . ' | AuraMetric')

@section('content')

<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-content">

    <h1>
      {!! __('messages.hero_home_main_title') !!}
    </h1>

    <p>
      {{ __('messages.hero_home_subtitle') }}
    </p>

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

<!-- SERVICES SECTION -->
<section id="services">

  <h2 class="services-title">{{ __('messages.services_home_title') }}</h2>
  <p class="services-subtitle">
    {{ __('messages.services_home_subtitle') }}
  </p>

  <div class="services">

    <div class="glass service">
      <i class="fa-solid fa-bug"></i>
      <h3>{{ __('messages.service_manual_title') }}</h3>
      <p>{{ __('messages.service_manual_short_desc') }}</p>
      <a href="/services#manual" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-robot"></i>
      <h3>{{ __('messages.service_automation_title') }}</h3>
      <p>{{ __('messages.service_automation_short_desc') }}</p>
      <a href="/services#automation" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-mobile-screen"></i>
      <h3>{{ __('messages.service_mobile_title') }}</h3>
      <p>{{ __('messages.service_mobile_short_desc') }}</p>
      <a href="/services#mobile-web" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-brain"></i>
      <h3>{{ __('messages.service_ai_title') }}</h3>
      <p>{{ __('messages.service_ai_short_desc') }}</p>
      <a href="/services#ai-ml" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-shield-halved"></i>
      <h3>{{ __('messages.service_security_title') }}</h3>
      <p>{{ __('messages.service_security_short_desc') }}</p>
      <a href="/services#security" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-gauge-high"></i>
      <h3>{{ __('messages.service_performance_title') }}</h3>
      <p>{{ __('messages.service_performance_short_desc') }}</p>
      <a href="/services#performance" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <!-- New Services - Now translatable -->
    <div class="glass service">
      <i class="fa-solid fa-chart-line"></i>
      <h3>{{ __('messages.service_digital_marketing_title') }}</h3>
      <p>{{ __('messages.service_digital_marketing_short_desc') }}</p>
      <a href="/services#digital-marketing" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-magnifying-glass-chart"></i>
      <h3>{{ __('messages.service_seo_title') }}</h3>
      <p>{{ __('messages.service_seo_short_desc') }}</p>
      <a href="/services#seo" class="btn learn-more-btn">
        {{ __('messages.learn_more') }}
      </a>
    </div>

    <div class="glass service">
      <i class="fa-solid fa-pen-nib"></i>
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
/* Smaller, cleaner services section header */
.services-title {
  text-align: center;
  font-weight: 700;
  font-size: 1.8rem;
  margin-bottom: 10px;
  background: linear-gradient(135deg, #ba68c8, #e1bee7);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.services-subtitle {
  text-align: center;
  font-size: 1.1rem;
  color: var(--text-dim);
  margin-bottom: 40px;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

/* Responsive grid for services cards */
.services {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  padding: 20px;
  max-width: 1400px;
  margin: 0 auto;
}

.glass.service {
  padding: 25px;
  text-align: center;
  transition: all 0.3s ease;
}

.glass.service i {
  font-size: 2.5rem;
  margin-bottom: 15px;
  color: #ba68c8;
}

.glass.service h3 {
  margin-bottom: 12px;
  font-size: 1.3rem;
}

.glass.service p {
  font-size: 0.95rem;
  line-height: 1.5;
  margin-bottom: 20px;
  color: var(--text-dim);
}

.glass.service:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 35px rgba(186, 104, 200, 0.25);
}
</style>
@endpush