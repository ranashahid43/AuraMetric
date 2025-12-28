<header class="site-header">
  <div class="container header-inner">
    
    <!-- Logo -->
    <a href="/" class="logo">
      <svg width="70" height="70" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#6a1b9a" />
            <stop offset="50%" stop-color="#8e24aa" />
            <stop offset="100%" stop-color="#ba68c8" />
          </linearGradient>
          <filter id="glow">
            <feGaussianBlur stdDeviation="4" result="coloredBlur"/>
            <feMerge>
              <feMergeNode in="coloredBlur"/>
              <feMergeNode in="SourceGraphic"/>
            </feMerge>
          </filter>
          <filter id="neon">
            <feGaussianBlur stdDeviation="2" result="blur"/>
            <feComposite operator="out" in="blur" in2="SourceGraphic" result="inverse"/>
            <feFlood flood-color="#ba68c8" flood-opacity="1" result="color"/>
            <feComposite operator="in" in="color" in2="inverse" result="shadow"/>
            <feComposite operator="over" in="shadow" in2="SourceGraphic"/>
          </filter>
        </defs>
        <path d="M50 10 L90 35 L90 65 L50 90 L10 65 L10 35 Z" fill="none" stroke="url(#grad)" stroke-width="7" filter="url(#neon) url(#glow)"/>
        <circle cx="50" cy="50" r="30" fill="none" stroke="url(#grad)" stroke-width="4" filter="url(#neon)"/>
        <text x="50" y="58" font-family="Poppins, sans-serif" font-size="30" font-weight="900" fill="url(#grad)" text-anchor="middle" filter="url(#neon) url(#glow)">AM</text>
        <path d="M20 50 Q50 20 80 50 Q50 80 20 50" stroke="url(#grad)" stroke-width="5" fill="none" stroke-linecap="round" filter="url(#neon) url(#glow)"/>
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
        <a href="#" class="nav-link dropdown-toggle">
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

    <!-- Hamburger Icon (visible on mobile) -->
    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</header>

<script>
  // Hamburger menu toggle
  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('.nav');

  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    nav.classList.toggle('active');
  });

  // Close menu when clicking a link
  document.querySelectorAll('.nav-link, .dropdown-item').forEach(link => {
    link.addEventListener('click', () => {
      hamburger.classList.remove('active');
      nav.classList.remove('active');
    });
  });

  // Desktop dropdown hover
  document.querySelectorAll('.dropdown').forEach(drop => {
    drop.addEventListener('mouseenter', () => {
      drop.querySelector('.dropdown-content').style.display = 'flex';
    });
    drop.addEventListener('mouseleave', () => {
      drop.querySelector('.dropdown-content').style.display = 'none';
    });
  });
</script>

<style>
  .site-header {
    background: linear-gradient(135deg, #4a148c, #7b1fa2, #9c27b0);
    padding: 15px 5%;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    position: relative;
    z-index: 1000;
  }

  .header-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1400px;
    margin: 0 auto;
  }

  .logo {
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  .logo svg {
    width: 70px;
    height: 70px;
    filter: drop-shadow(0 0 10px rgba(186, 104, 200, 0.6));
    transition: transform 0.4s ease;
  }

  .logo:hover svg {
    transform: rotate(10deg);
  }

  .logo-text {
    margin-left: 10px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 1.5rem;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .nav {
    display: flex;
    align-items: center;
    gap: 28px;
  }

  .nav-link {
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    position: relative;
    transition: color 0.3s ease;
  }

  .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 50%;
    background: #ba68c8;
    transition: width 0.3s ease;
    transform: translateX(-50%);
  }

  .nav-link:hover::after {
    width: 100%;
  }

  .nav-link:hover {
    color: #e1bee7;
  }

  .dropdown {
    position: relative;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(74, 20, 140, 0.95);
    backdrop-filter: blur(10px);
    min-width: 160px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    flex-direction: column;
    z-index: 99;
  }

  .dropdown:hover .dropdown-content {
    display: flex;
  }

  .dropdown-item {
    padding: 10px 20px;
    color: #e0e0e0;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .dropdown-item:hover {
    background: rgba(186, 104, 200, 0.3);
    color: #fff;
    padding-left: 28px;
  }

  .lang-switcher {
    display: flex;
    gap: 8px;
  }

  .lang-switcher a {
    color: #fff;
    font-size: 0.9rem;
    padding: 5px 10px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
  }

  .lang-switcher a.active {
    background: #ba68c8;
  }

  /* Hamburger Menu */
  .hamburger {
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    width: 30px;
    height: 22px;
    cursor: pointer;
  }

  .hamburger span {
    width: 100%;
    height: 3px;
    background: #fff;
    border-radius: 3px;
    transition: all 0.3s ease;
  }

  .hamburger.active span:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
  }

  .hamburger.active span:nth-child(2) {
    opacity: 0;
  }

  .hamburger.active span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -6px);
  }

  /* Mobile View */
  @media (max-width: 992px) {
    .nav {
      position: fixed;
      top: 0;
      right: -100%;
      height: 100vh;
      width: 280px;
      background: linear-gradient(135deg, #4a148c, #7b1fa2);
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 30px;
      transition: right 0.4s ease;
      z-index: 999;
      padding: 80px 20px 40px;
      box-shadow: -10px 0 30px rgba(0, 0, 0, 0.5);
    }

    .nav.active {
      right: 0;
    }

    .nav-link {
      font-size: 1.2rem;
      padding: 10px 0;
    }

    .dropdown-content {
      position: static;
      transform: none;
      background: transparent;
      box-shadow: none;
      display: none;
      margin-top: 10px;
      width: 100%;
    }

    .dropdown.active .dropdown-content {
      display: flex;
    }

    .dropdown-item {
      padding: 10px 0;
      text-align: center;
    }

    .lang-switcher {
      margin-top: 20px;
    }

    .hamburger {
      display: flex;
    }

    .logo svg {
      width: 60px;
      height: 60px;
    }

    .logo-text {
      font-size: 1.4rem;
    }
  }

  @media (max-width: 480px) {
    .site-header {
      padding: 12px 5%;
    }

    .logo-text {
      font-size: 1.3rem;
    }

    .logo svg {
      width: 55px;
      height: 55px;
    }

    .hamburger {
      width: 26px;
      height: 20px;
      gap: 4px;
    }

    .hamburger span {
      height: 2.5px;
    }
  }
</style>
