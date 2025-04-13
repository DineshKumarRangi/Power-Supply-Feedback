<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PowerCare | Electricity Feedback Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#a855f7",
              darkbg: "#000",
              darktext: "#e5e7eb",
              accent: "#6b21a8",
            },
          },
        },
      };
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
      .bg-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
        opacity: 0.7;
      }
      .feature-icon {
        color: #a855f7;
        font-size: 2.5rem;
        margin-bottom: 1rem;
      }
      .hero-content {
        background-color: rgba(0, 0, 0, 0.6);
        padding: 2rem;
        border-radius: 1rem;
      }
    </style>
  </head>
  <body class="bg-darkbg text-darktext overflow-x-hidden relative">
    <header class="fixed top-0 left-0 w-full z-50 bg-black bg-opacity-90 shadow-md">
      <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <div class="text-2xl font-bold text-primary">PowerCare</div>
        <nav class="space-x-6">
          <a href="dashboard.php" class="hover:text-primary transition">Home</a>
          <a href="about.php" class="hover:text-primary transition">About</a>
          <a href="posting1.php" class="hover:text-primary transition">Issue?</a>
          <a href="contactUs.html" class="hover:text-primary transition">Contact Us</a>
          <a href="./pages/Faq/index.html" class="hover:text-primary transition">FAQ</a>
          <a href="signup.php" class="hover:text-primary transition">Signup</a>
        </nav>
      </div>
    </header>

    <main class="pt-20">
    <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 bg-black/50 z-0"></div>
  <video class="absolute inset-0 w-full h-full object-cover opacity-40 z-0" autoplay muted loop>
    <source src="./assets/yoyo1.mp4" type="video/mp4" />
  </video>
  <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
    <h1 class="text-5xl md:text-7xl font-extrabold text-white drop-shadow-lg">
      Powering Better Electricity Services
    </h1>
    <p class="text-xl md:text-2xl my-6 text-white/90">
      Your voice matters! Help improve electricity services in your area by sharing your feedback.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="login.php" class="px-8 py-3 bg-primary text-white rounded-full hover:bg-accent transition font-medium">
        Submit Feedback
      </a>
      <a href="#features" class="px-8 py-3 border-2 border-white text-white rounded-full hover:bg-white hover:text-black transition font-medium">
        Learn More
      </a>
    </div>
  </div>
</section>

      <section id="about" class="py-20 bg-black">
        <div class="max-w-5xl mx-auto px-4">
          <h2 class="text-4xl font-bold text-center mb-8 text-primary">
            About PowerCare
          </h2>
          <p class="text-lg leading-relaxed text-center text-gray-300 max-w-3xl mx-auto">
            PowerCare is a citizen engagement platform designed to collect feedback about electricity services. 
            We bridge the gap between consumers and utility providers to drive improvements in power supply, 
            outage response, and service quality across communities.
          </p>
        </div>
      </section>

      <section id="features" class="py-20 bg-black">
        <div class="max-w-6xl mx-auto px-4">
          <h2 class="text-4xl font-bold text-center mb-12 text-primary">
            How It Works
          </h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-gray-900 rounded-lg">
              <i class="fas fa-user-plus feature-icon"></i>
              <h3 class="text-xl font-semibold mb-2">Create Account</h3>
              <p class="text-gray-300 text-sm">
                Sign up with your basic details and location information.
              </p>
            </div>
            <div class="text-center p-6 bg-gray-900 rounded-lg">
              <i class="fas fa-bolt feature-icon"></i>
              <h3 class="text-xl font-semibold mb-2">Report Issues</h3>
              <p class="text-gray-300 text-sm">
                Log power outages, voltage fluctuations, or service complaints.
              </p>
            </div>
            <div class="text-center p-6 bg-gray-900 rounded-lg">
              <i class="fas fa-star feature-icon"></i>
              <h3 class="text-xl font-semibold mb-2">Rate Services</h3>
              <p class="text-gray-300 text-sm">
                Provide ratings for different aspects of your electricity service.
              </p>
            </div>
            <div class="text-center p-6 bg-gray-900 rounded-lg">
              <i class="fas fa-map-marked-alt feature-icon"></i>
              <h3 class="text-xl font-semibold mb-2">Location Tracking</h3>
              <p class="text-gray-300 text-sm">
                Pinpoint issues on a map for accurate location data.
              </p>
            </div>
            <div class="text-center p-6 bg-gray-900 rounded-lg">
              <i class="fas fa-chart-line feature-icon"></i>
              <h3 class="text-xl font-semibold mb-2">Track Progress</h3>
              <p class="text-gray-300 text-sm">
                Monitor how your feedback contributes to service improvements.
              </p>
            </div>
            <div class="text-center p-6 bg-gray-900 rounded-lg">
              <i class="fas fa-users feature-icon"></i>
              <h3 class="text-xl font-semibold mb-2">Community Impact</h3>
              <p class="text-gray-300 text-sm">
                See how your neighborhood's electricity services are performing.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="py-20 bg-gradient-to-r from-purple-900 to-black">
        <div class="max-w-4xl mx-auto px-4 text-center">
          <h2 class="text-4xl font-bold mb-6">Ready to Make a Difference?</h2>
          <p class="text-xl mb-8">Your feedback helps utility providers identify and address issues faster.</p>
          <a href="signup.php" class="px-8 py-4 bg-primary text-white rounded-full hover:bg-accent transition text-lg font-semibold">
            Join PowerCare Today
          </a>
        </div>
      </section>
    </main>

    <footer class="bg-black py-12">
      <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="text-2xl font-bold text-primary mb-4 md:mb-0">PowerCare</div>
          <div class="flex space-x-6">
            <a href="#" class="hover:text-primary transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-primary transition"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-primary transition"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500">
          <p>&copy; 2023 PowerCare. All rights reserved. | <a href="./pages/TnC/index.html" class="hover:text-primary transition">Terms of Service</a> | <a href="#" class="hover:text-primary transition">Privacy Policy</a></p>
        </div>
      </div>
    </footer>
  </body>
</html>
