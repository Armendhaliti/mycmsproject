<?php  require_once "includes/db.php" ?>
<?php  include_once "includes/header.php" ?>

<?php
//if ( isset( $_POST['submit'] ) ) {
//    $name = escape($_POST['name']);
//
//    $email_from          = escape($_POST['email']);
//    $subject        = escape($_POST['subject']);
//    $message        = escape($_POST['message']);
//    
//    $mailTo = "armendhaliti12@gmail.com";
//    $headers = "From: ".$email_from;
//    $txt = "You have received an e-mail from  ".$name.".\n\n".$message;
//    
//    
//    mail($mailTo,$subject,$txt, $headers);
//
//   
//}

?>

<!-- Navigation -->

<?php  include 'includes/navigation.php';
?>

<!-- Page Content -->
<div class='container'>

    <section id='login'>
        <div class='container'>
            <div class='row'>
                <div class='col-xs-6 col-xs-offset-3'>
                    <div class='form-wrap'>
                        <h1 class="text-center">Contact</h1>
                        <br>
                        <form role='form' action='registration.php' method='post' id='login-form' autocomplete='off'>
           
                           <div class='form-group'>
                                <label for='name' class='sr-only'>Enter Name</label>
                                <input type='text' name='name' id='name' class='form-control'  placeholder='Enter your Name'>
                            </div>
                           
                            <div class='form-group'>
                                <label for='email' class='sr-only'>Email</label>
                                <input type='email' name='email' id='email' class='form-control' placeholder='Enter Your Password'>
                            </div>
                             <div class='form-group'>
                                <label for='subject' class='sr-only'>Subject</label>
                                <input type='text' name='subject' id='subject' class='form-control'  placeholder='Subject'>
                            </div>
                            <div class='form-group'>
                                <textarea class="form-control" rows="6" name="message" id="" ></textarea>
                            </div>

                            <input type='submit' name='submit' id='btn-login' class='btn btn-custom btn-lg btn-block' value='Submit'>
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <hr>

    <?php include 'includes/footer.php';
?>
