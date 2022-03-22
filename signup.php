<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container"> 
 <h1 class="h1">Welcome to School Online Exam Application- Sign Up</h1>


<div class="card" id="login" style="width: 35rem;">
  <!-- <img src="./images/login.png" class="card-img-top" width="10" height="10" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">SIGNUP</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    
    <div class="mb-3 row">
    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputText">
    </div>
    </div>

    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail">
    </div>
    </div>
    
    <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>
   <button class="btn btn-primary">Login</button> 
   <button class="btn btn-primary">Register</button> 
  </div>
</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

<style>
#login {
  margin-left: 25%;
  margin-top: 15%;
}
.h1
{
  margin-left: 20%;
  margin-top: 5%;
  font-family: 'Times New Roman', Times, serif;
  font: bolder;
}
body
{
  background-color: #e3f1f9;
}

</style>