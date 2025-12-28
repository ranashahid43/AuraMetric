<header class="site-header">
  <div class="container header-inner">
    
    <!-- Logo -->
    <a href="/" class="logo">
      <svg width="80" height="80" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
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
        <path d="M50 10 L90 35 L90 65 L50 90 L10 65 L10 35 Z" fill="none" stroke="url(#grad)" stroke-width="8" filter="url(#neon) url(#glow)"/>
        <circle cx="50" cy="50" r="30" fill="none" stroke="url(#grad)" stroke-width="5" filter="url(#neon)"/>
        <text x="50" y="58" font-family="Poppins, sans-serif" font-size="32" font-weight="900" fill="url(#grad)" text-anchor="middle" filter="url(#neon) url(#glow)">AM</text>
        <path d="M20 50 Q50 20 80 50 Q50 80 20 50" stroke="url(#grad)" stroke-width="6" fill="none" stroke-linecap="round" filter="url(#neon) url(#glow)"/>
      </svg>
      <div class="logo-text">
        AuraMetric
      </div>
    </a>

    <!-- Navigation -->
    <nav class="nav">
      <a href="/" class="nav-link">{{ __('messages.nav_home') }}</a>
      <a href="/services" class="nav-link">{{ __('messages.nav_services') }}</a>

      <!-- About Dropdown -->
      <div class="dropdown">
        <a href="#" class="nav-link">
          {{ __('messages.nav_about') }} <i class="fa-solid fa-chevron-down"></i>
        </a>
        <div class="dropdown-content">
          <a href="/about" class="dropdown-item">{{ __('messages.nav_about') }}</a>
          <a href="/contact" class="dropdown-item">{{ __('messages.nav_contact') }}</a>
        </div>
      </div>

      <a href="/careers" class="nav-link">{{ __('messages.nav_careers') }}</a>

      <!-- Language Switcher -->
      <div class="lang-switcher">
        <a href="{{ route('lang.switch', 'en') }}" class="{{ session('locale', 'en') == 'en' ? 'active' : '' }}">EN</a>
        <a href="{{ route('lang.switch', 'it') }}" class="{{ session('locale', 'en') == 'it' ? 'active' : '' }}">IT</a>
      </div>
    </nav>
  </div>
</header>

<!-- Dropdown Hover Script -->
<script>
  document.querySelectorAll('.dropdown').forEach(drop => {
    drop.addEventListener('mouseenter', () => {
      const content = drop.querySelector('.dropdown-content');
      content.style.display = 'flex';
      content.style.opacity = '1';
      content.style.transform = 'translateY(0)';
    });
    drop.addEventListener('mouseleave', () => {
      const content = drop.querySelector('.dropdown-content');
      content.style.opacity = '0';
      content.style.transform = 'translateY(-10px)';
      setTimeout(() => { if (content.style.opacity === '0') content.style.display = 'none'; }, 300);
    });
  });
</script>

<style>
  /* Compact Header - Same premium style as Footer */
  .site-header {
    background: linear-gradient(135deg, #4a148c, #7b1fa2, #9c27b0);
    padding: 18px 5%;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
  }

  .header-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
  }

  .logo {
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: transform 0.3s ease;
  }

  .logo:hover {
    transform: scale(1.05);
  }

  .logo svg {
    transition: transform 0.5s ease;
    filter: drop-shadow(0 0 12px rgba(186, 104, 200, 0.7));
  }

  .logo:hover svg {
    transform: rotate(10deg);
  }

  .logo-text {
    margin-left: 12px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 1.6rem;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 10px rgba(186, 104, 200, 0.5);
  }

  .nav {
    display: flex;
    align-items: center;
    gap: 30px;
  }

  .nav-link {
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.05rem;
    position: relative;
    transition: all 0.3s ease;
    text-shadow: 0 0 5px rgba(186, 104, 200, 0.3);
  }

  .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -6px;
    left: 50%;
    background: #ba68c8;
    transition: all 0.3s ease;
    transform: translateX(-50%);
  }

  .nav-link:hover::after {
    width: 100%;
  }

  .nav-link:hover {
    color: #e1bee7;
    transform: translateY(-2px);
  }

  .nav-link i {
    font-size: 0.7rem;
    margin-left: 5px;
    transition: transform 0.3s ease;
  }

  .dropdown:hover i {
    transform: rotate(180deg);
  }

  .dropdown {
    position: relative;
  }

  .dropdown-content {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%) translateY(-10px);
    background: rgba(74, 20, 140, 0.95);
    backdrop-filter: blur(10px);
    padding: 12px 0;
    border-radius: 12px;
    min-width: 160px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 99;
  }

  .dropdown:hover .dropdown-content {
    display: flex;
    opacity: 1;
    transform: translateX(-50%) translateY(5px);
  }

  .dropdown-item {
    color: #e0e0e0;
    padding: 10px 24px;
    text-decoration: none;
    display: block;
    transition: all 0.3s ease;
  }

  .dropdown-item:hover {
    background: rgba(186, 104, 200, 0.3);
    color: #ffffff;
    padding-left: 32px;
  }

  .lang-switcher {
    display: flex;
    gap: 10px;
  }

  .lang-switcher a {
    color: #ffffff;
    font-weight: bold;
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
  }

  .lang-switcher a:hover {
    background: rgba(186, 104, 200, 0.4);
    transform: scale(1.1);
  }

  .lang-switcher a.active {
    background: #ba68c8;
    box-shadow: 0 0 12px rgba(186, 104, 200, 0.6);
  }

  @media (max-width: 992px) {
    .header-inner {
      flex-direction: column;
      gap: 15px;
      padding: 10px 0;
    }
    .nav {
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }
  }
</style>