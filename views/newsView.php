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
    public function index($news) {
   ?>
        <main class="newsCon">
            
        <h1 class="title"><?php   echo $news[0]['name'] ?> </h1>
        <div>
        <input type="hidden" value=" " 

            />
         
            <h1></h1>
         
        </div>
        <div class="Recipe">
        
         <img src=<?php echo "../public/images/recipes/".$recipe[0]['imgPath'] ?> alt="">
         <div class="recipeRight">
          
            
         </div>


       </div> 
       <div  id="ingredientsList">
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