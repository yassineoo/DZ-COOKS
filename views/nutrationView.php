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
<script src='../public/js/jQuery.js'></script>
<script src="../public/js/bootstrap.bundle.min.js"></script>         
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='../public/js/jQuery.js'></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  

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
        

        $this -> acoordien();
   
    ?> 
    </main>

    </html>
        <?php 
    }

    public function acoordien(){

        ?> 
              <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Ajouter une ingredient !
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                 <?php $this->IngredientForm() ?> 

              </div>
              </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Editer le Percentage ! 
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                     <?php $this->setPercentage() ?> 
                </div>
                </div>
            </div>
         

        </div> 


        <?php
    }

   

    public function IngredientForm(){
        
     ?>
     
     
            <form class="Ingredientform addform" method="POST" action="./addIngredient.php">
            <div class="nine">
                        <h1>ajouter un ingredient<span>Les information generale </span></h1>
            </div>
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
            <button class="addInfo btn btn-primary " id="addInfo">ajouter une  Information</button>
                    <div class="InformationContainer">
                        
                    </div>   
                <button class="addInfo btn btn-primary" id="addvitamine">ajouter une  Vitamine</button>
                    <div class="vitaminesContainer">
                        
                    </div>

                <button class="addInfo btn btn-primary" id="addMineraux">ajouter une Mineraux</button>
                    <div class="MinerauxsContainer">
                        
                    </div>
                    <input type="hidden" name="vitamineNumber" id="vitamineNumber"   value="1"  />
                    <input type="hidden" name="minerauxNumber" id="minerauxNumber"   value="1"  />
                    <input type="hidden" name="infoNumber" id="infoNumber"   value="1"  />
                    
                <button type="submit " name="submit" class="submitFinale btn btn-primary">Submit</button>
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
    public function setPercentage(){
        ?>
        <form method = "POST"  action="./operations">
               <input type="number" name="setPercentage" value="" class="form-control" >

               <button type="sumbit" class="btn btn-outline-primary" style="margin:10px;">modifier</button>    
        </form>
        <?php
    }

    public function IngredientsList(){
        ?>

        <div class="NutrationCon">
                 <div class="nine">
                <h1>choisir une ingredient<span>et voire ses information  </span></h1>
                </div>
            <div class="ingredientListCon">

                <?php 
                $contrl = new NutrationController();
                $ingredients = $contrl->GetIngredientList();
                
                foreach ($ingredients as  $ingredient) {
                    ?>
                    <button class="<?php  if( $ingredient['healthy'] < 51 )  echo "pobularIngredient";  else echo "helthyIngredient" ; ?> " id="<?php echo $ingredient['id'] ?> "><?php echo $ingredient['name'] ?> </button>
                    <?php
                }
                ?>
            </div>
            <div class="datails table-responsive"> 
           
                      <table class=" table generaleList">        
                     
                     </table>
                     <table class="table infoList">  
                       <tr>        
                                <th>info</th>
                                <th>qte</th>
                                
                                
                            </tr>
                            <tbody class="table infoListBody">
                            </tbody>      
                     
                      </table>
                      <table class=" table minerauxList">  
                       <tr>        
                                <th>mineraux</th>
                                <th>qte</th>
                                
                                
                            </tr>
                            <tbody class="minerauxListBody">
                            </tbody>      
                     
                      </table>
                       <table class="table vitamineList">  
                       <tr>        
                                <th>vitamine</th>
                                <th>qte</th>
                                
                                
                            </tr>
                            <tbody class="vitamineListBody">
                            </tbody>      
                     
                      </table>
            </div>
        </div>
        <script src='../public/js/jQuery.js'></script>

        <script>
         
         $(document).ready(function(){


            $("button").click((e) => {
                e.preventDefault();
           
               console.log("koko");

                $.ajax({
                                type: "POST",
                                url: "getInfo.php",
                                data: {"ingredientId" :e.target.attributes["id"].value},
                                 cache: false,
                        success: function(data) {
                          console.log(data);
                          let info = JSON.parse(data);

                          $(".generaleList").empty();
                          $(".generaleList").append(`
                            <tr>        
                                <th>id</th>
                                <td>${info[0][0]['id']}</td>
                                
                            </tr>
                            <tr>       
                               <th>name</th>
                               <td>${info[0][0]['name']}</td>
                            </tr>
                            <tr>
                            <th>categorie</th>
                            <td>${info[0][0]['categorie']}</td>
                            </tr>
                            <tr>
                            <th>calorie</th> 
                            <td>${info[0][0]['calorie']}</td>
                            </tr>
                            <tr>
                            <th>saison</th> 
                            <td>${info[0][0]['saison']}</td>
                            </tr>
                            <th>helthy</th> 
                            <td>${info[0][0]['healthy']} %</td>
                            </tr>
                            `);
                            $(".vitamineListBody").empty();

                          for (let i = 0; i < info[0].length; i++) {
                            console.log(info[0][i]);
                      //      const element = array[index];
                            $(".vitamineListBody").append(`
                        
                            <tr>       
                            <td>${info[0][i]['vitamine']}</td>
                            <td>${info[0][i]['qte']}</td>
                            </tr>
                           
                           
                            `);
                            
                          }
                          $(".infoListBody").empty();
                          for (let i = 0; i < info[1].length; i++) {
                            console.log(info[1][i]);
                      //      const element = array[index];
                      

                            $(".infoListBody").append(`
                        
                            <tr>       
                            <td>${info[1][i]['info']}</td>
                            <td>${info[1][i]['qte']}</td>
                            </tr>
                           
                           
                            `);
                            
                          }

                          $(".minerauxListBody").empty();
                          
                          for (let i = 0; i < info[2].length; i++) {
                            console.log(info[2][i]);
                      //      const element = array[index];
                            $(".minerauxListBody").append(`
                        
                            <tr>       
                            <td>${info[2][i]['mineraux']}</td>
                            <td>${info[2][i]['qte']}</td>
                            </tr>
                           
                           
                            `);
                            
                          }
                  
                  

                        },
                        error: function(xhr, status, error) {
                        console.error(xhr);
                        
                        }
                        });

            })
             
                    });    
        </script>
        <?php
    }
}


?>
