<?php 
require_once "../controllers/nutrationController.php";
require_once "../controllers/homeController.php";
require_once "../views/globaleView.php";

class RecipeView  {


    public function head() {
        ?>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
            <link rel="stylesheet" type="text/css" href= "../public/css/recipe.css">
            <link rel="stylesheet" type="text/css" href= "../public/css/home.css">
        <script src="../public/js/bootstrap.bundle.min.js"></script>
         
            <link href="../public/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src='../public/js/jQuery.js'></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        </head> 
     <body>
    <?php
    }
    public function index($recipe , $preferd=null ,$noted=null) {
   ?>
        <main class="recipeCon">
            
        <h1 class="title"><?php   echo $recipe[0]['name'] ?> </h1>
        <div id="rating">
 
        <input type="hidden" id="hidden" value="<?php 
         $cntrl = new HomeController();

         echo $cntrl->getNote($recipe[0]['id'])[0] ?>" 

            />
            <?php 
         $cntrl = new HomeController();

         echo $cntrl->getNote($recipe[0]['id'])[1] ?>  
            Reviwes
         
        </div>
        <div class="Recipe">
        
         <img class="recipeImage" src=<?php echo "../public/images/recipes/".$recipe[0]['imgPath'] ?> alt="">
         <div class="recipeRight">
            <div class="line">
                <img src="../public/images/icons/waiter.png" alt="" class="icon">
                <span><?php  echo $recipe[0]['serves']  ?> persons </span>

            </div>
            <div class="line">
                <img src="../public/images/icons/cookTime.png" alt="" class="icon">
                <span><?php  echo  intVal( $recipe[0]['cookingTime'] /60 ).' h '. $recipe[0]['cookingTime']%60 .' min'  ?> cuisson</span>

            </div> 
             <div class="line">
                <img src="../public/images/icons/restTime.png" alt="" class="icon">
                <span><?php   echo  intVal( $recipe[0]['restTime'] /60 ).' h '. $recipe[0]['restTime']%60 .' min'  ?>  repos </span>

            </div> 
             <div class="line">
                <img src="../public/images/icons/prepTime.png" alt="" class="icon">
                <span><?php  echo  intVal( $recipe[0]['preparationTime'] /60 ).' h '. $recipe[0]['preparationTime']%60 .' min'
                // intVal( $recipe[0]['preparationTime'] )/60 ).' h '.intVAL( $recipe[0]['cookingTime'])%60 .' Min' }
              ?> préparation</span>
             
            </div>  
            <div class="line">
                <img src="../public/images/icons/waiter.png" alt="" class="icon">
                <span><?php  
                echo  intVal( ($recipe[0]['restTime'] + $recipe[0]['preparationTime'] + $recipe[0]['cookingTime'] ) /60 ).' h '. ($recipe[0]['restTime'] + $recipe[0]['preparationTime'] + $recipe[0]['cookingTime'] )%60 .' min' 
              ?>  Totale </span>

            </div> 
            <div class="line">
                <img src="../public/images/icons/calories.png" alt="" class="icon">
                <span><?php 
                $cntrl = new HomeController();
                 echo  intval($cntrl->getcalories($recipe[0]['id'])[0][0] / $recipe[0]['serves']) ;  ?> calories </span>

            </div>
         </div>


       </div> 
       <div  class="ingredientsList stepCon">
         <h3> Description : </h3>
           <p>
              <?php
            
              echo $recipe[0]['description'];
           
              ?>

            </p>
        
        </div>
       <div  class="ingredientsList">
            <h3> liste des ingredient : </h3>
            <ul>
                <?php
                $cntrl = new HomeController();
                $list = $cntrl-> getIngredientList($recipe[0]['id']);
                foreach ($list as  $ingred) {
                  ?>  <li><?php  
                  if ($ingred['quentity'] != 0)  echo $ingred['quentity']."  " ;
                  if ($ingred['mesure'] != "non précisé")  echo $ingred['mesure']."   ";
                  echo $ingred['name'] ?>  </li>
                <?php } 
                ?>

            </ul>
        
       </div> 
        <div  class="ingredientsList stepCon">
         <h3> liste des etapes : </h3>
        <ul>
            <?php
            $cntrl = new HomeController();
            $list = $cntrl-> getstepsList($recipe[0]['id']);
            foreach ($list as  $ingred) {
               ?>  <li><?php  
                 echo $ingred['order']."    - " ;
               echo $ingred['description'] ?>  </li>
            <?php } 
            ?>

        </ul>
        <div class="video">

          <video width="600" height="320" src="<?php echo $recipe[0]['videoPath'] ?>" controls>
            
          </video>
        </div>
        </div> 
      <?php 
      if(isset($preferd)) {

      ?>
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text">1 star</label>
            
        </div>
       <input type="hidden" name="" id="preferd" value="
       <?php 
        

         echo $preferd ?>"/>
            <input type="hidden" name="" id="noted" value="
       <?php 
        

         echo $noted ?>"/>
       <a href="#" id="like" >
        <i class="fa fa-heart" aria-hidden="true"></i>
       </a>
       <?php
      }
      ?>

    </main>

            <script>
                  
                  $(document).ready(function(){


                    if( parseInt( $("#preferd").val() ) ==1 ){
                      $("#like").addClass("heart");
                    }
                    if( parseInt( $("#noted").val() ) >0 ){

                      $("#star"+parseInt( $("#noted").val() )).prop('checked', true);;
                    }

                  $("#like").click((e) =>{
                      e.preventDefault();
                      console.log("clicked");
                      $("#like").addClass("heart");
                      $.ajax({
                                      type: "POST",
                                      url: "recipePrefer.php",
                              data: { "idRecipe":<?php echo $recipe[0]['id']?>},
                              cache: false,
                              success: function(data) {
                                  console.log(data);
                                      }
                            
                          
                              ,
                              error: function(xhr, status, error) {
                              console.error(xhr);
                              }
                              });

                  })
                  
                      for (let i = 1; i <= 5; i++) {
                      //const element = array[i];
                    let x= $("#hidden").val() ;
                    console.log(x ,' ***** ' , i);
                    if (i <= x) {
                      $("#rating ").append(`<span class="fa fa-star checked "></span>`);
                    }
                    else {
                      $("#rating").append(`<span class="fa fa-star"></span>`);
                    }
                      
                  }

                        $(".rate input").click((event) => {
                      event.preventDefault();


                      $.ajax({
                                      type: "POST",
                                      url: "recipeOperation.php",
                              data: {"note" : event.target.value , "idRecipe":<?php echo $recipe[0]['id']?>},
                              cache: false,
                              success: function(data) {
                                      $(".rate ").append(`<p> votre recview a ete effectuer </p>`)
                                      }
                            
                          
                              ,
                              error: function(xhr, status, error) {
                              console.error(xhr);
                              }
                              });


                    })  
                      


                  });
        </script>

    </body>

 

        
<?php
    }



