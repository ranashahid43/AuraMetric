@extends('layouts.app')

@section('title', __('messages.contact_title') . ' | AuraMetric')

@section('content')

<section class="hero contact-hero">
    <div class="hero-content">
        <h1>{!! __('messages.contact_hero_title') !!}</h1>
        <p>{{ __('messages.contact_hero_subtitle') }}</p>
    </div>
</section>

<main class="contact-section">
    <div class="contact-container">

        <div class="contact-info glass">
            <h2>{{ __('messages.contact_get_in_touch') }}</h2>

            <div class="contact-method">
                <div class="method-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="method-content">
                    <h4>{{ __('messages.contact_email_title') }}</h4>
                    <p class="email-link"><a href="mailto:info@aurametric.com">info@aurametric.com</a></p>
                </div>
            </div>

            <div class="contact-method">
                <div class="method-icon">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="method-content">
                    <h4>{{ __('messages.contact_phone_title') }}</h4>
                    <p><a href="tel:+919875439901">(+91) 919875439901</a></p>
                </div>
            </div>

            <div class="contact-method">
                <div class="method-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="method-content">
                    <h4>{{ __('messages.contact_office_title') }}</h4>
                    <p>{{ __('messages.contact_office_address') }}</p>
                </div>
            </div>
        </div>

        <div class="contact-form-wrapper glass">
            
            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                @csrf

                <div class="grid-2">
                    <div class="form-group">
                        <label>{{ __('messages.contact_first_name') }}</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.contact_last_name') }}</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>{{ __('messages.contact_email_label') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.contact_phone_optional') }}</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}">
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('messages.contact_message_label') }}</label>
                    <textarea name="message" rows="6" required
                        placeholder="{{ __('messages.contact_message_placeholder') }}">{{ old('message') }}</textarea>
                    @error('message') <span class="error">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn contact-btn">
                    {{ __('messages.contact_send_button') }}
                </button>
            </form>
        </div>
    </div>
</main>

@endsection

@push('styles')
<style>
    /* HERO SECTION */
    .contact-hero {
        min-height: 40vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 20px;
        text-align: center;
    }

    .contact-hero h1 {
        font-size: clamp(2.2rem, 5vw, 3.5rem);
        font-weight: 800;
        background: linear-gradient(135deg, #ba68c8, #e1bee7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 20px;
    }

    .contact-hero p {
        color: rgba(255, 255, 255, 0.7);
        font-size: clamp(1rem, 2vw, 1.15rem);
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* LAYOUT CONTAINER */
    .contact-section {
        padding: 40px 5% 100px;
        max-width: 1400px; /* Prevents stretching on ultra-wide screens */
        margin: 0 auto;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 40px;
        align-items: stretch;
    }

    /* GLASS CARDS */
    .contact-info, .contact-form-wrapper {
        padding: clamp(30px, 5vw, 60px);
        border-radius: 40px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        transition: transform 0.4s ease, border-color 0.4s ease;
    }

    .contact-info:hover, .contact-form-wrapper:hover {
        transform: translateY(-10px);
        border-color: rgba(186, 104, 200, 0.5);
    }

    .contact-info h2 {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
        margin-bottom: 40px;
        background: linear-gradient(135deg, #fff, #ba68c8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* CONTACT METHODS (LEFT SIDE) */
    .contact-method {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
        padding: 20px;
        border-radius: 20px;
        background: rgba(186, 104, 200, 0.05);
        border: 1px solid rgba(186, 104, 200, 0.1);
        transition: 0.3s ease;
    }

    .method-icon {
        font-size: 1.8rem;
        color: #ba68c8;
        background: rgba(186, 104, 200, 0.1);
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        flex-shrink: 0;
        transition: 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .contact-method:hover .method-icon {
        transform: rotateY(180deg);
        background: rgba(186, 104, 200, 0.3);
    }

    .method-content h4 { font-size: 1.2rem; color: #fff; margin-bottom: 5px; }
    .method-content p, .method-content a { color: rgba(255, 255, 255, 0.6); text-decoration: none; font-size: 1rem; }
    .method-content a:hover { color: #ba68c8; }

    /* FORM STYLING (RIGHT SIDE) */
    .form-group { margin-bottom: 25px; }
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 25px; }
    .form-group label { display: block; color: #fff; margin-bottom: 8px; font-size: 1rem; font-weight: 500; }

    input, textarea {
        width: 100%;
        padding: 14px 18px;
        border-radius: 12px;
        border: 1px solid rgba(186, 104, 200, 0.2);
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        font-size: 1rem;
        transition: 0.3s;
    }

    input:focus, textarea:focus {
        outline: none;
        border-color: #ba68c8;
        background: rgba(186, 104, 200, 0.1);
        box-shadow: 0 0 15px rgba(186, 104, 200, 0.2);
    }

    /* BUTTON */
    .contact-btn {
        display: block;
        width: fit-content;
        min-width: 200px;
        margin: 10px auto 0;
        background: #ba68c8;
        color: #000;
        padding: 16px 45px;
        font-size: 1.1rem;
        font-weight: 800;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .contact-btn:hover {
        transform: translateY(-3px);
        background: #e1bee7;
        box-shadow: 0 10px 25px rgba(186, 104, 200, 0.4);
    }

    /* --- RESPONSIVE BREAKPOINTS --- */

    /* For Tablets and small Laptops */
    @media (max-width: 1024px) {
        .contact-container {
            grid-template-columns: 1fr; /* Stack side by side items */
            gap: 30px;
        }
        .contact-info, .contact-form-wrapper {
            padding: 40px;
        }
    }

    /* For Mobile Phones */
    @media (max-width: 768px) {
        .grid-2 {
            grid-template-columns: 1fr; /* Stack form inputs */
            gap: 0;
        }
        .grid-2 .form-group:first-child {
            margin-bottom: 25px;
        }
        .contact-hero { padding: 60px 20px; }
        .contact-section { padding: 20px 5% 60px; }
        .contact-btn { width: 100%; } /* Full width button on mobile */
    }

    @media (max-width: 480px) {
        .contact-info, .contact-form-wrapper {
            padding: 25px 20px;
            border-radius: 25px;
        }
        .method-icon {
            width: 55px;
            height: 55px;
            font-size: 1.5rem;
        }
        .method-content h4 { font-size: 1.1rem; }
    }
</style>
@endpush
