<html>
    <head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="styles.css"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>My Php Project</title>
    </head>
    <style>
        body{
    margin: 0;
    padding: 0;
}



.login-box{
    background: rgb(0,0,0,0.6);
    color: #349b28;
    border-radius: 15px;
    position: absolute;
    top: 24%;
    left: 40%;
    transform: translate(-50% -50%);
    height: 540px;
    box-sizing: border-box;
    padding: 68px 36px;

}


.thumb{

    border: none;
    outline: none;
    font-size: 18px;
    margin: 0;
    float: left;
    border-bottom: 1px solid #349b28;
    margin-bottom: 30px;
    background: transparent;
    color: white;
    transition: all 0.3s ease 0s;
}
.thumb:hover{
    transform: scale(1.1);
    border-bottom: 1px solid rgb(112, 124, 110);
}

.btn{
    color: #349b28 !important;
    margin-top: 40px;
    position: relative;
    width: 80%;
    border: 1px solid #349b28 !important;
    padding: 2px;
    float: left;
    transition: all 0.3s ease 0s;
}

.okay{

  background: rgb(0,0,0,0.6);

}

.okay:hover{
    background: rgb(0,0,0,0.4);
    transform :scale(0.96);

}


.error-style{

    margin-top: 20px;
    color: red;
    border-bottom: none;
    pointer-events: none;

}
.label{
  margin-top: 20px;
  border-bottom: none;
}

    </style>
<!-- https://i.imgur.com/1SnhDEh.jpg -->
    <body style="background: url(https://images.wallpaperscraft.com/image/road_marking_trees_137674_1920x1080.jpg)">
<!-- https://i.imgur.com/cjPnOhL.jpeg -->
      <!-- {{ asset('/pexels-pixabay-46253.jpg') }} -->
            <!-- <img src="http://i.stack.imgur.com/zWfJ5.jpg" alt=""> -->



            <form method="POST"  id="ajaxform" class="login-box" >
                    @csrf

                    <h1 style="float: left; border-bottom: 4px solid #349b28; margin-bottom: 40px; margin-top: 0px; " class="heading">Register</h1>

                    <!-- Name of the person -->
                    <input type="text" id="name" onkeyup="check_cred()" placeholder="Name" name="name" class=" col-xs-12 col-md-10 col-lg-9 thumb"><br/><br/>

                    <!-- email of the person   -->
                    <input type="email" id="email" onkeyup="check_cred()" placeholder="Email" name="email" class="email col-xs-12 col-md-10 col-lg-9 thumb"><br/><br/>
                   <!-- <label for="email" class="col-xs-12 col-md-10 col-lg-12 label-box">Password</label> -->
                    <input type="password"  id="password" onkeyup="check_cred()" placeholder="Password" name="password" class="col-md-10 col-xs-12 col-xs-12 col-lg-9 thumb" ><br/><br>

                    <span id="text" class="success thumb error-style"></span>
                    <input type="submit" value="register" name="submit" id="submit" class="save-data btn btn-default" disabled>
                    <label for="" class="thumb label">If you have already registered <a href="/login">Login here</a></label>


            </form>


    <meta name="csrf-token" content="{{ csrf_token() }}" />


    </body>



<!-- script for the button to be disabled until certain conditions met -->


<script type="text/javascript" language="javascript">
//
// var btn = $('#submit');
// btn.prop(disabled, true);

var reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

function check_cred(){
  //alert(1);

  var btn = document.getElementById("submit");
  var email = document.getElementById("email").value;
  var name = document.getElementById("name").value;
  var password =  document.getElementById("password").value;
  //btn.disabled=true;
  // btn.classList.remove('okay');
  if(!email.match(reg) || password.length < 8 || name == ""){

    btn.classList.remove('okay');

    btn.disabled = true;

  }
  else{

    btn.classList.add('okay');
    btn.disabled = false;
  }






}


function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}






</script>


<!-- <script type="text/javascript" language="javascript">
    function check_cred()
    {

        var f = document.forms["ajaxform"].elements;
        var cansubmit = true;

        for (var i = 0; i < f.length; i++) {
            if (f[i].value.length == 0) cansubmit = false;
        }

        if (cansubmit) {
            document.getElementById('submit').disabled = false;
        }
    }
</script> -->




<!-- script for ajax requests -->
    <script>

let _token   = $('meta[name="csrf-token"]').attr('content');
        $(".save-data").click( function(event){
          let email = $("input[name=email]").val();
          let password = $("input[name=password]").val();
          let name = $("input[name=name]").val();


                  event.preventDefault();


                  $.ajax({
                    url: '/register/ajax',
                    type: "POST",
                    data:{
                      name: name,
                      email: email,
                      password: password,
                      _token: _token,
                    },
                    success:  function(response){
                      if(response){

                        json_res = $.parseJSON(response);

                        count = json_res['COUNT(email)'];

                        if(count==1){
                          $("#ajaxform")[0].reset();
                          $("#ajaxform")[0][4].disabled = true;
                          $("#text").text("Email already in use");
                          var btn = document.getElementById("submit");
                          btn.classList.remove('okay');
                        }

                        else{

                          $.ajax({
                            url: "/email/verify",
                            type: "GET",
                            // data:{
                            //   name: name,
                            //   email: email,
                            //   password: password,
                            //   _token: _token,
                            // },
                            success: function(response){
                              console.log(response);
                              $("#ajaxform")[0].reset();

                              $("#text").text(response.message);

                              $(".heading")[0].innerHTML = "Verify Email";

                              //$("#ajaxform")[0][1].placeholder = "Enter Verification Code";
                              //var btn = document.getElementById("submit");

                              $("#email").remove();
                              $("#password").remove();
                              //var email_code = $("#name");
                              $("#name").remove();
                              $("#submit").remove();
                              $('.label').remove();
                            },

                          });





                        }

                      }
                    },
                  });



        });




    </script>

</html>




<!-- <?php

        //echo "<p class=\"container\">Hello</p>";
    class MyDB extends SQLite3{
        function __construct(){
            $this->open('test.db');
        }
    }

    $db = new MyDB();
    if(!$db){
        echo $db->lastErrorMsg();
    } else {
        //echo "Opened database successfully\n";

        if(isset($_POST['submit'])){
        if(empty($_POST['email'])){
            echo "<script>alert(\"Enter your email\");</script>";
            exit();
        }else{
            $email = htmlspecialchars($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Enter a valid email";
                exit();
            }

        }


        if(empty($_POST['password'])){
            echo "Enter your password";
            exit();
        }else{
            $password = $_POST['password'];

            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password )){
                  echo "Your password is not safe. Try entering a new one.";
                exit();
            }
        }


        $sql = "SELECT * FROM users where email='$email'";
        $rows_query = $db->query($sql);
        $rows = $rows_query->fetchArray(SQLITE3_ASSOC);

        if(empty($rows['email'])){
            $sql_query = "INSERT INTO users(id, email, password) values(NULL, '$email', '$password');";
            $result = $db->exec($sql_query);
            if(!$result){
                echo $db->lastErrorMsg();
            }else{
                echo "details added <br />";
            }
        }else{
            echo "<script>alert(\"Email already exists\") :();</script>";
        }

        $db->close();
    }

}


?> -->