    public function filterForm(){
      ?>
      <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Filter !
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <form class="filter">
                  <div class ="saisonCon">
                  
                      <label for="saison" class="saisonLabel"> saison </label>
                      <div class="saisonsRadios">
                      <div class="form-check">
                            <input class="form-check-input" type="radio" value="1" name="saison" checked id="flexRadioDefault1a">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Tous
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="L'hiver" name="saison" id="flexRadioDefault1a">
                            <label class="form-check-label" for="flexRadioDefault1">
                              l'hiver
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Le printemps" name="saison" id="flexRadioDefault2d" >
                            <label class="form-check-label" for="flexRadioDefault2">
                              Le printemps
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="L'été" name="saison" id="flexRadioDefault2k" >
                            <label class="form-check-label" for="flexRadioDefault2">
                            L'été
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="L'automne" name="saison" id="flexRadioDefault2l" >
                            <label class="form-check-label" for="flexRadioDefault2">
                            L'automne
                            </label>
                          </div>
                      </div>
                  </div>
              
                  <label for="Temps de preparation"> Temps de prapartion </label>

                  <?php
                  $this->DoubleRange("",0,120);
                  ?>
                  <label for="Temps de cuisson"> Temps de cuisson </label>
                  <?php
                  $this->DoubleRange("cuisson",0,280);
                  ?>
                  <label for="Temps de totale"> Temps de totale </label>
                  <?php
                  $this->DoubleRange("Totale",0,360);
                  ?>
            
                  <label for="notation"> notation </label>
                  <?php
                  $this->DoubleRange("Star",1,5);
                  ?>

                  <label for="calories"> calories </label>
                  <?php
                  $this->DoubleRange("Calories",0,5000);
                  ?>

                  <label for="notation"> Sort By </label>
                  <select class="form-select form-select-sm" name="sortBy" id="sortBy">
                      
                  
                                <option value="NN">None</option>
                                <option value="TP">le temps de préparation</option>
                                <option value="TC">le temps de cuisson</option>
                                <option value="TT">le temps de totale</option>
                                <option value="NT">la notation</option>
                                <option value="NC">le nombre de calories</option>
                                
                              

                            </select >

                </form>

                <button  class="btn btn-outline-primary" id="filterButton">Filter</button>

              </div>
              </div>
            </div>

        </div> 
        <?php
    }

