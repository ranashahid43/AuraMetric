@extends('layouts.app')

@section('title', __('messages.about_page_title'))

@section('content')

<!-- HERO SECTION - Same as Careers/Services -->
<section class="hero" style="min-height: 50vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), #2da9ff;">
  <div class="hero-content">
    <h1>
      {!! __('messages.about_hero_title') !!}
    </h1>
    <p>
      {{ __('messages.about_hero_subtitle') }}
    </p>
  </div>
</section>

<!-- MAIN CONTENT -->
<main class="about-section" style="padding: 100px 5%; max-width: 1400px; margin: 0 auto;">

  <!-- Mission & Vision - Glamorous Glass Cards -->
  <div class="mission-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 50px; margin-bottom: 120px;">

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

  <!-- Chairman Section - Professional & Glamorous -->
  <div class="chairman-container">
    <div class="chairman-image glass">
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

  <!-- Team Section - Glamorous Team Cards -->
  <section id="team" style="margin-top: 120px;">
    <h2 class="section-title">{{ __('messages.team_title') }}</h2>

    <div class="team-grid">

      <!-- Jagan Pareet -->
      <div class="team-card glass">
        <div class="member-photo">
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

      <!-- Ali Mohsin Raza -->
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

@push('styles')
<style>
  /* Mission & Vision Cards */
  .mission-card {
    padding: 50px 40px;
    border-radius: 30px;
    text-align: center;
    transition: all 0.5s ease;
    position: relative;
    overflow: hidden;
  }

  .mission-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 30px 60px rgba(45, 169, 255, 0.2);
  }

  .mission-icon {
    font-size: 4rem;
    color: #2da9ff;
    margin-bottom: 25px;
    background: rgba(45, 169, 255, 0.1);
    width: 120px;
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin: 0 auto 30px;
    border: 2px solid rgba(45, 169, 255, 0.3);
    transition: all 0.4s ease;
  }

  .mission-card:hover .mission-icon {
    background: rgba(45, 169, 255, 0.2);
    transform: scale(1.1);
    box-shadow: 0 0 30px rgba(45, 169, 255, 0.4);
  }

  .mission-card h3 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #fff;
  }

  .mission-card p {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #ccc;
  }

  /* Chairman Section */
  .chairman-container {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 80px;
    align-items: center;
    margin-bottom: 120px;
  }

  .chairman-image {
    height: 500px;
    border-radius: 40px;
    background: url('https://i.ibb.co/jkB4rZfK/Shahid-Iqbal.png') center 55% / cover no-repeat;
    position: relative;
    overflow: hidden;
  }

  .image-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(45,169,255,0.1), transparent);
    border-radius: 40px;
  }

  .chairman-message {
    padding: 50px;
    border-radius: 40px;
  }

  .chairman-message h2 {
    font-size: 2.6rem;
    margin-bottom: 30px;
    color: #fff;
  }

  .quote {
    font-size: 1.3rem;
    font-style: italic;
    line-height: 1.8;
    color: #ddd;
    margin-bottom: 40px;
    position: relative;
  }

  .quote::before {
    content: '“';
    font-size: 6rem;
    color: #2da9ff;
    opacity: 0.3;
    position: absolute;
    left: -30px;
    top: -20px;
  }

  .signature h4 {
    font-size: 1.6rem;
    color: #2da9ff;
    margin-bottom: 8px;
  }

  .signature p {
    color: #aaa;
    font-size: 1.1rem;
  }

  /* Team Section */
  .section-title {
    text-align: center;
    font-size: 3rem;
    margin-bottom: 80px;
    color: #fff;
  }

  .team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
    gap: 60px;
  }

  .team-card {
    border-radius: 40px;
    padding: 40px;
    text-align: center;
    transition: all 0.5s ease;
    position: relative;
    overflow: hidden;
  }

  .team-card:hover {
    transform: translateY(-20px);
    box-shadow: 0 30px 70px rgba(45, 169, 255, 0.25);
  }

  .member-photo {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    margin: 0 auto 30px;
    border: 5px solid #2da9ff;
    background-size: cover;
    background-position: center 10%;
    position: relative;
    overflow: hidden;
    background-image: url('https://i.ibb.co/M57nydQD/Gemini-Generated-Image-v8otdcv8otdcv8ot.png');
  }

  .photo-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(transparent, rgba(45,169,255,0.2));
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .team-card:hover .photo-overlay {
    opacity: 1;
  }

  .member-info h3 {
    font-size: 1.8rem;
    margin-bottom: 10px;
    color: #fff;
  }

  .position {
    color: #2da9ff;
    font-weight: bold;
    font-size: 1.2rem;
    margin-bottom: 20px;
  }

  .description {
    font-size: 1.05rem;
    line-height: 1.7;
    color: #ccc;
    margin-bottom: 25px;
  }

  .linkedin-link {
    font-size: 2rem;
    color: #2da9ff;
    transition: all 0.3s ease;
  }

  .linkedin-link:hover {
    color: #fff;
    transform: scale(1.2);
  }

  @media (max-width: 992px) {
    .chairman-container {
      grid-template-columns: 1fr;
      text-align: center;
    }
    .chairman-image {
      height: 400px;
      margin-bottom: 40px;
    }
    .mission-grid {
      grid-template-columns: 1fr;
    }
  }

  @media (max-width: 768px) {
    .team-grid {
      grid-template-columns: 1fr;
    }
    .member-photo {
      width: 160px;
      height: 160px;
    }
  }
</style>
@endpush

@endsection