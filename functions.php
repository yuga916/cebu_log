<?php
    define('DEBUG', true);

    function special_echo($val) {
        if (DEBUG) {
            echo $val;
            echo '<br>';
        }
    }

    function special_var_dump($val) {
        if (DEBUG) {
            echo '<pre>';
            var_dump($val);
            echo '</pre>';
        }
    }

   
    function makePath() {
         if (DEBUG) {
           return '/cebu_log/';
         } else {
           return '/portfolio/cebu_log/';
         }
    }

    function own_header($path) {
        if (DEBUG) {
          return '<script>window.location.href = "/cebu_log/' . $path . '";</script>';
        } else {
          return '<script>window.location.href = "/portfolio/cebu_log/' . $path . '";</script>';
        }

    }


 ?>