    public function categoriePage($recipes){
      ?>

      <body>


        <?php 
        $this->filterForm(); 
        $this->recipeCon($recipes);
        ?>
        

          <script src="../public/js/range.js">

            </script>

              <script>
              $(document).ready(function(){

                $("#filterButton").click((e) => {
                  e.preventDefault();
                  console.log( $("input[name='saison']:checked").val());
                  data = { 
                    saison: $("input[name='saison']:checked").val(),
                    star :[$('#fromInputStar').val(),$('#toInputStar').val()] ,
                    calorie :[$('#fromInputCalories').val(),$('#toInputCalories').val()] ,
                    cuisson :[$('#fromInputcuisson').val(),$('#toInputcuisson').val()] ,
                    totale :[$('#fromInputTotale').val(),$('#toInputTotale').val()] ,
                    preparation :[$('#fromInput').val(),$('#toInput').val()] ,
                    sortBy:$("#sortBy").val()
                  }
                  console.log("****************");
                  console.log(data);
                  $.ajax({
                                              type: "POST",
                                              url: "filter.php",
                                      data: { "filter":data},
                                      cache: false,
                                      success: function(data) {
                                        console.log(data);
                                            dataa= JSON.parse(data)
                                        $(".card-group").empty();
                                        for (let i = 0; i < dataa.length; i++) {
                                          const recipe = dataa[i];
                                          $(".card-group").append(`
                          
                                          <div class="col-md-3 cardCon">          
                                                            <div class="card">
                                                                  <img src="../public/images/recipes/${recipe["imgPath"]}" class="d-block w-100" alt="...">
                                                                  <div class="card-body">
                                                                      <h5 class="card-title">${ recipe["name"].length > 10 ? recipe["name"].substring(0,19): recipe["name"]} </h5>
                                                                      <p class="card-text"> ${ recipe["description"].length > 10 ? recipe["description"].substring(0,45)+"...": recipe["description"]} </p>
                                                                      <a href="./recipe?name=${recipe["name"] }" class="btn btn-primary">voire la suite</a>
                                                                  </div>
                                                              </div>

                                          </div>
                                                                      `)
                                          
                                        }
                                              }
                                    
                                  
                                      ,
                                      error: function(xhr, status, error) {
                                      console.error(xhr);
                                      }
                                      });



                })
                
              });  
              
            </script>
          

    </body>

      <?php

    }



