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

  <div class="chairman-container">
    <div class="chairman-image-box glass">
      <img src="https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png" alt="Chairman">
      <div class="image-overlay"></div>
    </div>

    <div class="chairman-message-box glass">
      <div class="message-inner">
        <h2>{{ __('messages.chairman_message_title') }}</h2>
        <p class="quote">
          “{{ __('messages.chairman_message_text') }}”
        </p>
        <div class="signature">
          <h4>{{ __('messages.chairman_name') }}</h4>
          <p>{{ __('messages.chairman_designation') }}</p>
        </div>
      </div>
    </div>
  </div>

  <section id="team">
    <h2 class="section-title">{{ __('messages.team_title') }}</h2>

    <div class="team-container">
      <div class="team-card glass">
        <div class="member-photo-wrapper">
           <img src="https://i.ibb.co/M57nydQD/Gemini-Generated-Image-v8otdcv8otdcv8ot.png" alt="Member">
           <div class="photo-overlay"></div>
        </div>
        <div class="member-info">
          <h3>{{ __('messages.team_member1_name') }}</h3>
          <p class="position">{{ __('messages.team_member1_position') }}</p>
          <p class="description">{{ __('messages.team_member1_description') }}</p>
          <div class="member-footer">
            <a href="https://www.linkedin.com/in/jagan-preet-7974491b1" target="_blank" class="linkedin-link">
              <i class="fab fa-linkedin"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="team-card glass">
        <div class="member-photo-wrapper">
          <img src="https://i.ibb.co/FqnfNDg5/Ali-Mohin-Raza.png" alt="Member">
          <div class="photo-overlay"></div>
        </div>
        <div class="member-info">
          <h3>{{ __('messages.team_member2_name') }}</h3>
          <p class="position">{{ __('messages.team_member2_position') }}</p>
          <p class="description">{{ __('messages.team_member2_description') }}</p>
          <div class="member-footer">
            <a href="https://www.linkedin.com/in/ali-mohsin-raza-a0456621b" target="_blank" class="linkedin-link">
              <i class="fab fa-linkedin"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

@endsection

@push('styles')
<style>
  /* Base & Hero */
  .about-hero {
    min-height: 45vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    text-align: center;
  }

  .about-hero h1 {
    font-size: clamp(2.5rem, 6vw, 3.8rem);
    font-weight: 800;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
  }

  .about-section {
    padding: 80px 5%;
    max-width: 1600px;
    margin: 0 auto;
  }

  /* Mission & Team Flashing Glass Cards */
  .glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
  }

  .glass:hover {
    transform: translateY(-12px);
    border-color: rgba(186, 104, 200, 0.5);
    background: rgba(255, 255, 255, 0.07);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
  }

  /* Flipping Squircle Icons */
  .mission-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    margin-bottom: 120px;
  }

  .mission-card {
    flex: 1 1 450px;
    max-width: 600px;
    padding: 60px 40px;
    border-radius: 30px;
    text-align: center;
  }

  .mission-icon {
    font-size: 3.5rem;
    color: #ba68c8;
    background: rgba(186, 104, 200, 0.1);
    width: 110px;
    height: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 24px;
    margin: 0 auto 30px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .mission-card:hover .mission-icon {
    transform: rotateY(180deg);
  }

  /* Chairman Section - Fixed Symmetry & Glow */
  .chairman-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
    align-items: stretch; /* Makes cards same height */
    margin-bottom: 120px;
  }

  .chairman-image-box {
    flex: 1 1 450px;
    max-width: 500px;
    height: 600px;
    border-radius: 40px;
    overflow: hidden;
    position: relative;
    display: flex;
  }

  .chairman-image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 20%;
  }

  .chairman-message-box {
    flex: 1 1 500px;
    max-width: 800px;
    border-radius: 40px;
    padding: 60px;
    display: flex;
    align-items: center;
  }

  .chairman-message-box h2 {
    font-size: 2.8rem;
    margin-bottom: 30px;
    color: #fff;
  }

  .quote {
    font-size: 1.3rem;
    font-style: italic;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 40px;
  }

  .signature h4 { color: #ba68c8; font-size: 1.8rem; margin-bottom: 5px; }

  /* Team Section */
  .team-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
  }

  .team-card {
    flex: 1 1 450px;
    max-width: 500px;
    padding: 50px 40px;
    border-radius: 40px;
    text-align: center;
    min-height: 700px;
    display: flex;
    flex-direction: column;
  }

  .member-photo-wrapper {
    width: 220px;
    height: 220px;
    border-radius: 50%;
    margin: 0 auto 30px;
    overflow: hidden;
    border: 4px solid #ba68c8;
    box-shadow: 0 0 25px rgba(186, 104, 200, 0.3);
  }

  .member-photo-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .member-info { flex-grow: 1; display: flex; flex-direction: column; }
  .position { color: #ba68c8; font-weight: 700; text-transform: uppercase; margin-bottom: 15px; }
  .description { flex-grow: 1; color: rgba(255,255,255,0.6); line-height: 1.7; margin-bottom: 30px; }
  .linkedin-link { font-size: 2.2rem; color: #ba68c8; transition: 0.3s; }
  .linkedin-link:hover { color: #fff; transform: scale(1.1); }

  /* Responsive Fixes */
  @media (max-width: 1024px) {
    .chairman-image-box { height: 450px; }
    .chairman-message-box { padding: 40px; }
  }
  @media (max-width: 768px) {
    .chairman-image-box, .chairman-message-box { flex: 1 1 100%; max-width: 100%; }
  }
</style>
@endpush
