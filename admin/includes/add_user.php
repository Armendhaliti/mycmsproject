<?php

if(isset($_POST['create_user'])){
    
    
    $user_firstname =escape($_POST['user_firstname']) ;
    $user_lastname =escape($_POST['user_lastname']) ;
    $user_role =escape( $_POST['user_role']);
    
    
    $username =escape($_POST['username']) ;
    $user_email =escape($_POST['user_email']) ;
    $user_password =escape($_POST['user_password']) ;
    
    
$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    
    $query = "INSERT INTO users( user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}' ) ";
    
    $create_user_query = mysqli_query($connection, $query);
    
    confirm($create_user_query);
    
echo"User Created: " . " " . "<a  href='users.php'>View Users</a>" ;
    
    
    
}
  



?>
                            
                          <form action="" method="post" enctype="multipart/form-data">
                           
                            <div class="form-group">
                                <label for="title">Firstname</label>
                                    <input class="form-control" type="text" name="user_firstname">
                            </div>
                            <div class="form-group">
                                <label for="post_status">Lastname</label>
                                    <input class="form-control" type="text" name="user_lastname">
                            </div>
                            
                            
                            
                            
                            
                            
                            <div class="form-group">
        <select name="user_role" id="">
                           <option value="subscriber">Select Options</option>
                            <option value="admin">admin</option>
                            <option value="subscriber">subscriber</option>
                                
                                
                                
        </select>
    </div>
                            
                            
<!--
                            <div class="form-group">
                                <label for="image">Post Image </label>
                                    <input class="form-control" type="file" name="image">
                            </div>
-->
                            <div class="form-group">
                                <label for="post_tags">Username</label>
                                    <input class="form-control" type="text" name="username">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_tags">Email</label>
                                    <input class="form-control" type="email" name="user_email">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_tags">Password</label>
                                    <input class="form-control" type="text" name="user_password">
                            </div>
                            
                            
                            
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
                            </div>
                          
    
                            
                            

                        </form>