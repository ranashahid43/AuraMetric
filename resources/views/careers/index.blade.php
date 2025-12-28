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

  <div class="job-reel-wrapper full-width-reel">
    <div class="job-reel" id="jobReel">
      @php
        $jobs = [
          ['title'=> __('messages.careers_job_automation_title'), 'description'=> __('messages.careers_job_automation_desc'), 'experience'=> __('messages.careers_job_automation_exp'), 'qualification'=> __('messages.careers_job_automation_qual'), 'icon' => 'fa-robot'],
          ['title'=> __('messages.careers_job_ml_title'), 'description'=> __('messages.careers_job_ml_desc'), 'experience'=> __('messages.careers_job_ml_exp'), 'qualification'=> __('messages.careers_job_ml_qual'), 'icon' => 'fa-brain'],
          ['title'=> __('messages.careers_job_junior_title'), 'description'=> __('messages.careers_job_junior_desc'), 'experience'=> __('messages.careers_job_junior_exp'), 'qualification'=> __('messages.careers_job_junior_qual'), 'icon' => 'fa-code'],
          ['title'=> __('messages.careers_job_intern_title'), 'description'=> __('messages.careers_job_intern_desc'), 'experience'=> __('messages.careers_job_intern_exp'), 'qualification'=> __('messages.careers_job_intern_qual'), 'icon' => 'fa-graduation-cap'],
        ];
      @endphp

      @foreach(array_merge($jobs, $jobs, $jobs, $jobs) as $job)
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

  <div class="spontaneous-section glass">
    <div class="spontaneous-content">
      <h2>{{ __('messages.careers_spontaneous_title') ?? 'Join Our Talent Pool' }}</h2>
      <p>
        {{ __('messages.careers_spontaneous_text') }}
      </p>
      <a href="{{ route('careers.apply') }}" class="btn apply-btn large">
        {{ __('messages.careers_spontaneous_button') }}
      </a>
    </div>
  </div>

</main>

@endsection

@push('styles')
<style>
  /* HERO SECTION */
  .careers-hero {
    min-height: 45vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    text-align: center;
  }

  .careers-hero h1 {
    font-size: clamp(2.5rem, 6vw, 3.8rem);
    font-weight: 800;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
  }

  .careers-hero p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
  }

  /* LAYOUT & REEL */
  .careers-section {
    padding: 80px 0;
    overflow-x: hidden;
  }

  .full-width-reel {
    width: 100vw;
    padding: 40px 0 100px;
    background: rgba(186, 104, 200, 0.03);
    overflow: hidden;
    position: relative;
  }

  .job-reel {
    display: flex;
    gap: 40px;
    animation: scrollReel 80s linear infinite;
    width: max-content;
    padding: 20px;
  }

  .job-reel-wrapper:hover .job-reel {
    animation-play-state: paused;
  }

  /* JOB CARDS */
  .job-card {
    flex: 0 0 400px;
    padding: 50px 40px;
    border-radius: 40px;
    text-align: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: flex;
    flex-direction: column;
    min-height: 550px;
  }

  .job-card:hover {
    transform: translateY(-15px);
    border-color: rgba(186, 104, 200, 0.5);
    background: rgba(255, 255, 255, 0.05);
  }

  /* FLIPPING ICON */
  .job-icon-box {
    font-size: 3rem;
    color: #ba68c8;
    background: rgba(186, 104, 200, 0.1);
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 24px;
    margin: 0 auto 30px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: 0.6s ease;
  }

  .job-card:hover .job-icon-box {
    transform: rotateY(180deg);
    background: rgba(186, 104, 200, 0.25);
  }

  .card-header h3 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #fff;
  }

  .job-desc {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.6);
    line-height: 1.7;
    margin-bottom: 30px;
  }

  .job-details p {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.5);
    margin-bottom: 10px;
  }

  .job-details strong {
    color: #ba68c8;
  }

  /* APPLY BUTTONS */
  .apply-btn {
    margin-top: auto;
    background: #ba68c8;
    color: #000;
    padding: 14px 40px;
    font-size: 1.1rem;
    font-weight: 800;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 10px 25px rgba(186, 104, 200, 0.3);
    transition: all 0.4s ease;
    text-decoration: none;
    display: inline-block;
  }

  .apply-btn:hover {
    transform: translateY(-5px);
    background: #e1bee7;
    box-shadow: 0 20px 40px rgba(186, 104, 200, 0.5);
  }

  /* SPONTANEOUS SECTION */
  .spontaneous-section {
    max-width: 1200px;
    margin: 60px auto;
    padding: 80px 60px;
    border-radius: 40px;
    text-align: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
  }

  .spontaneous-section h2 {
    font-size: 2.8rem;
    margin-bottom: 25px;
    background: linear-gradient(135deg, #fff, #ba68c8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .spontaneous-content p {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 40px;
  }

  .apply-btn.large {
    padding: 18px 60px;
    font-size: 1.25rem;
  }

  /* UTILITIES */
  .glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
  }

  @keyframes scrollReel {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  /* RESPONSIVE */
  @media (max-width: 992px) {
    .job-card { flex: 0 0 350px; padding: 40px 30px; }
    .spontaneous-section { margin: 40px 5%; padding: 60px 30px; }
  }

  @media (max-width: 480px) {
    .job-card { flex: 0 0 300px; }
    .spontaneous-section h2 { font-size: 2rem; }
    .spontaneous-content p { font-size: 1.1rem; }
  }
</style>
@endpush
