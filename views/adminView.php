<?php

class AdminView {


    public function head() { ?>
                    
        <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">

            <title>LOGIN</title>

            <link rel="stylesheet" type="text/css" href= "../public/css/admin.css">

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
                <div class='Right-nav'>
                    <img class='icon' src="../public/images/icons/settings.png"/>
                    <img class='icon' src="../public/images/icons/notif.png"/>
                    <img class='icon' src="../public/images/icons/admin.png"/>


                </div>
                
     

            </header>
        <?php
    }
        public function table(){

            ?>

                          <div  class="userTable table-responsive "  id="table" 
                                data-toggle="table"
                                data-search="true"
                                data-filter-control="true" 
                                data-show-export="true"
                                data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <h1> Users </h1>
                                <table class="table">
                                    <thead>
                                        <tr>
                                         
                                            <th scope="col" class='th-sm' data-field="state" data-checkbox="true">Name</th>
                                            <th scope="col" class='th-sm'>Email</th>
                                            <th scope="col" class='th-sm'>sex</th>
                                            <th scope="col" class='th-sm'>confirmed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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

        public function sideBar() {
            ?>
          <aside class='aside'>
            
          
            <div class="menu d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                    Home
                </a>
                </li>
                <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    Recipes
                </a>
                </li>
                <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    Users
                </a>
                </li>
                <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                    Nutration
                </a>
                </li>
                <li>
                <a href="#" class="nav-link text-white">
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
        public function main(){
            ?>
            <main class='main'>
            
                <?php
             $this->sidebar();
            $this->table() ;
            ?> 
            </main>
            <script src='../public/js/jQuery.js'></script>
            <script>

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
                        
             </script>
            <?php
        }

        
        }
    



?>