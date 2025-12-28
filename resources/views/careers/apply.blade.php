@extends('layouts.app')

@section('title', __('messages.careers_apply_title') . ' | AuraMetric')

@section('content')

<section class="hero careers-apply-hero-compact">
    <div class="hero-content">
        <h1 class="gradient-text-small">{{ __('messages.careers_apply_title') }}</h1>
        <p class="hero-subtitle-small">{{ __('messages.careers_hero_subtitle') }}</p>
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
                    <input type="tel" name="phone" placeholder="{{ __('messages.careers_phone_placeholder') }}" value="{{ old('phone') }}" required pattern="^\+(92|39)[0-9]{7,15}$">
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
                        <option value="" disabled {{ old('position') ? '' : 'selected' }} style="color: #666;">{{ __('messages.careers_select_position') }}</option>
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
                    <textarea name="cover_letter" rows="4" placeholder="{{ __('messages.careers_cover_letter_placeholder') }}" required>{{ old('cover_letter') }}</textarea>
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
    :root {
        --primary-violet: #ba68c8;
        --secondary-violet: #e1bee7;
        --glass-bg: rgba(255, 255, 255, 0.03);
        --glass-border: rgba(186, 104, 200, 0.2);
        --text-dim: rgba(255, 255, 255, 0.6);
        --dark-bg: #121212;
    }

    /* COMPACT HERO */
    .careers-apply-hero-compact {
        padding: 50px 20px 20px;
        text-align: center;
    }

    .gradient-text-small {
        font-size: 2rem;
        background: linear-gradient(135deg, var(--primary-violet), var(--secondary-violet));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .hero-subtitle-small {
        color: var(--text-dim);
        font-size: 0.95rem;
    }

    /* FORM CARD */
    .apply-section { max-width: 850px; margin: 0 auto 60px; padding: 0 20px; }
    .glass-container {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        padding: 40px;
    }

    /* DROPDOWN LAPTOP FIX */
    .modern-select {
        background: rgba(255,255,255,0.08);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 14px 18px;
        color: #ffffff !important;
        width: 100%;
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23ba68c8' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 20px center;
    }

    /* Force dark theme on the dropdown list for laptop browsers */
    .modern-select option {
        background-color: #1a1a1a !important; 
        color: #ffffff !important;
        padding: 15px;
    }

    .form-section-header { display: flex; align-items: center; gap: 12px; margin: 30px 0 15px; color: var(--primary-violet); }
    .form-section-title { font-size: 1.1rem; color: #fff; font-weight: 600; margin:0; }

    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .form-row { margin-bottom: 15px; }
    .form-group label { color: #fff; font-size: 0.9rem; margin-bottom: 8px; display: block; }
    
    input, textarea {
        background: rgba(255,255,255,0.05);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 12px 16px;
        color: #fff;
        width: 100%;
    }

    .upload-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
    .upload-card {
        border: 1px dashed var(--glass-border);
        border-radius: 12px;
        padding: 15px 5px;
        text-align: center;
    }
    .upload-card i { font-size: 1.3rem; color: var(--primary-violet); margin-bottom: 5px; }
    .upload-card span { font-size: 0.75rem; color: #fff; display: block; }
    .upload-card input { display: none; }

    .submit-btn {
        width: 100%;
        background: var(--primary-violet);
        color: #000;
        border: none;
        padding: 16px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        margin-top: 25px;
        transition: 0.3s;
    }

    .submit-btn:hover { background: var(--secondary-violet); transform: translateY(-2px); }

    @media (max-width: 768px) {
        .grid-2, .upload-grid { grid-template-columns: 1fr; }
        .glass-container { padding: 25px 20px; }
    }
</style>
@endpush
