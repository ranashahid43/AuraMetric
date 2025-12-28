@extends('layouts.app')

@section('title', __('messages.careers_apply_title') . ' | AuraMetric')

@section('content')

<section class="hero careers-apply-hero">
    <div class="hero-content">
        <h1 class="gradient-text">{{ __('messages.careers_apply_title') }}</h1>
        <p class="hero-subtitle">{{ __('messages.careers_hero_subtitle') }}</p>
    </div>
</section>

<main class="apply-section">
    <div class="apply-card glass-container">
        <form action="{{ route('careers.submit') }}" method="POST" enctype="multipart/form-data" class="modern-form">
            @csrf

            <div class="form-section-header">
                <i class="fa-solid fa-user-astronaut"></i>
                <h3 class="form-section-title">{{ __('messages.careers_personal_info') }}</h3>
            </div>
            
            <div class="form-row grid-2">
                <div class="form-group">
                    <label>{{ __('messages.careers_first_name') }}</label>
                    <input type="text" name="first_name" placeholder="{{ __('messages.careers_first_name_placeholder') }}" value="{{ old('first_name') }}" required>
                    @error('first_name') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('messages.careers_last_name') }}</label>
                    <input type="text" name="last_name" placeholder="{{ __('messages.careers_last_name_placeholder') }}" value="{{ old('last_name') }}" required>
                    @error('last_name') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-row grid-2">
                <div class="form-group">
                    <label>{{ __('messages.careers_email') }}</label>
                    <input type="email" name="email" placeholder="{{ __('messages.careers_email_placeholder') }}" value="{{ old('email') }}" required>
                    <small class="field-note">{{ __('messages.careers_email_note') }}</small>
                    @error('email') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('messages.careers_phone') }}</label>
                    <input type="tel" name="phone" 
                           placeholder="{{ __('messages.careers_phone_placeholder') }}" 
                           value="{{ old('phone') }}"
                           required
                           pattern="^\+(92|39)[0-9]{7,15}$"
                           title="Starts with +92 or +39">
                    <small class="field-note">{{ __('messages.careers_phone_note') }}</small>
                    @error('phone') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-section-header">
                <i class="fa-solid fa-briefcase"></i>
                <h3 class="form-section-title">{{ __('messages.careers_role_experience') }}</h3>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label>{{ __('messages.careers_position') }}</label>
                    <select name="position" required class="modern-select">
                        <option value="" disabled {{ old('position') ? '' : 'selected' }}>{{ __('messages.careers_select_position') }}</option>
                        @if(isset($jobs))
                            @foreach($jobs as $job)
                                <option value="{{ $job }}" {{ old('position') == $job ? 'selected' : '' }}>{{ $job }}</option>
                            @endforeach
                        @endif
                        <option value="Spontaneous" {{ old('position') == 'Spontaneous' ? 'selected' : '' }}>{{ __('messages.careers_spontaneous_option') }}</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>{{ __('messages.careers_cover_letter') }}</label>
                    <textarea name="cover_letter" rows="5" placeholder="{{ __('messages.careers_cover_letter_placeholder') }}" required>{{ old('cover_letter') }}</textarea>
                    @error('cover_letter') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-section-header">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <h3 class="form-section-title">{{ __('messages.careers_documents') }}</h3>
            </div>
            
            <div class="upload-grid">
                <div class="upload-card glass">
                    <label for="cv-upload">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>{{ __('messages.careers_cv_label') }}</span>
                        <input type="file" id="cv-upload" name="cv" accept=".pdf,.doc,.docx" required>
                    </label>
                    @error('cv') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                
                <div class="upload-card glass">
                    <label for="portfolio-upload">
                        <i class="fa-solid fa-palette"></i>
                        <span>{{ __('messages.careers_portfolio_label') }}</span>
                        <input type="file" id="portfolio-upload" name="portfolio" accept=".pdf,.zip">
                    </label>
                </div>

                <div class="upload-card glass">
                    <label for="video-upload">
                        <i class="fa-solid fa-video"></i>
                        <span>{{ __('messages.careers_video_label') }}</span>
                        <input type="file" id="video-upload" name="video" accept=".mp4,.mov">
                    </label>
                </div>
            </div>

            <div class="consent-container">
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="agree" id="agree" required>
                    <label for="agree">
                        {{ __('messages.careers_privacy_agree') }} 
                        <a href="{{ route('privacy') }}" target="_blank" class="policy-link">{{ __('messages.careers_read_policy') }}</a>
                    </label>
                </div>
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="marketing" id="marketing">
                    <label for="marketing">{{ __('messages.careers_marketing_agree') }}</label>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <span>{{ __('messages.careers_submit_button') }}</span>
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </div>
</main>

