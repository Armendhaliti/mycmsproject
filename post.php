<?php  include"includes/header.php";    ?>





<!-- Navigation -->
<?php  include"includes/navigation.php";    ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


<?php 

if(isset($_GET['p_id'])){
$the_post_id = $_GET['p_id'];
    
$view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id ";
$send_query = mysqli_query($connection, $view_query);
if(!$send_query){
    die("query failed");
}
    
    
    if(isset($_SESSION['user_role']) &&  $_SESSION['user_role'] == 'admin'){
        
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    }else{
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id  AND post_status = 'published' ";
    }
           


$select_all_posts_query = mysqli_query($connection, $query);
    if(mysqli_num_rows($select_all_posts_query) < 1){
    
       echo "<h1 class='text-center'>No posts avilable</h1>";

    
    
}else{

while($row = mysqli_fetch_assoc($select_all_posts_query)){

$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content =substr($row['post_content'], 0, 100) ;   
    
    
?>



          
            <h2>
                <a href="#" class="title"><?php  echo $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a class="lead" href="index.php"><?php  echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span><?php  echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
            <hr>
            <p class="lead"><?php  echo $post_content; ?></p>
            

            <hr>



            <?php  } ?>
            
            <?php
            
            if(isset($_POST['create_comment'])){
                $the_post_id = $_GET['p_id'];
                
                $comment_author =escape($_POST['comment_author']);
                $comment_email =escape($_POST['comment_email']);
                $comment_content =escape($_POST['comment_content']);
                
                if(!empty($comment_author) && !empty($comment_email) &&!empty($comment_content) ){
                    
                    
                $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date )  ";
                $query .= " VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved' , now() ) ";
                
                $create_comment_query = mysqli_query($connection, $query);
                if(!$create_comment_query){
                    die('QUERY FAILED' . mysqli_error($connection) );
                }
                
                
                
                
//                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
//                $query .= "WHERE post_id = $the_post_id ";
//                
//                $update_comment_count = mysqli_query($connection, $query);
                
            }else{
                    
                   
                    echo "<script>alert('Fields cannot be empty')</script>";
                    
                    
                    
                    
                    
                }
            
                    
                    
                    
                    
                }
                
              
                
   
            
            
            
            
            
            
            ?>
            
            




            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                       <label for="comment_author">Author</label>
                        <input name="comment_author" class="form-control" type="text" >
                    </div>
                    <div class="form-group">
                       <label for="comment_email">Email</label>
                        <input name="comment_email" class="form-control" type="email" >
                    </div>
                    <div class="form-group">
                     <label for="Comment">Your Comment</label>

                        <textarea name="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit"  name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            
            <?php  
            
            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC";
            $select_comments_query= mysqli_query($connection, $query);
            
            if(!$select_comments_query){
                
                
                die("QUERY FAILED". mysqli_error($connection));
            }
            while($row = mysqli_fetch_array($select_comments_query)){
                
                
                $comment_date  = $row['comment_date'];
                $comment_content  = $row['comment_content'];
                $comment_author = $row['comment_author'];
                
                ?>
                
                
                <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo  $comment_author; ?>
                        <small><?php echo $comment_date; ?></small>
                    </h4>
                    <?php echo $comment_content; ?>
                </div>
            </div>
                
                
                
                
                
                
                
                
     <?php  }}

} else{
    
    
    header("Location: index.php"); 
    
    
    
    
}
            
            
            
            ?>
            
            
            
            
            
            
            

            <!-- Comment -->
            

            <!-- Comment -->
           


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php  include"includes/sidebar.php";    ?>

    </div>
    <!-- /.row -->

    <hr>



    <?php  include"includes/footer.php";    ?>