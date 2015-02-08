<?php
  
  function sys_cmd($cmd) {
    if(strncmp($cmd, "reboot", strlen("reboot")) == 0) {
      shell_exec('sudo shutdown -r now');
    } else if(strncmp($cmd, "shutdown", strlen("reboot")) == 0) {
      shell_exec('sudo shutdown -h now');
    } else if(strncmp($cmd, "meteoxstart", strlen("meteoxstart")) == 0) {
      shell_exec('cd /var/www/cam/media/; sudo nohup /var/www/cam/media/meteotux_pi -d 60 -e 6000');
    } else if(strncmp($cmd, "meteoxkill", strlen("meteoxkill")) == 0) {
      shell_exec('sudo killall meteotux_pi');
      shell_exec('sudo killall nohup');
//     echo "Killing";
    } else {
      // unknown
    }
  }


  if(isset($_GET['cmd'])) {
    $cmd=$_GET['cmd'];
    sys_cmd($cmd);
  }

?>
