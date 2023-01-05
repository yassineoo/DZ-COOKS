<?php
    require_once "../controllers/nutrationController.php" ;
    require_once "../views/adminView.php";
    
    
class NutrationView{ 

    public function head(){
        ?>
<html lang="fr">
    

<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href= "../public/css/admin.css">
<link rel="stylesheet" type="text/css" href= "../public/css/home.css">
<link href="../public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 

    }
 

    public function main(){
        ?>
       <?php  $this ->head(); 
               $view = new AdminView();
               $view->navbar(); 
       ?>
        <main class='main'>
        
        <?php
  
        $view->sidebar(4);

        $this -> IngredientForm();
   
    ?> 
    </main>

    </html>
        <?php 
    }

    public function IngredientForm(){
     ?>
     
     <form class="Ingredientform addform" method="POST" action="./addIngredient.php">
     <div class="form-group rowInput">
       <label for="name" >
                            <span > Name </span>
        </label>   
        <input type="text" name="name" class="form-control" placeholder="name">
    </div>
        <div class="form-group rowInput">
            <label for="RecipeDescription" >
                            <span >categorie </span>
            </label>   
            <select class="form-select form-select-sm" name="categorie">
                                <?php
                                $cntrl  = new NutrationController(); 
                                $categories = $cntrl->getCategories();

                                foreach($categories as $cat)
                                {

                                ?>
                                    <option><?php echo $cat['name'] ?></option>
                                    
                                    <?php  } ?>
            </select >
        </div>
        <div class="form-group rowInput">
            <label for="RecipeDescription" >
                            <span > Season </span>
            </label>   
            <select class="form-select form-select-sm" name="season">
                                <?php
                                $cntrl  = new NutrationController(); 
                                $seasons = $cntrl->getSeasons();

                                foreach($seasons as $cat)
                                {

                                ?>
                                    <option><?php echo $cat['season'] ?></option>
                                    
                                    <?php  } ?>
            </select >
        </div>
        <div class="form-group rowInput">
            <label for="RecipeDescription" >
                            <span >calories </span>
            </label>   
        
        <input type="number" name="calories"  />

       </div> 
       <button class="addInfo" id="addInfo">ajouter une  Information</button>
            <div class="InformationContainer">
                
            </div>   
        <button class="addInfo" id="addvitamine">ajouter une  Vitamine</button>
            <div class="vitaminesContainer">
                
            </div>

        <button class="addInfo" id="addMineraux">ajouter une Mineraux</button>
            <div class="MinerauxsContainer">
                
            </div>
            <input type="hidden" name="vitamineNumber" id="vitamineNumber"   value="1"  />
            <input type="hidden" name="minerauxNumber" id="minerauxNumber"   value="1"  />
            <input type="hidden" name="infoNumber" id="infoNumber"   value="1"  />
             
         <button type="submit" name="submit" class="">Submit</button>
     </form>
     <script src='../public/js/jQuery.js'></script>
     <script>
     
   

     
         
         $(document).ready(function(){
            var vitamines = 1;
            var mineraux = 1;
            var info = 1;

          addInfo = () => {
            $(".InformationContainer").append( ` 
              <div class="form-group rowInput">
            <label for="RecipeDescription" >
                            <span > Infromation </span>
            </label>   
            <select class="form-select form-select-sm" name="information${info || 1 }">
                                <?php
                                $cntrl  = new NutrationController(); 
                                $seasons = $cntrl->getInfo();

                                foreach($seasons as $cat)
                                {
                                    

                                ?>
                                    <option><?php echo $cat[0] ?></option>
                                    
                                    <?php  } ?>
            </select >
           
            <input type="number" name="qteI${info || 1}" step=".00001" placeholder="Qte in g" >
        </div>
                    ` );
            info+=1;     
           
            }


            addVite = () => {
              $(".vitaminesContainer").append( ` 
              <div class="form-group rowInput">
            <label for="RecipeDescription" >
                            <span > Vitamine  </span>
            </label>   
            <select class="form-select form-select-sm" name="vitamine${vitamines || 1 }">
                                <?php
                                $cntrl  = new NutrationController(); 
                                $seasons = $cntrl->getVitamines();

                                foreach($seasons as $cat)
                                {
                                    

                                ?>
                                    <option><?php echo $cat['vitamine'] ?></option>
                                    
                                    <?php  } ?>
            </select >
           
            <input type="number" name="qteV${vitamines || 1}" step=".00001" placeholder="Qte in mg" >
        </div>
                    ` );
            vitamines+=1;     
           
            }

            addMin = () => {
            
              $(".MinerauxsContainer").append( ` 
              <div class="form-group rowInput">
            <label for="RecipeDescription" >
                <span > Mineraux </span>
            </label>   
            <select class="form-select form-select-sm" name="mineraux${mineraux || 1}">
                <?php
                                $cntrl  = new NutrationController(); 
                                $seasons = $cntrl->getMineraux();

                                foreach($seasons as $cat)
                                {

                                ?>
                                    <option><?php echo $cat['name'] ?></option>
                                    
                                    <?php  } ?>
            </select >
            <input step=".00001" type="number" name="qteM${mineraux || 1}" placeholder="Qte in mg" >
        </div>
           
                    ` );
            mineraux+=1;     
           
            }

        


            addVite();
            addMin();
            addInfo();
            $("#addvitamine").click((event
            ) => { 
                event.preventDefault();
                addVite();
                $("#vitamineNumber").val(vitamines-1);
                console.log($("#vitamineNumber").val());
             });

             $("#addMineraux").click((event
            ) => { 
                event.preventDefault();
                addMin();
                $("#minerauxNumber").val(mineraux-1)
             });
             $("#addInfo").click((event
            ) => { 
                event.preventDefault();
                addInfo();
                $("#infoNumber").val(info-1)
             });
            });  
            
        


  
        </script>


    <?php

    }
}


?>
