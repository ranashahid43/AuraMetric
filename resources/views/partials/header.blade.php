<header class="site-header">
  <div class="header-container">
    
    <a href="/" class="logo-wrapper">
      <div class="logo-icon">
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="#ba68c8" />
              <stop offset="100%" stop-color="#6a1b9a" />
            </linearGradient>
          </defs>
          <path d="M50 10 L90 35 L90 65 L50 90 L10 65 L10 35 Z" fill="none" stroke="url(#grad)" stroke-width="6"/>
          <circle cx="50" cy="50" r="25" fill="none" stroke="url(#grad)" stroke-width="3" />
          <text x="50" y="58" font-family="sans-serif" font-size="28" font-weight="900" fill="url(#grad)" text-anchor="middle">AM</text>
        </svg>
      </div>
      <span class="logo-text">AuraMetric</span>
    </a>

    <nav class="main-nav" id="mainNav">
      <ul class="nav-list">
        <li><a href="/" class="nav-link">{{ __('messages.nav_home') }}</a></li>
        <li><a href="/services" class="nav-link">{{ __('messages.nav_services') }}</a></li>
        
        <li class="dropdown-wrapper">
          <button class="nav-link dropdown-trigger">
            {{ __('messages.nav_about') }} <i class="fa-solid fa-chevron-down"></i>
          </button>
          <ul class="dropdown-menu">
            <li><a href="/about" class="dropdown-item">{{ __('messages.nav_about') }}</a></li>
            <li><a href="/contact" class="dropdown-item">{{ __('messages.nav_contact') }}</a></li>
          </ul>
        </li>

        <li><a href="/careers" class="nav-link">{{ __('messages.nav_careers') }}</a></li>
        
        <li class="lang-switcher">
          <a href="{{ route('lang.switch', 'en') }}" class="{{ session('locale') == 'en' ? 'active' : '' }}">EN</a>
          <span class="sep">|</span>
          <a href="{{ route('lang.switch', 'it') }}" class="{{ session('locale') == 'it' ? 'active' : '' }}">IT</a>
        </li>
      </ul>
    </nav>

    <button class="hamburger-menu" id="menuToggle" aria-label="Toggle Menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</header>

<style>
  /* Remove any top space (black bar) */
  body {
    margin: 0;
    padding: 0;
  }

  .site-header {
    background: var(--primary-bg);
    padding: 0.8rem 5%;
    position: sticky;
    top: 0;
    z-index: 2000;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  }

  .header-container {
    max-width: 1300px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  /* Logo */
  .logo-wrapper {
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  .logo-icon svg {
    width: 50px;
    height: 50px;
    filter: drop-shadow(0 0 5px rgba(186, 104, 200, 0.4));
  }

  .logo-text {
    margin-left: 12px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 1.4rem;
    color: white;
  }

  /* Desktop Nav */
  .nav-list {
    display: flex;
    list-style: none;
    align-items: center;
    gap: 30px;
  }

  .nav-link {
    color: var(--text-white);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px 0;
    transition: 0.3s;
  }

  .nav-link:hover { color: var(--accent); }

  /* Dropdown */
  .dropdown-wrapper { position: relative; }
  .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    background: var(--dropdown-bg);
    list-style: none;
    min-width: 160px;
    border-radius: 8px;
    display: none;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  }

  .dropdown-item {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
    font-size: 0.9rem;
    transition: 0.2s;
  }

  .dropdown-item:hover { background: rgba(255,255,255,0.1); }

  .dropdown-wrapper:hover .dropdown-menu { display: block; }

  /* Language */
  .lang-switcher {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.1);
    padding: 5px 12px;
    border-radius: 20px;
  }

  .lang-switcher a {
    color: white;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: bold;
    opacity: 0.6;
  }

  .lang-switcher a.active { opacity: 1; color: var(--accent); }
  .sep { color: rgba(255,255,255,0.3); font-size: 0.8rem; }

  /* Hamburger - Small & compact */
  .hamburger-menu {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    width: 28px;
    height: 20px;
    justify-content: center;
  }

  .hamburger-menu span {
    width: 28px;
    height: 3px;
    background: white;
    border-radius: 2px;
    transition: 0.3s;
  }

  /* Mobile */
  @media (max-width: 992px) {
    .hamburger-menu {
      display: flex;
    }

    .main-nav {
      position: absolute;
      top: 100%;
      right: 5%;
      width: 240px;
      background: var(--dropdown-bg);
      border-radius: 12px;
      padding: 20px;
      display: none;
      box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    }

    .main-nav.active {
      display: block;
    }

    .nav-list {
      flex-direction: column;
      align-items: flex-start;
      gap: 15px;
    }

    .dropdown-menu {
      position: static;
      transform: none;
      background: rgba(0,0,0,0.2);
      width: 100%;
      margin-top: 10px;
      box-shadow: none;
    }

    .dropdown-wrapper.active .dropdown-menu {
      display: block;
    }

    /* Hamburger animation */
    .hamburger-menu.active span:nth-child(1) {
      transform: translateY(8px) rotate(45deg);
    }
    .hamburger-menu.active span:nth-child(2) {
      opacity: 0;
    }
    .hamburger-menu.active span:nth-child(3) {
      transform: translateY(-8px) rotate(-45deg);
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menuToggle');
    const nav = document.getElementById('mainNav');
    const dropdownTrigger = document.querySelector('.dropdown-trigger');

    toggle.addEventListener('click', (e) => {
      e.stopPropagation();
      toggle.classList.toggle('active');
      nav.classList.toggle('active');
    });

    dropdownTrigger.addEventListener('click', (e) => {
      if (window.innerWidth <= 992) {
        e.preventDefault();
        dropdownTrigger.parentElement.classList.toggle('active');
      }
    });

    document.addEventListener('click', (e) => {
      if (!nav.contains(e.target) && !toggle.contains(e.target)) {
        nav.classList.remove('active');
        toggle.classList.remove('active');
      }
    });
  });
</script>
