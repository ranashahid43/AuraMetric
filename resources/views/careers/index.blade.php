@extends('layouts.app')

@section('title', __('messages.careers_title') . ' | The Testing Tech')

@section('content')

<!-- HERO SECTION -->
<section class="hero" style="min-height: 40vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), #2da9ff;">
  <div class="hero-content">
    <h1>
      {!! __('messages.careers_hero_title') !!}
    </h1>
    <p>
      {{ __('messages.careers_hero_subtitle') }}
    </p>
  </div>
</section>

<!-- MAIN CAREERS CONTENT -->
<main class="careers-container">

  <!-- JOB REEL FULL WIDTH - Glamorous Version -->
  <div class="job-reel-wrapper full-width-reel">
    <div class="job-reel" id="jobReel">
      @php
        $jobs = [
          ['title'=> __('messages.careers_job_automation_title'), 'description'=> __('messages.careers_job_automation_desc'), 'experience'=> __('messages.careers_job_automation_exp'), 'qualification'=> __('messages.careers_job_automation_qual')],
          ['title'=> __('messages.careers_job_ml_title'), 'description'=> __('messages.careers_job_ml_desc'), 'experience'=> __('messages.careers_job_ml_exp'), 'qualification'=> __('messages.careers_job_ml_qual')],
          ['title'=> __('messages.careers_job_junior_title'), 'description'=> __('messages.careers_job_junior_desc'), 'experience'=> __('messages.careers_job_junior_exp'), 'qualification'=> __('messages.careers_job_junior_qual')],
          ['title'=> __('messages.careers_job_intern_title'), 'description'=> __('messages.careers_job_intern_desc'), 'experience'=> __('messages.careers_job_intern_exp'), 'qualification'=> __('messages.careers_job_intern_qual')],
        ];
      @endphp

      @foreach($jobs as $job)
      <div class="job-card glass">
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

      {{-- Duplicate for infinite scroll --}}
      @foreach($jobs as $job)
      <div class="job-card glass">
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

  <!-- SPONTANEOUS APPLICATION SECTION - Glamorous -->
  <div class="spontaneous-section glass">
    <div class="spontaneous-content">
      <p>
        {{ __('messages.careers_spontaneous_text') }}
      </p>
      <a href="{{ route('careers.apply') }}" class="btn apply-btn large">
        {{ __('messages.careers_spontaneous_button') }}
      </a>
    </div>
  </div>

</main>

@push('styles')
<style>
  .careers-container {
    padding: 80px 5%;
  }

  .full-width-reel {
    width: 100vw;
    margin-left: calc(-50vw + 50%);
    padding: 80px 0;
    background: rgba(0,0,0,0.05);
  }

  .job-reel {
    display: flex;
    gap: 40px;
    animation: scrollReel 40s linear infinite;
  }

  .job-reel-wrapper:hover .job-reel {
    animation-play-state: paused;
  }

  .job-card {
    flex: 0 0 380px;
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 30px;
    padding: 40px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
    display: flex;
    flex-direction: column;
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    position: relative;
    overflow: hidden;
  }

  .job-card:hover {
    transform: translateY(-20px);
    box-shadow: 0 30px 80px rgba(45,169,255,0.3);
    border-color: rgba(45,169,255,0.5);
  }

  .job-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(90deg, #2da9ff, #7ed3ff);
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .job-card:hover::before {
    opacity: 1;
  }

  .card-header h3 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #2da9ff;
    text-align: center;
  }

  .card-body {
    flex-grow: 1;
  }

  .job-desc {
    font-size: 1.05rem;
    color: #ccc;
    line-height: 1.7;
    margin-bottom: 30px;
  }

  .job-details p {
    font-size: 1rem;
    color: #ddd;
    margin-bottom: 12px;
  }

  .job-details strong {
    color: #2da9ff;
  }

  .card-footer {
    margin-top: auto;
    text-align: center;
  }

  .apply-btn {
    display: inline-block;
    background: transparent;
    color: #2da9ff;
    border: 2px solid #2da9ff;
    padding: 14px 40px;
    border-radius: 50px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.4s ease;
  }

  .apply-btn:hover {
    background: #2da9ff;
    color: #000;
    box-shadow: 0 0 30px rgba(45,169,255,0.6);
    transform: translateY(-3px);
  }

  .apply-btn.large {
    padding: 18px 60px;
    font-size: 1.3rem;
  }

  /* Spontaneous Section */
  .spontaneous-section {
    max-width: 1000px;
    margin: 0 auto;
    padding: 80px 60px;
    border-radius: 40px;
    text-align: center;
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    transition: all 0.5s ease;
  }

  .spontaneous-section:hover {
    transform: translateY(-15px);
    box-shadow: 0 40px 80px rgba(45,169,255,0.2);
  }

  .spontaneous-content p {
    font-size: 1.4rem;
    color: #ccc;
    line-height: 1.8;
    margin-bottom: 40px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }

  @keyframes scrollReel {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  /* Responsive */
  @media (max-width: 1200px) {
    .job-card {
      flex: 0 0 340px;
    }
  }

  @media (max-width: 992px) {
    .job-card {
      flex: 0 0 70%;
    }
    .spontaneous-content p {
      font-size: 1.2rem;
    }
  }

  @media (max-width: 768px) {
    .job-card {
      flex: 0 0 90%;
    }
    .card-header h3 {
      font-size: 1.8rem;
    }
    .job-desc {
      font-size: 1rem;
    }
  }
</style>
@endpush

@endsection