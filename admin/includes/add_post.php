<?php

if(isset($_POST['create_post'])){
$post_title = escape($_POST['title']) ;
    $post_user = escape($_POST['post_user']);
    $post_category_id =escape($_POST['post_category']) ;
    $post_status =escape($_POST['post_status']) ;
    
    $post_image =escape($_FILES['image']['name']) ;
    $post_image_tmp =escape($_FILES['image']['tmp_name']) ;
    
    $post_tags =escape($_POST['post_tags']) ;
    $post_content =escape($_POST['post_content']) ;
    $post_date =escape(date('d-m-y')) ;
//    $post_comment_count = 4;
    
    
    move_uploaded_file($post_image_tmp, "../images/$post_image" );
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}', now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";
    
    $create_post_query = mysqli_query($connection, $query);
    
 
    $the_post_id =mysqli_insert_id($connection);
    
    echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id} '> View Post</a> or <a href='posts.php'>Edit Other Posts</a></p>";

    
    
    
}




?>
                             
                          <form action="" method="post" enctype="multipart/form-data">
                           
                            <div class="form-group">
                                <label for="title">Post Title </label>
                                    <input class="form-control" type="text" name="title">
                            </div>
                            
                            
                            <div class="form-group">
                            <label for="post_category">Category</label>
        <select name="post_category" id="">
                            <?php

                            $query = "SELECT * FROM categories ";
                            $select_categories = mysqli_query($connection, $query);
                            confirm($select_categories);

                            while($row = mysqli_fetch_assoc($select_categories)){
                            $cat_id = $row['cat_id'];
                            $cat_title= $row['cat_title'];

                            echo "<option value='{$cat_id}'>{$cat_title}</option>";

                            }

                            ?>
                                
                                
                                
        </select>
    </div>
                            
<!--
                            <div class="form-group">
                                <label for="title">Post Author </label>
                                    <input class="form-control" type="text" name="author">
                            </div>
                            
                            
                            
                            
-->
        <div class="form-group">
                            <label for="users">Users</label>
        <select name="post_user" id="">
                            <?php

                            $users_query = "SELECT * FROM users ";
                            $select_users = mysqli_query($connection, $users_query);
                            confirm($select_users);

                            while($row = mysqli_fetch_assoc($select_users)){
                            $user_id = $row['user_id'];
                            $username= $row['username'];

                            echo "<option value='{$username}'>{$username}</option>";

                            }

                            ?>
                                
                                
                                
        </select>
    </div>
         
                                  
                                                     
                                     <div class="form-group">
                                   
                                   <select name="post_status" id="">
                                       
                                       <option value="draft">Post Status</option>
                                       <option value="published">published</option>
                                       <option value="draft">draft</option>
                                       
                                   </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Post Image </label>
                                    <input class="form-control" type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="post_tags">Post  Tags</label>
                                    <input class="form-control" type="text" name="post_tags">
                            </div>
                            <div class="form-group">
                                <label for="">Post  Content</label>
                                <textarea class="form-control" type="text" name="post_content" id="body" cols="30" rows="15"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
                            </div>
                          
    
                            
                            

                        </form>







































