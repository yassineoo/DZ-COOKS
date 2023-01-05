<?php 
require_once "../controllers/nutrationController.php";

class RecipeIdeaView  {


    public function head() {
        ?>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
            <link rel="stylesheet" type="text/css" href= "../public/css/idea.css">
            <link rel="stylesheet" type="text/css" href= "../public/css/home.css">
            <link href="../public/css/bootstrap.min.css" rel="stylesheet">
            <script src="../public/js/bootstrap.bundle.min.js"></script>
            <script src="../public/js/autocomplete.js"></script>
            <script src='../public/js/jQuery.js'></script>

        </head>
     <body>
    <?php
    }
    public function index() {
   ?>
        <main class="IdeaCon">
            
        <h1 class="title">Try our Recipe Finder</h1>
        
        <div class="idea">
        
            <div class="leftIdea">
                   <div class="partHor">
                       <h3 class="">Tell us what ingredients you need to use up
                           </h3>
                        <img class="icon" src="../public/images/icons/shopping.png" alt="">
                  </div>
                           
                    <p class="">Type the first ingredient you want to use up in the search box and pick the best match from the drop down. We need a 
                    <strong>minimum
                    </strong> of 
                    <strong>3 ingredients
                    </strong> to find you some recipes.
                    </p>
                <form >
                    
                   <div class="partHor ingredSearch">
    
                        <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Nom de l'ingredient"  />                
                        <img class="icon" src="../public/images/icons/searchIdea.png" alt="">
                  </div>
                    <input type="hidden" name="listCounter" id="listCounter" value=0 />
                </form>
                <h4> Enter 3 more ingredients to find your recipe</h3>
                <h1>Popular ingredients</h1>
                <div class="pobularIngredients">
                
            
                
                    
               </div>
         
            </div>
            <div class="rightIdea">
                <div class="partHor ">
                    
                
                    <h3 class="">Votre ingredients</h3>
                    <img class="icon" src="../public/images/icons/list.png" alt="">
                </div>
                          
                <div class="ingredientList">
                    
                </div>
                </div>
        </div>
        <div class="resCon">
          
            <div class="res">
                
            </div>
        
        </div>


            </main>

            <script>
 
console.log("hh");
var auto_complete = new Autocomplete(document.getElementById('name'), {
    data:<?php 
      $cntrl  = new NutrationController(); 
      $data = $cntrl->getIngredient();            
      echo json_encode($data);
       ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
}); 

$(document).ready(function(){

                                    

        $(".pobularIngredients").append(`
                <?php 
                $cntrl  = new NutrationController(); 
                $ingredients = $cntrl->mostPobular(); 
                foreach($ingredients as $ingredient)
                                            {
                                                ?>
                <button class="pobularIngredient" type="button" value="almond milk">
                                   + <span>
                                    <strong><?php echo $ingredient['name']  ?> </strong>
                                    <span> 
                </button>
                            <?php 
                                            }
                            ?>
                `)
      
                addToList = (value) => {
            let existe = false ;
            $('.ingredientList >li').each(function () { 
                if ( this.childNodes[0].nodeValue.trim() == value.trim())  existe =true;

            });
            console.log("existe :  " ,existe);
            
            if (!existe && value) {
                $('.ingredientList ').append(`<li>${value}</li>`);
                 $('#listCounter').val(parseInt($('#listCounter').val())+1);
                 if(parseInt($('#listCounter').val()) >=2 ) {
                    console.log("it time to think");
                let ingredientList = []
                    $('.ingredientList >li').each(function () { 
                        ingredientList.push( this.childNodes[0].nodeValue.trim()); 
            });  

                console.log(ingredientList);
            
                $.ajax({
                    type: "POST",
                    url: "idea.php",
            data: {"ingredientList" : ingredientList },
            cache: false,
            success: function(data) {
                let   recipes  = JSON.parse(data)  ;
                console.log(recipes);
              $('.res').html('<h3><span class="resNumber">28</span>  recettes basées sur vos ingrédients <span class="ideaNumber"></span></h3>')
              $('.resNumber').html(recipes.length);
              for (let i = 0; i < recipes.length; i++) {
                const recipe = recipes[i];
                    $(".res").append(`<div class="ideacard ">
              <img src="../public/images/recipes/${recipe[0]['imgPath']}" alt="recipe Image" />
              <div class="rightRecipe">
              <h3>${recipe[0]['name']}</h3> 
              <h4>les ingredient : </h4> 
              <p> ${recipe.slice(-1)} </p>


              <div class="timeRecipeCon">
              <img class="icon" src="../public/images/icons/time.png" alt="">
              <h3 class="timeRecipe">${
                parseInt((parseInt( recipe[0]['cookingTime']) + parseInt( recipe[0]['restTime']) + parseInt( recipe[0]['preparationTime'])) /60 )+' h '+ ((parseInt( recipe[0]['cookingTime']) + parseInt( recipe[0]['restTime']) + parseInt( recipe[0]['preparationTime'])  )%60)+' Min' }
                </h3> 
                
            </div>
              
            <span class="sperator">
                </span>
              </div> 
              </div>`)
                
              }
          
        
            },
            error: function(xhr, status, error) {
            console.error(xhr);
            }
            });



                 }


            }
      
    }
      

    $(".pobularIngredient").click((event
            ) => { 
                event.preventDefault();
                addToList(event.target.childNodes[0].nodeValue); 
    });
            
    $('#listCounter').change(function(){
        console.log(" - ----------------------- ");
            
    });

}
)


        
        </script>


<script>
 $(document).ready(function() {
 
 $("#submit").click(function() {
 
 var firstName = $("#firstName").val();
 var lastName = $("#lastName").val();
 var email = $("#email").val();
 var message = $("#message").val();
 
 if(firstName==''||lastName==''||email==''||message=='') {
 alert("Please fill all fields.");
 return false;
 }
 
 
 });
 
 });
 </script>
    </body>

 

        
<?php
    }
}


?>