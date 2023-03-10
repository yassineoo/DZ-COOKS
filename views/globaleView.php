<?php 

require_once "../controllers/homeController.php";
require_once "../controllers/dashboardController.php";


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

    public function head(){
      ?>
      <head>

      <script src="../public/js/bootstrap.bundle.min.js"></script>

          <link rel="stylesheet" type="text/css" href="../public/css/home.css">
          <link href="../public/css/bootstrap.min.css" rel="stylesheet">
          <title>DZ cooks</title>
      </head>
      <?php
        
    }

    public function profile($id){
      ?>
      <div class="profileCon">
        <div class="btn-group saisons" role="group" aria-label="Basic outlined example">

            <button type="button" class="saisonButton btn btn-outline-primary">Mes Recettes Pref??r??es </button>     
            <button type="button" class="saisonButton btn btn-outline-primary ">Mes Recettes Ajouter </button>     
            <button type="button" class="saisonButton btn btn-outline-primary ">Mes Recettes Note </button>     
            <button type="button" class="saisonButton btn btn-outline-primary ">Mes information personneles </button>     
    
          </div>
        <div class="card-group">
        
          
        </div>
      </div>
      <script src='../public/js/jQuery.js'></script>

      <script>
       
       $(document).ready(function(){

        $(".saisonButton").click(
          function (event) {
          console.log("/",$(event.target).text(),"/");
          event.preventDefault();
            $(".saisonButton").removeClass( "active" );
        
            $(event.target).addClass(" active");
        if($(event.target).text().trim() == "Mes Recettes Ajouter"){

          $(".card-group").empty();        
        
            $(".card-group").append(`
           <?php 
           $c = new homeController();
           $r = $c->getAjouter($id);
     
           foreach ($r as $recipe) {
            echo $this->card($recipe);
            }
            ?>
           `)
        }
        else if($(event.target).text().trim() == "Mes Recettes Pref??r??es") {
          $(".card-group").empty();        
          $(".card-group").append(`
           <?php 
           $c = new homeController();
           $r = $c->getPrefer($id);
     
           foreach ($r as $recipe) {
            echo $this->card($recipe);
            }
            ?>
           `)

        }
        else if($(event.target).text().trim() == "Mes Recettes Note") {
          $(".card-group").empty();        
          $(".card-group").append(`
           <?php 
           $c = new homeController();
           $r = $c->getNoted($id);
     
           foreach ($r as $recipe) {
            echo $this->card($recipe);
            }
            ?>
           `)

        } else if($(event.target).text().trim() == "Mes information personneles") {
          $(".card-group").empty();        
          $(".card-group").append(`
          <?php 
           $c = new DashboardController();
           $r = $c->getUsers($id);
           ?>
           <table class="table">
           <tr>
           <th>prenom</th>
           <td><?php echo $r[0]['FirstName'] ?></td>
           </tr>
           <tr>
           <th>nom</th>
           <td><?php echo $r[0]['lastName'] ?></td>
           </tr>
           <tr>
           <th>email</th>
           <td><?php echo $r[0]['email'] ?></td>
           </tr>
           <tr>
           <th>sexe</th>
           <td><?php echo $r[0]['sex'] ?></td>
           </tr>
           <tr>
           <th>date de nescence</th>
           <td><?php echo $r[0]['birth'] ?></td>
           </tr>
           <tr>
           <th>etat de profile</th>
           
           <td><?php echo $r[0]['confirmed'] ?></td>
           </tr>
           </table>
          
           `)

        }

      })
      });          
        </script>
      <?php
    }

    public function home ($name=null , $id=null){

      $this->head();
        ?>
      
        <body>
            
        <?php
        $this->header($name,$id);  
        $this->diaporama();
        $this->contune('entr??es');
        $this->contune('plats');
        $this->contune('desserts');
        $this->contune('boissons');
        $this->addRecipe();
        $this->footer();
        ?>

        
    </body>  
        <?php
 
    }

    public function addRecipe(){
      ?>
      <div class="nine">
      <h1>  Vous pouvez aussez share avec nous Votre cuisine !!
        <span> <a href="./addRecipePage">ajouter une Recette</a></span> </h1>
      </div>
      <?php
    }

    public function diaporama(){
      ?>

      <div id="carouselExampleControls" class="carousel slide diapo" data-bs-ride="carousel">
        <div class="carousel-inner">
        <?php 
            $cntrl =new HomeController();
            $diapos = $cntrl->getDiapos();
            $tr = 0;
            foreach ($diapos as  $diapo) {
            
              ?>
                <div class="carousel-item  <?php if($tr==0) echo "active"?> " data-bs-interval="5000">
                    <a href="<?php echo $diapo['path']?>"><img src="../public/images/diapo/<?php echo $diapo['imageName']?> "  class="d-block w-100 h-20" alt="...">
                      <div class="carousel-caption d-none d-md-block ">
                        <h5><?php echo $diapo['title']?> </h5>
                      </div>
                    </a>
                </div>
    <?php 
    $tr++;
            } 
            ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
                <?php
              }



    public function card($recipe){
      ?>
        <div class="col-md-3 cardCon">          
                           <div class="card">
                                <img src="../public/images/recipes/<?php echo $recipe["imgPath"] ?>" class="d-block w-100" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo mb_substr($recipe["name"],0,19) ; ?></h5>
                                    <p class="card-text"> <?php echo mb_substr( $recipe["description"],0,45)."..."; ?> </p>
                                    <a href="./recipe?name=<?php echo $recipe["name"] ?>" class="btn btn-primary">voire la suite</a>
                                </div>
                            </div>

         </div>
      <?php
    }



  
    public function contune($title) {
      ?>
      <main>
         <div class="categorieHead">
           <h2 class="categorieTitle"><?php echo  $title ?></h2>
           <a href="./categories?categorie=<?php echo  $title ?>" class="btn btn-secondary"> voir tous</a>
        </div>
   

          <div class="container text-center my-3">
          <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel carouselCategorie  slide" data-bs-ride="carousel">
              <div class="carousel-inner carousel-innerCategorie" role="listbox">
                
            <?php
                            $cntrl  = new HomeController(); 
                            $recipes = $cntrl->getRecipesBycategorie($title);
                            $fr = 0 ;
                            for ($i=0; $i < count($recipes) ; $i++) { 
                              
                            
           if (($i%4) == 0){       
                              ?>
                     
                <div class="carousel-item carousel-itemCategorie <?php if ($i==0) echo "active" ?>  " data-bs-interval="255000">
                        <?php 
                        $this->card($recipes[$i]);
                        ?>
                    

                      <?php if($i+1 <count($recipes)) {
                        $this->card($recipes[$i+1]);
                     }
                      if($i+2 <count($recipes)) { 
                        $this->card($recipes[$i+2]);
                        
                    
                       }
                      if($i+3 <count($recipes)) {
                        $this->card($recipes[$i+3]);
                       } ?>
               
       

               </div>
                <?php 
                                } ?>

                                <?php
                                }
                            ?>
           
          
         
              <a class="carousel-control-prev carousel-control-prevCategorie  w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev" style="background-color:#eee; width:50px; color:#f3783d;">
          
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next carousel-control-nextCategorie  w-aut" href="#recipeCarousel" role="button" data-bs-slide="next" style="background-color:#eee; width:50px; color:#f3783d;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">next</span>
              </a>
            </div>
          </div>		
        </div>
        </main>

     

      <?php
   
         
   }

    public function header($name = null,$id=null){
        ?>

      <header>
              <a href="./"><img class='logo' src='../public/images/logo.png'></a>  
                <div class='Right-nav'>
                <?php if(isset($name)) { ?>
                    <a href="<?php echo "./profile.php?id=$id"; ?>"> 
                      <img class='icon profile' src="../public/images/icons/profile.png"/>
                      <span> <?php  echo $name ?> </span> 
                    </a>
                    <a href="./logout.php">
                      <img class="icon profile" src = "../public/images/icons/logout.png"/>
                </a>  
                    <?php  } else{
                      ?>
                      <a href="./loginPage">Connect??</a>
                      <?php
                    }
                    ?>
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
                <a href="./" style="color:white;text-decoration:none;">
                <div class="navbar-title">
                   <span> Home </span>
                </div>
                </a> 
            </div>
            <div class="navbar-btn">
                <label for="navbar-check">
                <span></span>
                <span></span>
                <span></span>
                </label>
            </div>
            
            <div class="navbar-links">
                <a href="./news" target="_blank">News</a>
                <a href="./recipeIdea" target="_blank">Recipe ideas</a>
                <a href="./saison" target="_blank">Season</a>
                <a href="./healthy" target="_blank">Healthy</a>
                <a href="./party" target="_blank">Ocassions</a>
                <a href="./nutrition" target="_blank">Nutration</a>
                <a href="#footer" >Contact</a>

            </div>
            </div>

      
        <?php
     }

     public function contactPage() {

      ?>

        <form>      
          <input name="name" type="text" class="feedback-input" placeholder="Name" />   
          <input name="email" type="text" class="feedback-input" placeholder="Email" />
          <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
          <input type="submit" value="SUBMIT"/>
        </form>

      <?php
     }


     public function footer(){
        ?>


            <!-- Footer -->
            <footer class="text-center text-lg-start bg-light text-muted" id="footer">
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
                  
                  </a>
                  <a href="" class="me-4 text-reset">
                    <img class='icon' src="../public/images/icons/twtr.png"/>

                  </a>
                  <a href="" class="me-4 text-reset">
                  <img class='icon' src="../public/images/icons/insta.png"/>

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
                        <a href="./recipeidea" class="text-reset">idee de recette</a>
                      </p>
                      <p>
                        <a href="./healthy" class="text-reset">Healthy</a>
                      </p>
                      <p>
                        <a href="./saison" class="text-reset">seasons</a>
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
                        <a href="./nutration" class="text-reset">Nutrition</a>
                      </p>
                      <p>
                        <a href="#!" class="text-reset">Settings</a>
                      </p>
                      <p>
                        <a href="./party" class="text-reset">fete</a>
                      </p>
                      <p>
                        <a href="#" class="text-reset">Help</a>
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
                ?? 2021 Copyright:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">YassineDev.com</a>
              </div>
              <!-- Copyright -->
            </footer>
            <!-- Footer -->
        <?php
     }
    

}

?>
  