    public function news($news , $preferd=null ,$noted=null) {
      ?>
           <main class="recipeCon">
               
           <h1 class="title"><?php   echo $news[0]['title'] ?> </h1>

           <div class="Recipe">
           
            <img class="recipeImage" src=<?php echo "../public/images/news/".$news[0]['imgPath'] ?> alt="">
            <div class="recipeRight">
               <div class="line">
                   <span> <?php  echo  $news[0]['writer']  ?>  </span>
   
               </div>
            
            </div>
   
   
          </div> 
          <div  class="ingredientsList stepCon">
            <h3> Description : </h3>
              <p>
                 <?php
                  $pattern = '/(\d+\.)/i';
                  $replacement = '</br>${1}';
                 echo preg_replace($pattern, $replacement, $news[0]['Description']);
              
                 ?>
   
               </p>
           
           </div>
 
         
           <div class="video">
   
             <video width="600" height="320" src="<?php echo $news[0]['videoPath'] ?>" controls>
               
             </video>
           </div>
           </div> 
     
       
   
       </main>
   
        
   
       </body>
   
    
   
           
   <?php
       }
   


       public function newsPage($news){
        ?>
     <body>
 
     <div class="card-group">

     <?php 
     foreach ($news as  $new) {
       ?>
      <div class="col-md-3 cardCon">          
            <div class="card">
                <img src="../public/images/news/<?php echo $new["imgPath"] ?>" class="d-block w-100" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo mb_substr($new["title"],0,40) ; ?></h5>
                    <a href="./news?name=<?php echo $new["title"] ?>" class="btn btn-primary">voire la suite</a>
                </div>
            </div>

      </div>
      <?php
     }
     ?>

     </div> 
<?php
       }
    public function saisonPage($recipes){
         ?>
      <body>
      
      <div class="btn-group saisons" role="group" aria-label="Basic outlined example">
        <?php 
        $cntrl = new NutrationController();
        $sasions = $cntrl->getSeasons();
        $frst=0;
   
       
       for ($i=0; $i <count($sasions) ; $i++) { 
   
          ?>

        <button type="button" class="saisonButton btn btn-outline-primary <?php if($i==0) echo " active " ?>"><?php  echo $sasions[$i]["season"]; ?></button>

          <?php
          
          
        }
        ?> 
    </div>
      <div class="card-group">

      <?php 
      foreach ($recipes as  $recipe) {
        
        $viewGlob = new GlobaleView();
        $viewGlob->card($recipe);
      # code...
      }
      ?>

      </div> 
      
  <script>
       
       $(document).ready(function(){
        $(".saisonButton").click(function (event) {
          console.log($(event.target).text());
          event.preventDefault();
            $(".saisonButton").removeClass( "active" );
           $(event.target).addClass(" active");
           $.ajax({
                                      type: "POST",
                                      url: "filter.php",
                              data: { "saison":$(event.target).text() },
                              cache: false,
                              success:  function(data) {
                                        console.log("------------");
                                        console.log(data);
                                        console.log("-------/////-----");

                                            dataa= JSON.parse(data)
                                        $(".card-group").empty();
                                        for (let i = 0; i < dataa.length; i++) {
                                          const recipe = dataa[i];
                                          $(".card-group").append(`
                          
                                          <div class="col-md-3 cardCon">          
                                                            <div class="card">
                                                                  <img src="../public/images/recipes/${recipe["imgPath"]}" class="d-block w-100" alt="...">
                                                                  <div class="card-body">
                                                                      <h5 class="card-title">${ recipe["name"].length > 10 ? recipe["name"].substring(0,19): recipe["name"]} </h5>
                                                                      <p class="card-text"> ${ recipe["description"].length > 10 ? recipe["description"].substring(0,45)+"...": recipe["description"]} </p>
                                                                      <a href="./recipe?name=${recipe["name"] }" class="btn btn-primary">voire la suite</a>
                                                                  </div>
                                                              </div>

                                          </div>
                                                                      `)
                                          
                                        }
                                              }
                                    
                                  
                                      ,
                              error: function(xhr, status, error) {
                              console.error(xhr);
                              }
                              });

        })
       });
 </script>
      </body>
      <?php
    }


