<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Responsive Navbar with Hamburger</title>
<style>
  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  nav {
    background-color: #4a90e2;
    padding: 16px 30px;
    color: white;
  }

  .nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
  }

  .brand {
    font-size: 20px;
    font-weight: bold;
  }

  .welcome-msg {
    display: none;
    max-width: 300px;
    padding: 5px;
    background: #f0f4ff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    text-align: center;
    color: #2c3e50;
    margin-left: 20px;
  }

  .welcome-msg h1 {
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 2px;
    color: #34495e;
  }

  .welcome-msg p {
    font-size: 0.85rem;
    font-weight: 500;
    color: #7f8c8d;
    letter-spacing: 0.03em;
  }

  .nav-toggle {
    display: none;
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 28px;
    color: white;
  }

  .nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
    flex-wrap: wrap;
    align-items: center;
  }

  .nav-links li a {
    color: white;
    text-decoration: none;
    font-weight: 500;
  }

  
  @media (min-width: 768px) {
    .welcome-msg {
      display: block;
    }
  }

  /* Mobile Styles */
  @media (max-width: 767px) {
    .nav-toggle {
      display: block;
      height: 10px;
      width: 10px;
      
    }

    .nav-links {
      flex-direction: column;
      width: 100%;
      display: none;
      margin-top: 5px;
      background-color: #4a90e2;
      border-radius: 8px;
      padding: 5px 0;
    }

    .nav-links.show {
      display: flex;
    }

    .nav-links li {
      width: 100%;
      text-align: center;
      padding: 3px 0;
    }

    .nav-links li a {
      display: flex;
      width: 100%;
    }

    
  .welcome-msg {
    display: inline-block;
    max-width: 150px;
    padding: 2px;
    background: #f0f4ff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    text-align: center;
    color: #2c3e50;
    margin-left: 10px;
  }

    .nav-container {
      justify-content: space-between;
      align-items: center;
    }
  }

  /* Tablet styling: slightly reduce gap */
  @media (min-width: 768px) and (max-width: 1024px) {
    .nav-links {
      gap: 15px;
    }
  }
</style>
</head>
<body>

<nav>
  <div class="nav-container">
    <div style="display: flex; align-items: center;">
      <div class="brand">MyApp</div>

      <div class="welcome-msg">
        <h1>
          Welcome, <span style="color: #4a90e2;">{{ optional(auth()->user())->name ?? 'Guest' }}</span>!
        </h1>
        <p>
          Your phone number is <strong>{{ optional(auth()->user())->phone ?? 'N/A' }}</strong>
        </p>
      </div>
    </div>

    <button class="nav-toggle" aria-label="Toggle navigation">&#9776;</button>

    <ul class="nav-links">
      @guest
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>
      @endguest

      @auth
        <li><a href="/welcome">Home</a></li>
        <li><a href="/mood_table">Mood History Page</a></li>
        <li><a href="/contact">Weekly Mood Summary</a></li>

        <form method="POST" action="{{ route('logout') }}">
    @csrf
      <li><button style="border: #4a90e2 3px solid; padding: 10px;  border-radius: 20% ; font-weight: bold;" type="submit">Logout</button></li>
</form>
        
      @endauth
    </ul>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');

    toggleButton.addEventListener('click', () => {
      navLinks.classList.toggle('show');
    });
  });
</script>

</body>
</html>
