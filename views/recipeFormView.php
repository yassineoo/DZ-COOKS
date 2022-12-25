<?php



class recipeFormView{



    public function head () {
            ?>
                    <head>
                    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
                    <link rel="stylesheet" type="text/css" href="../public/css/home.css">
                    <script src="bootstrap-autocomplete.min.js"></script>
                    <title>DZ cooks</title>
                    </head>
            <?php
    }

    public function form () {


        ?>
   
        <body>

        <div id="recipesFormRoot">
             <form class="recipes-form">
                 <div class="recipes-form__heading">  
                    <h2>Add a New Recipe</h2></div>
                 <div class="recipes-form__section">
                     <div class="form-group">
                        <label for='title'>
                            <span  >Recipe Title *</span>
                        </label>
                        <input id="RecipeTitle" class="form-control" placeholder=" " name="title" type="text" class="css-c8bif2" value=""/>
                    </div>
                        <!--
                    <div class="recipes-form__tooltip-icon" aria-label="Title info">
                    </div>
       
                    <div class="recipes-form__tooltip">Be descriptive — but don't get crazy. Succinct titles with well-chosen adjectives and key ingredients are memorable and they catch our attention, like "One-Pot Kale and Quinoa Pilaf", "Aunt Mariah's Lemon Sponge Cups" or "Tipsy Maple Corn". (You want to go cook all three, don't you?)
                    </div>


     -->           <div class="form-group">
                        <label for="RecipeDescription" >
                           <span >Recipe Description</span>
                        </label>
                        <textarea  class="form-control" name="description" rows="5" >
                        </textarea>

                    </div>
                    <div class="form-group rowInput">
                        <label for="RecipeDescription" >
                           <span >the Recipe serves </span>
                        </label>
                        <input  type="number" class="form-control" name="description" placeholder="1"  />
                        <span > persons</span>                       

                    </div>
                    <div class="form-group rowInput">
                        <label for="RecipeDescription" >
                           <span >Prep Time *</span>
                        </label>
                        <input  type="number" class="form-control" name="description" placeholder="H"  />
                        <input  type="number" class="form-control" name="description" placeholder="Min"  />
                        

                    </div>
                    <div class="form-group rowInput">
                        <label for="RecipeDescription" >
                           <span >Cook Time *</span>
                        </label>
                        <input  type="number" class="form-control" name="description" placeholder="H" />
                        <input  type="number" class="form-control" name="description" placeholder="Min" />
                      

                    </div>
                    <div class="form-group rowInput">
                        <label for="RecipeDescription" >
                           <span >Rest Time</span>
                        </label>
                        <input  type="number" class="form-control" name="description" placeholder=" H"  />

                        <input  type="number" class="form-control" name="description" placeholder="Min"  />
                      

                    </div>

                    <?php
                    $this->line();
                    $this->ingredient();
                    $this->ingredient();
                    $this->ingredient();
                    

                    ?>
                    <button type="" class="addIngredient">+ Add Another Ingredient</button>
                    
                   <?php  $this->line();?>
                   <h3> Add your instructions one at a time </h3>
                   <?php 
                   $this->step(1);
                   $this->step(2);
                   $this->step(3);
                   ?>
                   <button type="" class="addIngredient">+ Add Another Step</button>
                   <?php  $this->line();?>
                   <h3> Tag your Recipe</h3>
                   
                            
                           <select class="form-select form-select-sm">
                            <?php
                            $cntrl  = new HomeController(); 
                            $categories = $cntrl->getCategories();

                            foreach($categories as $cat)
                            {

                              ?>
                                <option><?php echo $cat['name'] ?></option>
                                
                                <?php  } ?>
                            </select >

                            <select class="form-select form-select-sm">
                            <?php
                            $cntrl  = new HomeController(); 
                            $party = $cntrl->getParty();

                            foreach($party as $part)
                            {

                              ?>
                                <option><?php echo $part['name'] ?></option>
                                
                                <?php  } ?>
                            </select>
                  <h3> Add an Image</h3>
                  <input type="file" name="img" value="">
                  <h3> Add a video</h3>
                  <input type="file" name="video" value="">

             <!--
                    <div class="recipes-form__tooltip">This will be your recipe's introduction! We love a good story behind a dish, along with helpful tips and variations.
                    <br>
                    <br>If you've adapted from someone else's recipe, this is where you should give credit and tell us how you've made it your own. Not sure if your recipe is adapted enough?
                    </div>
             -->
                <button type="submit"> Submit </button>
                </form>
            </div>
        </div>
     </body>

     <?php


    }
    public function ingredient(){
        ?>
                <div class="form-group Ingredient">
                        <label for="RecipeDescription" >
                           <span >Ingredient</span>
                        </label>
                        <input  type="name" class="form-control" name="IngredientName"  placeholder="Name"  />
                         <label for="measurement00" class="css-1dn068x">
                        <span class="css-1j7byy8">Measurement
                        </span>
                        </label>
                        <select id="measurement00" name="measurement_id" class="form-select form-select-sm">
                                <option hidden="" disabled="">
                                </option>
                                <option value="10"> (none)
                                </option>
                                <option value="3">cup
                                </option>
                                <option value="21">teaspoon
                                </option>
                                <option value="20">tablespoon
                                </option>
                                <option value="1">bunch
                                </option>
                                <option value="2">cake
                                </option>
                                <option value="4">dash
                                </option>
                                <option value="5">drop
                                </option>
                                <option value="6">gallon
                                </option>
                                <option value="23">gram
                                </option>
                                <option value="7">handful
                                </option>
                                <option value="8">liter
                                </option>
                                <option value="9">milliliter
                                </option>
                                <option value="11">ounce
                                </option>
                                <option value="12">packet
                                </option>
                                <option value="13">piece
                                </option>
                                <option value="14">pinch
                                </option>
                                <option value="22">pint
                                </option>
                                <option value="15">pound
                                </option>
                                <option value="16">quart
                                </option>
                                <option value="17">shot
                                </option>
                                <option value="18">splash
                                </option>
                                <option value="19">sprig
                                </option>
                         </select>
                    
                       
                      
                        <input  type="number" class="form-control" name="qte" placeholder="Qeuntity" />
   
                    </div>

                    <script>

            
                   </script>
        <?php

        
    }

    public function step($number){
        ?>
                    <div class="form-group Ingredient">
                   
                        <textarea  class="form-control" value="djd" name="steps" rows="2"  >
                        </textarea>
                    </div>
        <?php

        
    }


    public function line(){
        ?>
        <span class="sperator">
        </span>
    <?php
    }
    
}


?>