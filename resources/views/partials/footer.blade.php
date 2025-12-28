<footer class="site-footer">
  <div class="footer-container">
    
    <div class="footer-column brand-col">
      <a href="/" class="footer-logo">
        <svg width="80" height="80" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="footerGrad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="#6a1b9a" />
              <stop offset="50%" stop-color="#8e24aa" />
              <stop offset="100%" stop-color="#ba68c8" />
            </linearGradient>
            <filter id="footerGlow">
              <feGaussianBlur stdDeviation="5" result="coloredBlur"/>
              <feMerge>
                <feMergeNode in="coloredBlur"/>
                <feMergeNode in="SourceGraphic"/>
              </feMerge>
            </filter>
            <filter id="footerNeon">
              <feGaussianBlur stdDeviation="2.5" result="blur"/>
              <feComposite operator="out" in="blur" in2="SourceGraphic" result="inverse"/>
              <feFlood flood-color="#ba68c8" flood-opacity="1" result="color"/>
              <feComposite operator="in" in="color" in2="inverse" result="shadow"/>
              <feComposite operator="over" in="shadow" in2="SourceGraphic"/>
            </filter>
          </defs>
          <path d="M50 10 L90 35 L90 65 L50 90 L10 65 L10 35 Z" fill="none" stroke="url(#footerGrad)" stroke-width="10" filter="url(#footerNeon) url(#footerGlow)"/>
          <circle cx="50" cy="50" r="30" fill="none" stroke="url(#footerGrad)" stroke-width="6" filter="url(#footerNeon)"/>
          <text x="50" y="60" font-family="Poppins, sans-serif" font-size="36" font-weight="900" fill="url(#footerGrad)" text-anchor="middle" filter="url(#footerNeon) url(#footerGlow)">AM</text>
          <path d="M20 50 Q50 20 80 50 Q50 80 20 50" stroke="url(#footerGrad)" stroke-width="8" fill="none" stroke-linecap="round" filter="url(#footerNeon) url(#footerGlow)"/>
          <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="20s" repeatCount="indefinite"/>
        </svg>
        <span class="footer-logo-text">AuraMetric</span>
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
        <a href="https://facebook.com/aurametric" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://instagram.com/aurametric" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://linkedin.com/company/aurametric" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://youtube.com/@aurametric" target="_blank"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    <p>{{ __('messages.footer_copyright', ['year' => date('Y')]) }}</p>
  </div>
</footer>

<style>
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

  .footer-logo {
    display: flex;
    align-items: center;
    text-decoration: none;
    gap: 15px;
  }

  .footer-logo-text {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 1.8rem;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 10px rgba(186, 104, 200, 0.5);
  }

  .footer-title {
    font-size: 1.2rem;
    margin-bottom: 25px;
    text-shadow: 0 0 8px rgba(186, 104, 200, 0.6);
    position: relative;
  }

  .footer-links {
    list-style: none;
    padding: 0;
  }

  .footer-links li {
    margin-bottom: 12px;
  }

  .footer-links a {
    color: #e0e0e0;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
  }

  .footer-links a:hover {
    color: #ba68c8;
    transform: translateX(8px);
    text-shadow: 0 0 8px rgba(186, 104, 200, 0.4);
  }

  .footer-email a {
    color: #e0e0e0;
    text-decoration: none;
    font-size: 1rem;
    transition: 0.3s;
  }

  .footer-email a:hover { color: #ba68c8; }

  .social-grid {
    display: flex;
    gap: 15px;
    margin-top: 20px;
  }

  .social-grid a {
    font-size: 1.5rem;
    color: #ba68c8;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.1);
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
  }

  .social-grid a:hover {
    transform: scale(1.2) translateY(-5px);
    background: #ba68c8;
    color: #fff;
    box-shadow: 0 0 15px rgba(186, 104, 200, 0.8);
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
    .footer-container {
      grid-template-columns: 1fr 1fr;
    }
  }

  @media (max-width: 600px) {
    .footer-container {
      grid-template-columns: 1fr;
      text-align: center;
    }

    .footer-logo {
      justify-content: center;
      margin-bottom: 20px;
    }

    .footer-links a:hover {
      transform: translateY(-3px);
    }

    .social-grid {
      justify-content: center;
    }
  }
</style>
