@extends('layouts.app')

@section('title', __('messages.contact_title') . ' | The Testing Tech')

@section('content')

<!-- HERO SECTION -->
<section class="hero" style="min-height: 40vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), #2da9ff;">
  <div class="hero-content">
    <h1>
      {!! __('messages.contact_hero_title') !!}
    </h1>
    <p>
      {{ __('messages.contact_hero_subtitle') }}
    </p>
  </div>
</section>

<!-- MAIN CONTACT CONTENT -->
<main class="contact-container">

  <!-- Contact Info -->
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

  <!-- Contact Form -->
  <div class="contact-form-wrapper glass">
    
    @if(session('success'))
      <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
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

      <button type="submit" class="btn learn-more-btn">
        {{ __('messages.contact_send_button') }}
      </button>
    </form>
  </div>

</main>

@push('styles')
<style>
  .contact-container {
    max-width: 1400px;
    margin: 100px auto;
    padding: 0 5%;
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 80px;
    align-items: stretch; /* Makes both cards the same height */
  }

  .contact-info, .contact-form-wrapper {
    border-radius: 40px;
    padding: 50px 60px; /* Reduced vertical padding slightly to balance height */
    position: relative;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: flex;
    flex-direction: column;
  }

  .contact-info:hover, .contact-form-wrapper:hover {
    transform: translateY(-15px);
    box-shadow: 0 30px 70px rgba(45, 169, 255, 0.25);
  }

  /* Smaller overall content in Get in Touch */
  .contact-info h2 {
    font-size: 2.1rem; /* Smaller title */
    margin-bottom: 40px;
    text-align: center;
    color: #fff;
  }

  .contact-method {
    display: flex;
    align-items: center;
    gap: 25px;
    margin-bottom: 35px;
    padding: 25px;
    border-radius: 25px;
    background: rgba(255,255,255,0.05);
    transition: all 0.4s ease;
  }

  .contact-method:hover {
    transform: translateX(15px);
    background: rgba(45,169,255,0.1);
    border-left: 5px solid #2da9ff;
  }

  .method-icon {
    font-size: 2.6rem; /* Slightly smaller icon */
    color: #2da9ff;
    background: rgba(45,169,255,0.15);
    width: 85px;
    height: 85px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 3px solid rgba(45,169,255,0.3);
    flex-shrink: 0;
    transition: all 0.4s ease;
  }

  .contact-method:hover .method-icon {
    background: rgba(45,169,255,0.25);
    transform: scale(1.1);
    box-shadow: 0 0 30px rgba(45,169,255,0.4);
  }

  .method-content {
    flex: 1;
  }

  .method-content h4 {
    font-size: 1.3rem; /* Smaller section titles */
    margin-bottom: 8px;
    color: #fff;
  }

  .method-content p {
    font-size: 1.0rem; /* Smaller text → email fits perfectly on one line */
    color: #ccc;
    margin: 0;
  }

  .email-link {
    font-size: 1.0rem;
  }

  .method-content a {
    color: #2da9ff;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .method-content a:hover {
    color: #fff;
  }

  /* Form side remains balanced */
  .contact-form-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .form-group {
    margin-bottom: 30px;
  }

  .form-group label {
    display: block;
    font-size: 1.2rem;
    margin-bottom: 12px;
    color: #fff;
    font-weight: 500;
  }

  input, textarea {
    width: 100%;
    padding: 18px;
    border-radius: 15px;
    border: 2px solid rgba(45,169,255,0.3);
    background: rgba(255,255,255,0.05);
    color: #fff;
    font-size: 1.1rem;
    transition: all 0.4s ease;
  }

  input:focus, textarea:focus {
    outline: none;
    border-color: #2da9ff;
    background: rgba(45,169,255,0.1);
    box-shadow: 0 0 20px rgba(45,169,255,0.3);
  }

  input::placeholder, textarea::placeholder {
    color: #aaa;
  }

  .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
  }

  .success-message {
    background: rgba(0, 200, 83, 0.2);
    border: 1px solid rgba(0, 200, 83, 0.4);
    color: #fff;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    font-size: 1.2rem;
    margin-bottom: 40px;
  }

  button.learn-more-btn {
    display: block;
    margin: 40px auto 0;
    background: #2da9ff;
    color: #000;
    padding: 20px 70px;
    font-size: 1.4rem;
    font-weight: bold;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(45,169,255,0.4);
    transition: all 0.4s ease;
  }

  button.learn-more-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(45,169,255,0.6);
    background: #7ed3ff;
  }

  .error {
    color: #ff6b6b;
    font-size: 0.9rem;
    margin-top: 8px;
    display: block;
  }

  @media (max-width: 992px) {
    .contact-container {
      grid-template-columns: 1fr;
      gap: 60px;
    }
    .grid-2 {
      grid-template-columns: 1fr;
    }
    .contact-method {
      flex-direction: column;
      text-align: center;
    }
    .method-icon {
      margin-bottom: 20px;
      width: 80px;
      height: 80px;
      font-size: 2.4rem;
    }
    .contact-info h2 {
      font-size: 2rem;
    }
  }
</style>
@endpush

@endsection