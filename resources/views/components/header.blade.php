<header>
  <div class="header-inner">
    <a href="/" class="logo">
      <svg width="80" height="80" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#2da9ff" />
            <stop offset="100%" stop-color="#7ed3ff" />
          </linearGradient>
          <filter id="glow">
            <feGaussianBlur stdDeviation="4" result="coloredBlur"/>
            <feMerge>
              <feMergeNode in="coloredBlur"/>
              <feMergeNode in="SourceGraphic"/>
            </feMerge>
          </filter>
        </defs>
        <path d="M50 15 L85 35 L85 65 L50 85 L15 65 L15 35 Z" fill="none" stroke="url(#grad)" stroke-width="8" filter="url(#glow)"/>
        <circle cx="50" cy="50" r="25" fill="none" stroke="url(#grad)" stroke-width="5"/>
        <text x="50" y="60" font-family="Poppins, sans-serif" font-size="32" font-weight="900" fill="url(#grad)" text-anchor="middle" filter="url(#glow)">TTT</text>
        <path d="M30 50 L45 65 L70 35" stroke="url(#grad)" stroke-width="6" fill="none" stroke-linecap="round" filter="url(#glow)"/>
      </svg>
      <div class="logo-text">
        <div class="subtitle" style="background: linear-gradient(135deg, #2da9ff, #7ed3ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          The Testing Tech
        </div>
      </div>
    </a>

    <nav class="nav">
      <a href="/">{{ __('Home') }}</a>
      <a href="/services">{{ __('Services') }}</a>
      <div class="dropdown">
        <a href="#">{{ __('About Us') }} <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem;"></i></a>
        <div class="dropdown-content">
          <a href="/about">{{ __('Our Story') }}</a>
          <a href="/contact">{{ __('Contact Us') }}</a>
        </div>
      </div>
      <a href="/careers">{{ __('Careers') }}</a>
      <div class="lang-switcher">
        <button class="lang-btn {{ session('locale') == 'en' ? 'active' : '' }}" data-lang="en">EN</button>
        <button class="lang-btn {{ session('locale') == 'it' ? 'active' : '' }}" data-lang="it">IT</button>
      </div>
    </nav>
  </div>
</header>