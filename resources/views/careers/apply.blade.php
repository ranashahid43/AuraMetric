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
        @if($errors->any())
            <div class="error-summary glass">
                <ul>
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
                    <label>{{ __('messages.careers_first_name') }} *</label>
                    <input type="text" name="first_name" placeholder="{{ __('messages.careers_first_name_placeholder') }}" value="{{ old('first_name') }}" required>
                    @error('first_name') <span class="error-text">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('messages.careers_last_name') }} *</label>
                    <input type="text" name="last_name" placeholder="{{ __('messages.careers_last_name_placeholder') }}" value="{{ old('last_name') }}" required>
                    @error('last_name') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-row grid-2">
                <div class="form-group">
                    <label>{{ __('messages.careers_email') }} *</label>
                    <input type="email" name="email" placeholder="{{ __('messages.careers_email_placeholder') }}" value="{{ old('email') }}" required>
                    <small class="field-note">Example: user@gmail.com, user@outlook.com</small>
                    @error('email') <span class="error-text">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('messages.careers_phone') }} *</label>
                    <input type="tel" name="phone" 
                           placeholder="+92 300 1234567" 
                           value="{{ old('phone') }}" 
                           required 
                           pattern="^\+[1-9]\d{1,14}$">
                    <small class="field-note">Include country code (e.g., +92 or +39)</small>
                    @error('phone') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>

            <h3 class="form-section-title">{{ __('messages.careers_role_experience') }}</h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label>{{ __('messages.careers_position') }} *</label>
                    <select name="position" required class="custom-select">
                        <option value="" disabled {{ old('position') ? '' : 'selected' }}>{{ __('messages.careers_select_position') }}</option>
                        @if(isset($jobs))
                            @foreach($jobs as $job)
                                <option value="{{ $job }}" {{ old('position') == $job ? 'selected' : '' }}>{{ $job }}</option>
                            @endforeach
                        @endif
                        <option value="Spontaneous" {{ old('position') == 'Spontaneous' ? 'selected' : '' }}>{{ __('messages.careers_spontaneous_option') }}</option>
                    </select>
                    @error('position') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>{{ __('messages.careers_cover_letter') }} *</label>
                    <textarea name="cover_letter" rows="6" placeholder="{{ __('messages.careers_cover_letter_placeholder') }}" required>{{ old('cover_letter') }}</textarea>
                    @error('cover_letter') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>

            <h3 class="form-section-title">{{ __('messages.careers_documents') }}</h3>
            
            <div class="form-row grid-upload">
                <div class="upload-box glass">
                    <i class="fa-solid fa-file-pdf"></i>
                    <label>{{ __('messages.careers_cv_label') }} *</label>
                    <input type="file" name="cv" accept=".pdf" required>
                    <small class="field-note">Compulsory (PDF only)</small>
                    @error('cv') <span class="error-text">{{ $message }}</span> @enderror
                </div>
                
                <div class="upload-box glass">
                    <i class="fa-solid fa-briefcase"></i>
                    <label>{{ __('messages.careers_portfolio_label') }}</label>
                    <input type="file" name="portfolio" accept=".pdf,.zip">
                </div>

                <div class="upload-box glass">
                    <i class="fa-solid fa-video"></i>
                    <label>{{ __('messages.careers_video_label') }}</label>
                    <input type="file" name="video" accept=".mp4,.mov">
                </div>
            </div>

            <div class="consent-wrapper">
                <div class="privacy-checkbox">
                    <input type="checkbox" name="agree" id="agree" required>
                    <label for="agree">
                        {{ __('messages.careers_privacy_agree') }} *
                        <a href="{{ route('privacy') }}" target="_blank" class="text-link">({{ __('messages.careers_read_policy') }})</a>
                    </label>
                </div>
                @error('agree') <span class="error-text">{{ $message }}</span> @enderror

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
        min-height: 30vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px 20px;
    }

    .careers-apply-hero h1 {
        font-size: clamp(2rem, 5vw, 3rem);
        background: linear-gradient(135deg, #ba68c8, #e1bee7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        margin-bottom: 10px;
    }

    /* FORM LAYOUT */
    .apply-section {
        padding: 20px 5% 80px;
        max-width: 1100px;
        margin: 0 auto;
    }

    .apply-card {
        padding: clamp(30px, 5vw, 60px);
        border-radius: 40px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        box-shadow: 0 30px 60px rgba(0,0,0,0.4);
    }

    .form-section-title {
        font-size: 1.4rem;
        color: #fff;
        margin: 40px 0 25px;
        padding-bottom: 8px;
        border-bottom: 2px solid rgba(186, 104, 200, 0.3);
        display: inline-block;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .form-group { margin-bottom: 20px; }
    .form-row { margin-bottom: 15px; }

    input, textarea, select {
        width: 100%;
        padding: 14px 18px;
        border-radius: 12px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        font-size: 1rem;
    }

    /* ERROR STYLING */
    .error-text {
        color: #ff6b6b;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
        font-weight: 500;
    }

    .error-summary {
        background: rgba(255, 107, 107, 0.1);
        border: 1px solid #ff6b6b;
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 30px;
        color: #ff6b6b;
    }

    /* UPLOAD BOXES */
    .grid-upload {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .upload-box {
        padding: 30px 20px;
        text-align: center;
        border-radius: 20px;
        border: 2px dashed rgba(186, 104, 200, 0.3);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .upload-box input[type="file"] { border: none; background: transparent; padding: 0; cursor: pointer; }

    /* CHECKBOXES */
    .consent-wrapper { margin-top: 30px; }
    .privacy-checkbox {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 15px;
    }

    .privacy-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        margin-top: 3px;
        accent-color: #ba68c8;
        cursor: pointer;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .grid-2 { grid-template-columns: 1fr; gap: 0; }
        .apply-card { padding: 30px 20px; }
        .apply-submit-btn { width: 100%; }
    }

    .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); }
    .apply-submit-btn {
        background: #ba68c8;
        color: #000;
        font-weight: 800;
        padding: 18px 60px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        display: block;
        margin: 40px auto 0;
    }
    .apply-submit-btn:hover { background: #e1bee7; transform: translateY(-3px); }
</style>
@endpush
