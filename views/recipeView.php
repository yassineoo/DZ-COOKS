<?php 
require_once "../controllers/nutrationController.php";

class RecipeView  {


    public function head() {
        ?>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
            <link rel="stylesheet" type="text/css" href= "../public/css/recipe.css">
            <link rel="stylesheet" type="text/css" href= "../public/css/home.css">
            <link href="../public/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        </head> 
     <body>
    <?php
    }
    public function index($recipe) {
   ?>
        <main class="recipeCon">
            
        <h1 class="title"><?php   echo $recipe[0]['name'] ?> </h1>
        <div>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>  
        <input type="hidden" value="  <?php 
         $cntrl = new HomeController();

         echo $cntrl->getNote($recipe[0]['id'])[0] ?> " 

            />
            <?php 
         $cntrl = new HomeController();

         echo $cntrl->getNote($recipe[0]['id'])[1] ?>  
            Reviwes
         
        </div>
        <div class="Recipe">
        
         <img src=<?php echo "../public/images/recipes/".$recipe[0]['imgPath'] ?> alt="">
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
                <span><?php  echo $recipe[0]['serves']  ?> calories </span>

            </div>
         </div>


       </div> 
       <div  calss="ingredients">
         <h3> liste des ingredient : </h3>
        <ul>
            <?php
            $cntrl = new HomeController();
            $list = $cntrl-> getIngredientList($recipe[0]['id']);
            foreach ($list as  $ingred) {
               ?>  <li><?php echo $ingred['name'] ?>  </li>
            <?php } 
            ?>

        </ul>
        
        </div> 
            </main>

            <script>
 
 $(document).ready(function(){

    
    


 });
        </script>

    </body>

 

        
<?php
    }
}


?>