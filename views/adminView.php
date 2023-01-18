<?php
require_once "../controllers/homeController.php";
require_once "../views/recipeFormView.php";
require_once "../controllers/dashboardController.php";

class AdminView {


        public function head() { ?>
                    
            <head>
            <meta charset="UTF-8" />
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        
            <link rel="stylesheet" type="text/css" href= "../public/css/admin.css">
            <link rel="stylesheet" type="text/css" href= "../public/css/home.css">
            <link href="../public/css/bootstrap.min.css" rel="stylesheet">
            <script src='../public/js/jQuery.js'></script>
            <script src="../public/js/bootstrap.bundle.min.js"></script>         
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src='../public/js/jQuery.js'></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            


            </head>
        <?php  
        }

        public function navbar(){

            ?>

                <header>
                    <img class='logo' src='../public/images/logo.png'>
                    <div class='search-con'>
                        <img class='icon searchIcon' src="../public/images/icons/search.png"/>
                        <input type = 'text' class='search-input' />
                    </div>
                    <div class='Right-navbar'>
                        <img class='icon' src="../public/images/icons/settings.png"/>
                        <img class='icon' src="../public/images/icons/notif.png"/>
                        <img class='icon' src="../public/images/icons/admin.png"/>

                </div>
                    
        

                </header>
            <?php
        }
        public function userTable(){

                ?>

                            <div  class="userTable table-responsive "   
                            id="table" 
                                data-toggle="table"
                                data-search="true"
                                data-filter-control="true" 
                                data-show-export="true"
                                data-click-to-select="true"
                                data-toolbar="#toolbar"
                                class="table-responsive">
                                    <input class="form-control" id="myInput" type="text" placeholder="Search.."/>

                                    <h1> Users </h1>
                                    <table id="table" class="table table-striped nowrap" style="width:100%">
                                        <thead>
                                    
        
        
                                            <tr>
                                            
                                                <th  data-field="date" data-filter-control="select"  scope="col" class='th-sm' data-field="state" data-checkbox="true">Name</th>
                                                <th  data-field="email" data-filter-control="select" scope="col" class='th-sm' data-field="prenom" >Email</th>
                                                <th  data-field="sex" data-filter-control="select" scope="col" class='th-sm'>sexe</th>
                                                <th  data-field="confirmed" data-sortable="true" scope="col" class='th-sm'>confirmer</th>
                                                <th  data-field="delete" data-sortable="true" scope="col" class='th-sm'>supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                                $cntrl  = new dashboardController(); 
                                                $users = $cntrl->getUsers();
                                                $i = 0;
                                                foreach($users as $user)
                                                {
                                            ?>
                                            
                                            <tr>

                                                <td><?php echo $user['FirstName'].' '.$user['lastName']?></td>
                                                <td><?php echo $user['email']?></td>
                                                <td><?php echo $user['sex']?></td>

                                                <td><form action='operations.php' method="POST" > 
                                                    <input hidden value =<?php echo $user['id']?> name='id'/>
                                                    <button type="submit" name='confirmeUser' class="btn btn-primary" <?php echo $user['confirmed']?'disabled':'' ?> >confirme</button></form></td>
                                                <td><form action='operations.php' method="POST" > 
                                                    <input hidden value =<?php echo $user['id']?> name='id'/>
                                                    <button type="submit" name='deleteUser' class="btn btn-primary"  >Supprimer</button></form></td>
                                            </tr>
                                        
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                
                                </div>
        

                <?php
        }
        public function Recipeacoordien(){

            ?> 
                  <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Ajouter une Recette !
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                     <?php 
                     $view = new RecipeFormView();
                     $view->form() ?> 
    
                  </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   controller les recettes ! 
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                         <?php $this->recipeTable() ?> 
                    </div>
                    </div>
                </div>
             
    
            </div> 
    
    
            <?php
        }
        public function diposacoordien(){

            ?> 
                  <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Ajouter une Diapo !
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <form class="form-controle addform" enctype="multipart/form-data" method="POST" action="./addDiapo.php">
                            <div class="nine">
                                        <h1>ajouter un Diapo<span>Les information generale </span></h1>
                            </div>
                            <label for="title">title</label>
                            <input class="form-control" type="text" name="title" />  
                            <label for="title">path</label>
                            <input class="form-control" type="text" name="path" /> 
                            <label for="title">choisir une type</label>
                            <select class="form-control"  name="type" >
                                <option value="0">news</option> 
                                <option value="1">recette</option> 
                            </select>
                            <label for="title">choisir une image</label>
                            <input class="form-control" type="file" name="ImageUpload" />
                         
                            <button type="submit" class="submitFinale btn btn-primary "> submit</button>
                     </form>
    
                  </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   controller les Diapos ! 
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                         <?php $this->diapoTable() ?> 
                    </div>
                    </div>
                </div>
             
    
            </div> 
    
    
            <?php
        }
        public function NewsAcoordien(){

            ?> 
                  <div class="accordion" id="accordionExample">
                <div class="acc+ordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Ajouter une News !
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <form class="form-controle addform" enctype="multipart/form-data" method="POST" action="./addNews.php">
                            <div class="nine">
                                        <h1>Ajouter une News<span> </span></h1>
                            </div>
                            <label for="title">title</label>
                            <input class="form-control" type="text" name="title" />  
                            <label for="title">content</label>
                            <textarea rows="5" class="form-control" type="text" name="text" ></textarea>  
                         
                            <label for="title">choisir une image</label>
                            <input class="form-control" type="file" name="ImageUpload" />
                         
                            <button type="submit" class="submitFinale btn btn-primary " name="addNews"> submit </button>
                     </form>
    
                  </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   controller les news ! 
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                         <?php $this->newsTable() ?> 
                    </div>
                    </div>
                </div>
             
    
            </div> 
    
    
            <?php
        }

        public function recipeTable(){

            ?>

                          <div  class="userTable table-responsive "  id="table" 
                                data-toggle="table"
                                data-search="true"
                                data-filter-control="true" 
                                data-show-export="true"
                                data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <input class="form-control" id="myInput" type="text" placeholder="Search.."/>

                                <h1> Les recettes </h1>
                                <table id="table" class="table table-striped nowrap" style="width:100%">
                                    <thead>
                                  
	
	
                                        <tr>
                                         
                                            <th scope="col" class='th-sm' data-field="state" data-checkbox="true">Nom</th>
                                            <th scope="col" class='th-sm' data-field="prenom" data-filter-control="input" data-sortable="true">writer</th>
                                            <th scope="col" class='th-sm'>image</th>
                                            <th scope="col" class='th-sm'>confirmer</th>
                                            <th scope="col" class='th-sm'>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                            $cntrl  = new HomeController(); 
                                        	$recipes = $cntrl->getRecipes(null,"all");
                                            foreach($recipes as $recipe)
                                            {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $recipe['name']?></td>
                                            <td><?php echo $recipe['writer']?></td>
                                            <td><img src="../public/images/recipes/<?php echo $recipe['imgPath']?>"  width="100" height="50"  style="object-fit:cover;" alt=""> <?php echo $recipe['imgPath']?></td>

                                            <td><form action='operations.php' method="POST" > 
                                                <input hidden value =<?php echo $recipe['id']?> name='id'/>
                                                <button type="submit" name='confirmeRecipe' class="btn btn-primary" <?php echo $recipe['approved']?'disabled':'' ?> >confirme</button></form></td>
                                            <td><form action='operations.php' method="POST" > 
                                                <input hidden value =<?php echo $recipe['id']?> name='id'/>
                                                <button type="submit" name='deleteRecipe' class="btn btn-primary"  >Delete</button></form></td>
                                        </tr>
                                      
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
      

            <?php
        }
        public function newsTable(){

            ?>

                          <div  class="userTable table-responsive "  id="table" 
                                data-toggle="table"
                                data-search="true"
                                data-filter-control="true" 
                                data-show-export="true"
                                data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <input class="form-control" id="myInput" type="text" placeholder="Search.."/>

                                <h1> Les recettes </h1>
                                <table id="table" class="table table-striped nowrap" style="width:100%">
                                    <thead>
                                  
	
	
                                        <tr>
                                         
                                            <th scope="col" class='th-sm' data-field="state" data-checkbox="true">Nom</th>
                                            <th scope="col" class='th-sm' data-field="prenom" data-filter-control="input" data-sortable="true">writer</th>
                                            <th scope="col" class='th-sm'>image</th>
                                            <th scope="col" class='th-sm'>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                            $cntrl  = new DashboardController(); 
                                        	$news = $cntrl->getnews();
                                            foreach($news as $new)
                                            {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $new['title']?></td>
                                            <td><?php echo $new['writer']?></td>
                                            <td><img src="../public/images/news/<?php echo $new['imgPath']?>"  width="100" height="50"  style="object-fit:cover;" alt=""> <?php echo $new['imgPath']?></td>
                                       <td><form action='operations.php' method="POST" > 
                                                <input hidden value =<?php echo $new['idNews']?> name='id'/>
                                                <button type="submit" name='deletenews' class="btn btn-primary"  >Delete</button></form></td>
                                        </tr>
                                      
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
      

            <?php
        }

        public function DiapoTable(){

            ?>

                          <div  class="userTable table-responsive "  id="table" 
                                data-toggle="table"
                                data-search="true"
                                data-filter-control="true" 
                                data-show-export="true"
                                data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <input class="form-control" id="myInput" type="text" placeholder="Search.."/>

                                <h1> Les diapo </h1>
                                <table id="table" class="table table-striped nowrap" style="width:100%">
                                    <thead>
                                  
	
	
                                        <tr>
                                         
                                            <th scope="col" class='th-sm' data-field="state" data-checkbox="true">titre</th>
                                            <th scope="col" class='th-sm' data-field="prenom" data-filter-control="input" data-sortable="true">image path</th>
                                            <th scope="col" class='th-sm'>lien</th>
                                            <th scope="col" class='th-sm'>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                            $cntrl  = new DashboardController(); 
                                        	$diapos = $cntrl->getDiapos();
                                            foreach($diapos as $diapo)
                                            {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $diapo['title']?></td>
                                            <td><img src="../public/images/diapo/<?php echo $diapo['imageName']?>"  width="100" height="50"  style="object-fit:cover;" alt=""> <?php echo $diapo['imageName']?></td>
                                            <td><?php echo $diapo['path']?></td>

                                            <td><form action='operations.php' method="POST" > 
                                                <input hidden value =<?php echo $diapo['imageName']?> name='imageName'/>
                                                <button type="submit" name='deleteDiapo' class="btn btn-primary"  >Delete</button></form></td>
                                        </tr>
                                      
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
      

            <?php
        }
   

        public function sideBar($num) {
            ?>

          <aside class='aside asidebar'>
            
          
            <div class="menu d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                <a href="./" class= <?php if($num==1) { echo "nav-link active text-white" ; } else {echo  "nav-link text-white"; }?>    aria-current="page">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                    Home
                </a>
                </li>
                <li>
                <a href="./recipes" class="nav-link text-white <?php if($num==2) { echo " active" ; } ?> ">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    Recipes
                </a>
                </li>
                <li>
                <a href="./users" class="nav-link text-white <?php if($num==3) { echo " active" ; }?>">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    Users
                </a>
                </li>
                <li>
                <a href="./nutrationPage" class="nav-link text-white <?php if($num==4) { echo " active" ; }?>">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                    Nutration
                </a>
                </li>
                <li>
                <a href="./news" class="nav-link text-white <?php if($num==6) { echo " active" ; }?>">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                    News
                </a>
                </li>
                <li>
                <a href="./theme" class="nav-link text-white  <?php if($num==5) { echo " active" ; }?> ">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                    Theme
                </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>settings</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="./logout">Sign out</a></li>
                </ul>
            </div>
            </div>
         </aside>

            <?php
        }


        public function nutrationAcoordien(){

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
                        <button class="pobularIngredient" id="<?php echo $ingredient['id'] ?> "><?php echo $ingredient['name'] ?> </button>
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
        public function main($num){
            ?>
            <main class='main'>
            
                <?php
             $this->sidebar($num);
            if ($num ==3) {
                $this->userTable() ;
                # code...
             }  elseif ($num == 2) {
                    $this->Recipeacoordien() ;
                
             }
             elseif ($num == 4) {
                $this->nutrationAcoordien() ;
            
         }
             elseif($num==5){
                $this->diposacoordien();
             }
             elseif($num==6){
                $this->newsAcoordien();
             }


            ?> 
            </main>
            <script src='../public/js/jQuery.js'></script>
       
        
  

    

        
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>            
                    <script>
                    $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                    });
                    </script>
            <?php
        }

        
        }
    



?>