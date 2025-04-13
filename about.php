<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About PowerCare | Electricity Feedback Platform</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Tailwind config: extend colors for black & purple theme -->
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

    <!-- Font Awesome for stylish icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <style>
      .team-member-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(168, 85, 247, 0.3);
      }
      
      .mission-icon {
        font-size: 3rem;
        color: #a855f7;
        margin-bottom: 1.5rem;
      }
    </style>
  </head>
  <body class="bg-darkbg text-darktext overflow-x-hidden">
    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full z-50 bg-black bg-opacity-90 shadow-md">
      <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <div class="text-2xl font-bold text-primary">PowerCare</div>
        <nav class="space-x-6">
          <a href="dashboard.php" class="hover:text-primary transition">Home</a>
          <a href="about.php" class="hover:text-primary transition font-semibold text-primary">About</a>
          <a href="posting1.php" class="hover:text-primary transition">Issue?</a>
          <a href="contactUs.html" class="hover:text-primary transition">Contact Us</a>
          <a href="../pages/Faq/index.html" class="hover:text-primary transition">FAQ</a>
          <a href="login.php" class="hover:text-primary transition">Login</a>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <main class="pt-20">
      <!-- Hero Section -->
      <section class="relative py-32 bg-gradient-to-b from-purple-900 to-black">
        <div class="max-w-6xl mx-auto px-4 text-center">
          <h1 class="text-5xl md:text-7xl font-extrabold mb-6">About PowerCare</h1>
          <p class="text-xl md:text-2xl max-w-3xl mx-auto">
            Empowering communities to transform electricity services through collective feedback
          </p>
        </div>
      </section>

      <!-- Our Story Section -->
      <section class="py-20 bg-black">
        <div class="max-w-5xl mx-auto px-4">
          <div class="flex flex-col md:flex-row gap-12 items-center">
            <div class="md:w-1/2">
              <h2 class="text-4xl font-bold mb-6 text-primary">Our Story</h2>
              <p class="text-lg mb-4">
                PowerCare was born out of frustration with persistent electricity issues that seemed to go unresolved. 
                After experiencing yet another prolonged blackout in 2022, our team realized there had to be a better way 
                to communicate these problems to utility providers.
              </p>
              <p class="text-lg">
                We developed PowerCare as a bridge between consumers and electricity providers, creating a platform where 
                feedback is organized, actionable, and measurable. What started as a local solution has now grown into 
                a national movement for better electricity services.
              </p>
            </div>
            <div class="md:w-1/2">
              <img src="https://images.pexels.com/photos/577514/pexels-photo-577514.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Community discussing electricity issues" class="rounded-lg shadow-2xl">
            </div>
          </div>
        </div>
      </section>

      <!-- Mission & Values -->
      <section class="py-20 bg-gray-900">
        <div class="max-w-6xl mx-auto px-4">
          <h2 class="text-4xl font-bold text-center mb-16 text-primary">Our Mission & Values</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 bg-gray-800 rounded-lg">
              <i class="fas fa-bolt mission-icon"></i>
              <h3 class="text-xl font-semibold mb-4">Reliable Power for All</h3>
              <p>
                We believe every community deserves consistent, quality electricity service as a fundamental right.
              </p>
            </div>
            
            <div class="text-center p-8 bg-gray-800 rounded-lg">
              <i class="fas fa-users mission-icon"></i>
              <h3 class="text-xl font-semibold mb-4">Community Driven</h3>
              <p>
                Real change happens when people come together. We amplify collective voices for greater impact.
              </p>
            </div>
            
            <div class="text-center p-8 bg-gray-800 rounded-lg">
              <i class="fas fa-chart-line mission-icon"></i>
              <h3 class="text-xl font-semibold mb-4">Data-Powered Solutions</h3>
              <p>
                We transform anecdotal complaints into actionable data that utility providers can use to improve.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Team Section -->
      <section class="py-20 bg-black">
        <div class="max-w-6xl mx-auto px-4">
          <h2 class="text-4xl font-bold text-center mb-4 text-primary">Meet Our Team</h2>
          <p class="text-center text-xl mb-16 max-w-2xl mx-auto">
            The passionate individuals working to illuminate the path to better electricity services
          </p>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="team-member-card bg-gray-900 rounded-lg overflow-hidden transition duration-300">
              <img src="https://images.pexels.com/photos/839011/pexels-photo-839011.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Alex Johnson" class="w-full h-64 object-cover">
              <div class="p-6">
                <h3 class="text-xl font-bold">Alex Johnson</h3>
                <p class="text-primary mb-3">CEO & Founder</p>
                <p class="text-sm text-gray-400">
                  Former energy consultant who saw the need for better consumer-provider communication channels.
                </p>
                <div class="flex mt-4 space-x-3">
                  <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="team-member-card bg-gray-900 rounded-lg overflow-hidden transition duration-300">
              <img src="https://images.pexels.com/photos/839011/pexels-photo-839011.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Sarah Chen" class="w-full h-64 object-cover">
              <div class="p-6">
                <h3 class="text-xl font-bold">Sarah Chen</h3>
                <p class="text-primary mb-3">CTO</p>
                <p class="text-sm text-gray-400">
                  Tech innovator with a passion for building platforms that solve real-world infrastructure problems.
                </p>
                <div class="flex mt-4 space-x-3">
                  <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-github"></i></a>
                </div>
              </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="team-member-card bg-gray-900 rounded-lg overflow-hidden transition duration-300">
              <img src="https://images.pexels.com/photos/839011/pexels-photo-839011.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Michael Rodriguez" class="w-full h-64 object-cover">
              <div class="p-6">
                <h3 class="text-xl font-bold">Michael Rodriguez</h3>
                <p class="text-primary mb-3">Community Director</p>
                <p class="text-sm text-gray-400">
                  Grassroots organizer who connects PowerCare with local communities and utility providers.
                </p>
                <div class="flex mt-4 space-x-3">
                  <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="text-gray-400 hover:text-primary"><i class="fas fa-globe"></i></a>
                </div>
              </div>
            </div>
            
            <!-- Team Member 4 -->
            <div class="team-member-card bg-gray-900 rounded-lg overflow-hidden transition duration-300">
              <img src="https://images.pexels.com/photos/839011/pexels-photo-839011.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Priya Patel" class="w-full h-64 object-cover">
              <div class="p-6">
                <h3 class="text-xl font-bold">Priya Patel</h3>
                <p class="text-primary mb-3">Data Analyst</p>
                <p class="text-sm text-gray-400">
                  Turns user feedback into actionable insights that drive infrastructure improvements.
                </p>
                <div class="flex mt-4 space-x-3">
                  <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-medium"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Stats Section -->
      <section class="py-20 bg-gradient-to-r from-purple-900 to-black">
        <div class="max-w-6xl mx-auto px-4">
          <h2 class="text-4xl font-bold text-center mb-16">PowerCare By The Numbers</h2>
          
          <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
              <div class="text-5xl font-bold mb-2">25K+</div>
              <div class="text-gray-300">Active Users</div>
            </div>
            <div>
              <div class="text-5xl font-bold mb-2">150+</div>
              <div class="text-gray-300">Communities Served</div>
            </div>
            <div>
              <div class="text-5xl font-bold mb-2">42%</div>
              <div class="text-gray-300">Faster Issue Resolution</div>
            </div>
            <div>
              <div class="text-5xl font-bold mb-2">4.7★</div>
              <div class="text-gray-300">Average User Rating</div>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA Section -->
      <section class="py-20 bg-black">
        <div class="max-w-4xl mx-auto px-4 text-center">
          <h2 class="text-4xl font-bold mb-6">Join the Movement</h2>
          <p class="text-xl mb-8 max-w-2xl mx-auto">
            Your feedback can help improve electricity services for your entire community.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="signup.php" class="px-8 py-3 bg-primary text-white rounded-full hover:bg-accent transition font-semibold">
              Sign Up Now
            </a>
            <a href="../pages/contactUs/index.html" class="px-8 py-3 border border-primary text-white rounded-full hover:bg-primary transition font-semibold">
              Contact Our Team
            </a>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 py-12">
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
          <p>&copy; 2023 PowerCare. All rights reserved. | <a href="../pages/TnC/index.html" class="hover:text-primary transition">Terms of Service</a> | <a href="#" class="hover:text-primary transition">Privacy Policy</a></p>
        </div>
      </div>
    </footer>
  </body>
</html>
