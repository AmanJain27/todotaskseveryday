<html>
    <head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles.css">
    
        <title>My Php Project</title>
    </head>
    <style>
        body{
    margin: 0;
    padding: 0;
}



.login-box{
    background: rgb(0,0,0,0.26);
    border-radius: 15px;
    position: absolute;
    top: 25%;
    left: 40%;
    transform: translate(-50% -50%);
    height: 420px;
    box-sizing: border-box;
    padding: 66px 50px;
    
}


.thumb{
    
    border: none; 
    outline: none; 
    font-size: 18px; 
    margin: 0;  
    float: left; 
    border-bottom: 1px solid #349b28;
    margin-bottom: 20px; 
    background: transparent;
    
    transition: all 0.3s ease 0s;
}
.thumb:hover{
    transform: scale(1.1);
    border-bottom: 1px solid rgb(112, 124, 110);
}

.btn{
    
    margin-top: 20px;
    position: relative;
    width: 80%;
    border: 1px solid #349b28 !important;
    padding: 2px;
    float: left;
    transition: all 0.3s ease 0s;
}

.btn:hover{
    background: rgb(0,0,0,0.1);
    transform :scale(0.9);
}


    </style>
    
    <body>
    
            <form method="POST" action="/login" class="login-box">
                    @csrf
            
                    <h1 style="float: left; border-bottom: 4px solid #349b28; margin-bottom: 40px; margin-top: 0px; ">Login</h1>
                    <!-- <label for="email" class="col-xs-12 col-md-10 col-lg-12 label-box">Email</label> -->
                    
                    <input type="email" placeholder="Email" name="email" class="col-xs-12 col-md-10 col-lg-9 thumb"><br/><br/>
                   <!-- <label for="email" class="col-xs-12 col-md-10 col-lg-12 label-box">Password</label> -->
                    <input type="password" placeholder="Password" name="password" class="col-md-10 col-xs-12 col-xs-12 col-lg-9 thumb"><br/><br>
                    <input type="submit" value="submit" name="submit" class="btn btn-default">
                
               
            </form>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    

    </body>
</html>
<?php 

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
            echo "Enter your email";
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
            echo "Email already exists :(";
        } 
        
        $db->close();
    }
        
}


?>

