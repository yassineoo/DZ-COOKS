<?php 


class GlobaleView{

    public function head_login($css) { ?>
                    
        <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 

            <title>LOGIN</title>

            <link rel="stylesheet" type="text/css" href=<?php echo "../public/css/".$css?>>
            
        </head>
     <?php  
      }

    public function login_form($error=null) {

        ?>
         
         <body>

 
     

            <form action="./login.php" method="post">

                <h2>LOGIN</h2>
                     
                <?php if (isset($error)) { 
                     //$_GET['error']
                       ?>

                    <p class="error"><?php echo $error; ?></p>

                <?php } ?>

                <label>User Name</label>

                <input type="text" name="email" placeholder="User Name"><br>

                <label>Password</label>

                <input type="password" name="password" placeholder="Password"><br> 

                <button type="submit">Login</button>

            </form>

        </body>
 

       <?php

     
    }



    public function login_form2(){

        ?>

            <div class="container">
                <div class="screen">
                    <div class="screen__content">
                        <form class="login" action="./login.php" method="post">
                            <div class="login__field">
                                <i class="login__icon fas fa-user"></i>
                                <input type="text" class="login__input" name="email" placeholder="User name / Email">
                            </div>
                            <div class="login__field">
                                <i class="login__icon fas fa-lock"></i>
                                <input type="password" name="password" class="login__input" placeholder="Password">
                            </div>
                            <button class="button login__submit">
                                <span class="button__text">Log In Now</span>
                                <i class="button__icon fas fa-chevron-right"></i>
                            </button>	
                                  
                                <?php if (isset($error)) { 
                                    //$_GET['error']
                                    ?>

                                    <p class="error"><?php echo $error; ?></p>

                                <?php } ?>			
                        </form>
                        <div class="social-login">
                          
                            <div class="social-icons">
                                <a href="#" class="social-login__icon fab fa-instagram"></a>
                                <a href="#" class="social-login__icon fab fa-facebook"></a>
                                <a href="#" class="social-login__icon fab fa-twitter"></a>
                            </div>
                        </div>
                    </div>
                    <div class="screen__background">
                        <span class="screen__background__shape screen__background__shape4"></span>
                        <span class="screen__background__shape screen__background__shape3"></span>		
                        <span class="screen__background__shape screen__background__shape2"></span>
                        <span class="screen__background__shape screen__background__shape1"></span>
                    </div>		
                </div>
            </div>
        <?php
    }

    
    public function login_form3() {

    ?>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="./login.php" method="post">
                    <h1>Create Account</h1>
                    <input type="text" placeholder="First Name" name='fname' />
                    <input type="text" placeholder="last Name" name='lname' />
                    <input type="email" placeholder="Email" name='email' />
                    <input type="date" placeholder="birth"  value='2002-01-01' name='birth'  />
                   
                    <div class='sexFormat'>
                    
                        <input type="radio" name="sexe" checked value="f"><img width=24 height=24 src="https://img.icons8.com/color/48/null/female.png "/>
                        <input type="radio" name="sexe" value="m"><img  width=24 height=24 src="https://img.icons8.com/color/48/null/male.png"/>
              
                    </div>
                  <input  type="password" placeholder="Password" name='password' />
                    <button name="signUp" type='submit' >Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="./login.php" method ='POST'>
                    <h1>Sign in</h1>
                
                    <span>Welcome  back !</span>
                    <input type="email" placeholder="Email"  name='email'/>
                    <input type="password" placeholder="Password" name='password' />
                    <a href="#">Forgot your password?</a>
                    <button  name="signIn" type='submit' >Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const signUpButton = document.getElementById('signUp');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');

            signUpButton.addEventListener('click', () => {
                container.classList.add("right-panel-active");
            });

            signInButton.addEventListener('click', () => {
                container.classList.remove("right-panel-active");
            });
        </script>


<?php
    }

    public function userLoginSign () {

        $this->head_login('userLogin.css');
        $this->login_form3();   

    }

    public function AdminLogin () {

        $this->head_login('adminLogin.css');
        $this->login_form2();   

    }

    public function home (){

        ?>
        <head>
            <link rel="stylesheet" type="text/css" href="../public/css/home.css">
            <link href="../public/css/bootstrap.min.css" rel="stylesheet">
            <title>DZ cooks</title>
        </head>
        <body>
            <header>
                <img class='logo' src='../public/images/logo.png'>
                <div class='Right-nav'>
                    <span>Follow Us</span>
                    <img class='icon' src="../public/images/icons/fb.png"/>
                    <img class='icon' src="../public/images/icons/twtr.png"/>
                    <img class='icon' src="../public/images/icons/insta.png"/>

                </div>
                
     

            </header>

            <nav>
                    <ul>
                        <li><a href='#'> Home </a></li> 
                        <li><a href='#'> News </a></li>
                        <li><a href='#'> Recipe ideas</a></li>
                       

                        <li><a href='#'> More </a>
                            <ul>
                                <li class="type_argculture"> <a href="https://pixabay.com/" target="_blank" class="lien">  Season </a> </li>
                                <li class="type_argculture"> <a href="https://pixabay.com/" target="_blank" class="lien">  Healthy </a> </li>
                                <li class="type_argculture"> <a href="https://pixabay.com/" target="_blank" class="lien">  party</a> </li>
                                <li class="type_argculture"> <a href="https://pixabay.com/" target="_blank" class="lien">  Nutration </a> </li>
                                <li class="type_argculture"> <a href="https://pixabay.com/" target="_blank" class="lien">  Contact </a> </li>
                            
                            </ul> 
                        </li>
                        <li><a href='#'> Profile</a></li>
                    </ul>
                </nav>


        </body>

        <div class="parent">
            <div class ='diaporama'>
                <img src='../public/images/diapo/diapo1.png' alt='background'  />
                <img src='../public/images/diapo/diapo2.jpg' alt='background'  />
                <img src='../public/images/diapo/diapo3.jpg' alt='background'  />
                <img src='../public/images/diapo/diapo4.jpg' alt='background'  />
            </div>
        </div>

        
        
        <?php
        $this->contune();
    }
     public function contune() {
        ?>
        <main>
            <h2>plats</h2>
        
         <?php
                            $cntrl  = new HomeController(); 
                            $recipes = $cntrl->getRecipes();

                            foreach($recipes as $recipe)
                            {

                              ?>
                              <div class="card-group">
                              <div class="card" style="width: 18rem;">
                                    <img src="../public/images/recipes/couscous.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h2><?php echo $recipe['name'] ?></h2>
                                        <p class="card-text"><?php echo $recipe['name'] ?></p>
                                    </div>
                              </div>

                              <div class="card" style="width: 18rem;">
                                    <img src="../public/images/recipes/couscous.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $recipe['name'] ?></p>
                                    </div>
                              </div>

                              <div class="card" style="width: 18rem;">
                                    <img src="../public/images/recipes/couscous.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $recipe['name'] ?></p>
                                    </div>
                              </div>

                              <div class="card" style="width: 18rem;">
                                    <img src="../public/images/recipes/couscous.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $recipe['name'] ?></p>
                                    </div>
                              </div>
                            </div>
                                
                                <?php 
                             } 
                             ?>

        </main>

        <?php

     }
    

}

?>
  