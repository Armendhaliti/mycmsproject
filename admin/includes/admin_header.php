
<?php include_once "admin_db.php" ?>
<?php  ob_start();  ?>

<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
    if(!isset($_SESSION['user_role'])) { 
        
            header("Location: ../index.php");
        
    }
?>








<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/armendadmin.css" rel="stylesheet">

    <!-- Custom Fonts -->

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <script src="js/jquery.js"></script>
    <script>
        //REST OF THE CODE
    
    $(document).ready(function(){
        $('#selectAllBoxes').click(function(event){
                console.log(event)

            if(this.checked){
                $('.checkBoxes').each(function(){
                    this.checked = true;
                });
            }else{
                $('.checkBoxes').each(function(){
                    this.checked = false;
                });
            }
        })
    
});
    
var div_box = "<div id='load-screen'><div id='loading'></div></div>";
    
   $("body").prepend(div_box) ;
    
   $('#load-screen').delay(700).fadeOut(600, function(){
       $(this).remove();
   }) ;
    
    </script>
    
<script>
    
    $(document).ready(function(){
    
    // EDITOR CKEDITOR
    
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.log( error );
        });
    });
    
    
    function loadUsersOnline(){
        
        $.get("functions.php?onlineusers=result", function(data){
            
           $(".usersonline").text(data);
            
            
            
            
        });
              
             
        
        
    }
    
    setInterval(function(){
        loadUsersOnline();
        
    }, 500);
   


    </script>



</head>

<body>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">      </script>
        
    