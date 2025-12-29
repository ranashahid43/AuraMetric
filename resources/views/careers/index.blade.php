@extends('layouts.app')

@section('title', __('messages.careers_title') . ' | AuraMetric')

@section('content')

<section class="hero careers-hero">
  <div class="hero-content">
    <h1>{!! __('messages.careers_hero_title') !!}</h1>
    <p>{{ __('messages.careers_hero_subtitle') }}</p>
  </div>
</section>

<main class="careers-section">

  <div class="job-slider-container">
    <button class="nav-btn prev" id="prevBtn"><i class="fa-solid fa-chevron-left"></i></button>
    
    <div class="job-reel-wrapper" id="reelWrapper">
      <div class="job-reel" id="jobReel">
        @php
          $jobs = [
            ['title'=> __('messages.careers_job_automation_title'), 'description'=> __('messages.careers_job_automation_desc'), 'experience'=> __('messages.careers_job_automation_exp'), 'qualification'=> __('messages.careers_job_automation_qual'), 'icon' => 'fa-robot'],
            ['title'=> __('messages.careers_job_ml_title'), 'description'=> __('messages.careers_job_ml_desc'), 'experience'=> __('messages.careers_job_ml_exp'), 'qualification'=> __('messages.careers_job_ml_qual'), 'icon' => 'fa-brain'],
            ['title'=> __('messages.careers_job_junior_title'), 'description'=> __('messages.careers_job_junior_desc'), 'experience'=> __('messages.careers_job_junior_exp'), 'qualification'=> __('messages.careers_job_junior_qual'), 'icon' => 'fa-code'],
            ['title'=> __('messages.careers_job_intern_title'), 'description'=> __('messages.careers_job_intern_desc'), 'experience'=> __('messages.careers_job_intern_exp'), 'qualification'=> __('messages.careers_job_intern_qual'), 'icon' => 'fa-graduation-cap'],
          ];
        @endphp

        @foreach($jobs as $job)
        <div class="job-card glass">
          <div class="job-icon-box">
            <i class="fa-solid {{ $job['icon'] }}"></i>
          </div>
          <div class="card-header">
            <h3>{{ $job['title'] }}</h3>
          </div>
          <div class="card-body">
            <p class="job-desc">{{ $job['description'] }}</p>
            <div class="job-details">
              <p><strong>{{ __('messages.careers_experience') }}:</strong> {{ $job['experience'] }}</p>
              <p><strong>{{ __('messages.careers_degree') }}:</strong> {{ $job['qualification'] }}</p>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('careers.apply') }}" class="btn apply-btn">{{ __('messages.careers_apply_now') }}</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <button class="nav-btn next" id="nextBtn"><i class="fa-solid fa-chevron-right"></i></button>
  </div>

  <div class="slider-dots" id="sliderDots"></div>

  <div class="spontaneous-section glass">
    <div class="spontaneous-content">
      <h2>{{ __('messages.careers_spontaneous_title') ?? 'Join Our Talent Pool' }}</h2>
      <p>{{ __('messages.careers_spontaneous_text') }}</p>
      <a href="{{ route('careers.apply') }}" class="btn apply-btn large">
        {{ __('messages.careers_spontaneous_button') }}
      </a>
    </div>
  </div>

</main>

<script>
  const reel = document.getElementById('jobReel');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  const dotsContainer = document.getElementById('sliderDots');
  const cards = document.querySelectorAll('.job-card');

  // Logic to calculate movement based on exact card width + gap
  const getScrollStep = () => {
    if (cards.length === 0) return 0;
    return cards[0].offsetWidth + 40; // Card width + gap
  };

  // Create Dots
  cards.forEach((_, i) => {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if(i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => {
      reel.scrollTo({ left: i * getScrollStep(), behavior: 'smooth' });
    });
    dotsContainer.appendChild(dot);
  });

  nextBtn.addEventListener('click', () => {
    reel.scrollBy({ left: getScrollStep(), behavior: 'smooth' });
  });

  prevBtn.addEventListener('click', () => {
    reel.scrollBy({ left: -getScrollStep(), behavior: 'smooth' });
  });

  // Update active dot on scroll
  reel.addEventListener('scroll', () => {
    const step = getScrollStep();
    const index = Math.round(reel.scrollLeft / step);
    document.querySelectorAll('.dot').forEach((dot, i) => {
      dot.classList.toggle('active', i === index);
    });
  });
