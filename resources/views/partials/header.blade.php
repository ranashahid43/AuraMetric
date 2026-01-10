<style>
  /* 1. CRITICAL: Layout Reset */
  html, body {
    margin: 0 !important;
    padding: 0 !important;
    width: 100%;
    overflow-x: hidden;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  /* Import the specific font for the elegant look */
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,600&family=Poppins:wght@400;600;800&display=swap');

  .site-header {
    background: linear-gradient(135deg, #4a148c, #7b1fa2, #9c27b0);
    padding: 5px 5%; 
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    position: sticky;
    top: 0; 
    width: 100%;
    z-index: 2000;
  }

  .header-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 80px; 
  }

  /* 2. NEW BRANDING STYLING (AuraMetric Solution) */
  .logo {
    display: flex;
    align-items: center;
    gap: 15px;
    text-decoration: none;
  }

  .logo img {
    height: 56px; /* Equivalent to h-14 */
    width: auto;
    filter: drop-shadow(0 0 12px rgba(186, 104, 200, 0.5));
    transition: transform 0.4s ease;
  }

  .logo:hover img { transform: scale(1.05); }

  .brand-wrapper {
    display: flex;
    flex-direction: column;
  }

  .brand-main-text {
    font-family: 'Cormorant Garamond', serif;
    font-style: italic;
    font-weight: 600;
    font-size: 2.25rem; /* Equivalent to text-4xl */
    color: #ffffff;
    line-height: 0.9;
  }

  .brand-sub-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 4px;
  }

  .brand-line {
    height: 1px;
    width: 24px;
    background-color: #ba68c8; /* Updated to match your purple theme or use #B8860B for gold */
  }

  .brand-sub-text {
    font-family: Arial, sans-serif;
    letter-spacing: 0.4em;
    font-size: 10px;
    text-transform: uppercase;
    font-weight: bold;
    color: #e1bee7;
  }

  /* 3. Navigation Styles */
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
    transition: 0.3s;
  }

  .nav-link:hover { color: #ba68c8; }

  /* 4. Dropdown Menu */
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

  /* 5. Language Switcher */
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

  /* 6. Mobile Menu Styles */
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

  @media (max-width: 1024px) {
    .hamburger { display: flex; }
    .nav-menu {
      position: absolute;
      top: 100%; 
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
    .dropdown-content { position: static; transform: none; background: rgba(0,0,0,0.2); width: 100%; margin-top: 5px; }
    .dropdown.active .dropdown-content { display: block; }
    .hamburger.active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
  }

  @media (min-width: 1025px) {
    .dropdown:hover .dropdown-content { display: block; }
  }
</style>

<header class="site-header">
  <div class="header-container">
    
    <a href="/" class="logo">
      <img src="{{ asset('images/aurametric.png') }}" alt="AuraMetric Logo">
      
      <div class="brand-wrapper">
        <span class="brand-main-text">Aurametric</span>
        <div class="brand-sub-row">
          <div class="brand-line"></div>
          <span class="brand-sub-text">Solution</span>
          <div class="brand-line"></div>
        </div>
      </div>
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
      if (window.innerWidth <= 1024) {
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
