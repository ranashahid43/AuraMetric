@extends('layouts.app')

@section('title', __('messages.careers_apply_title') . ' | The Testing Tech')

@section('content')

<!-- HERO SECTION -->
<section class="hero" style="min-height: 40vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), #2da9ff;">
  <div class="hero-content">
    <h1>
      {{ __('messages.careers_apply_title') }}
    </h1>
    <p>
      {{ __('messages.careers_hero_subtitle') }}
    </p>
  </div>
</section>

<!-- MAIN APPLICATION FORM -->
<main class="careers-container">
  <div class="form-section glass">
    
    <form action="{{ route('careers.submit') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <h3 class="form-group-title">{{ __('messages.careers_personal_info') }}</h3>
      <div class="grid-2">
        <div class="form-group">
          <label>{{ __('messages.careers_first_name') }}</label>
          <input type="text" name="first_name" placeholder="{{ __('messages.careers_first_name_placeholder') }}" required>
          @error('first_name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
          <label>{{ __('messages.careers_last_name') }}</label>
          <input type="text" name="last_name" placeholder="{{ __('messages.careers_last_name_placeholder') }}" required>
          @error('last_name') <span class="error">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="grid-2">
        <div class="form-group">
          <label>{{ __('messages.careers_email') }}</label>
          <input type="email" name="email" placeholder="{{ __('messages.careers_email_placeholder') }}" required>
          <small>{{ __('messages.careers_email_note') }}</small>
          @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
  <label>{{ __('messages.careers_phone') }}</label>
  <input type="tel" name="phone" 
         placeholder="{{ __('messages.careers_phone_placeholder') }}" 
         required
         pattern="^\+(92|39)[0-9]{7,15}$"
         title="Phone number must start with +92 or +39 followed by digits"
         style="padding:18px 20px; border-radius:15px; border:2px solid rgba(45,169,255,0.3); 
                background: rgba(255,255,255,0.05); color:#fff; font-size:1.1rem;">
  <small>{{ __('messages.careers_phone_note') }}</small>
  @error('phone') <span class="error">{{ $message }}</span> @enderror
</div>

      </div>

      <h3 class="form-group-title">{{ __('messages.careers_role_experience') }}</h3>
      <div class="form-group">
        <label>{{ __('messages.careers_position') }}</label>
        <select name="position" required class="custom-select">
          <option value="">{{ __('messages.careers_select_position') }}</option>
          @foreach($jobs as $job)
            <option value="{{ $job }}">{{ $job }}</option>
          @endforeach
          <option value="Spontaneous">{{ __('messages.careers_spontaneous_option') }}</option>
        </select>
      </div>

      <div class="form-group">
        <label>{{ __('messages.careers_cover_letter') }}</label>
        <textarea name="cover_letter" rows="6" placeholder="{{ __('messages.careers_cover_letter_placeholder') }}" required></textarea>
        @error('cover_letter') <span class="error">{{ $message }}</span> @enderror
      </div>

      <h3 class="form-group-title">{{ __('messages.careers_documents') }}</h3>
      <div class="upload-box">
        <label>{{ __('messages.careers_cv_label') }}</label>
        <input type="file" name="cv" accept=".pdf,.doc,.docx" required>
        @error('cv') <span class="error">{{ $message }}</span> @enderror
      </div>
      <div class="upload-box">
        <label>{{ __('messages.careers_portfolio_label') }}</label>
        <input type="file" name="portfolio" accept=".pdf,.zip">
        @error('portfolio') <span class="error">{{ $message }}</span> @enderror
      </div>
      <div class="upload-box">
        <label>{{ __('messages.careers_video_label') }}</label>
        <input type="file" name="video" accept=".mp4,.mov">
        @error('video') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="privacy-group">
        <input type="checkbox" name="agree" required>
        <label>{{ __('messages.careers_privacy_agree') }} <a href="{{ route('privacy') }}" target="_blank">({{ __('messages.careers_read_policy') }})</a></label>
        @error('agree') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="privacy-group">
        <input type="checkbox" name="marketing">
        <label>{{ __('messages.careers_marketing_agree') }}</label>
      </div>

      <button type="submit" class="btn learn-more-btn">
        {{ __('messages.careers_submit_button') }}
      </button>
    </form>
  </div>
</main>

@push('styles')
<style>
  .careers-container {
    max-width: 1000px;
    margin: 100px auto;
    padding: 0 5%;
  }

  .form-section {
    border-radius: 40px;
    padding: 80px 100px;
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 20px 60px rgba(0,0,0,0.6);
    transition: all 0.5s ease;
  }

  .form-section:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 80px rgba(45,169,255,0.2);
  }

  .form-group-title {
    font-size: 2.2rem;
    color: #fff;
    margin: 60px 0 40px 0;
    text-align: center;
    position: relative;
  }

  .form-group-title::after {
    content: '';
    display: block;
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, #2da9ff, #7ed3ff);
    margin: 20px auto 0;
    border-radius: 2px;
  }

  .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    margin-bottom: 40px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
  }

  .form-group label {
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 15px;
    font-weight: 500;
  }

  input, textarea, select {
    padding: 18px 20px;
    border-radius: 15px;
    border: 2px solid rgba(45,169,255,0.3);
    background: rgba(255,255,255,0.05);
    color: #fff;
    font-size: 1.1rem;
    transition: all 0.4s ease;
  }

  input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: #2da9ff;
    background: rgba(45,169,255,0.1);
    box-shadow: 0 0 25px rgba(45,169,255,0.3);
  }

  input::placeholder, textarea::placeholder {
    color: #aaa;
  }

  small {
    font-size: 0.9rem;
    color: #aaa;
    margin-top: 8px;
    display: block;
  }

  /* FIXED: Dropdown menu now has dark background and white text */
  .custom-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23ffffff' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 20px center;
    background-color: rgba(255,255,255,0.05);
    cursor: pointer;
  }

  .custom-select option {
    background: #1a1a1a !important;  /* Dark background */
    color: #fff !important;          /* White text */
    padding: 12px;
  }

  .upload-box {
    border: 3px dashed rgba(45,169,255,0.3);
    padding: 40px;
    border-radius: 20px;
    margin-bottom: 30px;
    text-align: center;
    background: rgba(45,169,255,0.03);
    transition: all 0.4s ease;
    cursor: pointer;
  }

  .upload-box:hover {
    border-color: #2da9ff;
    background: rgba(45,169,255,0.1);
    box-shadow: 0 0 30px rgba(45,169,255,0.2);
  }

  .upload-box label {
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 15px;
    display: block;
  }

  .upload-box input {
    display: block;
    margin: 0 auto;
  }

  .privacy-group {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    font-size: 1rem;
    margin: 40px 0;
    color: #ccc;
  }

  .privacy-group input[type="checkbox"] {
    width: 24px;
    height: 24px;
    accent-color: #2da9ff;
    margin-top: 2px;
    flex-shrink: 0;
  }

  .privacy-group a {
    color: #2da9ff;
    text-decoration: underline;
  }

  .privacy-group a:hover {
    color: #fff;
  }

  button.learn-more-btn {
    display: block;
    margin: 60px auto 0;
    background: #2da9ff;
    color: #000;
    padding: 22px 80px;
    font-size: 1.5rem;
    font-weight: bold;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 12px 40px rgba(45,169,255,0.4);
    transition: all 0.4s ease;
  }

  button.learn-more-btn:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(45,169,255,0.6);
    background: #7ed3ff;
  }

  .error {
    color: #ff6b6b;
    font-size: 0.95rem;
    margin-top: 8px;
  }

  @media (max-width: 992px) {
    .grid-2 {
      grid-template-columns: 1fr;
      gap: 40px;
    }
    .form-section {
      padding: 60px 40px;
    }
  }

  @media (max-width: 768px) {
    .form-section {
      padding: 50px 30px;
      border-radius: 30px;
    }
    .form-group-title {
      font-size: 1.9rem;
    }
    button.learn-more-btn {
      padding: 18px 60px;
      font-size: 1.3rem;
    }
  }
</style>
@endpush

@endsection