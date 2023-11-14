<?php




if(isset($_POST['submit'])){
    
     $word = $_POST['word'];
     header("location: ../index.php?word=$word");
    
} 