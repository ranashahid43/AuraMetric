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

  {{-- New Wrapper with Navigation --}}
  <div class="job-slider-container">
    <button class="nav-btn prev" id="prevBtn"><i class="fa-solid fa-chevron-left"></i></button>
    
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

        {{-- Removed the array_merge so we only have the actual jobs --}}
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

  {{-- Pagination Dots --}}
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

{{-- SLIDER SCRIPT --}}
<script>
  const reel = document.getElementById('jobReel');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  const dotsContainer = document.getElementById('sliderDots');
  const cards = document.querySelectorAll('.job-card');

  // Create Dots
  cards.forEach((_, i) => {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if(i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => {
      reel.scrollTo({ left: cards[i].offsetLeft - reel.offsetLeft, behavior: 'smooth' });
    });
    dotsContainer.appendChild(dot);
  });

  // Scroll logic
  nextBtn.addEventListener('click', () => {
    reel.scrollBy({ left: 440, behavior: 'smooth' });
  });

  prevBtn.addEventListener('click', () => {
    reel.scrollBy({ left: -440, behavior: 'smooth' });
  });

  // Update active dot on scroll
  reel.addEventListener('scroll', () => {
    const index = Math.round(reel.scrollLeft / 440);
    document.querySelectorAll('.dot').forEach((dot, i) => {
      dot.classList.toggle('active', i === index);
    });
  });
</script>

@endsection

@push('styles')
<style>
  /* HERO SECTION (Kept original) */
  .careers-hero { min-height: 45vh; display: flex; align-items: center; justify-content: center; padding: 60px 20px; text-align: center; }
  .careers-hero h1 { font-size: clamp(2.5rem, 6vw, 3.8rem); font-weight: 800; background: linear-gradient(135deg, #ba68c8, #e1bee7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 20px; }
  .careers-hero p { color: rgba(255, 255, 255, 0.7); font-size: 1.1rem; max-width: 700px; margin: 0 auto; }

  /* SLIDER CONTAINER */
  .job-slider-container {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    padding: 0 50px;
  }

  .job-reel-wrapper {
    overflow: hidden;
    width: 100%;
    padding: 40px 0;
  }

  .job-reel {
    display: flex;
    gap: 40px;
    overflow-x: auto;
    scroll-behavior: smooth;
    scrollbar-width: none; /* Hide scrollbar Firefox */
    padding: 20px;
  }

  .job-reel::-webkit-scrollbar { display: none; } /* Hide scrollbar Chrome */

  /* ARROWS */
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
  }

  .nav-btn:hover {
    background: #ba68c8;
    color: #000;
  }

  /* DOTS / BUBBLES */
  .slider-dots {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: -40px;
    margin-bottom: 60px;
  }

  .dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(186, 104, 200, 0.2);
    cursor: pointer;
    transition: 0.3s;
  }

  .dot.active {
    background: #ba68c8;
    transform: scale(1.3);
    box-shadow: 0 0 10px rgba(186, 104, 200, 0.5);
  }

  /* JOB CARDS (Kept your exact style) */
  .job-card { flex: 0 0 400px; padding: 50px 40px; border-radius: 40px; text-align: center; border: 1px solid rgba(186, 104, 200, 0.2); transition: 0.5s; display: flex; flex-direction: column; min-height: 550px; }
  .job-card:hover { transform: translateY(-15px); border-color: rgba(186, 104, 200, 0.5); background: rgba(255, 255, 255, 0.05); }
  .job-icon-box { font-size: 3rem; color: #ba68c8; background: rgba(186, 104, 200, 0.1); width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; border-radius: 24px; margin: 0 auto 30px; border: 1px solid rgba(186, 104, 200, 0.2); transition: 0.6s ease; }
  .job-card:hover .job-icon-box { transform: rotateY(180deg); background: rgba(186, 104, 200, 0.25); }
  .card-header h3 { font-size: 1.8rem; margin-bottom: 20px; color: #fff; }
  .job-desc { font-size: 1.05rem; color: rgba(255, 255, 255, 0.6); line-height: 1.7; margin-bottom: 30px; }
  .job-details p { font-size: 1rem; color: rgba(255, 255, 255, 0.5); margin-bottom: 10px; }
  .job-details strong { color: #ba68c8; }

  /* SPONTANEOUS SECTION (Kept original) */
  .spontaneous-section { max-width: 1200px; margin: 60px auto; padding: 80px 60px; border-radius: 40px; text-align: center; border: 1px solid rgba(186, 104, 200, 0.2); }
  .spontaneous-section h2 { font-size: 2.8rem; margin-bottom: 25px; background: linear-gradient(135deg, #fff, #ba68c8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  .spontaneous-content p { font-size: 1.3rem; color: rgba(255, 255, 255, 0.7); margin-bottom: 40px; }

  /* UTILITIES */
  .btn.apply-btn { background: #ba68c8; color: #000; padding: 14px 40px; font-size: 1.1rem; font-weight: 800; border-radius: 50px; text-decoration: none; display: inline-block; transition: 0.4s; margin-top: auto; }
  .btn.apply-btn:hover { transform: translateY(-5px); background: #e1bee7; box-shadow: 0 20px 40px rgba(186, 104, 200, 0.5); }
  .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); }

  /* RESPONSIVE */
  @media (max-width: 768px) {
    .job-card { flex: 0 0 280px; padding: 30px 20px; min-height: 500px; }
    .nav-btn { display: none; } /* Hide arrows on small mobile to use touch swipe */
    .job-slider-container { padding: 0 20px; }
  }
</style>
@endpush
