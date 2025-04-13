<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Feedback4U</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   
  
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

.logo_name {
    font-size: 28px;
    font-weight: bold;
    font-family: Arial, sans-serif;
    color: #ff6600;
    display: inline-block;
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
    animation: colorShift 3s infinite linear, glowEffect 2s infinite alternate, moveUpDown 3s infinite ease-in-out;
}


@keyframes colorShift {
    0% { color: #d5f407; }
    33% { color: #0ea8e5; }
    66% { color: #3399ff; }
    100% { color: #eb0a95; }
}


@keyframes glowEffect {
    0% { text-shadow: 0 0 5px rgba(5, 234, 215, 0.5); }
    100% { text-shadow: 0 0 15px rgba(235, 204, 8, 0.8); }
}

@keyframes moveUpDown {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}
footer{
  /* position: fixed; */
  background:rgb(35, 34, 40);
  width: 200%;
  bottom: 0;
  left: 0;
}
footer::before{
  content: '';
  position: absolute;
  left: 0;
  top: 100px;
  height: 1px;
  width: 100%;
  background: #d9d9d9ae;
}
footer .content{
  max-width: 1250px;
  margin: auto;
  padding: 30px 40px 40px 40px;
}
footer .content .top{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 50px;
}
.content .top .logo-details{
  color: #d4d413;
  font-size: 30px;
}
.content .top .media-icons{
  display: flex;
}
.content .top .media-icons a{
  height: 40px;
  width: 40px;
  margin: 0 8px;
  border-radius: 50%;
  text-align: center;
  line-height: 40px;
  color: #fff;
  font-size: 17px;
  text-decoration: none;
  transition: all 0.4s ease;
}
.top .media-icons a:nth-child(1){
  background: #4267B2;
}
.top .media-icons a:nth-child(1):hover{
  color: #4267B2;
  background: #fff;
}
.top .media-icons a:nth-child(2){
  background: #1DA1F2;
}
.top .media-icons a:nth-child(2):hover{
  color: #1DA1F2;
  background: #fff;
}
.top .media-icons a:nth-child(3){
  background: #E1306C;
}
.top .media-icons a:nth-child(3):hover{
  color: #E1306C;
  background: #fff;
}
.top .media-icons a:nth-child(4){
  background: #0077B5;
}
.top .media-icons a:nth-child(4):hover{
  color: #0077B5;
  background: #fff;
}
.top .media-icons a:nth-child(5){
  background: #FF0000;
}
.top .media-icons a:nth-child(5):hover{
  color: #FF0000;
  background: #fff;
}
footer .content .link-boxes{
  width: 100%;
  display: flex;
  justify-content: space-between;
}
footer .content .link-boxes .box{
  width: calc(100% / 5 - 10px);
}
.content .link-boxes .box .link_name{
  color: #fff;
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 10px;
  position: relative;
}
.link-boxes .box .link_name::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  height: 2px;
  width: 35px;
  background: #fff;
}
.link_name {
    position: relative;
    font-size: 20px;
    font-weight: bold;
    color: #333;
    padding: 5px 0;
    display: inline-block;
}

.link_name::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -3px;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #e8f900, #ff0808, #0ae9e1);
    background-size: 200% 100%;
    animation: moveUnderline 2s infinite linear;
}

@keyframes moveUnderline {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.content .link-boxes .box li{
  margin: 6px 0;
  list-style: none;
}
.content .link-boxes .box li a{
  color: #fff;
  font-size: 14px;
  font-weight: 400;
  text-decoration: none;
  opacity: 0.8;
  transition: all 0.4s ease
}
.content .link-boxes .box li a:hover{
  opacity: 1;
  text-decoration: underline;
}
.content .link-boxes .input-box{
  margin-right: 25px;
}
.link-boxes .input-box input{
  height: 40px;
  width: calc(100% + 55px);
  outline: none;
  border: 2px solid #AFAFB6;
  background: #d2debe;
  border-radius: 4px;
  padding: 0 15px;
  font-size: 15px;
  color: #fff;
  margin-top: 5px;
}
.link-boxes .input-box input::placeholder{
  color: #AFAFB6;
  font-size: 16px;
}
.link-boxes .input-box input[type="button"]{
  background: #e0bc06;
  color: #260de5;
  border: none;
  font-size: 18px;
  font-weight: 500;
  margin: 4px 0;
  opacity: 0.8;
  cursor: pointer;
  transition: all 0.4s ease;
}
.input-box input[type="button"]:hover{
  opacity: 6;
  color: #ff1531;
}
footer .bottom-details{
  width: 100%;
  background:rgb(35, 34, 40);
}
footer .bottom-details .bottom_text{
  max-width: 1250px;
  margin: auto;
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
}
.bottom-details .bottom_text span,
.bottom-details .bottom_text a{
  font-size: 14px;
  font-weight: 300;
  color: #fff;
  opacity: 0.8;
  text-decoration: none;
}
.bottom-details .bottom_text a:hover{
  opacity: 1;
  text-decoration: underline;
}
.bottom-details .bottom_text a{
  margin-right: 10px;
}
@media (max-width: 900px) {
  footer .content .link-boxes{
    flex-wrap: wrap;
  }
  footer .content .link-boxes .input-box{
    width: 40%;
    margin-top: 10px;
  }
}
@media (max-width: 700px){
  footer{
    position: relative;
  }
  .content .top .logo-details{
    font-size: 26px;
  }
  .content .top .media-icons a{
    height: 35px;
    width: 35px;
    font-size: 14px;
    line-height: 35px;
  }
  footer .content .link-boxes .box{
    width: calc(100% / 3 - 10px);
  }
  footer .content .link-boxes .input-box{
    width: 60%;
  }
  .bottom-details .bottom_text span,
  .bottom-details .bottom_text a{
    font-size: 12px;
  }
}
@media (max-width: 520px){
  footer::before{
    top: 145px;
  }
  footer .content .top{
    flex-direction: column;
  }
  .content .top .media-icons{
    margin-top: 16px;
  }
  footer .content .link-boxes .box{
    width: calc(100% / 2 - 10px);
  }
  footer .content .link-boxes .input-box{
    width: 100%;
  }
}

  </style>
</head>

<body>
  <footer>
    <div class="content">
      <div class="top">
        <div class="logo-details">
          <i class="fab fa-slack"></i>
          <span class="logo_name">PowerCare</span>
        </div>
        <div class="media-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <div class="link-boxes">
        <ul class="box">
          <li class="link_name">Company</li>
          <li><a href="#">Home</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Submit Issue</a></li>
        </ul>

        <ul class="box">
          <li class="link_name">Services</li>
          <li><a href="#">Real-time Monitoring</a></li>
          <li><a href="#">Fault Detection & Alerts</a></li>
          <li><a href="#">Power Usage Analysis</a></li>
          <li><a href="#">User Feedback System</a></li>
        </ul>

        <ul class="box">
          <li class="link_name">Account</li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Your Account</a></li>
          <li><a href="#">Preferences</a></li>
          <li><a href="#">Feedbacks</a></li>
        </ul>

        <ul class="box">
          <li class="link_name">Support & Feedback</li>
          <li><a href="#">📩 Report an Issue</a></li>
          <li><a href="#">📞 Customer Support</a></li>
          <li><a href="#">📧 support@powercare.com</a></li>
        </ul>

        <ul class="box input-box">
          <li class="link_name">Notifications</li>
          <li><input type="text" placeholder="Enter your email"></li>
          <li><input type="button" value="Notify Me"></li>
        </ul>
      </div>
    </div>

    <div class="bottom-details">
      <div class="bottom_text">
        <span class="copyright_text">
          © 2025 <a href="#">PowerCare</a>. All rights reserved.
        </span>
        <span class="policy_terms">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
        </span>
      </div>
    </div>
  </footer>
</body>

</html>