    public function partyPage($recipes){
      ?>
   <body>
   
   <div class="btn-group saisons" role="group" aria-label="Basic outlined example">
     <?php 
     $cntrl = new HomeController();
     $sasions = $cntrl->getParty();
     $frst=0;

    
    for ($i=0; $i <count($sasions) ; $i++) { 

       ?>

     <button type="button" class="saisonButton btn btn-outline-primary <?php if($i==0) echo " active " ?>"><?php  echo $sasions[$i]["name"]; ?></button>

       <?php
       
       
     }
     ?> 
 </div>
   <div class="card-group">

   <?php 
   foreach ($recipes as  $recipe) {
     
     $viewGlob = new GlobaleView();
     $viewGlob->card($recipe);
   # code...
   }
   ?>

   </div> 
   
<script>
    
    $(document).ready(function(){
     $(".saisonButton").click(function (event) {
       console.log($(event.target).text());
       event.preventDefault();
         $(".saisonButton").removeClass( "active" );
        $(event.target).addClass(" active");
        $.ajax({
                                   type: "POST",
                                   url: "filter.php",
                           data: { "party":$(event.target).text() },
                           cache: false,
                           success:  function(data) {
                                     console.log("------------");
                                     console.log(data);
                                     console.log("-------/////-----");

                                         dataa= JSON.parse(data)
                                     $(".card-group").empty();
                                     for (let i = 0; i < dataa.length; i++) {
                                       const recipe = dataa[i];
                                       $(".card-group").append(`
                       
                                       <div class="col-md-3 cardCon">          
                                                         <div class="card">
                                                               <img src="../public/images/recipes/${recipe["imgPath"]}" class="d-block w-100" alt="...">
                                                               <div class="card-body">
                                                                   <h5 class="card-title">${ recipe["name"].length > 10 ? recipe["name"].substring(0,19): recipe["name"]} </h5>
                                                                   <p class="card-text"> ${ recipe["description"].length > 10 ? recipe["description"].substring(0,45)+"...": recipe["description"]} </p>
                                                                   <a href="./recipe?name=${recipe["name"] }" class="btn btn-primary">voire la suite</a>
                                                               </div>
                                                           </div>

                                       </div>
                                                                   `)
                                       
                                     }
                                           }
                                 
                               
                                   ,
                           error: function(xhr, status, error) {
                           console.error(xhr);
                           }
                           });

     })
    });
</script>
   </body>
   <?php
 }
    public function recipeCon($recipes) {
      ?>
         <div class="card-group">

          <?php 
          foreach ($recipes as  $recipe) {
            
            $viewGlob = new GlobaleView();
            $viewGlob->card($recipe);
          # code...
          }
          ?>

          </div> 
      <?php
    }

    public function DoubleRange($name,$min,$max){

      ?>
            <div class="range_container">
            <div class="sliders_control">
                <input id="fromSlider<?php echo $name ?>" type="range" value="<?php echo $min ?>" min="<?php echo $min ?>" max="<?php echo $max ?>"/>
                <input id="toSlider<?php echo $name ?>" type="range" value="<?php echo $max ?>" min="<?php echo $min ?>" max="<?php echo $max ?>"/>
            </div>
            <div class="form_control">
                <div class="form_control_container">
                    <div class="form_control_container__time">Min</div>
                    <input class="form_control_container__time__input" type="number" id="fromInput<?php echo $name ?>" value="<?php echo $min ?>" min="<?php echo $min ?>" max="<?php echo $max ?>"/>
                </div>
                <div class="form_control_container">
                    <div class="form_control_container__time">Max</div>
                    <input class="form_control_container__time__input" type="number" id="toInput<?php echo $name ?>" value="<?php echo $max ?>" min="<?php echo $min ?>" max="<?php echo $max ?>"/>
                </div>
            </div>
        </div>

      <?php
    }
}


?>