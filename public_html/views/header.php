<html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Donate/share</title>
    <link rel="stylesheet" type="text/css" href="../style.css">

  </head>

    

      <body class="d-flex flex-column">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="">
          <img src="https://i7.pngflow.com/pngimage/924/815/png-seattle-foundation-non-profit-organisation-donation-fundraising-others-text-logo-charity-seattle-clipart.png" width="40" height="35" class="d-inline-block align-top" alt=""><strong>  Give</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['id'])) { ?> <li class="nav-item">
              <a class="nav-link" href="?page=donation"><strong>Donations</strong></a>
            </li>
            <br>
            <li class="nav-item">
              <a class="nav-link" href="?page=request"><strong>Requests</strong></a>
            </li>
            <br>
            <li class="nav-item">
              <a class="nav-link" href="?page=medicine"><strong>Medicines</strong></a>
            </li>
            <br>
            <li class="nav-item ">
              <a class="nav-link" href="?page=mydonation"><strong>My donations</strong></a>
            </li>
            <br>
            <li class="nav-item">
              <a class="nav-link" href="?page=myrequest"><strong>My Requests</strong></a>
            </li>
            <br>
             <li class="nav-item">
              <a class="nav-link" href="?page=mymedicine"><strong>My Medicines</strong></a>
            </li>
            <br>
             <li class="nav-item">
              <a class="nav-link" href="?page=medicine/blood"><strong>Blood</strong></a>
            </li>






          <?php } ?>
           
            
          </ul>
       
          
          <?php 

          if(isset($_SESSION['id']))
            {  ?>
          <div class="form-inline my-2 my-lg-0">
            
            <a href="?logout=1" class="btn btn-outline-success my-2 my-sm-0" >Log Out</a>
          
          </div>
        <?php }else{ ?>

          <div class="form-inline my-2 my-lg-0">

              <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#sign_in_modal">Sign in</button>
          
          </div>

          
          <div class="form-inline my-2 my-lg-0">
             
              <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#sign_up_modal">Sign Up</button>
          
          </div>
        <?php }?>
        </div>
      </nav>
