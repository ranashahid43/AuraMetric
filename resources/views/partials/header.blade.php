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

    <!-- Mobile Menu Toggle -->
    <div class="mobile-menu-toggle">
      <i class="fa-solid fa-bars"></i>
    </div>
  </div>
</header>

<!-- Dropdown & Mobile Menu Script -->
<script>
  // Desktop Dropdown
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

  // Mobile Menu Toggle
  const mobileToggle = document.querySelector('.mobile-menu-toggle');
  const nav = document.querySelector('.nav');

  mobileToggle.addEventListener('click', () => {
    nav.classList.toggle('active');
    mobileToggle.querySelector('i').classList.toggle('fa-bars');
    mobileToggle.querySelector('i').classList.toggle('fa-times');
  });

  // Close mobile menu when clicking a link
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      if (nav.classList.contains('active')) {
        nav.classList.remove('active');
        mobileToggle.querySelector('i').classList.add('fa-bars');
        mobileToggle.querySelector('i').classList.remove('fa-times');
      }
    });
  });
</script>

<style>
  /* Compact Header */
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
    width: 70px;
    height: 70px;
    transition: transform 0.5s ease;
    filter: drop-shadow(0 0 10px rgba(186, 104, 200, 0.6));
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
    text-shadow: 0 0 8px rgba(186, 104, 200, 0.4);
  }

  .nav {
    display: flex;
    align-items: center;
    gap: 25px;
  }

  .nav-link {
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    position: relative;
    transition: all 0.3s ease;
  }

  .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
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
    gap: 8px;
  }

  .lang-switcher a {
    color: #ffffff;
    font-weight: bold;
    font-size: 0.9rem;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
  }

  .lang-switcher a:hover {
    background: rgba(186, 104, 200, 0.4);
  }

  .lang-switcher a.active {
    background: #ba68c8;
    box-shadow: 0 0 10px rgba(186, 104, 200, 0.5);
  }

  /* Mobile Menu Toggle */
  .mobile-menu-toggle {
    display: none;
    font-size: 1.8rem;
    color: #fff;
    cursor: pointer;
    z-index: 1001;
  }

  /* Mobile Responsive */
  @media (max-width: 992px) {
    .header-inner {
      position: relative;
    }

    .nav {
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      background: linear-gradient(135deg, #4a148c, #7b1fa2);
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      gap: 15px;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease, padding 0.4s ease;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .nav.active {
      max-height: 400px;
      padding: 30px 0;
    }

    .nav-link {
      font-size: 1.1rem;
      padding: 10px 20px;
      width: 80%;
      text-align: center;
    }

    .dropdown {
      width: 80%;
    }

    .dropdown-content {
      position: static;
      transform: none;
      background: rgba(255, 255, 255, 0.1);
      box-shadow: none;
      padding: 0;
      margin-top: 10px;
      opacity: 1;
      display: none;
    }

    .dropdown.active .dropdown-content {
      display: flex;
    }

    .dropdown-item {
      padding: 10px 0;
    }

    .lang-switcher {
      margin-top: 10px;
    }

    .mobile-menu-toggle {
      display: block;
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
    .logo-text {
      display: none; /* Hide text on very small screens for space */
    }

    .logo svg {
      width: 55px;
      height: 55px;
    }
  }
</style>
