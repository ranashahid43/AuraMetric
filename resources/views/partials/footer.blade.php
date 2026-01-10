<footer class="site-footer">
  <div class="footer-container">
    
    <div class="footer-column brand-col">
      <a href="/" class="footer-logo">
        <img src="{{ asset('immage/AuraMetric.png') }}" alt="AuraMetric Logo" class="flipping-footer-logo">
        
        <div class="brand-wrapper">
          <span class="brand-main-text">AuraMetric</span>
          <div class="brand-sub-row">
            <div class="brand-line"></div>
            <span class="brand-sub-text">Solution</span>
            <div class="brand-line"></div>
          </div>
        </div>
      </a>
    </div>

    <div class="footer-column">
      <h4 class="footer-title">{{ __('messages.footer_navigation') }}</h4>
      <ul class="footer-links">
        <li><a href="/">&raquo; {{ __('messages.footer_home') }}</a></li>
        <li><a href="/services">&raquo; {{ __('messages.footer_services') }}</a></li>
        <li><a href="/about">&raquo; {{ __('messages.footer_about') }}</a></li>
        <li><a href="/careers">&raquo; {{ __('messages.footer_careers') }}</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h4 class="footer-title">{{ __('messages.footer_services') }}</h4>
      <ul class="footer-links">
        <li><a href="/services#manual">&raquo; {{ __('messages.footer_manual_testing') }}</a></li>
        <li><a href="/services#automation">&raquo; {{ __('messages.footer_automation_testing') }}</a></li>
        <li><a href="/services#ai-ml">&raquo; {{ __('messages.footer_ai_ml_testing') }}</a></li>
        <li><a href="/services#security">&raquo; {{ __('messages.footer_security_testing') }}</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h4 class="footer-title">{{ __('messages.footer_contact') }}</h4>
      <p class="footer-email"><a href="mailto:info@aurametric.com">info@aurametric.com</a></p>
      <div class="social-grid">
        <a href="https://www.facebook.com/profile.php?id=61585810258737" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/aurametricsoloution" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.com/company/110899027" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://youtube.com/@aurametric" target="_blank"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    <p>{{ __('messages.footer_copyright', ['year' => date('Y')]) }}</p>
  </div>
</footer>

<style>
  /* 1. Global Reset & Fonts */
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,600&family=Poppins:wght@400;600;800&display=swap');

  .site-footer {
    background: linear-gradient(135deg, #4a148c, #7b1fa2, #9c27b0);
    padding: 60px 5% 20px;
    color: #ffffff;
    width: 100%;
    position: relative;
    border-top: 1px solid rgba(186, 104, 200, 0.3);
  }

  .footer-container {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
    gap: 40px;
  }

  /* 2. UPDATED LOGO & BRANDING (Matching Header) */
  .footer-logo {
    display: flex;
    align-items: center;
    text-decoration: none;
    gap: 15px;
    perspective: 1000px;
  }

  .flipping-footer-logo {
    height: 70px; /* Slightly larger for footer */
    width: auto;
    filter: drop-shadow(0 0 15px rgba(0, 212, 255, 0.4));
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d;
  }

  .footer-logo:hover .flipping-footer-logo { 
    transform: rotateY(360deg); 
  }

  .brand-wrapper {
    display: flex;
    flex-direction: column;
  }

  .brand-main-text {
    font-family: 'Cormorant Garamond', serif;
    font-style: italic;
    font-weight: 600;
    font-size: 2.2rem; 
    line-height: 0.9;
    background: linear-gradient(45deg, #00d4ff, #ffffff, #00d4ff);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 3s linear infinite;
  }

  @keyframes shine {
    to { background-position: 200% center; }
  }

  .brand-sub-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 4px;
  }

  .brand-line {
    height: 1.5px;
    width: 20px;
    background-color: #00d4ff;
    box-shadow: 0 0 10px rgba(0, 212, 255, 0.8);
  }

  .brand-sub-text {
    font-family: Arial, sans-serif;
    letter-spacing: 0.4em;
    font-size: 10px;
    text-transform: uppercase;
    font-weight: 800;
    color: #00d4ff;
  }

  /* 3. Footer Content Styles */
  .footer-title {
    font-size: 1.2rem;
    margin-bottom: 25px;
    text-shadow: 0 0 8px rgba(186, 104, 200, 0.6);
  }

  .footer-links { list-style: none; padding: 0; }
  .footer-links li { margin-bottom: 12px; }
  .footer-links a {
    color: #e0e0e0;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
  }

  .footer-links a:hover {
    color: #00d4ff;
    transform: translateX(8px);
  }

  .footer-email a {
    color: #e0e0e0;
    text-decoration: none;
    transition: 0.3s;
  }

  .footer-email a:hover { color: #00d4ff; }

  .social-grid { display: flex; gap: 15px; margin-top: 20px; }
  .social-grid a {
    font-size: 1.5rem;
    color: #00d4ff;
    background: rgba(255, 255, 255, 0.1);
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: 0.3s;
  }

  .social-grid a:hover {
    transform: scale(1.2) translateY(-5px);
    background: #00d4ff;
    color: #4a148c;
    box-shadow: 0 0 15px rgba(0, 212, 255, 0.8);
  }

  .footer-bottom {
    text-align: center;
    margin-top: 50px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.6);
  }

  /* Responsive Fixes */
  @media (max-width: 1024px) {
    .footer-container { grid-template-columns: 1fr 1fr; }
  }

  @media (max-width: 600px) {
    .footer-container { grid-template-columns: 1fr; text-align: center; }
    .brand-col { display: flex; flex-direction: column; align-items: center; }
    .footer-logo { flex-direction: column; }
    .brand-sub-row { justify-content: center; }
    .social-grid { justify-content: center; }
  }
</style>
