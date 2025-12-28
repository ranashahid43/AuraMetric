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
        {{-- Display Global Error Summary if needed --}}
        @if($errors->any())
            <div class="error-summary glass" style="color: #ff6b6b; margin-bottom: 20px; padding: 15px; border: 1px solid #ff6b6b; border-radius: 12px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('careers.submit') }}" method="POST" enctype="multipart/form-data" class="modern-form">
            @csrf

            <h3 class="form-section-title">{{ __('messages.careers_personal_info') }}</h3>
            
            <div class="form-row grid-2">
                <div class="form-group">
                    <label>{{ __('messages.careers_first_name') }}</label>
                    <input type="text" name="first_name" placeholder="{{ __('messages.careers_first_name_placeholder') }}" value="{{ old('first_name') }}" required>
                    @error('first_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('messages.careers_last_name') }}</label>
                    <input type="text" name="last_name" placeholder="{{ __('messages.careers_last_name_placeholder') }}" value="{{ old('last_name') }}" required>
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
                    <input type="tel" name="phone" 
                           placeholder="{{ __('messages.careers_phone_placeholder') }}" 
                           value="{{ old('phone') }}" 
                           required 
                           pattern="^\+(92|39)[0-9]{7,15}$"
                           title="Phone number must start with +92 or +39">
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

            <h3 class="form-section-title">{{ __('messages.careers_documents') }}</h3>
            
            <div class="form-row grid-upload">
                <div class="upload-box glass">
                    <i class="fa-solid fa-file-pdf"></i>
                    <label>{{ __('messages.careers_cv_label') }}</label>
                    <input type="file" name="cv" accept=".pdf" required>
                    @error('cv') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="upload-box glass">
                    <i class="fa-solid fa-briefcase"></i>
                    <label>{{ __('messages.careers_portfolio_label') }}</label>
                    <input type="file" name="portfolio" accept=".pdf,.zip">
                    @error('portfolio') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="upload-box glass">
                    <i class="fa-solid fa-video"></i>
                    <label>{{ __('messages.careers_video_label') }}</label>
                    <input type="file" name="video" accept=".mp4,.mov">
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

  /* LAYOUT - Form Width Shrunk to 800px for better laptop view */
  .apply-section {
    padding: 20px 5% 100px;
    max-width: 800px; 
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

  input, textarea, select {
    padding: 14px 18px;
    border-radius: 12px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    background: rgba(255, 255, 255, 0.05);
    color: #fff;
    font-size: 1rem;
    transition: 0.3s ease;
  }

  /* DROPDOWN FIX: Ensures background is dark and readable */
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
  }

  /* UPLOAD BOXES */
  .grid-upload {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  .upload-box {
    padding: 25px 15px;
    text-align: center;
    border-radius: 20px;
    border: 2px dashed rgba(186, 104, 200, 0.3);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }

  .upload-box i { font-size: 1.8rem; color: #ba68c8; }

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
  }

  /* UTILITIES */
  .glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
  }

  .error { color: #ff6b6b; font-size: 0.8rem; margin-top: 5px; font-weight: 500;}

  /* RESPONSIVE */
  @media (max-width: 992px) { .grid-upload { grid-template-columns: 1fr; } }
  @media (max-width: 768px) {
    .grid-2 { grid-template-columns: 1fr; gap: 20px; }
    .apply-card { padding: 40px 20px; }
  }
</style>
@endpush
