@extends('layouts.app')

@section('title', __('messages.careers_apply_title') . ' | AuraMetric')

@section('content')

<section class="hero careers-apply-hero">
    <div class="hero-content">
        <h1>{{ __('messages.careers_apply_title') }}</h1>
        <p>{{ __('messages.careers_hero_subtitle') }}</p>
    </div>
</section>

<main class="apply-section">
    <div class="apply-card glass">
        <form action="{{ route('careers.submit') }}" method="POST" enctype="multipart/form-data" class="modern-form">
            @csrf

            <h3 class="form-section-title">{{ __('messages.careers_personal_info') }}</h3>
            
            <div class="form-row grid-2">
                <div class="form-group">
                    <label>{{ __('messages.careers_first_name') }}</label>
                    {{-- HTML pattern used to enforce English letters only on front-end --}}
                    <input type="text" name="first_name" placeholder="{{ __('messages.careers_first_name_placeholder') }}" value="{{ old('first_name') }}" required pattern="[A-Za-z\s]+" title="Please use English letters only">
                    @error('first_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('messages.careers_last_name') }}</label>
                    <input type="text" name="last_name" placeholder="{{ __('messages.careers_last_name_placeholder') }}" value="{{ old('last_name') }}" required pattern="[A-Za-z\s]+" title="Please use English letters only">
                    @error('last_name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-row grid-2">
                <div class="form-group">
                    <label>{{ __('messages.careers_email') }}</label>
                    <input type="email" name="email" placeholder="{{ __('messages.careers_email_placeholder') }}" value="{{ old('email') }}" required>
                    <small class="field-note">{{ __('messages.careers_email_note') }}</small>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('messages.careers_phone') }}</label>
                    {{-- Pattern updated to allow any + followed by country code and digits --}}
                    <input type="tel" name="phone" 
                           placeholder="{{ __('messages.careers_phone_placeholder') }}" 
                           value="{{ old('phone') }}" 
                           required 
                           pattern="^\+[1-9]\d{1,14}$"
                           title="Phone number must start with + followed by country code (e.g. +92 or +91)">
                    <small class="field-note">{{ __('messages.careers_phone_note') }}</small>
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <h3 class="form-section-title">{{ __('messages.careers_role_experience') }}</h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label>{{ __('messages.careers_position') }}</label>
                    <select name="position" required class="custom-select">
                        <option value="" disabled {{ old('position') ? '' : 'selected' }}>{{ __('messages.careers_select_position') }}</option>
                        @if(isset($jobs))
                            @foreach($jobs as $job)
                                <option value="{{ $job }}" {{ old('position') == $job ? 'selected' : '' }}>{{ $job }}</option>
                            @endforeach
                        @endif
                        <option value="Spontaneous" {{ old('position') == 'Spontaneous' ? 'selected' : '' }}>{{ __('messages.careers_spontaneous_option') }}</option>
                    </select>
                    @error('position') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>{{ __('messages.careers_cover_letter') }}</label>
                    <textarea name="cover_letter" rows="6" placeholder="{{ __('messages.careers_cover_letter_placeholder') }}" required>{{ old('cover_letter') }}</textarea>
                    @error('cover_letter') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <h3 class="form-section-title">{{ __('messages.careers_documents') }} (PDF, DOC, DOCX Only)</h3>
            
            <div class="form-row grid-upload">
                <div class="upload-box glass">
                    <button type="button" class="file-remove-btn" onclick="resetFile('cv-field')">&times;</button>
                    <i class="fa-solid fa-file-pdf"></i>
                    <label>{{ __('messages.careers_cv_label') }}</label>
                    <input type="file" name="cv" id="cv-field" accept=".pdf,.doc,.docx" required>
                    @error('cv') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="upload-box glass">
                    <button type="button" class="file-remove-btn" onclick="resetFile('portfolio-field')">&times;</button>
                    <i class="fa-solid fa-briefcase"></i>
                    <label>{{ __('messages.careers_portfolio_label') }}</label>
                    <input type="file" name="portfolio" id="portfolio-field" accept=".pdf,.zip">
                    @error('portfolio') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="upload-box glass">
                    <button type="button" class="file-remove-btn" onclick="resetFile('video-field')">&times;</button>
                    <i class="fa-solid fa-video"></i>
                    <label>{{ __('messages.careers_video_label') }}</label>
                    <input type="file" name="video" id="video-field" accept=".mp4,.mov">
                    @error('video') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="consent-wrapper">
                <div class="privacy-checkbox">
                    <input type="checkbox" name="agree" id="agree" required>
                    <label for="agree">
                        {{ __('messages.careers_privacy_agree') }} 
                        <a href="{{ route('privacy') }}" target="_blank" class="text-link">({{ __('messages.careers_read_policy') }})</a>
                    </label>
                </div>
                @error('agree') <span class="error">{{ $message }}</span> @enderror

                <div class="privacy-checkbox">
                    <input type="checkbox" name="marketing" id="marketing">
                    <label for="marketing">{{ __('messages.careers_marketing_agree') }}</label>
                </div>
            </div>

            <button type="submit" class="btn apply-submit-btn">
                {{ __('messages.careers_submit_button') }}
            </button>
        </form>
    </div>
