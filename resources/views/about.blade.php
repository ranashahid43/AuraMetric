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
    <div class="chairman-image glass">
      <img src="https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png" alt="Chairman" style="width: 100%; height: 100%; object-fit: cover; object-position: center 15%;">
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

    <div class="team-container">
      <div class="team-card glass">
        <div class="member-photo" style="background-image: url('https://i.ibb.co/M57nydQD/Gemini-Generated-Image-v8otdcv8otdcv8ot.png'); background-position: center 15%;">
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
        <div class="member-photo" style="background-image: url('https://i.ibb.co/FqnfNDg5/Ali-Mohin-Raza.png'); background-position: center 15%;">
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
  /* Base Style Match */
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

  .about-hero p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
  }

  .about-section {
    padding: 80px 5%;
    max-width: 1600px;
    margin: 0 auto;
  }

  .mission-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 40px;
    margin-bottom: 120px;
  }

  .mission-card {
    flex: 1 1 500px;
    max-width: 650px;
    padding: 60px 40px;
    border-radius: 30px;
    text-align: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
  }

  .mission-card:hover {
    transform: translateY(-15px);
    border-color: rgba(186, 104, 200, 0.5);
    background: rgba(255, 255, 255, 0.05);
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
    transition: 0.6s ease;
  }

  .mission-card:hover .mission-icon {
    transform: rotateY(180deg);
    background: rgba(186, 104, 200, 0.25);
  }

  .mission-card h3 {
    font-size: 2.2rem;
    margin-bottom: 20px;
    color: #fff;
  }

  .mission-card p {
    font-size: 1.15rem;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.6);
  }

  .chairman-container {
    display: flex;
    flex-wrap: wrap;
    gap: 60px;
    align-items: center;
    justify-content: center;
    margin-bottom: 120px;
  }

  .chairman-image {
    flex: 1 1 400px;
    height: 550px;
    border-radius: 40px;
    position: relative;
    border: 1px solid rgba(186, 104, 200, 0.2);
    overflow: hidden; /* Added to contain the image tag */
  }

  .chairman-message {
    flex: 1.5 1 500px;
    padding: 60px;
    border-radius: 40px;
    border: 1px solid rgba(186, 104, 200, 0.2);
  }

  .chairman-message h2 {
    font-size: 2.8rem;
    margin-bottom: 30px;
    background: linear-gradient(135deg, #fff, #ba68c8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .quote {
    font-size: 1.35rem;
    font-style: italic;
    line-height: 1.9;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 40px;
    position: relative;
  }

  .quote::before {
    content: '“';
    font-size: 6rem;
    color: #ba68c8;
    opacity: 0.3;
    position: absolute;
    left: -40px;
    top: -30px;
  }

  .signature h4 {
    font-size: 1.8rem;
    color: #ba68c8;
    margin-bottom: 5px;
  }

  .signature p {
    color: #aaa;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .section-title {
    text-align: center;
    font-size: clamp(2.2rem, 5vw, 3rem);
    margin-bottom: 80px;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .team-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 40px;
  }

  .team-card {
    flex: 1 1 450px;
    max-width: 500px;
    border-radius: 40px;
    padding: 50px 40px;
    text-align: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: flex;
    flex-direction: column;
    min-height: 650px;
  }

  .team-card:hover {
    transform: translateY(-15px);
    border-color: rgba(186, 104, 200, 0.5);
    background: rgba(255, 255, 255, 0.05);
  }

  .member-photo {
    width: 220px;
    height: 220px;
    border-radius: 50%;
    margin: 0 auto 30px;
    border: 4px solid #ba68c8;
    background-size: cover;
    /* Move down adjusted here */
    background-position: center 15%; 
    position: relative;
    box-shadow: 0 0 30px rgba(186, 104, 200, 0.2);
  }

  .member-info {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .member-info h3 {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #fff;
  }

  .position {
    color: #ba68c8;
    font-weight: 700;
    font-size: 1.2rem;
    margin-bottom: 20px;
    text-transform: uppercase;
  }

  .description {
    font-size: 1.05rem;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 30px;
    flex-grow: 1;
  }

  .linkedin-link {
    font-size: 2.2rem;
    color: #ba68c8;
    transition: 0.3s ease;
  }

  .linkedin-link:hover {
    color: #fff;
    transform: scale(1.15) rotate(5deg);
  }

  .glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
  }

  /* Responsive Adjustments */
  @media (max-width: 992px) {
    .chairman-container { flex-direction: column; }
    .chairman-image { width: 100%; max-width: 500px; height: 450px; }
    .chairman-message { text-align: center; padding: 40px 30px; }
    .quote::before { left: 50%; transform: translateX(-50%); }
  }

  @media (max-width: 600px) {
    .team-card, .mission-card { padding: 40px 25px; flex: 1 1 100%; }
    .member-photo { width: 180px; height: 180px; }
  }
</style>
@endpush
