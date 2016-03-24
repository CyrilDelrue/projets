<?php
function autoloader($class)
{
	$explo = explode('\\' ,$class);
	$explo_one = explode(DIRECTORY_SEPARATOR, __DIR__);
	$count = count($explo_one) - 1;
	$dir = ".".DIRECTORY_SEPARATOR.$explo_one[$count];
	scan($dir, $explo[1]);
	
}

function scan($dir, $class_name = null)
{
	scan_first_dir($dir, $class_name);
	if (is_dir($dir) && is_readable($dir))
	{
    if($my_dir = opendir($dir))
    {
      while($entry = readdir($my_dir))
      {
       if (is_dir($dir.DIRECTORY_SEPARATOR.$entry))
       {
         if (($entry != ".") && ($entry != ".."))
         {
           $rep = $dir.DIRECTORY_SEPARATOR.$entry;
           
           foreach (glob($rep.DIRECTORY_SEPARATOR.$class_name.'.class.php') as $key => $value)
           {
             if (file_exists($value) && !is_dir($value))
             {
              require_once("$value");
            }
          } 
          scan($dir.DIRECTORY_SEPARATOR.$entry);
        }
      } 
    }
    closedir($my_dir);
  }
}
}

function scan_first_dir($directory, $class_name)
{
	$explo_one = explode(DIRECTORY_SEPARATOR, __DIR__);
	$count = count($explo_one) - 1;
	$dir = ".".DIRECTORY_SEPARATOR.$explo_one[$count];
  if ($directory == $dir)
  {
    foreach (glob($directory.DIRECTORY_SEPARATOR.'*.class.php') as $k => $val)
    {
     if (file_exists($val));
     {
       require_once("$val");
     }
   }
 }
}

spl_autoload_register('autoloader');
?>