@extends('layouts.app')

@section('title', __('messages.contact_title') . ' | AuraMetric')

@section('content')

<!-- HERO SECTION -->
<section class="hero" style="min-height: 40vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), #2da9ff;">
  <div class="hero-content">
    <h1 style="background: linear-gradient(135deg, #2da9ff, #7ed3ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 3.2rem; font-weight: 800;">
      {!! __('messages.contact_hero_title') !!}
    </h1>
    <p style="color: #fff; font-size: 1.2rem; max-width: 800px; margin: 20px auto 0;">
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

    @if($errors->any())
      <div class="error-message">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
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

@endsection

@push('styles')
<style>
  .hero-content {
    text-align: center;
    padding: 80px 20px;
  }

  .contact-container {
    max-width: 1400px;
    margin: 100px auto;
    padding: 0 5%;
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 80px;
    align-items: stretch;
  }

  .contact-info, .contact-form-wrapper {
    border-radius: 30px;
    padding: 50px;
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
    transition: all 0.5s ease;
  }

  .contact-info:hover, .contact-form-wrapper:hover {
    transform: translateY(-15px);
    box-shadow: 0 30px 70px rgba(45, 169, 255, 0.25);
  }

  .contact-info h2 {
    font-size: 2.2rem;
    margin-bottom: 40px;
    text-align: center;
    color: #fff;
  }

  .contact-method {
    display: flex;
    align-items: center;
    gap: 25px;
    margin-bottom: 35px;
    padding: 20px;
    border-radius: 20px;
    background: rgba(255,255,255,0.05);
    transition: all 0.4s ease;
  }

  .contact-method:hover {
    transform: translateX(10px);
    background: rgba(45,169,255,0.1);
  }

  .method-icon {
    font-size: 2.4rem;
    color: #2da9ff;
    background: rgba(45,169,255,0.15);
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 2px solid rgba(45,169,255,0.3);
    flex-shrink: 0;
    transition: all 0.4s ease;
  }

  .contact-method:hover .method-icon {
    background: rgba(45,169,255,0.25);
    transform: scale(1.1);
  }

  .method-content h4 {
    font-size: 1.3rem;
    margin-bottom: 8px;
    color: #fff;
  }

  .method-content p {
    font-size: 1.05rem;
    color: #ccc;
    margin: 0;
  }

  .method-content a {
    color: #2da9ff;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .method-content a:hover {
    color: #fff;
  }

  .contact-form-wrapper form {
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .form-group {
    margin-bottom: 25px;
  }

  .form-group label {
    display: block;
    font-size: 1.15rem;
    margin-bottom: 10px;
    color: #fff;
    font-weight: 500;
  }

  input, textarea {
    width: 100%;
    padding: 16px;
    border-radius: 12px;
    border: 2px solid rgba(45,169,255,0.3);
    background: rgba(255,255,255,0.05);
    color: #fff;
    font-size: 1.05rem;
    transition: all 0.3s ease;
  }

  input:focus, textarea:focus {
    outline: none;
    border-color: #2da9ff;
    background: rgba(45,169,255,0.1);
    box-shadow: 0 0 15px rgba(45,169,255,0.3);
  }

  input::placeholder, textarea::placeholder {
    color: #aaa;
  }

  .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 10px;
  }

  .success-message {
    background: rgba(0, 200, 83, 0.2);
    border: 1px solid rgba(0, 200, 83, 0.4);
    color: #fff;
    padding: 18px;
    border-radius: 12px;
    text-align: center;
    font-size: 1.1rem;
    margin-bottom: 30px;
  }

  .error-message {
    background: rgba(255, 107, 107, 0.2);
    border: 1px solid rgba(255, 107, 107, 0.4);
    color: #ff6b6b;
    padding: 18px;
    border-radius: 12px;
    margin-bottom: 30px;
  }

  .error-message ul {
    margin: 0;
    padding-left: 20px;
  }

  .error {
    color: #ff6b6b;
    font-size: 0.9rem;
    margin-top: 6px;
    display: block;
  }

  button.learn-more-btn {
    margin-top: auto;
    align-self: center;
    background: #2da9ff;
    color: #000;
    padding: 16px 50px;
    font-size: 1.2rem;
    font-weight: bold;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 10px 25px rgba(45,169,255,0.4);
    transition: all 0.4s ease;
  }

  button.learn-more-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(45,169,255,0.6);
    background: #7ed3ff;
  }

  /* Fully Responsive Design */
  @media (max-width: 1200px) {
    .contact-container {
      gap: 60px;
    }
    .contact-info, .contact-form-wrapper {
      padding: 45px;
    }
  }

  @media (max-width: 992px) {
    .contact-container {
      grid-template-columns: 1fr;
      gap: 50px;
    }
    .grid-2 {
      grid-template-columns: 1fr;
      gap: 25px;
    }
    .contact-info h2 {
      font-size: 2rem;
    }
  }

  @media (max-width: 768px) {
    .contact-container {
      margin: 60px auto;
      padding: 0 5%;
    }
    .contact-info, .contact-form-wrapper {
      padding: 40px 30px;
      border-radius: 25px;
    }
    .contact-method {
      flex-direction: column;
      text-align: center;
      padding: 20px;
      gap: 15px;
    }
    .method-icon {
      width: 70px;
      height: 70px;
      font-size: 2.2rem;
    }
    .method-content h4 {
      font-size: 1.2rem;
    }
    .method-content p {
      font-size: 1rem;
    }
    .contact-info h2 {
      font-size: 1.9rem;
      margin-bottom: 30px;
    }
    button.learn-more-btn {
      padding: 14px 40px;
      font-size: 1.1rem;
    }
  }

  @media (max-width: 480px) {
    .hero-content {
      padding: 60px 15px;
    }
    .hero-content h1 {
      font-size: 2.6rem;
    }
    .contact-info, .contact-form-wrapper {
      padding: 35px 25px;
    }
    .contact-method {
      padding: 15px;
    }
    input, textarea {
      padding: 14px;
      font-size: 1rem;
    }
    .form-group label {
      font-size: 1.1rem;
    }
  }
</style>
@endpush
