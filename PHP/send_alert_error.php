<?php

  function send_alert_error($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../bloodbank_system-main/login.html';";
        echo '</script>';
    }

?>