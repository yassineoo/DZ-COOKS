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
              <link rel="stylesheet" href="../public/css/style.css">
              <link rel="stylesheet" href="../public/css/ionicons.min.css">
            <link rel="stylesheet" type="text/css" href="../public/css/home.css">
            <link href="../public/css/bootstrap.min.css" rel="stylesheet">
            <title>DZ cooks</title>
        </head>
        <body>
            
        <?php
        $this->header();  
        ?>

        <div class="parent">
            <div class ='diaporama'>
                <img src='../public/images/diapo/diapo1.png' alt='background'  />
                <img src='../public/images/diapo/diapo2.jpg' alt='background'  />
                <img src='../public/images/diapo/diapo3.jpg' alt='background'  />
                <img src='../public/images/diapo/diapo4.jpg' alt='background'  />
            </div>
        </div>

        
    </body>  
        <?php
        $this->contune();
        $this->footer();
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

     public function header(){
        ?>

<header>
                <img class='logo' src='../public/images/logo.png'>
                <div class='Right-nav'>
                    <span>Follow Us</span>
                    <img class='icon' src="../public/images/icons/fb.png"/>
                    <img class='icon' src="../public/images/icons/twtr.png"/>
                    <img class='icon' src="../public/images/icons/insta.png"/>

                </div>
                
     

            </header>

            <?php $this->navbar(); ?>

          

       


    <?php
     }

     public function navbar() {
        ?>

                    <div class="navbar">
            <input type="checkbox" id="navbar-check">
            <div class="navbar-header">
                <div class="navbar-title">
                Home
                </div>
            </div>
            <div class="navbar-btn">
                <label for="navbar-check">
                <span></span>
                <span></span>
                <span></span>
                </label>
            </div>
            
            <div class="navbar-links">
                <a href="//github.io/jo_geek" target="_blank">News</a>
                <a href="http://stackoverflow.com/users/4084003/" target="_blank">Recipe ideas</a>
                <a href="https://in.linkedin.com/in/jonesvinothjoseph" target="_blank">Season</a>
                <a href="https://codepen.io/jo_Geek/" target="_blank">Healthy</a>
                <a href="https://jsfiddle.net/user/jo_Geek/" target="_blank">Ocassions</a>
                <a href="https://jsfiddle.net/user/jo_Geek/" target="_blank">Nutration</a>

            </div>
            </div>

      
        <?php
     }


     public function footer(){
        ?>


<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
      <img class='icon' src="../public/images/icons/fb.png"/>
       
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
        <img class='icon' src="../public/images/icons/twtr.png"/>

      </a>
      <a href="" class="me-4 text-reset">
      <img class='icon' src="../public/images/icons/insta.png"/>

      <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>DZ-Cooks
          </h6>
          <p>
            DZ-cooks is website for your kitchen 
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
           Les Sections
          </h6>
          <p>
            <a href="#!" class="text-reset">Recettes</a>
          </p>
          <p>
            <a href="#!" class="text-reset">idee de recette</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Healthy</a>
          </p>
          <p>
            <a href="#!" class="text-reset">seasons</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Nutration</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">fete</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> Algeria,Algeries ,ESI</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@DZ-cooks.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 213 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 213 752 516 41</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">YassineDev.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
        <?php
     }
    

}

?>
  