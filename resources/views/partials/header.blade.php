<header class="site-header">
  <div class="header-container">
    
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
      <div class="logo-text">AuraMetric</div>
    </a>

    <nav class="nav-menu" id="navMenu">
      <ul class="nav-list">
        <li><a href="/" class="nav-link">{{ __('messages.nav_home') }}</a></li>
        <li><a href="/services" class="nav-link">{{ __('messages.nav_services') }}</a></li>
        
        <li class="dropdown">
          <a href="#" class="nav-link dropdown-toggle">
            {{ __('messages.nav_about') }} <i class="fa-solid fa-chevron-down"></i>
          </a>
          <ul class="dropdown-content">
            <li><a href="/about" class="dropdown-item">{{ __('messages.nav_about') }}</a></li>
            <li><a href="/contact" class="dropdown-item">{{ __('messages.nav_contact') }}</a></li>
          </ul>
        </li>

        <li><a href="/careers" class="nav-link">{{ __('messages.nav_careers') }}</a></li>
        
        <li class="lang-switcher">
          <a href="{{ route('lang.switch', 'en') }}" class="{{ session('locale', 'en') == 'en' ? 'active' : '' }}">EN</a>
          <a href="{{ route('lang.switch', 'it') }}" class="{{ session('locale', 'en') == 'it' ? 'active' : '' }}">IT</a>
        </li>
      </ul>
    </nav>

    <div class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</header>

<style>
  /* 1. Reset Global Spacing (Removes Black Portions) */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    overflow-x: hidden; /* Prevent horizontal scroll */
  }

  /* 2. Header Container */
  .site-header {
    background: linear-gradient(135deg, #4a148c, #7b1fa2, #9c27b0);
    padding: 10px 5%;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    position: sticky;
    top: 0;
    width: 100%;
    z-index: 1000;
  }

  .header-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  /* 3. Logo & Text Effects */
  .logo {
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  .logo svg {
    filter: drop-shadow(0 0 10px rgba(186, 104, 200, 0.6));
    transition: transform 0.4s ease;
  }

  .logo:hover svg { transform: rotate(10deg); }

  .logo-text {
    margin-left: 10px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 1.5rem;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    filter: drop-shadow(0 0 5px rgba(186,104,200,0.3));
  }

  /* 4. Desktop Navigation */
  .nav-list {
    display: flex;
    align-items: center;
    gap: 28px;
    list-style: none;
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

  .nav-link:hover::after { width: 100%; }
  .nav-link:hover { color: #e1bee7; }

  /* Dropdown Styles */
  .dropdown { position: relative; }
  .dropdown-content {
    display: none;
    position: absolute;
    top: 120%;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(74, 20, 140, 0.95);
    backdrop-filter: blur(10px);
    min-width: 180px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    list-style: none;
    overflow: hidden;
  }

  .dropdown-item {
    display: block;
    padding: 12px 20px;
    color: #e0e0e0;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.9rem;
  }

  .dropdown-item:hover {
    background: rgba(186, 104, 200, 0.3);
    color: #fff;
    padding-left: 28px;
  }

  /* Language Switcher Styling */
  .lang-switcher {
    display: flex;
    gap: 8px;
  }

  .lang-switcher a {
    color: #fff;
    text-decoration: none;
    font-size: 0.85rem;
    padding: 5px 12px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    transition: 0.3s;
  }

  .lang-switcher a.active { background: #ba68c8; font-weight: bold; }

  /* 5. Hamburger Menu Icon */
  .hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
    z-index: 1001;
  }

  .hamburger span {
    width: 28px;
    height: 3px;
    background: #fff;
    border-radius: 3px;
    transition: 0.3s;
  }

  /* 6. Responsive Logic (Mobile & Tablet) */
  @media (max-width: 992px) {
    .hamburger { display: flex; }

    /* Show dropdown on hover only for Desktop */
    .dropdown:hover .dropdown-content { display: none; } 

    .nav-menu {
      position: absolute;
      top: 100%;
      right: 5%; /* Aligned with right padding of header */
      width: 240px; /* Clean, compact width */
      background: rgba(74, 20, 140, 0.98);
      backdrop-filter: blur(15px);
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.5);
      display: none; /* Hidden by JS */
      border: 1px solid rgba(186, 104, 200, 0.2);
    }

    .nav-menu.active { display: block; }

    .nav-list {
      flex-direction: column;
      align-items: flex-start;
      gap: 15px;
    }

    .dropdown-content {
      position: static;
      transform: none;
      background: rgba(0,0,0,0.1);
      width: 100%;
      box-shadow: none;
      margin-top: 10px;
    }

    .dropdown.active .dropdown-content { display: block; }

    /* Animation for Hamburger */
    .hamburger.active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
  }

  /* Desktop Hover */
  @media (min-width: 993px) {
    .dropdown:hover .dropdown-content { display: block; }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');
    const dropdownToggle = document.querySelector('.dropdown-toggle');

    // 1. Toggle Mobile Menu
    hamburger.addEventListener('click', (e) => {
      e.stopPropagation();
      hamburger.classList.toggle('active');
      navMenu.classList.toggle('active');
    });

    // 2. Toggle Dropdown on Mobile click
    dropdownToggle.addEventListener('click', (e) => {
      if (window.innerWidth <= 992) {
        e.preventDefault();
        dropdownToggle.parentElement.classList.toggle('active');
      }
    });

    // 3. Close menu when clicking a link
    document.querySelectorAll('.nav-link:not(.dropdown-toggle), .dropdown-item').forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
      });
    });

    // 4. Close menu when clicking anywhere else on screen
    document.addEventListener('click', (e) => {
      if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
      }
    });
  });
</script>
