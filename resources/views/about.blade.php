@extends('layouts.app')

@section('title', __('messages.about_page_title'))

@section('content')

<section class="hero about-hero">
  <div class="hero-content">
    <h1>{!! __('messages.about_hero_title') !!}</h1>
    <p>{{ __('messages.about_hero_subtitle') }}</p>
  </div>
</section>

<main class="about-section">

  <!-- Mission & Vision Section -->
  <div class="mission-container">
    <div class="glass mission-card">
      <div class="mission-icon">
        <i class="fa-solid fa-rocket"></i>
      </div>
      <div class="mission-content">
        <h3>{{ __('messages.mission_title') }}</h3>
        <p>{{ __('messages.mission_text') }}</p>
      </div>
    </div>

    <div class="glass mission-card">
      <div class="mission-icon">
        <i class="fa-solid fa-eye"></i>
      </div>
      <div class="mission-content">
        <h3>{{ __('messages.vision_title') }}</h3>
        <p>{{ __('messages.vision_text') }}</p>
      </div>
    </div>
  </div>

  <!-- Digital Marketing & Testing Software Section -->
  <div class="glass" style="padding:40px; margin-bottom:60px; border-radius:30px; border:1px solid rgba(186,104,200,0.2); text-align:center; max-width:900px; margin-left:auto; margin-right:auto;">
    <h2 style="font-size:2rem; margin-bottom:20px; color:#ba68c8;">Our Expertise</h2>
    <p style="font-size:1.1rem; color:#fff; line-height:1.8;">
      AuraMetric has been a pioneer in technology, specializing in **digital marketing** strategies and **software testing solutions**. 
      We help businesses enhance their online presence, optimize digital campaigns, and ensure software quality through meticulous testing and automation. 
      Our team leverages cutting-edge technologies to deliver measurable results and innovative solutions for clients across the globe.
    </p>
  </div>

  <!-- Team Members Section -->
  <section id="team">
    <h2 class="section-title">{{ __('messages.team_title') }}</h2>
    <div class="team-container">

      <!-- CEO -->
      <div class="team-card glass">
        <div class="member-photo" style="background-image: url('https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png'); background-position: center 10%;">
          <div class="photo-overlay"></div>
        </div>
        <div class="member-info">
          <h3>Shahid Iqbal</h3>
          <p class="position">CEO</p>
          <p class="description">Leads the strategic vision and operations, driving innovation in digital marketing and software solutions.</p>
          <a href="#" class="linkedin-link"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>

      <!-- CFO -->
      <div class="team-card glass">
        <div class="member-photo" style="background-image: url('https://i.ibb.co/M57nydQD/Gemini-Generated-Image-v8otdcv8otdcv8ot.png'); background-position: center 10%;">
          <div class="photo-overlay"></div>
        </div>
        <div class="member-info">
          <h3>Jagan Pareet</h3>
          <p class="position">CFO</p>
          <p class="description">Manages financial planning, investments, and ensures sustainable growth for the organization.</p>
          <a href="#" class="linkedin-link"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>

      <!-- CTO -->
      <div class="team-card glass">
        <div class="member-photo" style="background-image: url('https://i.ibb.co/FqnfNDg5/Ali-Mohin-Raza.png'); background-position: center 10%;">
          <div class="photo-overlay"></div>
        </div>
        <div class="member-info">
          <h3>Ali Mohsin Raza</h3>
          <p class="position">CTO</p>
          <p class="description">Oversees software development, testing, and technology innovation to deliver top-notch digital solutions.</p>
          <a href="#" class="linkedin-link"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>

    </div>
  </section>

</main>

@endsection

@push('styles')
<style>
  /* Reuse existing AuraMetric Fashions styles from your previous page */
  /* HERO, MISSION CARDS, TEAM CARDS, GLASS EFFECTS remain the same */
</style>
@endpush
