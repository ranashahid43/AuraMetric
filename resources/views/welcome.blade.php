@extends('layouts.app')

@section('title', 'Home | AuraMetric Soloution')

@section('content')
  <!-- Your hero section -->
  <section class="hero">
    <div class="hero-content">
      <h1>{!! __('Protagonists of <span>Digital Quality</span><br>We Test. You Trust.') !!}</h1>
      <p>{!! __('Premium QA and software testing solutions...') !!}</p>
      <div class="hero-btns">
        <a href="/contact" class="btn learn-more-btn">{{ __('Request Consultation') }}</a>
        <a href="/services" class="btn learn-more-btn">{{ __('Explore Services') }}</a>
      </div>
    </div>
  </section>

  <!-- Services section -->
  <section id="services">
    <h2>{{ __('Our Testing Services') }}</h2>
    <div class="services">
      <!-- Your service cards -->
    </div>
  </section>
@endsection
