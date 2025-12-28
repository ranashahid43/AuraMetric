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

  <div class="mission-grid">
    <div class="glass mission-card">
      <div class="mission-icon">
        <i class="fa-solid fa-rocket"></i>
      </div>
      <h3>{{ __('messages.mission_title') }}</h3>
      <p>{{ __('messages.mission_text') }}</p>
    </div>

    <div class="glass mission-card">
      <div class="mission-icon">
        <i class="fa-solid fa-eye"></i>
      </div>
      <h3>{{ __('messages.vision_title') }}</h3>
      <p>{{ __('messages.vision_text') }}</p>
    </div>
  </div>

  <div class="chairman-container">
    <div class="chairman-image glass">
       <img src="https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png" alt="Chairman" class="chairman-img-tag">
       <div class="image-overlay"></div>
    </div>

    <div class="chairman-message glass">
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

  <section id="team">
    <h2 class="section-title">{{ __('messages.team_title') }}</h2>

    <div class="team-grid">
      <div class="team-card glass">
        <div class="member-photo" style="background-image: url('https://i.ibb.co/M57nydQD/Gemini-Generated-Image-v8otdcv8otdcv8ot.png');">
          <div class="photo-overlay"></div>
        </div>
        <div class="member-info">
          <h3>{{ __('messages.team_member1_name') }}</h3>
          <p class="position">{{ __('messages.team_member1_position') }}</p>
          <p class="description">{{ __('messages.team_member1_description') }}</p>
          <a href="https://www.linkedin.com/in/jagan-preet-7974491b1" target="_blank" class="linkedin-link">
            <i class="fab fa-linkedin"></i>
          </a>
        </div>
      </div>

      <div class="team-card glass">
        <div class="member-photo" style="background-image: url('https://i.ibb.co/FqnfNDg5/Ali-Mohin-Raza.png');">
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
  /* Global Hero Match */
  .about-hero {
    min-height: 45vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 40px 20px;
  }

  .about-hero h1 {
    font-size: clamp(2.5rem, 6vw, 3.8rem);
    font-weight: 800;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .about-section {
    padding: 80px 5%;
    max-width: 1500px;
    margin: 0 auto;
  }

  /* Mission Flipping Icons */
  .mission-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
    margin-bottom: 100px;
  }

  .mission-card {
    flex: 1 1 450px;
    max-width: 600px;
    padding: 50px;
    border-radius: 30px;
    text-align: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
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
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .mission-card:hover .mission-icon {
    transform: rotateY(180deg);
  }

  /* Chairman Section - Symmetry Fix */
  .chairman-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-bottom: 120px;
    justify-content: center;
    align-items: stretch; /* Cards stay same height */
  }

  .chairman-image {
    flex: 1 1 400px;
    max-width: 500px;
    height: 550px;
    border-radius: 40px;
    overflow: hidden;
    position: relative;
    display: flex;
  }

  .chairman-img-tag {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 20%;
  }

  .chairman-message {
    flex: 1.5 1 500px;
    padding: 60px;
    border-radius: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .quote {
    font-size: 1.3rem;
    font-style: italic;
    line-height: 1.8;
    color: #ddd;
    margin: 30px 0;
  }

  .signature h4 { color: #ba68c8; font-size: 1.8rem; }

  /* Team Section - Keeping your Original Layout logic */
  .section-title { text-align: center; color: #fff; font-size: 3rem; margin-bottom: 60px; }
  
  .team-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
  }

  .team-card {
    flex: 1 1 450px;
    max-width: 500px;
    padding: 40px;
    border-radius: 40px;
    text-align: center;
  }

  .member-photo {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    margin: 0 auto 30px;
    border: 5px solid #ba68c8;
    background-size: cover;
    background-position: center;
  }

  .position { color: #ba68c8; font-weight: bold; font-size: 1.2rem; margin-bottom: 15px; }
  .description { color: #ccc; line-height: 1.7; margin-bottom: 25px; }
  .linkedin-link { font-size: 2rem; color: #ba68c8; transition: 0.3s; }
  .linkedin-link:hover { color: #fff; transform: scale(1.1); }

  .glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: 0.4s;
  }

  .glass:hover {
    transform: translateY(-10px);
    border-color: rgba(186, 104, 200, 0.5);
  }

  @media (max-width: 768px) {
    .chairman-image, .chairman-message { flex: 1 1 100%; max-width: 100%; height: auto; }
    .chairman-image { height: 400px; }
  }
</style>
@endpush
