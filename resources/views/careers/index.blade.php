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

  {{-- RESPONSIVE SLIDER --}}
  <div class="job-slider-outer">
    <button class="nav-btn prev" id="prevBtn" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></button>
    
    <div class="job-reel-wrapper">
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

    <button class="nav-btn next" id="nextBtn" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>
  </div>

  <div class="slider-dots" id="sliderDots"></div>

  {{-- SPONTANEOUS SECTION (Original Look Maintained) --}}
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

  // Move exactly one card width + gap
  const getScrollStep = () => {
    if (cards.length === 0) return 0;
    const style = window.getComputedStyle(reel);
    const gap = parseInt(style.getPropertyValue('gap'));
    return cards[0].offsetWidth + gap;
  };

  // Build Pagination Dots
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

  // Sync dots with manual scroll or button clicks
  reel.addEventListener('scroll', () => {
    const step = getScrollStep();
    const index = Math.round(reel.scrollLeft / step);
    document.querySelectorAll('.dot').forEach((dot, i) => {
      dot.classList.toggle('active', i === index);
    });
    
    // Disable arrows at boundaries
    prevBtn.style.opacity = reel.scrollLeft <= 5 ? "0.3" : "1";
    nextBtn.style.opacity = (reel.scrollLeft + reel.offsetWidth >= reel.scrollWidth - 5) ? "0.3" : "1";
  });
</script>

@endsection

@push('styles')
<style>
  /* HERO SECTION */
  .careers-hero { min-height: 45vh; display: flex; align-items: center; justify-content: center; padding: 60px 20px; text-align: center; }
  .careers-hero h1 { font-size: clamp(2.5rem, 6vw, 3.8rem); font-weight: 800; background: linear-gradient(135deg, #ba68c8, #e1bee7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  .careers-hero p { color: rgba(255, 255, 255, 0.7); font-size: 1.1rem; max-width: 700px; margin: 0 auto; }

  /* SLIDER LAYOUT */
  .job-slider-outer {
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    padding: 0 15px;
  }

  .job-reel-wrapper {
    overflow: hidden;
    width: 100%;
    padding: 40px 0;
  }

  .job-reel {
    display: flex;
    gap: 30px;
    overflow-x: auto;
    scroll-behavior: smooth;
    scrollbar-width: none;
    padding: 20px 5px;
    scroll-snap-type: x mandatory;
  }

  .job-reel::-webkit-scrollbar { display: none; }

  /* CARD RESPONSIVITY */
  .job-card {
    /* Desktop: 2 Cards */
    flex: 0 0 calc((100% - 30px) / 2);
    scroll-snap-align: start;
    padding: 50px 40px;
    border-radius: 40px;
    text-align: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.5s ease;
    display: flex;
    flex-direction: column;
    min-height: 550px;
  }

  /* Tablet/Mobile Adjustments */
  @media (max-width: 1024px) {
    .job-card { flex: 0 0 calc(100% - 20px); } /* Show 1 card */
    .job-slider-outer { max-width: 600px; }
  }

  @media (max-width: 600px) {
    .nav-btn { display: none; } /* Hide arrows on small mobile */
    .job-card { padding: 40px 20px; min-height: 500px; }
  }

  /* BUTTONS & DOTS */
  .nav-btn {
    background: rgba(186, 104, 200, 0.1);
    border: 1px solid rgba(186, 104, 200, 0.3);
    color: #ba68c8;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
    z-index: 5;
  }

  .nav-btn:hover { background: #ba68c8; color: #000; }

  .slider-dots { display: flex; justify-content: center; gap: 12px; margin: -20px 0 60px; }
  .dot { width: 12px; height: 12px; border-radius: 50%; background: rgba(186, 104, 200, 0.2); cursor: pointer; transition: 0.3s; }
  .dot.active { background: #ba68c8; transform: scale(1.3); }

  /* SPONTANEOUS SECTION (NO CHANGE) */
  .spontaneous-section { max-width: 1200px; margin: 60px auto; padding: 80px 60px; border-radius: 40px; text-align: center; border: 1px solid rgba(186, 104, 200, 0.2); }
  .spontaneous-section h2 { font-size: 2.8rem; margin-bottom: 25px; background: linear-gradient(135deg, #fff, #ba68c8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  .spontaneous-content p { font-size: 1.3rem; color: rgba(255, 255, 255, 0.7); margin-bottom: 40px; }

  /* STYLE REFINEMENTS */
  .job-icon-box { font-size: 3rem; color: #ba68c8; background: rgba(186, 104, 200, 0.1); width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; border-radius: 24px; margin: 0 auto 30px; border: 1px solid rgba(186, 104, 200, 0.2); transition: 0.6s; }
  .job-card:hover { transform: translateY(-10px); border-color: rgba(186, 104, 200, 0.5); background: rgba(255, 255, 255, 0.05); }
  .job-card:hover .job-icon-box { transform: rotateY(180deg); }
  .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); }
  .apply-btn { background: #ba68c8; color: #000; padding: 14px 40px; font-weight: 800; border-radius: 50px; text-decoration: none; margin-top: auto; display: inline-block; transition: 0.4s; }
  .apply-btn.large { padding: 18px 60px; font-size: 1.25rem; }
</style>
@endpush