@endsection

@push('styles')
<style>
    /* THEME VARIABLES */
    :root {
        --primary-violet: #ba68c8;
        --secondary-violet: #e1bee7;
        --glass-bg: rgba(255, 255, 255, 0.03);
        --glass-border: rgba(186, 104, 200, 0.2);
        --text-dim: rgba(255, 255, 255, 0.6);
    }

    /* HERO */
    .careers-apply-hero {
        padding: 100px 20px 60px;
        text-align: center;
    }

    .gradient-text {
        font-size: clamp(2.5rem, 6vw, 4rem);
        background: linear-gradient(135deg, var(--primary-violet), var(--secondary-violet));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 900;
        margin-bottom: 15px;
    }

    .hero-subtitle {
        color: var(--text-dim);
        font-size: 1.2rem;
        letter-spacing: 1px;
    }

    /* MAIN CONTAINER */
    .apply-section {
        max-width: 1000px;
        margin: 0 auto 100px;
        padding: 0 20px;
    }

    .glass-container {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 40px;
        padding: 60px;
        box-shadow: 0 40px 100px rgba(0,0,0,0.5);
    }

    /* FORM HEADERS */
    .form-section-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 40px 0 25px;
        color: var(--primary-violet);
    }

    .form-section-header i { font-size: 1.5rem; }

    .form-section-title {
        font-size: 1.4rem;
        color: #fff;
        font-weight: 600;
        margin: 0;
        letter-spacing: 0.5px;
    }

    /* INPUT STYLING */
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
    .form-row { margin-bottom: 25px; }
    .form-group { display: flex; flex-direction: column; gap: 10px; }

    .form-group label {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 500;
        margin-left: 5px;
    }

    input[type="text"], input[type="email"], input[type="tel"], textarea, .modern-select {
        background: rgba(255,255,255,0.05);
        border: 1px solid var(--glass-border);
        border-radius: 15px;
        padding: 15px 20px;
        color: #fff;
        font-size: 1rem;
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    input:focus, textarea:focus, .modern-select:focus {
        outline: none;
        border-color: var(--primary-violet);
        background: rgba(186, 104, 200, 0.08);
        box-shadow: 0 0 20px rgba(186, 104, 200, 0.15);
    }

    .field-note { color: var(--text-dim); font-size: 0.8rem; margin-top: 5px; }

    /* UPLOAD CARDS */
    .upload-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 40px;
    }

    .upload-card {
        border: 2px dashed var(--glass-border);
        border-radius: 20px;
        padding: 30px 15px;
        text-align: center;
        transition: 0.3s ease;
        position: relative;
    }

    .upload-card:hover {
        border-color: var(--primary-violet);
        background: rgba(186, 104, 200, 0.05);
        transform: translateY(-5px);
    }

    .upload-card label {
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        width: 100%;
    }

    .upload-card i { font-size: 2rem; color: var(--primary-violet); }
    .upload-card span { color: #fff; font-size: 0.9rem; font-weight: 500; }
    .upload-card input { position: absolute; opacity: 0; width: 0.1px; }

    /* CONSENT & BUTTON */
    .consent-container { margin: 40px 0; display: flex; flex-direction: column; gap: 15px; }
    .checkbox-wrapper { display: flex; align-items: flex-start; gap: 12px; color: var(--text-dim); font-size: 0.9rem; }
    .checkbox-wrapper input { width: 18px; height: 18px; accent-color: var(--primary-violet); cursor: pointer; }
    .policy-link { color: var(--primary-violet); text-decoration: none; border-bottom: 1px solid transparent; }
    .policy-link:hover { border-bottom: 1px solid var(--primary-violet); }

    .submit-btn {
        width: 100%;
        background: linear-gradient(135deg, var(--primary-violet), #9c27b0);
        color: #000;
        border: none;
        padding: 20px;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 800;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        transition: 0.4s;
        box-shadow: 0 15px 30px rgba(186, 104, 200, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(186, 104, 200, 0.5);
        background: var(--secondary-violet);
    }

    .error-msg { color: #ff5252; font-size: 0.8rem; margin-top: 5px; }

    /* RESPONSIVE */
    @media (max-width: 850px) {
        .grid-2, .upload-grid { grid-template-columns: 1fr; }
        .glass-container { padding: 40px 25px; }
    }
</style>
@endpush
