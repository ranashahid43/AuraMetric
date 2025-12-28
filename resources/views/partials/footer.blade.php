<footer>
  <div class="footer-inner">
    <div class="footer-column">
      <a href="/" class="logo">
        <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="#6a1b9a" />
              <stop offset="50%" stop-color="#8e24aa" />
              <stop offset="100%" stop-color="#ba68c8" />
            </linearGradient>
            <filter id="glow">
              <feGaussianBlur stdDeviation="5" result="coloredBlur"/>
              <feMerge>
                <feMergeNode in="coloredBlur"/>
                <feMergeNode in="SourceGraphic"/>
              </feMerge>
            </filter>
            <filter id="neon">
              <feGaussianBlur stdDeviation="2.5" result="blur"/>
              <feComposite operator="out" in="blur" in2="SourceGraphic" result="inverse"/>
              <feFlood flood-color="#ba68c8" flood-opacity="1" result="color"/>
              <feComposite operator="in" in="color" in2="inverse" result="shadow"/>
              <feComposite operator="over" in="shadow" in2="SourceGraphic"/>
            </filter>
          </defs>
          <path d="M50 10 L90 35 L90 65 L50 90 L10 65 L10 35 Z" fill="none" stroke="url(#grad)" stroke-width="10" filter="url(#neon) url(#glow)"/>
          <circle cx="50" cy="50" r="30" fill="none" stroke="url(#grad)" stroke-width="6" filter="url(#neon)"/>
          <text x="50" y="60" font-family="Poppins, sans-serif" font-size="36" font-weight="900" fill="url(#grad)" text-anchor="middle" filter="url(#neon) url(#glow)">AM</text>
          <path d="M20 50 Q50 20 80 50 Q50 80 20 50" stroke="url(#grad)" stroke-width="8" fill="none" stroke-linecap="round" filter="url(#neon) url(#glow)"/>
          <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="20s" repeatCount="indefinite"/>
        </svg>
        <div class="logo-text">
          <div class="subtitle" style="background: linear-gradient(135deg, #6a1b9a, #ba68c8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold; text-shadow: 0 0 10px rgba(186, 104, 200, 0.7); font-size: 1.8rem;">
            AuraMetric
          </div>
        </div>
      </a>
    </div>

    <div class="footer-column">
      <h4 style="text-shadow: 0 0 8px rgba(186, 104, 200, 0.6); color: #ffffff;">{{ __('messages.footer_navigation') }}</h4>
      <ul>
        <li><a href="/" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_home') }}</a></li>
        <li><a href="/services" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_services') }}</a></li>
        <li><a href="/about" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_about') }}</a></li>
        <li><a href="/careers" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_careers') }}</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h4 style="text-shadow: 0 0 8px rgba(186, 104, 200, 0.6); color: #ffffff;">{{ __('messages.footer_services') }}</h4>
      <ul>
        <li><a href="/services#manual" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_manual_testing') }}</a></li>
        <li><a href="/services#automation" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_automation_testing') }}</a></li>
        <li><a href="/services#mobile-web" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_web_mobile_testing') }}</a></li>
        <li><a href="/services#ai-ml" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_ai_ml_testing') }}</a></li>
        <li><a href="/services#security" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_security_testing') }}</a></li>
        <li><a href="/services#performance" style="transition: all 0.3s ease; color: #e0e0e0;">&raquo; {{ __('messages.footer_performance_testing') }}</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h4 style="text-shadow: 0 0 8px rgba(186, 104, 200, 0.6); color: #ffffff;">{{ __('messages.footer_contact') }}</h4>
      <p style="font-size: 0.9rem; color: #e0e0e0; margin-bottom: 15px;">
        <a href="mailto:info@aurametric.com" style="color: #e0e0e0; text-decoration: none; transition: color 0.3s ease; text-shadow: 0 0 5px rgba(186, 104, 200, 0.4);">
          info@aurametric.com
        </a>
      </p>
      <div class="social-links" style="display: flex; gap: 20px; font-size: 1.8rem;">
        <a href="https://facebook.com/aurametric" target="_blank" rel="noopener" aria-label="{{ __('messages.footer_social_facebook') }}" style="transition: all 0.3s ease; color: #ba68c8;">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://instagram.com/aurametric" target="_blank" rel="noopener" aria-label="{{ __('messages.footer_social_instagram') }}" style="transition: all 0.3s ease; color: #ba68c8;">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.linkedin.com/company/aurametric" target="_blank" rel="noopener" aria-label="{{ __('messages.footer_social_linkedin') }}" style="transition: all 0.3s ease; color: #ba68c8;">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://youtube.com/@aurametric" target="_blank" rel="noopener" aria-label="{{ __('messages.footer_social_youtube') }}" style="transition: all 0.3s ease; color: #ba68c8;">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://x.com/aurametric" target="_blank" rel="noopener" aria-label="{{ __('messages.footer_social_x') }}" style="transition: all 0.3s ease; color: #ba68c8;">
          <i class="fab fa-x-twitter"></i>
        </a>
      </div>
    </div>
  </div>

  <p style="text-align: center; margin-top: 50px; font-size: 0.8rem; color: #d0d0d0; text-shadow: 0 0 4px rgba(186, 104, 200, 0.3);">
    {{ __('messages.footer_copyright', ['year' => date('Y')]) }}
  </p>
</footer>

<style>
  .footer-inner {
    background: linear-gradient(135deg, #4a148c, #7b1fa2, #9c27b0);
    padding: 50px 40px;
    border-radius: 24px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    max-width: 1400px;
    margin: 0 auto;
  }
  
  .footer-column h4 {
    margin-bottom: 20px;
    font-size: 1.3rem;
  }
  
  .footer-column ul li {
    margin-bottom: 10px;
  }
  
  .footer-column a:hover {
    color: #e1bee7 !important;
    transform: translateX(8px);
  }
  
  .social-links a:hover {
    transform: scale(1.3) translateY(-5px);
    color: #e1bee7 !important;
    text-shadow: 0 0 15px rgba(225, 190, 231, 0.8);
  }
  
  .logo svg {
    transition: transform 0.6s ease;
    drop-shadow: 0 0 20px rgba(186, 104, 200, 0.6);
  }
  
  .logo:hover svg {
    transform: rotate(360deg) scale(1.1);
  }
</style>