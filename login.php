<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <style type="text/css">
           body{
           background-color:#222222;
           }
           #form{
            margin-top:4%;
           }
            #form .form{
            background-color: #F9F9F9;
            position:relative;
            padding-top:20px;
            box-shadow: 0 0 4px gray;
            border-radius:10px;
            overflow: hidden;
           }
             #form .form h1{
            color:#8B0530;
            text-align:center;
            font-size:40px;
            font-weight:600;
            text-align:center;
            text-transform: uppercase;
           }
           #form form{
            margin:20px;
            overflow:hidden;
           }
           #form .form .form-group{
            padding:7px 0;
            position: relative;
           }
        #form .form label{
          text-align:left !important;
        }
         #form .form  input{
            border-radius: 1px !important;
            border-left:4px solid #8B0530 !important;
            height:44px !important;
            font-size:16px;
           }
          #form .form  input:focus{
            box-shadow: 0 0 0 !important;
           }
          #form .form  .btn{
            color:white;
            font-size:20px !important;
            padding:7px 25px;
            margin:10px 0;
            background-color:#8B0530;
           }    
           #form .alert{
                position:relative;
                margin-bottom:0;
                font-size:16px;
                text-align:center;
                height:55px;
                padding:0;
           }
           #form .alert p{
            line-height:55px;
           }      
        </style>
    </head>
    <body>
    <?php 
    session_start();
        
    ?>
        <section id="form">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-3 col-xs-12 col-sm-8 col-sm-offset-2">
                      <div class="form">
                        <h1>Login</h1>
                            <form action="login.php" method="POST">
                                <div class="form-group">
                                    <label for="" class="control-label">User Name</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                 <div class="form-group">
                                  <button type="submit" name="logincheck" class="btn pull-right">Login</button>
                                </div>
                            </form>
                            <div class="alert" role="alert">
                            <?php 
                                if(isset($_SESSION['error'])){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <p><?=$_SESSION['error'];?></p>
                                    </div>
                                <?php 
                                  unset($_SESSION['error']);
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </section>
        <?php 
         function error($x){
               $_SESSION['error']=$x;
               header('Location:login.php');
              }
       if(isset($_POST['logincheck'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            include('admin/db.php');
            

            if(!empty($username) && !empty($password)){
                if($username == 'admin' && $password == 'admin'){
                		$_SESSION['admin'] = true;
                		header("Location:admin/admin.php");
                	}else{
                    	error("This User isn't exist.");
                   		}
              		
              	}else{
               		error(" Please fill all fields");
           		}
            }  
		           ?>
    </body>
</html>
    

