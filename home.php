<?php
include_once 'navbar.php';

$UID;

if(!empty($_SESSION['User_Status'])) {
    $UID = $_SESSION['User_id'];
}
?>

<!DOCTYPE html>
<style>

body {
  margin: 0;
  box-sizing: border-box;
}
/* CSS for header */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f5f5f5;
}

.header .logo {
  font-size: 25px;
  font-family: 'Sriracha', cursive;
  color: #000;
  text-decoration: none;
  margin-left: 30px;
}

.nav-items {
  display: flex;
  justify-content: space-around;
  align-items: center;
  background-color: #f5f5f5;
  margin-right: 20px;
}

.nav-items a {
  text-decoration: none;
  color: #000;
  padding: 35px 20px;
}
/* CSS for main section */
.intro {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 520px;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%), url('image02.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.intro h1 {
  font-family: sans-serif;
  font-size: 60px;
  color: #fff;
  font-weight: bold;
  text-transform: uppercase;
  margin: 0;
}

.intro p {
  font-size: 20px;
  color: #d1d1d1;
  text-transform: uppercase;
  margin: 20px 0;
}

.intro button {
  background-color: #5edaf0;
  color: #000;
  padding: 10px 25px;
  border: none;
  border-radius: 5px;
  font-size: 20px;
  font-weight: bold;
  cursor: pointer;
  box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4)
}

.achievements {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 40px 80px;
}

.achievements .work {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 40px;
}

.achievements .work i {
  width: fit-content;
  font-size: 50px;
  color: white;
  border-radius: 50%;
  border: 2px solid #333333;
  padding: 12px;
}

.achievements .work .work-heading {
  font-size: 20px;
  color: white;
  text-transform: uppercase;
  margin: 10px 0;
}

.achievements .work .work-text {
  font-size: 15px;
  color: white;
  margin: 10px 0;
}

.about-me {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 80px;
  border-top: 2px solid #eeeeee;
}

.about-me img {
  width: 500px;
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

.about-me-text h2 {
  font-size: 30px;
  color: white;
  text-transform: uppercase;
  margin: 0;
}

.about-me-text p {
  font-size: 15px;
  color: white;
  margin: 10px 0;
}
/* CSS for footer */
.footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #FF9836;
  padding: 40px 80px;
}

.footer .copy {
  color: #fff;
}

.bottom-links {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 40px 0;
}

.bottom-links .links {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 40px;
}

.bottom-links .links span {
  font-size: 20px;
  color: #fff;
  text-transform: uppercase;
  margin: 10px 0;
}

.bottom-links .links a {
  text-decoration: none;
  color: #a1a1a1;
  padding: 10px 20px;
}
.credstable  {
    align-self: center;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 20px;
    font-family: Arial;
    color: white;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

thead tr {
    background-color: #FF9836;
    color: #ffffff;
    text-align: left;
}

th {
    background-color: #FF9836;
    color: #ffffff;
    padding: 12px 15px;
}

td {
    padding: 12px 15px;
    text-align: center;
    font-size: 16px;
    font-weight: 300;
}
</style>
<html>
<title>Fuel Quoters</title>

<main>
  <div class="intro">
    <h1>Fuel Quote</h1>
    <p>We fuel you.</p>
  </div>
  <div class="achievements">
    <div class="work">
      <i class="fas fa-atom"></i>
      <p class="work-heading">Projects</p>
      <p class="work-text">This is Group 1's Fuel Quote Website, the industry leading website for fuel quotes.</p>
    </div>
    <div class="work">
      <i class="fas fa-skiing"></i>
      <p class="work-heading">Skills</p>
      <p class="work-text">We are masters of PHP, HTML, SQL and CSS. </p>
    </div>
    <div class="work">
      <i class="fas fa-ethernet"></i>
      <p class="work-heading">Tools</p>
      <p class="work-text">We use tools such as MySQL, VSCode, XAMPP, Amazon Web Service and PHPUnit.</p>
    </div>
  </div>
  <div class="about-me">
    <div class="about-me-text">
    <table class="credstable">
                <tr>
                    <th>Derek Castillo</th>
                    <td>Facilitate discussion, organize meetings, delegate tasks, signup page front+backend, input validation, getQuote page front+backend, pricing module implementation, display data, insert/fetch data from db, worked on sessions, unit tests, debugging</td>
                </tr>
                <tr>
                    <th>Jacob Duarte</th>
                    <td>Created and worked on admin page, quote history, and registered users.</td>
                </tr>
                <tr>
                    <th>Justin Jose</th>
                    <td>Helped refine UML, implemented style design choices used later on in the fuel quote form and login pages, created clientProfile and clientEdit pages (frontend and backend), set up the database on AWS, created the user and audit columns (logs user creation, profile edits, and quote requests with the use of triggers), and started implementation and assisted in the use of sessions (updated navigation bar allowing it to change depending on whether or not a user is signed in and whether they are an admin or regular client).</td>
                </tr>
                <tr>
                    <th>Nadeem Karachi</th>
                    <td>Backend for Login,logout, connecting sign up page to login page if new user. Helped format and style user view tables for registered users, helped with user login and logout, helped set up tables in database and connect some displays/views for user on web app. Created and helped design homepage for website.</td>
                </tr>
            </table>
    </div>
    <img src="https://thefader-res.cloudinary.com/private_images/w_640,c_limit,f_auto,q_auto:eco/DfrJkFyXcAA5b59_ytmfsj/young-thug-lil-durk-computer-meme.jpg" alt="me">
  </div>
</main>
<footer class="footer">
  <div class="copy">&copy; 2023 Developer</div>
  <div class="bottom-links">

  </div>
</footer>