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

  <!-- CHAIRMAN SECTION (Now Jagan Preet as Chairman / Founder) -->
  <div class="chairman-container">
    <div class="chairman-image glass" style="background-image: url('https://i.ibb.co/M57nydQD/Gemini-Generated-Image-v8otdcv8otdcv8ot.png'); background-size: cover; background-position: center 10%;">
      <div class="image-overlay"></div>
    </div>

    <div class="chairman-message glass">
      <h2>{{ __('messages.team_member1_name') }}</h2>
      <p class="quote">“{{ __('messages.chairman_message_text') }}”</p>
      <div class="signature">
        <h4>{{ __('messages.team_member1_name') }}</h4>
        <p>Founder / Chairman</p>
      </div>
    </div>
  </div>

  <!-- TEAM SECTION -->
  <section id="team">
    <h2 class="section-title">{{ __('messages.team_title') }}</h2>
    <div class="team-container">

      <!-- Shahid Iqbal as Team Member (CEO / CTO) -->
      <div class="team-card glass">
        <div class="member-photo" style="background-image: url('https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png'); background-position: center 10%;">
          <div class="photo-overlay"></div>
        </div>
        <div class="member-info">
          <h3>{{ __('messages.chairman_name') }}</h3>
          <p class="position">CEO / CTO</p>
          <p class="description">{{ __('messages.team_member1_description') }}</p>
          <a href="https://www.linkedin.com/in/shahid-iqbal-385964118" target="_blank" class="linkedin-link">
            <i class="fab fa-linkedin"></i>
          </a>
        </div>
      </div>

      <!-- Team Member 2 (Unchanged) -->
      <div class="team-card glass">
        <div class="member-photo" style="background-image: url('https://i.ibb.co/FqnfNDg5/Ali-Mohin-Raza.png'); background-position: center 10%;">
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
/* HERO SECTION */
.about-hero { min-height: 40vh; display: flex; align-items: center; justify-content: center; padding: clamp(60px, 10vh, 100px) 20px; text-align: center; }
.about-hero h1 { font-size: clamp(2.2rem, 6vw, 3.8rem); font-weight: 800; background: linear-gradient(135deg, #ba68c8, #e1bee7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 20px; }
.about-hero p { font-size: clamp(1rem, 2vw, 1.2rem); color: rgba(255, 255, 255, 0.7); max-width: 800px; margin: 0 auto; }

/* LAYOUT */
.about-section { padding: 40px 5% 100px; max-width: 1400px; margin: 0 auto; }

/* MISSION CARDS */
.mission-container { display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; margin-bottom: clamp(60px, 10vh, 120px); }
.mission-card { flex: 1 1 400px; max-width: 650px; padding: clamp(30px, 5vw, 60px); border-radius: 30px; text-align: center; border: 1px solid rgba(186, 104, 200, 0.2); transition: all 0.5s ease; }
.mission-card:hover { transform: translateY(-10px); background: rgba(255, 255, 255, 0.05); }
.mission-icon { font-size: clamp(2.5rem, 5vw, 3.5rem); color: #ba68c8; background: rgba(186, 104, 200, 0.1); width: clamp(80px, 12vw, 110px); height: clamp(80px, 12vw, 110px); display: flex; align-items: center; justify-content: center; border-radius: 24px; margin: 0 auto 30px; border: 1px solid rgba(186, 104, 200, 0.2); transition: 0.6s ease; }
.mission-card:hover .mission-icon { transform: rotateY(180deg); }

/* CHAIRMAN SECTION */
.chairman-container { display: flex; flex-wrap: wrap; gap: clamp(30px, 5vw, 60px); align-items: center; justify-content: center; margin-bottom: clamp(60px, 10vh, 120px); }
.chairman-image { flex: 1 1 350px; height: clamp(400px, 60vh, 550px); border-radius: 40px; border: 1px solid rgba(186, 104, 200, 0.2); }
.chairman-message { flex: 1.5 1 450px; padding: clamp(30px, 5vw, 60px); border-radius: 40px; border: 1px solid rgba(186, 104, 200, 0.2); }
.chairman-message h2 { font-size: clamp(1.8rem, 4vw, 2.8rem); margin-bottom: 30px; background: linear-gradient(135deg, #fff, #ba68c8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.quote { font-size: clamp(1.05rem, 2vw, 1.35rem); font-style: italic; line-height: 1.8; color: rgba(255, 255, 255, 0.8); margin-bottom: 40px; position: relative; }
@media (min-width: 480px) { .quote::before { content: '“'; font-size: 5rem; color: #ba68c8; opacity: 0.2; position: absolute; left: -30px; top: -25px; } }

/* TEAM SECTION */
.section-title { text-align: center; font-size: clamp(2rem, 5vw, 3rem); margin-bottom: 50px; color: #fff; }
.team-container { display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; }
.team-card { flex: 1 1 350px; max-width: 500px; border-radius: 40px; padding: clamp(30px, 5vw, 50px) 30px; text-align: center; border: 1px solid rgba(186, 104, 200, 0.2); display: flex; flex-direction: column; min-height: auto; }
.member-photo { width: clamp(150px, 20vw, 220px); height: clamp(150px, 20vw, 220px); border-radius: 50%; margin: 0 auto 30px; border: 4px solid #ba68c8; background-size: cover; }
.description { font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px; }
.glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); }
.linkedin-link { font-size: 2rem; color: #ba68c8; margin-top: auto; transition: 0.3s ease; }

/* RESPONSIVE OVERRIDES */
@media (max-width: 1024px) { .chairman-container { flex-direction: column; } .chairman-image { width: 100%; max-width: 600px; } .chairman-message { width: 100%; max-width: 800px; } }
@media (max-width: 768px) { .about-section { padding: 20px 5% 60px; } .mission-card, .team-card { flex: 1 1 100%; } .chairman-image { height: 350px; border-radius: 30px; } .chairman-message { padding: 30px 20px; border-radius: 30px; } }
@media (max-width: 480px) { .signature h4 { font-size: 1.4rem; } .signature p { font-size: 0.9rem; } }
</style>
@endpush
