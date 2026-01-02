@extends('layouts.app')

@section('title', __('messages.about_page_title'))

@section('content')

<!-- HERO SECTION -->
<section class="hero about-hero">
  <div class="hero-content">
    <h1>{!! __('messages.about_hero_title') !!}</h1>
    <p>{{ __('messages.about_hero_subtitle') }}</p>
  </div>
</section>

<main class="about-section">

  <!-- MISSION & VISION -->
  <div class="mission-container">

    <div class="glass mission-card">
      <div class="mission-icon">
        <i class="fa-solid fa-rocket"></i>
      </div>
      <div class="mission-content">
        <h3>{{ __('messages.mission_title') }}</h3>
        <p>
          {{ __('messages.mission_text') }}
          <br><br>
          We deliver result-oriented digital marketing solutions, combining advanced SEO,
          performance advertising, and data analytics to maximize online visibility and ROI.
        </p>
      </div>
    </div>

    <div class="glass mission-card">
      <div class="mission-icon">
        <i class="fa-solid fa-eye"></i>
      </div>
      <div class="mission-content">
        <h3>{{ __('messages.vision_title') }}</h3>
        <p>
          {{ __('messages.vision_text') }}
          <br><br>
          Our vision is to lead innovation in SEO, digital branding, and AI-driven marketing
          strategies that create sustainable business growth worldwide.
        </p>
      </div>
    </div>

  </div>

  <!-- CHAIRMAN SECTION (NOW JAGAN PREET) -->
  <div class="chairman-container">

    <div class="chairman-image glass"
      style="background-image: url('https://i.ibb.co/M57nydQD/Gemini-Generated-Image-v8otdcv8otdcv8ot.png');
             background-size: cover;
             background-position: center 10%;">
      <div class="image-overlay"></div>
    </div>

    <div class="chairman-message glass">
      <h2>{{ __('messages.team_member1_name') }}</h2>

      <p class="quote">
        “{{ __('messages.team_member1_description') }}
        With a strong focus on SEO excellence, digital marketing performance,
        and long-term brand authority, we aim to deliver measurable impact
        for every client we serve.”
      </p>

      <div class="signature">
        <h4>{{ __('messages.team_member1_name') }}</h4>
        <p>{{ __('messages.chairman_designation') }}</p>
      </div>
    </div>

  </div>

  <!-- TEAM SECTION -->
  <section id="team">
    <h2 class="section-title">{{ __('messages.team_title') }}</h2>

    <div class="team-container">

      <!-- TEAM MEMBER (NOW SHAHID IQBAL IN JAGAN PREET POSITION) -->
      <div class="team-card glass">

        <div class="member-photo"
          style="background-image: url('https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png');
                 background-position: center 10%;">
          <div class="photo-overlay"></div>
        </div>

        <div class="member-info">
          <h3>{{ __('messages.chairman_name') }}</h3>
          <p class="position">{{ __('messages.team_member1_position') }}</p>

          <p class="description">
            {{ __('messages.chairman_message_text') }}
            <br><br>
            He plays a key role in driving SEO strategy, digital marketing automation,
            and scalable technology solutions that strengthen brand visibility
            and operational efficiency.
          </p>

          <a href="https://www.linkedin.com/in/shahid-iqbal" target="_blank" class="linkedin-link">
            <i class="fab fa-linkedin"></i>
          </a>
        </div>

      </div>

      <!-- TEAM MEMBER 2 (UNCHANGED) -->
      <div class="team-card glass">

        <div class="member-photo"
          style="background-image: url('https://i.ibb.co/FqnfNDg5/Ali-Mohin-Raza.png');
                 background-position: center 10%;">
          <div class="photo-overlay"></div>
        </div>

        <div class="member-info">
          <h3>{{ __('messages.team_member2_name') }}</h3>
          <p class="position">{{ __('messages.team_member2_position') }}</p>
          <p class="description">{{ __('messages.team_member2_description') }}</p>

          <a href="https://www.linkedin.com/in/ali-mohsin-raza-a0456621b" target="_blank" class="linkedin-link">
            <i class="fab fa-linkedin"></i>
          </a>
        </div>

      </div>

    </div>
  </section>

</main>

@endsection

@push('styles')
<style>
/* ALL STYLES REMAIN EXACTLY THE SAME */
</style>
@endpush
