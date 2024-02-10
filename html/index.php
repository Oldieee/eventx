<?php
session_start();
if(isset($_SESSION['user_id'])){
    $mysqli=require __DIR__."/database.php";
    $sql="SELECT *FROM user WHERE id={$_SESSION['user_id']}";
    $result=$mysqli->query($sql);
    $user=$result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>sign-up</title>
    <link rel="stylesheet" href="../css/indexphp.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/script.js" defer></script>
   
  </head>

  <body>
  <div class="header">
      <div class="img-parent">
        <div class="img">
          <img src="../css/photos/bg1.jpg" alt="" />
        </div>
        <div class="img-overlay">
      
  
        <?php if(isset($user)):?>
  
  <nav class="navbar navbar-expand-sm fixed-top">
      <a style="color: var(--orange)" href="" class="navbar-brand">EventX</a>
      <ul class="navbar-nav">
        <li class="nav-item"><a id="sign" href="" class="nav-link">Home</a></li>
        <li class="nav-item">
          <a id="sign" href="" class="nav-link">Pages</a>
        </li>
        <li class="nav-item">
          <a id="sign" href="" class="nav-link">Events</a>
        </li>
        <li class="nav-item">
          <a id="sign" href="logout.php" class="nav-link">Log out</a>
        </li>
      </ul>
    </nav>


    
    <h1 id="welcome">Welcome <?= htmlspecialchars($user["first_name"])?> </h1>
    <div id="eventForm">
    <input type="text" id="eventNameInput" placeholder="Event Name">
<input type="text" id="eventDescriptionInput" placeholder="Event Description">
<input type="text" id="joinLinkInput" placeholder="Join Link">
<input type="file" id="imageInput" accept="image/*">
<button  id="btn"onclick="createEventComponent()">Create Event</button>
    </div>
</div>
</div>
    <?php  else: ?>
    <nav class="navbar navbar-expand-sm fixed-top">
      <a style="color: var(--orange)" href="index.html" class="navbar-brand">EventX</a>
      <ul class="navbar-nav">
        <li class="nav-item"><a id="sign" href="" class="nav-link">Home</a></li>
        <li class="nav-item">
          <a id="sign" href="" class="nav-link">Pages</a>
        </li>
        <li class="nav-item">
          <a id="sign" href="" class="nav-link">Events</a>
        </li>
        
        <li class="nav-item">
          <a id="sign" href="login.html" class="nav-link">Log in</a>
        </li>
        <li class="nav-item">
          <a id="sign" href="signup.html" class="nav-link">Sign up</a>
        </li>
       

      </ul>
    </nav>
    <p><a href="login.html">Log in</a> or <a href="signup.html">sing up</a></p>
<?php endif;?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../js/funct.js" defer></script>
   </body>
</html>

