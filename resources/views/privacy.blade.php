@extends('layouts.app')

@section('title', __('messages.privacy_title') . ' | AuraMetric')
@section('meta_description', __('messages.privacy_meta_description'))

@section('content')

<section class="hero legal-hero">
  <div class="hero-content">
    <h1>{{ __('messages.privacy_heading') }}</h1>
    <p>{{ __('messages.privacy_last_updated', ['date' => 'December 28, 2025']) }}</p>
  </div>
</section>

<main class="legal-section">
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

    <section class="privacy-section contact-details-section">
      <h2>{{ __('messages.privacy_section_12_title') }}</h2>
      <p>{{ __('messages.privacy_contact_intro') }}</p>
      <div class="contact-details-box">
        <p><strong>{{ __('messages.privacy_email') }}:</strong> <a href="mailto:privacy@aurametric.com">privacy@aurametric.com</a></p>
        <p><strong>{{ __('messages.privacy_address') }}:</strong> {{ __('messages.privacy_address_value') }}</p>
      </div>
    </section>

    <p class="copyright">{{ __('messages.privacy_copyright', ['year' => '2025']) }}</p>
  </div>
</main>

@endsection

@push('styles')
<style>
  /* HERO SECTION - CONSISTENT WITH ABOUT/CONTACT */
  .legal-hero {
    min-height: 45vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    text-align: center;
  }

  .legal-hero h1 {
    font-size: clamp(2.5rem, 6vw, 3.8rem);
    font-weight: 800;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
  }

  .legal-hero p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 1.1rem;
  }

  /* MAIN CONTENT LAYOUT */
  .legal-section {
    padding: 80px 5%;
    max-width: 1400px;
    margin: 0 auto;
  }

  .legal-content {
    border-radius: 40px;
    padding: 80px;
    border: 1px solid rgba(186, 104, 200, 0.2);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
  }

  .legal-content:hover {
    transform: translateY(-10px);
    border-color: rgba(186, 104, 200, 0.4);
    background: rgba(255, 255, 255, 0.04);
  }

  .intro-text {
    font-size: 1.3rem;
    line-height: 1.9;
    color: rgba(255, 255, 255, 0.8);
    text-align: center;
    margin-bottom: 80px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
  }

  /* SECTION HEADINGS - MATCHING ABOUT PAGE CHAIRMAN BOX STYLE */
  .privacy-section {
    margin-bottom: 80px;
  }

  .privacy-section h2 {
    font-size: 2.2rem;
    margin-bottom: 30px;
    background: linear-gradient(135deg, #fff, #ba68c8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    position: relative;
    padding-bottom: 15px;
  }

  .privacy-section h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 60px;
    height: 4px;
    background: #ba68c8;
    border-radius: 10px;
  }

  .privacy-section p {
    font-size: 1.15rem;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 25px;
  }

  .privacy-section ul {
    list-style: none;
    padding-left: 0;
  }

  .privacy-section li {
    font-size: 1.1rem;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 15px;
    padding-left: 25px;
    position: relative;
  }

  .privacy-section li::before {
    content: '•';
    color: #ba68c8;
    font-size: 1.8rem;
    position: absolute;
    left: 0;
    top: -5px;
  }

  .privacy-section strong {
    color: #fff;
    font-weight: 600;
  }

  /* CONTACT DETAILS BOX */
  .contact-details-box {
    background: rgba(186, 104, 200, 0.05);
    padding: 30px;
    border-radius: 20px;
    border: 1px solid rgba(186, 104, 200, 0.1);
  }

  .contact-details-box a {
    color: #ba68c8;
    text-decoration: none;
    transition: 0.3s;
  }

  .contact-details-box a:hover {
    color: #fff;
  }

  .copyright {
    text-align: center;
    color: rgba(255, 255, 255, 0.4);
    margin-top: 80px;
    padding-top: 40px;
    border-top: 1px solid rgba(186, 104, 200, 0.1);
  }

  .glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
  }

  /* RESPONSIVE */
  @media (max-width: 992px) {
    .legal-content { padding: 50px 30px; }
    .privacy-section h2 { font-size: 1.8rem; }
  }

  @media (max-width: 480px) {
    .legal-hero h1 { font-size: 2.2rem; }
    .legal-section { padding: 40px 5%; }
  }
</style>
@endpush