</main>

{{-- Script to handle the cancel/cross button for file uploads --}}
<script>
    function resetFile(id) {
        const fileInput = document.getElementById(id);
        fileInput.value = ''; // Clears the file selection
    }
</script>

@endsection

@push('styles')
<style>
  /* HERO SECTION */
  .careers-apply-hero {
    min-height: 25vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 40px 20px;
  }

  .careers-apply-hero h1 {
    font-size: clamp(2rem, 4vw, 3rem);
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 800;
  }

  .careers-apply-hero p {
    color: rgba(255, 255, 255, 0.6);
    font-size: 1rem;
    margin-top: 10px;
  }

  /* LAYOUT */
  .apply-section {
    padding: 20px 5% 100px;
    max-width: 1100px; /* ORIGINAL WIDTH RESTORED */
    margin: 0 auto;
  }

  .apply-card {
    padding: 60px;
    border-radius: 40px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    box-shadow: 0 30px 60px rgba(0,0,0,0.4);
  }

  /* TITLES */
  .form-section-title {
    font-size: 1.5rem;
    color: #fff;
    margin: 40px 0 25px;
    padding-bottom: 8px;
    border-bottom: 2px solid rgba(186, 104, 200, 0.3);
    display: inline-block;
  }

  .form-section-title:first-of-type { margin-top: 0; }

  /* FORM ELEMENTS */
  .form-row { margin-bottom: 25px; }

  .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .form-group label {
    font-size: 1rem;
    color: #fff;
    font-weight: 500;
  }

  input, textarea, select {
    padding: 14px 18px;
    border-radius: 12px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    background: rgba(255, 255, 255, 0.05);
    color: #fff;
    font-size: 1rem;
    transition: 0.3s ease;
  }

  input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: #ba68c8;
    background: rgba(186, 104, 200, 0.1);
    box-shadow: 0 0 20px rgba(186, 104, 200, 0.2);
  }

  .field-note {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.4);
    margin-top: 5px;
  }

  /* CUSTOM SELECT - Fix background colour */
  .custom-select {
    cursor: pointer;
    appearance: none;
    background-color: #1a1a1a; 
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23ba68c8' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 20px center;
  }

  .custom-select option {
    background: #1a1a1a; 
    color: #fff;
    padding: 10px;
  }

  /* UPLOAD BOXES */
  .grid-upload {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  .upload-box {
    position: relative; /* Required for the absolute cross button */
    padding: 25px 15px;
    text-align: center;
    border-radius: 20px;
    border: 2px dashed rgba(186, 104, 200, 0.3);
    transition: 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }

  .upload-box i { font-size: 1.8rem; color: #ba68c8; }

  /* MINI CROSS BUTTON FOR FILE REMOVAL */
  .file-remove-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    background: rgba(255, 107, 107, 0.2);
    border: none;
    color: #ff6b6b;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    transition: 0.2s;
  }

  .file-remove-btn:hover {
    background: #ff6b6b;
    color: white;
  }

  .upload-box:hover {
    border-color: #ba68c8;
    background: rgba(186, 104, 200, 0.05);
    transform: translateY(-5px);
  }

  .upload-box input[type="file"] {
    font-size: 0.75rem;
    border: none;
    background: transparent;
    padding: 0;
    width: 100%;
    color: rgba(255,255,255,0.7);
  }

  /* CHECKBOXES */
  .consent-wrapper {
    margin: 35px 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .privacy-checkbox {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
  }

  .privacy-checkbox input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: #ba68c8;
    margin-top: 2px;
  }

  .text-link { color: #ba68c8; text-decoration: none; }

  /* SUBMIT BUTTON */
  .apply-submit-btn {
    display: block;
    width: 100%;
    max-width: 400px;
    margin: 30px auto 0;
    padding: 18px;
    border-radius: 50px;
    background: #ba68c8;
    color: #000;
    font-weight: 800;
    font-size: 1.1rem;
    border: none;
    cursor: pointer;
    transition: 0.4s;
    box-shadow: 0 10px 25px rgba(186, 104, 200, 0.3);
  }

  .apply-submit-btn:hover {
    background: #e1bee7;
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(186, 104, 200, 0.5);
  }

  /* UTILITIES */
  .glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
  }

  .error { color: #ff6b6b; font-size: 0.8rem; font-weight: 500; margin-top: 5px; }

  /* RESPONSIVE */
  @media (max-width: 992px) { .grid-upload { grid-template-columns: 1fr; } }
  @media (max-width: 768px) {
    .grid-2 { grid-template-columns: 1fr; gap: 0; }
    .grid-2 .form-group:first-child { margin-bottom: 25px; }
    .apply-section { padding: 20px 5% 60px; }
    .careers-apply-hero h1 { font-size: 2rem; }
  }
</style>
@endpush