</script>

@endsection

@push('styles')
<style>
  /* HERO & SECTION (Unchanged) */
  .careers-hero { min-height: 45vh; display: flex; align-items: center; justify-content: center; padding: 60px 20px; text-align: center; }
  .careers-hero h1 { font-size: clamp(2.5rem, 6vw, 3.8rem); font-weight: 800; background: linear-gradient(135deg, #ba68c8, #e1bee7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  
  /* SLIDER CONTAINER */
  .job-slider-container {
    display: flex;
    align-items: center;
    max-width: 1000px; /* Reduced to perfectly fit 2 cards */
    margin: 0 auto;
    position: relative;
  }

  .job-reel-wrapper {
    overflow: hidden;
    width: 100%;
    padding: 40px 0;
  }

  .job-reel {
    display: flex;
    gap: 40px; /* Gap between cards */
    overflow-x: auto;
    scroll-behavior: smooth;
    scrollbar-width: none;
    padding: 20px;
    /* CSS SNAP LOGIC */
    scroll-snap-type: x mandatory; 
  }

  .job-reel::-webkit-scrollbar { display: none; }

  /* TWO CARDS LOGIC */
  .job-card { 
    /* (100% - 1 gap) / 2 cards = width */
    flex: 0 0 calc((100% - 40px) / 2); 
    scroll-snap-align: start; /* Each card snaps to the start of the view */
    padding: 50px 30px; 
    border-radius: 40px; 
    text-align: center; 
    border: 1px solid rgba(186, 104, 200, 0.2); 
    transition: 0.5s; 
    display: flex; 
    flex-direction: column; 
    min-height: 550px; 
  }

  /* BUTTONS & DOTS (Improved styling) */
  .nav-btn {
    background: rgba(186, 104, 200, 0.15);
    border: 1px solid rgba(186, 104, 200, 0.3);
    color: #ba68c8;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 10;
    flex-shrink: 0;
  }
  
  .nav-btn:hover { background: #ba68c8; color: #000; }

  .slider-dots { display: flex; justify-content: center; gap: 10px; margin-bottom: 60px; }
  .dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(186, 104, 200, 0.2); cursor: pointer; transition: 0.3s; }
  .dot.active { background: #ba68c8; transform: scale(1.2); }

  /* CARD CONTENT (Kept your style) */
  .job-icon-box { font-size: 2.5rem; color: #ba68c8; background: rgba(186, 104, 200, 0.1); width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; border-radius: 20px; margin: 0 auto 20px; border: 1px solid rgba(186, 104, 200, 0.2); }
  .job-card:hover { transform: translateY(-10px); border-color: rgba(186, 104, 200, 0.5); background: rgba(255, 255, 255, 0.05); }
  .card-header h3 { font-size: 1.5rem; color: #fff; margin-bottom: 15px; }
  .job-desc { font-size: 0.95rem; color: rgba(255, 255, 255, 0.6); margin-bottom: 20px; }
  
  /* UTILITIES */
  .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); }
  .apply-btn { background: #ba68c8; color: #000; padding: 12px 30px; font-weight: 800; border-radius: 50px; text-decoration: none; margin-top: auto; display: inline-block; }

  /* RESPONSIVE: Show 1 card on mobile */
  @media (max-width: 800px) {
    .job-card { flex: 0 0 100%; }
    .nav-btn { display: none; }
  }
</style>
@endpush
