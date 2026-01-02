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
          We specialize in data-driven digital marketing strategies, performance advertising,
          and scalable SEO solutions that help brands grow sustainably in competitive markets.
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
          Our vision is to become a global leader in SEO innovation, brand visibility,
          and AI-powered digital marketing transformation.
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
        Our focus remains on delivering measurable SEO results,
        high-conversion digital marketing funnels,
        and long-term brand authority for our clients.”
      </p>

      <div class="signature">
        <h4>{{ __('messages.team_member1_name') }}</h4>
        <p>{{ __('messages.team_member1_position') }}</p>
      </div>
    </div>

  </div>

  <!-- TEAM SECTION -->
  <section id="team">
    <h2 class="section-title">{{ __('messages.team_title') }}</h2>

    <div class="team-container">

      <!-- TEAM MEMBER 1 (NOW SHAHID IQBAL) -->
      <div class="team-card glass">

        <div class="member-photo"
          style="background-image: url('https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png');
                 background-position: center 10%;">
          <div class="photo-overlay"></div>
        </div>

        <div class="member-info">
          <h3>{{ __('messages.chairman_name') }}</h3>
          <p class="position">{{ __('messages.chairman_designation') }}</p>

          <p class="description">
            {{ __('messages.chairman_message_text') }}
            <br><br>
            He leads strategic growth initiatives across SEO, digital branding,
            automation, and performance marketing while ensuring technical excellence
            and scalable business solutions.
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
/* === STYLES UNCHANGED – EXACTLY AS PROVIDED === */
</style>
@endpush
