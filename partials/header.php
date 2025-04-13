<?php
$current_page = basename($_SERVER['PHP_SELF']);

echo '
<nav class="navbar" style="background-color: #000; border-bottom: 1px solid #a855f7;">
  <div style="display: flex; width: 100%; max-width: 1200px; margin: 0 auto; padding: 1rem; align-items: center;">
    <a href="#" style="display: flex; align-items: center; text-decoration: none;">
      <svg height="40" width="40" viewBox="0 0 280.027 280.027" xmlns="http://www.w3.org/2000/svg">
        <g>
          <path style="fill:#EFC75E;" d="M249.399,96.583h-83.404L216.382,0H88.419L30.628,166.161h79.712L71.906,280.027L249.399,96.583z"></path>
          <path style="fill:#F5DD9D;" d="M101.046,17.598h78.364l-70.584,17.537l-43.168,78.758C65.658,113.892,101.046,17.598,101.046,17.598z"></path>
        </g>
      </svg>
      <span style="font-family: \'Inter\', sans-serif; font-weight: 700; font-size: 1.5rem; color: #a855f7; margin-left: 0.5rem;">PowerCare</span>
    </a>

    <div style="margin-left: auto; display: flex; gap: 1.5rem;">
      <a href="dashboard.php" style="text-decoration: none; color: '.($current_page == 'dashboard.php' ? '#a855f7' : '#e5e7eb').'; font-weight: 500; transition: color 0.3s ease;">Home</a>
      <a href="posting1.php" style="text-decoration: none; color: '.($current_page == 'posting1.php' ? '#a855f7' : '#e5e7eb').'; font-weight: 500; transition: color 0.3s ease;">Report Issue</a>
      <a href="about.php" style="text-decoration: none; color: '.($current_page == 'about.php' ? '#a855f7' : '#e5e7eb').'; font-weight: 500; transition: color 0.3s ease;">About</a>
      <a href="contactUs.html" style="text-decoration: none; color: '.($current_page == 'contactUs.html' ? '#a855f7' : '#e5e7eb').'; font-weight: 500; transition: color 0.3s ease;">Contact</a>
    </div>
  </div>
</nav>';
?>
