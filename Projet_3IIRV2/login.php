<?php 
   require('validation.php');
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Salles/Index</title>
    <link rel="icon" type="image/x-icon" href="Assets/98a7996e0929082e2afe0b90afe429e7_400x400.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/indexStyle.css">
</head>
<body class="index">
    <img  src="Assets/logo.png">
    <form method="post">
        <div class="form-group col-xs-1" >
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name = "password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="form-check"> 
          <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick ="showpass()">
          <label class="form-check-label" for="exampleCheck1" >Show Password</label>
        </div><br>
         <span id="error"><?= $err ?></span><br><br>
        <button type="submit" class="btn btn-primary" >Submit</button>
      </form>
      <script>
         function showpass(){
            let field = document.getElementById('exampleInputPassword1');
            if (field.type == "password") {
               field.type = "text";
            }
            else{
              field.type = "password";
            }
         }

      </script>
</body>
</html>