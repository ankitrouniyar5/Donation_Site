

    <!-- Modal for sign in button-->
<div class="modal fade" id="sign_in_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sign_in_modal_title">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id = "error1" class="alert alert-danger"></div>
      <div class="modal-body">
        <form>
              <div class="form-group">
                <label for="sign_in_email">Email address</label>
                <input type="email" class="form-control" id="sign_in_email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="sign_in_password">Password</label>
                <input type="password" class="form-control" id="sign_in_password" placeholder="Password">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="sign_in_remember" value=1>
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
              </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id = "sign_in_button">Sign in</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal for sign in button-->
<div class="modal fade" id="sign_up_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sign_in_modal_title">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id = "error2" class="alert alert-danger"></div>
      <div class="modal-body">
        <form>
              <div class="row">
              <div class="form-group col">
                <label for="sign_up_first_name">First Name</label>
                <input type="email" class="form-control" id="sign_up_first_name" aria-describedby="emailHelp" placeholder="First name">
              </div>
              <div class="form-group col">
                <label for="sign_up_last_name">Last Name</label>
                <input type="email" class="form-control" id="sign_up_last_name" aria-describedby="emailHelp" placeholder="Last name">
              </div>
            </div>
              <div class="form-group">
                <label for="sign_up_email">Email address</label>
                <input type="email" class="form-control" id="sign_up_email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="row">
              <div class="form-group col">
                <label for="sign_up_password">Password</label>
                <input type="password" class="form-control" id="sign_up_password" placeholder="Password">
              </div>
              <div class="form-group col">
                <label for="sign_up_confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="sign_up_confirm_password" placeholder="Confirm Password">
              </div>
            </div>
            <div class="form-group">
                <label for="sign_up_phone">Phone Number</label>
                <input type="password" class="form-control" id="sign_up_phone" placeholder="Phone Number">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="sign_up_remember" value=1>
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
              </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id = "sign_up_button">Sign up</button>
      </div>
    </div>
  </div>
</div>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">&copy GIVE FOUNDATION 2020</span>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">

        //Ajax for sign in button
        $("#sign_in_button").click(function(){

         $.ajax({
            type: "POST",
            url: "actions.php?action=signIn",
            data: "email=" + $("#sign_in_email").val() + "&password=" + $("#sign_in_password").val() + "&remember_me=" + $("#sign_in_remember").val(),
            success: function(result) {
                
                if (result == "1") {
                    
                    window.location.assign("http://give-com.stackstaging.com/");
                    
                } else if (result != "") {

                    $("#error1").show();
                    $("#error1").html(result);
                
                }
              

              }
            
        })


        })

        //Ajax for sign up button

        $("#sign_up_button").click(function(){

          
            $.ajax({
            type: "POST",
            url: "actions.php?action=signUp",
            data: "email=" + $("#sign_up_email").val() +
                   "&password=" + $("#sign_up_password").val() + 
                   "&remember_me=" + $("#sign_up_remember").val()+
                   "&first-name=" + $("#sign_up_first_name").val() +
                    "&last-name=" + $("#sign_up_last_name").val() + 
                    "&confirm-password=" + $("#sign_up_confirm_password").val() + 
                  "&phone-number=" + $("#sign_up_phone").val(),
            success: function(result) {
                
                if (result == "1") {
                    
                    window.location.assign("http://give-com.stackstaging.com/");
                    
                } else if (result != "") {

                    $("#error2").show();
                    $("#error2").html(result);
                
                }
              
              

              }
            
        })


        })

        //Ajax for posting donation

        $("#postDonation").click(function() {
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=postDonation",
            data: "donationInfo=" + $("#donationInfo").val() + "&status=" + $("#status").val(),
            success: function(result) {
                
                if (result == "1") {
                    
                    $("#donationSuccess").show();
                    $("#donationFail").hide();
                    
                } else if (result != "") {
                    
                    $("#donationFail").html(result).show();
                    $("#donationSuccess").hide();
                    
                }
            }
            
        })
        
    })
        // ajax for posting request.
        $("#postRequest").click(function() {
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=postRequest",
            data: "requestInfo=" + $("#requestInfo").val() + "&title=" + $("#title").val(),
            success: function(result) {
                
                if (result == "1") {
                    
                    $("#requestSuccess").show();
                    $("#requestFail").hide();
                    
                } else if (result != "") {
                    
                    $("#requestFail").html(result).show();
                    $("#requestSuccess").hide();
                    
                }
            }
            
        })
        
    })

         $("#postMedicine").click(function() {
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=postMedicine",
            data: "medicineInfo=" + $("#medicineInfo").val() + "&name=" + $("#name").val(),
            success: function(result) {
                
                if (result == "1") {
                    
                    $("#medicineSuccess").show();
                    $("#medicineFail").hide();
                    
                } else if (result != "") {
                    
                    $("#medicineFail").html(result).show();
                    $("#medicineSuccess").hide();
                    
                }
            }
            
        })


        
    })


        //Ajax for deleting donation
        $(".deleteDonation").click(function() {
             
        $.ajax({
            type: "POST",
            url: "actions.php?action=deleteDonation",
            data: "value="+$(this).val(),
            success: function(result) {
                
                if (result == "1") {
                    
                   alert("Deleted");
                    location.reload(true);
                    
                } else if (result != "1") {
                    
                   alert("Failed");
                    
                }
            }
            
        })
        
    })

         //Ajax for deleting donation
        $(".deleteRequest").click(function() {
             
        $.ajax({
            type: "POST",
            url: "actions.php?action=deleteRequest",
            data: "value="+$(this).val(),
            success: function(result) {
                
                if (result == "1") {
                    
                   alert("Deleted");
                    location.reload(true);
                    
                } else if (result != "1") {
                    
                   alert("Failed");
                    
                }
            }
            
        })
        
    })

          $(".deleteMedicine").click(function() {
             
        $.ajax({
            type: "POST",
            url: "actions.php?action=deleteMedicine",
            data: "value="+$(this).val(),
            success: function(result) {
                
                if (result == "1") {
                    
                   alert("Deleted");
                    location.reload(true);
                    
                } else if (result != "1") {
                    
                   alert("Failed");
                    
                }
            }
            
        })
        
    })



        //Ajax for changing doantion status

$(".changeStatus").click(function() {
             
        $.ajax({
            type: "POST",
            url: "actions.php?action=changeStatus",
            data: "value="+$(this).val(),
            success: function(result) {
                
                if (result == "1") {
                    
                   alert("status updated");
                    location.reload(true);
                    
                } else if (result != "1") {
                    
                   alert("failed");
                    
                }
            }
            
        })
        
    })

    //Ajax for sending emails
$("#sendmail").click(function() {


    var x = $("#mailDescription").val();
    
  $("#sendingMail").show();
  $("#sendingFailed").hide();
  $("#sendingSuccess").hide();
             
        $.ajax({
            type: "POST",
            url: "actions.php?action=sendMail",
            data: "mailDescription="+ x + "&phone-number="+$("#phone-number-box").val(),
            success: function(result) {
              
                if (result == "1") {
                    
                   $("#sendingMail").hide();
                   $("#sendingSuccess").show();

                    
                } else if (result != "1") {
                    
                    $("#sendingMail").hide();
                    $("#sendingFailed").html(result);
                   $("#sendingFailed").show();

                    
                }
            }
            
        })
                
    })


     
    </script>
  </body>
</html>