@extends('layouts.app')

@section('title', __('messages.success_title') . ' | The Testing Tech')

@section('content')

<!-- HERO-STYLE SUCCESS SECTION -->
<section class="success-hero" style="min-height: 100vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), #2da9ff; display: flex; align-items: center; justify-content: center;">
  <div class="success-container glass">
    
    <div class="success-icon">
      <i class="fa-solid fa-paper-plane"></i>
    </div>

    <h1>
      {!! __('messages.success_heading') !!}
    </h1>

    <p>
      {{ __('messages.success_message') }}
    </p>

    <a href="/" class="btn learn-more-btn">
      {{ __('messages.success_back_home') }}
    </a>

  </div>
</section>

</main>

@push('styles')
<style>
  .success-container {
    max-width: 800px;
    width: 90%;
    padding: 80px 60px;
    border-radius: 50px;
    text-align: center;
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 30px 80px rgba(0,0,0,0.6);
    transition: all 0.6s ease;
  }

  .success-container:hover {
    transform: translateY(-20px);
    box-shadow: 0 50px 100px rgba(45,169,255,0.3);
  }

  .success-icon {
    font-size: 6rem;
    color: #2da9ff;
    margin-bottom: 50px;
    background: rgba(45,169,255,0.15);
    width: 160px;
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 4px solid rgba(45,169,255,0.3);
    box-shadow: 0 0 40px rgba(45,169,255,0.4);
    animation: float 4s ease-in-out infinite;
    transition: all 0.4s ease;
  }

  .success-container:hover .success-icon {
    transform: scale(1.1);
    box-shadow: 0 0 60px rgba(45,169,255,0.6);
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
  }

  /* Pulse glow effect retained for extra glamour */
  @keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(45, 169, 255, 0.4); }
    70% { box-shadow: 0 0 0 30px rgba(45, 169, 255, 0); }
    100% { box-shadow: 0 0 0 0 rgba(45, 169, 255, 0); }
  }

  .success-icon {
    animation: float 4s ease-in-out infinite, pulse 2s infinite;
  }

  .success-container h1 {
    font-size: 4.5rem;
    margin-bottom: 40px;
    color: #fff;
  }

  .success-container h1 span {
    background: linear-gradient(135deg, #2da9ff, #7ed3ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 900;
  }

  .success-container p {
    font-size: 1.5rem;
    color: #ccc;
    line-height: 1.8;
    max-width: 700px;
    margin: 0 auto 60px;
  }

  .btn.learn-more-btn {
    background: transparent;
    color: #2da9ff;
    border: 3px solid #2da9ff;
    padding: 20px 80px;
    font-size: 1.6rem;
    font-weight: bold;
    border-radius: 50px;
    transition: all 0.5s ease;
    box-shadow: 0 10px 30px rgba(45,169,255,0.3);
  }

  .btn.learn-more-btn:hover {
    background: #2da9ff;
    color: #000;
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(45,169,255,0.6);
  }

  @media (max-width: 992px) {
    .success-container {
      padding: 60px 40px;
      border-radius: 40px;
    }
    .success-container h1 {
      font-size: 3.8rem;
    }
    .success-container p {
      font-size: 1.3rem;
    }
    .success-icon {
      font-size: 5rem;
      width: 140px;
      height: 140px;
    }
  }

  @media (max-width: 768px) {
    .success-container {
      padding: 50px 30px;
      border-radius: 30px;
    }
    .success-container h1 {
      font-size: 3rem;
    }
    .success-container p {
      font-size: 1.2rem;
    }
    .btn.learn-more-btn {
      padding: 18px 60px;
      font-size: 1.4rem;
    }
  }
</style>
@endpush

@endsection