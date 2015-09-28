<?php
    if (isset($_COOKIE['cookieContact'])) {
        if ($_COOKIE['cookieContact'] == 'success') { ?>
            <script type="text/javascript"> $('#contacto-success-modal').modal('show'); </script>
         <?php }
         elseif ($_COOKIE['cookieContact'] == 'error') { ?>
            <script type="text/javascript"> $('#contacto-error-modal').modal('show'); </script>
          <?php } 
     }

?>