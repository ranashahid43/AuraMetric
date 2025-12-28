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
          <p><a href="tel:+393510388324">(+39) 351 038 8324</a></p>
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

      @if($errors->any())
        <div class="error-message">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
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
    min-height: 45vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    text-align: center;
  }

  .contact-hero h1 {
    font-size: clamp(2.5rem, 6vw, 3.8rem);
    font-weight: 800;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
  }

  .contact-hero p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
  }

  /* LAYOUT */
  .contact-section {
    padding: 80px 5%;
    max-width: 1600px;
    margin: 0 auto;
  }

  .contact-container {
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 60px;
    align-items: stretch;
    margin-bottom: 100px;
  }

  /* GLASS CARDS */
  .contact-info, .contact-form-wrapper {
    padding: 60px;
    border-radius: 40px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
  }

  .contact-info:hover, .contact-form-wrapper:hover {
    transform: translateY(-15px);
    border-color: rgba(186, 104, 200, 0.5);
    background: rgba(255, 255, 255, 0.05);
  }

  .contact-info h2 {
    font-size: 2.8rem;
    margin-bottom: 40px;
    background: linear-gradient(135deg, #fff, #ba68c8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  /* FLIPPING ICON LOGIC */
  .contact-method {
    display: flex;
    align-items: center;
    gap: 25px;
    margin-bottom: 30px;
    padding: 25px;
    border-radius: 24px;
    background: rgba(186, 104, 200, 0.05);
    border: 1px solid rgba(186, 104, 200, 0.1);
    transition: 0.4s ease;
  }

  .method-icon {
    font-size: 2.2rem;
    color: #ba68c8;
    background: rgba(186, 104, 200, 0.1);
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    flex-shrink: 0;
    transition: 0.6s ease; /* Transition for flip */
  }

  .contact-method:hover .method-icon {
    transform: rotateY(180deg); /* Flip like About Page */
    background: rgba(186, 104, 200, 0.25);
  }

  .method-content h4 { font-size: 1.4rem; color: #fff; margin-bottom: 5px; }
  .method-content p, .method-content a { color: rgba(255, 255, 255, 0.6); text-decoration: none; font-size: 1.1rem; }
  .method-content a:hover { color: #ba68c8; }

  /* FORM GROUP SPACING */
  .form-group {
    margin-bottom: 30px; /* Equal vertical gap for all groups */
  }

  .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px; /* Side-to-side gap for desktop */
  }

  .form-group label {
    display: block;
    color: #fff;
    margin-bottom: 10px;
    font-size: 1.1rem;
    font-weight: 500;
  }

  input, textarea {
    width: 100%;
    padding: 16px;
    border-radius: 15px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    background: rgba(255, 255, 255, 0.05);
    color: #fff;
    font-size: 1.05rem;
    transition: 0.3s;
  }

  input:focus, textarea:focus {
    outline: none;
    border-color: #ba68c8;
    background: rgba(186, 104, 200, 0.1);
    box-shadow: 0 0 20px rgba(186, 104, 200, 0.2);
  }

  /* BUTTON */
  .contact-btn {
    display: block;
    margin: 20px auto 0;
    background: #ba68c8;
    color: #000;
    padding: 18px 60px;
    font-size: 1.2rem;
    font-weight: 800;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(186, 104, 200, 0.3);
    transition: all 0.4s ease;
  }

  .contact-btn:hover {
    transform: translateY(-5px);
    background: #e1bee7;
    box-shadow: 0 20px 40px rgba(186, 104, 200, 0.5);
  }

  .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); }

  /* FULLY RESPONSIVE BREAKPOINTS */
  @media (max-width: 1024px) {
    .contact-container { grid-template-columns: 1fr; }
    .contact-info, .contact-form-wrapper { padding: 40px; }
  }

  @media (max-width: 768px) {
    .grid-2 {
      grid-template-columns: 1fr; /* Stack inputs on mobile */
      gap: 0; /* Reset grid gap to use the form-group margin for equal spacing */
    }
    
    .contact-section { padding: 40px 5%; }
    .contact-info h2 { font-size: 2.2rem; }
    
    /* Ensure the vertical space between name fields and email fields is exactly 30px */
    .grid-2 .form-group:first-child {
      margin-bottom: 30px; 
    }
  }

  @media (max-width: 480px) {
    .contact-hero h1 { font-size: 2.3rem; }
    .contact-info, .contact-form-wrapper { padding: 30px 20px; border-radius: 30px; }
    .contact-method { padding: 20px; }
    .contact-btn { width: 100%; padding: 16px 20px; }
  }
</style>
@endpush
