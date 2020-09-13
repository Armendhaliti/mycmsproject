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
$the_post_id =escape($_GET['p_id']) ;
    $the_post_author =escape($_GET['author']) ;

           } 

$query = "SELECT * FROM posts WHERE post_user = '{$the_post_author}' ";
$select_all_posts_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_posts_query)){

$post_title = $row['post_title'];
$post_user = $row['post_user'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content =substr($row['post_content'], 0, 100) ;   
    
    
?>



            <h2>
                <a href="#" class="title"><?php  echo $post_title; ?></a>
            </h2>
            <p class="lead">
                All posts by <?php  echo $post_user; ?>
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
                $the_post_id =escape($_GET['p_id']) ;
                
                $comment_author =escape($_POST['comment_author']) ;
                $comment_email =escape($_POST['comment_email']) ;
                $comment_content =escape($_POST['comment_content']) ;
                
                if(!empty($comment_author) && !empty($comment_email) &&!empty($comment_content) ){
                    
                    
                     $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date )  ";
                $query .= " VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved' , now() ) ";
                
                $create_comment_query = mysqli_query($connection, $query);
                if(!$create_comment_query){
                    die('QUERY FAILED' . mysqli_error($connection) );
                }
                
                
                
                
                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                $query .= "WHERE post_id = $the_post_id ";
                
                $update_comment_count = mysqli_query($connection, $query);
                
            }else{
                    
                   
                    echo "<script>alert('Fields cannot be empty')</script>";
                    
                    
                    
                    
                    
                }
            
                    
                    
                    
                    
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