<?php
  $dir = opendir('/');
  if ($dir) {
    while (($item = readdir($dir)) !== false) {
      echo $item.'<br />';
    }closedir($dir);
  }
?>
