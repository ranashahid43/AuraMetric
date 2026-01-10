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
    min-height: 75px; 
  }

  /* 2. Logo & Branding Styling */
  .logo {
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  .logo img {
    width: 60px; /* Adjusted size for the PNG */
    height: 60px;
    object-fit: contain;
    filter: drop-shadow(0 0 8px rgba(186, 104, 200, 0.5));
    transition: transform 0.4s ease;
  }

  .logo:hover img { transform: rotate(10deg); }

  .logo-text-wrapper {
    margin-left: 12px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    line-height: 1.1;
  }

  .logo-text {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 1.5rem;
    color: #ffffff;
    background: linear-gradient(135deg, #ba68c8, #e1bee7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline-block;
  }

  .logo-subtext {
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    font-size: 0.8rem;
    color: #e1bee7;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    opacity: 0.9;
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
    position: relative;
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

  @media (max-width: 992px) {
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
    
    .dropdown-content {
      position: static;
      transform: none;
      background: rgba(0,0,0,0.2);
      width: 100%;
      margin-top: 5px;
    }

    .dropdown.active .dropdown-content { display: block; }
    
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
      <img src="{{ asset('image/aurametric.png') }}" alt="AuraMetric Logo">
      
      <div class="logo-text-wrapper">
        <span class="logo-text">AuraMetric</span>
        <span class="logo-subtext">Solution</span>
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
