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
    height: 420px;
    width: 400px;
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


    </style>
<!-- https://i.imgur.com/1SnhDEh.jpg -->
    <body style="background: url(https://images.wallpaperscraft.com/image/road_marking_trees_137674_1920x1080.jpg)">
<!-- https://i.imgur.com/cjPnOhL.jpeg -->
      <!-- {{ asset('/pexels-pixabay-46253.jpg') }} -->
            <!-- <img src="http://i.stack.imgur.com/zWfJ5.jpg" alt=""> -->



            <form method="POST" action="reverify" id="ajaxform" class="login-box" >
                    @csrf

                    <h1 style="float: left; border-bottom: 4px solid #349b28; margin-bottom: 40px; margin-top: 0px; " class="heading">Verify</h1><br><br><br>

                    <!-- Name of the person -->
                    <!-- <input type="text" id="name" onkeyup="check_cred()" placeholder="Name" name="name" class=" col-xs-12 col-md-10 col-lg-9 thumb"><br/><br/> -->

                    <!-- email of the person   -->
                    <!-- <input type="email" id="email" onkeyup="check_cred()" placeholder="Email" name="email" class="email col-xs-12 col-md-10 col-lg-9 thumb"><br/><br/> -->
                   <!-- <label for="email" class="col-xs-12 col-md-10 col-lg-12 label-box">Password</label> -->
                    <!-- <input type="password"  id="password" onkeyup="check_cred()" placeholder="Password" name="password" class="col-md-10 col-xs-12 col-xs-12 col-lg-9 thumb" ><br/><br> -->

                    <span id="text" class="success thumb error-style">Kindly verify your email before proceeding further. If you did not get an email, click on resend for re-verification</span>
                    <input type="submit" value="Resend" name="submit" id="submit" class="save-data btn btn-default">


            </form>


    <meta name="csrf-token" content="{{ csrf_token() }}" />


    </body>
