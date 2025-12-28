@extends('layouts.app')

@section('title', __('messages.privacy_title') . ' | The Testing Tech')
@section('meta_description', __('messages.privacy_meta_description'))

@section('content')

<!-- HERO SECTION - Consistent with other pages -->
<section class="hero" style="min-height: 40vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), #2da9ff;">
  <div class="hero-content">
    <h1>
      {{ __('messages.privacy_heading') }}
    </h1>
    <p>
      {{ __('messages.privacy_last_updated', ['date' => 'December 27, 2025']) }}
    </p>
  </div>
</section>

<!-- MAIN PRIVACY CONTENT -->
<main class="legal-container">
  <div class="legal-content glass">
    
    <p class="intro-text">{{ __('messages.privacy_intro') }}</p>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_1_title') }}</h2>
      <ul>
        <li><strong>{{ __('messages.privacy_personal_info') }}:</strong> {{ __('messages.privacy_personal_info_desc') }}</li>
        <li><strong>{{ __('messages.privacy_technical_info') }}:</strong> {{ __('messages.privacy_technical_info_desc') }}</li>
        <li><strong>{{ __('messages.privacy_usage_data') }}:</strong> {{ __('messages.privacy_usage_data_desc') }}</li>
        <li><strong>{{ __('messages.privacy_cookies_tracking') }}:</strong> {{ __('messages.privacy_cookies_tracking_desc') }}</li>
      </ul>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_2_title') }}</h2>
      <ul>
        <li>{{ __('messages.privacy_use_1') }}</li>
        <li>{{ __('messages.privacy_use_2') }}</li>
        <li>{{ __('messages.privacy_use_3') }}</li>
        <li>{{ __('messages.privacy_use_4') }}</li>
        <li>{{ __('messages.privacy_use_5') }}</li>
      </ul>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_3_title') }}</h2>
      <p>{{ __('messages.privacy_legal_basis_intro') }}</p>
      <ul>
        <li>{{ __('messages.privacy_basis_1') }}</li>
        <li>{{ __('messages.privacy_basis_2') }}</li>
        <li>{{ __('messages.privacy_basis_3') }}</li>
        <li>{{ __('messages.privacy_basis_4') }}</li>
      </ul>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_4_title') }}</h2>
      <p>{{ __('messages.privacy_sharing_intro') }}</p>
      <ul>
        <li>{{ __('messages.privacy_sharing_1') }}</li>
        <li>{{ __('messages.privacy_sharing_2') }}</li>
        <li>{{ __('messages.privacy_sharing_3') }}</li>
      </ul>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_5_title') }}</h2>
      <p>{{ __('messages.privacy_retention') }}</p>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_6_title') }}</h2>
      <p>{{ __('messages.privacy_rights_intro') }}</p>
      <ul>
        <li>{{ __('messages.privacy_right_1') }}</li>
        <li>{{ __('messages.privacy_right_2') }}</li>
        <li>{{ __('messages.privacy_right_3') }}</li>
        <li>{{ __('messages.privacy_right_4') }}</li>
        <li>{{ __('messages.privacy_right_5') }}</li>
        <li>{{ __('messages.privacy_right_6') }}</li>
      </ul>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_7_title') }}</h2>
      <p>{{ __('messages.privacy_cookies_section') }}</p>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_8_title') }}</h2>
      <p>{{ __('messages.privacy_security') }}</p>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_9_title') }}</h2>
      <p>{{ __('messages.privacy_third_party') }}</p>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_10_title') }}</h2>
      <p>{{ __('messages.privacy_transfers') }}</p>
    </section>

    <section class="privacy-section">
      <h2>{{ __('messages.privacy_section_11_title') }}</h2>
      <p>{{ __('messages.privacy_updates') }}</p>
    </section>

    <section class="privacy-section contact-section">
      <h2>{{ __('messages.privacy_section_12_title') }}</h2>
      <p>{{ __('messages.privacy_contact_intro') }}</p>
      <div class="contact-details">
        <p><strong>{{ __('messages.privacy_email') }}:</strong> <a href="mailto:privacy@thetestingtech.com">privacy@thetestingtech.com</a></p>
        <p><strong>{{ __('messages.privacy_address') }}:</strong> {{ __('messages.privacy_address_value') }}</p>
      </div>
    </section>

    <p class="copyright">{{ __('messages.privacy_copyright', ['year' => '2025']) }}</p>
  </div>
</main>

@push('styles')
<style>
  .legal-container {
    padding: 100px 5%;
    max-width: 1200px;
    margin: 0 auto;
  }

  .legal-content {
    border-radius: 50px;
    padding: 80px 100px;
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 30px 80px rgba(0,0,0,0.6);
    transition: all 0.5s ease;
  }

  .legal-content:hover {
    transform: translateY(-15px);
    box-shadow: 0 50px 100px rgba(45,169,255,0.2);
  }

  .intro-text {
    font-size: 1.3rem;
    line-height: 1.9;
    color: #ccc;
    text-align: center;
    margin-bottom: 80px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
  }

  .privacy-section {
    margin-bottom: 80px;
  }

  .privacy-section h2 {
    font-size: 2.6rem;
    color: #fff;
    margin-bottom: 30px;
    position: relative;
    padding-bottom: 15px;
  }

  .privacy-section h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100px;
    height: 5px;
    background: linear-gradient(90deg, #2da9ff, #7ed3ff);
    border-radius: 3px;
  }

  .privacy-section p {
    font-size: 1.2rem;
    line-height: 1.9;
    color: #ddd;
    margin-bottom: 25px;
  }

  .privacy-section ul {
    padding-left: 30px;
    margin-bottom: 25px;
  }

  .privacy-section li {
    font-size: 1.15rem;
    line-height: 1.8;
    color: #ccc;
    margin-bottom: 18px;
    position: relative;
    padding-left: 15px;
  }

  .privacy-section li::before {
    content: '•';
    color: #2da9ff;
    font-size: 1.5rem;
    position: absolute;
    left: -15px;
    top: -2px;
  }

  .privacy-section li strong {
    color: #fff;
  }

  .contact-section .contact-details p {
    font-size: 1.3rem;
    margin-bottom: 20px;
  }

  .contact-section a {
    color: #2da9ff;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .contact-section a:hover {
    color: #fff;
    text-decoration: underline;
  }

  .copyright {
    text-align: center;
    font-size: 1rem;
    color: #aaa;
    margin-top: 100px;
    padding-top: 40px;
    border-top: 1px solid rgba(255,255,255,0.1);
  }

  @media (max-width: 992px) {
    .legal-content {
      padding: 60px 50px;
      border-radius: 40px;
    }
    .privacy-section h2 {
      font-size: 2.3rem;
    }
    .intro-text {
      font-size: 1.2rem;
    }
  }

  @media (max-width: 768px) {
    .legal-content {
      padding: 50px 30px;
      border-radius: 30px;
    }
    .privacy-section h2 {
      font-size: 2rem;
    }
    .privacy-section h2::after {
      width: 80px;
    }
    .intro-text, .privacy-section p, .privacy-section li {
      font-size: 1.1rem;
    }
    .contact-section .contact-details p {
      font-size: 1.2rem;
    }
  }
</style>
@endpush

@endsection