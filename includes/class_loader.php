<?php
spl_autoload_register('AutoLoader');
function AutoLoader($className) {
  $sources = array("Classes/Controllers/$className.php", "Classes/Models/$className.php ",  "Classes/Database/$className.php " );
  foreach ($sources as $source) { if (file_exists($source)) { require_once $source; } } 
}