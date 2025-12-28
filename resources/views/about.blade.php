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
    <div class="chairman-image-wrapper glass">
      <img src="https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png" alt="Chairman" class="chairman-img">
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
        <div class="member-photo-container">
           <img src="https://i.ibb.co/M57nydQD/Gemini-Generated-Image-v8otdcv8otdcv8ot.png" alt="Team Member" class="member-img">
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
        <div class="member-photo-container">
          <img src="https://i.ibb.co/FqnfNDg5/Ali-Mohin-Raza.png" alt="Team Member" class="member-img">
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
  /* Base Style Sync */
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

  /* Mission & Vision Alignment */
  .mission-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    margin-bottom: 100px;
  }

  .mission-card {
    flex: 1 1 450px;
    max-width: 600px;
    padding: 50px 30px;
    border-radius: 30px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
  }

  /* Chairman Section Alignment Fix */
  .chairman-container {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    align-items: stretch; /* Ensures both sides are same height */
    justify-content: center;
    margin-bottom: 120px;
  }

  .chairman-image-wrapper {
    flex: 1 1 400px;
    max-width: 500px;
    height: 550px;
    position: relative;
    border-radius: 40px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #000;
  }

  .chairman-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* This makes the photo fill the space without stretching */
    object-position: center; /* Centers the person in the frame */
  }

  .chairman-message {
    flex: 1.5 1 500px;
    padding: 60px;
    border-radius: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
  }

  /* Team Section Alignment */
  .team-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
  }

  .team-card {
    flex: 1 1 450px;
    max-width: 480px;
    border-radius: 40px;
    padding: 50px 30px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.4s ease;
  }

  .member-photo-container {
    width: 220px;
    height: 220px;
    border-radius: 50%;
    overflow: hidden;
    margin-bottom: 25px;
    border: 4px solid #ba68c8;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .member-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center; /* Centers the face better */
  }

  .member-info {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    width: 100%;
  }

  .description {
    flex-grow: 1; /* Pushes the LinkedIn link to the bottom */
    color: rgba(255, 255, 255, 0.6);
    line-height: 1.6;
    margin-bottom: 20px;
  }

  .member-footer {
    padding-top: 10px;
    display: flex;
    justify-content: center;
  }

  .linkedin-link {
    font-size: 2rem;
    color: #ba68c8;
    transition: 0.3s;
  }

  .linkedin-link:hover {
    color: #fff;
    transform: scale(1.1);
  }

  /* Mobile Responsive Fixes */
  @media (max-width: 768px) {
    .chairman-image-wrapper {
      height: 400px;
    }
    .chairman-message {
      padding: 40px 25px;
      text-align: center;
    }
    .team-card {
      flex: 1 1 100%;
    }
  }
</style>
@endpush
