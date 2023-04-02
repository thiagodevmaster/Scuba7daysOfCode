<?php 

    if(isset($_SESSION['success_message'])){
        unset($_SESSION['success_message']);
    }else if (isset($_SESSION['error_message'])){
        unset($_SESSION['error_message']);
    }
?>
</body>
</html>
