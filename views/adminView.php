<?php
require_once "../controllers/homeController.php";
require_once "../controllers/dashboardController.php";

class AdminView {


    public function head() { ?>
                    
        <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">
      
            <title>LOGIN</title>

            <link rel="stylesheet" type="text/css" href= "../public/css/admin.css">
            <link rel="stylesheet" type="text/css" href= "../public/css/home.css">

            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
            <!-- Select2 CSS -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css" rel="stylesheet" />
            <!-- Select2 CSS -->
            <link href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />


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
                                            <th  data-field="sex" data-filter-control="select" scope="col" class='th-sm'>sex</th>
                                            <th  data-field="confirmed" data-sortable="true" scope="col" class='th-sm'>confirmed</th>
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
                                                <button type="submit" name='confirme' class="btn btn-primary" <?php echo $user['confirmed']?'disabled':'' ?> >confirme</button></form></td>
                                        </tr>
                                      
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
      

            <?php
        }


        public function userTable2(){

            ?>

                          <div  class="userTable table-responsive "  id="table" 
                                data-toggle="table"
                                data-search="true"
                                data-filter-control="true" 
                                data-show-export="true"
                                data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <input class="form-control" id="myInput" type="text" placeholder="Search.."/>

                                <h1> Users </h1>
                                <table id="table" class="table table-striped nowrap" style="width:100%">
                                    <thead>
                                  
	
	
                                        <tr>
                                         
                                            <th scope="col" class='th-sm' data-field="state" data-checkbox="true">Name</th>
                                            <th scope="col" class='th-sm' data-field="prenom" data-filter-control="input" data-sortable="true">Email</th>
                                            <th scope="col" class='th-sm'>sex</th>
                                            <th scope="col" class='th-sm'>confirmed</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                            $cntrl  = new dashboardController(); 
                                        	$users = $cntrl->getUsers();
                                            foreach($users as $user)
                                            {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $user['FirstName'].' '.$user['lastName']?></td>
                                            <td><?php echo $user['email']?></td>
                                            <td><?php echo $user['sex']?></td>

                                            <td><form action='operations.php' method="POST" > 
                                                <input hidden value =<?php echo $user['id']?> name='id'/>
                                                <button type="submit" name='confirme' class="btn btn-primary" <?php echo $user['confirmed']?'disabled':'' ?> >confirme</button></form></td>
                                        </tr>
                                      
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                              
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
                                            <th scope="col" class='th-sm'>confirmé</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                            $cntrl  = new HomeController(); 
                                        	$recipes = $cntrl->getRecipes();
                                            foreach($recipes as $recipe)
                                            {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $recipe['name']?></td>
                                            <td><?php echo $recipe['writer']?></td>
                                            <td><img src="../public/images/recipes/<?php echo $recipe['imgPath']?>"  width="100" height="50"  style="object-fit:cover;" alt=""> <?php echo $recipe['imgPath']?></td>

                                            <td><form action='operations.php' method="POST" > 
                                                <input hidden value =<?php echo $recipe['id']?> name='id'/>
                                                <button type="submit" name='confirmeRecipe' class="btn btn-primary" <?php echo $recipe['aprroved']?'disabled':'' ?> >confirme</button></form></td>
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
                <span class="fs-4">Sidebar</span>
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
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
            </div>
         </aside>

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
             }  else if ($num == 2) {
                    $this->recipeTable() ;
                
             }


            ?> 
            </main>
            <script src='../public/js/jQuery.js'></script>
       
        
    <!-- jQuery -->
    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>
    <script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>



    <script>
    
var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

		var trBoldBlue = $("table");

	$(trBoldBlue).on("click", "tr", function (){
			$(this).toggleClass("bold-blue");
	});
    </script>

-->          
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