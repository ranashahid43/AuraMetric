<style>
  /* CRITICAL: This removes the gap at the top and sides */
  html, body {
    margin: 0 !important;
    padding: 0 !important;
    width: 100%;
    overflow-x: hidden;
  }

  /* Reset all elements to ensure no hidden margins push the header */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .site-header {
    background: linear-gradient(135deg, #4a148c, #7b1fa2, #9c27b0);
    padding: 5px 5%; /* Reduced top/bottom padding to make it slim */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    position: sticky;
    top: 0; /* Forces it to touch the top edge */
    width: 100%;
    z-index: 2000;
  }

  .header-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 70px; /* Ensures consistent height */
  }

  /* Logo Styling */
  .logo {
    display: flex;
    align-items: center;
    text-decoration: none;
    /* This ensures the SVG itself doesn't create a top gap */
    line-height: 0; 
  }

  .logo svg {
    width: 65px;
    height: 65px;
    filter: drop-shadow(0 0 8px rgba(186, 104, 200, 0.5));
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
  }

  /* Navigation */
  .nav-list {
    display: flex;
    align-items: center;
    gap: 25px;
    list-style: none;
  }

  .nav-link {
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    position: relative;
    transition: 0.3s;
  }

  .nav-link:hover { color: #ba68c8; }

  /* Dropdown Menu */
  .dropdown { position: relative; }
  .dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    background: #5e1a96;
    min-width: 170px;
    border-radius: 8px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    list-style: none;
    padding: 10px 0;
  }

  .dropdown-item {
    display: block;
    padding: 10px 20px;
    color: #fff;
    text-decoration: none;
    font-size: 0.9rem;
  }

  .dropdown-item:hover { background: rgba(255,255,255,0.1); }

  /* Language Switcher */
  .lang-switcher {
    display: flex;
    gap: 5px;
    background: rgba(255,255,255,0.1);
    padding: 4px 10px;
    border-radius: 20px;
  }

  .lang-switcher a {
    color: #fff;
    text-decoration: none;
    font-size: 0.8rem;
    opacity: 0.7;
  }

  .lang-switcher a.active { opacity: 1; font-weight: bold; color: #ba68c8; }

  /* Hamburger Menu */
  .hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
    z-index: 2101;
  }

  .hamburger span {
    width: 25px;
    height: 3px;
    background: #fff;
    transition: 0.3s;
  }

  /* Responsive Fixes */
  @media (max-width: 992px) {
    .hamburger { display: flex; }

    .nav-menu {
      position: absolute;
      top: 100%; /* Opens exactly at the bottom of header */
      right: 5%;
      width: 220px;
      background: #4a148c;
      border-radius: 12px;
      padding: 20px;
      display: none;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      border: 1px solid rgba(255,255,255,0.1);
    }

    .nav-menu.active { display: block; }

    .nav-list { flex-direction: column; align-items: flex-start; gap: 15px; }
    
    .dropdown-content {
      position: static;
      transform: none;
      background: rgba(0,0,0,0.2);
      width: 100%;
      margin-top: 5px;
    }

    .dropdown.active .dropdown-content { display: block; }
    
    /* Hamburger Animation */
    .hamburger.active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
  }

  @media (min-width: 993px) {
    .dropdown:hover .dropdown-content { display: block; }
  }
</style>

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
          <a href="{{ route('lang.switch', 'en') }}" class="{{ session('locale') == 'en' ? 'active' : '' }}">EN</a>
          <a href="{{ route('lang.switch', 'it') }}" class="{{ session('locale') == 'it' ? 'active' : '' }}">IT</a>
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

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');
    const dropdownToggle = document.querySelector('.dropdown-toggle');

    hamburger.addEventListener('click', (e) => {
      e.stopPropagation();
      hamburger.classList.toggle('active');
      navMenu.classList.toggle('active');
    });

    dropdownToggle.addEventListener('click', (e) => {
      if (window.innerWidth <= 992) {
        e.preventDefault();
        dropdownToggle.parentElement.classList.toggle('active');
      }
    });

    document.addEventListener('click', (e) => {
      if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
      }
    });
  });
</script>
