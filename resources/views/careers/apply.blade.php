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
                    <select name="position" required class="custom-select position-select">
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
        min-height: 25vh; /* Slightly smaller hero */
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px 20px;
    }

    .careers-apply-hero h1 {
        font-size: clamp(2rem, 5vw, 2.5rem);
        background: linear-gradient(135deg, #ba68c8, #e1bee7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        margin-bottom: 10px;
    }

    /* FORM LAYOUT - SHRUNK WIDTH */
    .apply-section {
        padding: 20px 5% 80px;
        max-width: 800px; /* SHRUNK from 1100px to 800px */
        margin: 0 auto;
    }

    .apply-card {
        padding: clamp(25px, 5vw, 50px);
        border-radius: 35px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        box-shadow: 0 30px 60px rgba(0,0,0,0.4);
    }

    .form-section-title {
        font-size: 1.25rem;
        color: #fff;
        margin: 35px 0 20px;
        padding-bottom: 6px;
        border-bottom: 2px solid rgba(186, 104, 200, 0.2);
        display: inline-block;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group { margin-bottom: 18px; }

    input, textarea, select {
        width: 100%;
        padding: 14px 18px;
        border-radius: 12px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        font-size: 1rem;
        outline: none;
    }

    /* DROPDOWN FIX - DARK BACKGROUND */
    .position-select {
        background-color: #1a1a1a; /* Fixes the white background */
        cursor: pointer;
        appearance: none; /* Removes default browser styling */
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23ba68c8' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1.2rem center;
        padding-right: 2.5rem;
    }

    .position-select option {
        background-color: #1a1a1a; /* Ensures list items are dark */
        color: #fff;
    }

    /* ERROR STYLING */
    .error-text {
        color: #ff6b6b;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }

    .error-summary {
        background: rgba(255, 107, 107, 0.05);
        border: 1px solid rgba(255, 107, 107, 0.3);
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 30px;
        color: #ff6b6b;
    }

    /* UPLOAD BOXES */
    .grid-upload {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .upload-box {
        padding: 20px;
        text-align: center;
        border-radius: 15px;
        border: 1px dashed rgba(186, 104, 200, 0.3);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        transition: 0.3s;
    }
    
    .upload-box:hover {
        border-color: #ba68c8;
        background: rgba(186, 104, 200, 0.05);
    }

    .upload-box i { font-size: 1.5rem; color: #ba68c8; }

    /* CHECKBOXES */
    .consent-wrapper { margin-top: 30px; }
    .privacy-checkbox {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 12px;
        font-size: 0.9rem;
        color: rgba(255,255,255,0.7);
    }

    .privacy-checkbox input[type="checkbox"] {
        width: 16px;
        height: 16px;
        margin-top: 3px;
        accent-color: #ba68c8;
    }

    /* BUTTON */
    .apply-submit-btn {
        background: #ba68c8;
        color: #000;
        font-weight: 800;
        padding: 16px 50px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        display: block;
        margin: 30px auto 0;
        width: 100%;
        max-width: 300px; /* Small centered button */
    }

    .apply-submit-btn:hover { background: #e1bee7; transform: translateY(-2px); }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .grid-2 { grid-template-columns: 1fr; gap: 0; }
        .apply-card { padding: 25px 15px; }
    }

    .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(15px); }
</style>
@endpush
