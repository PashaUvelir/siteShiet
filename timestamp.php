<?php
$path = "C:\OpenServer\domains\antiplagiat\upload"; 

$latest_ctime = 0;
$latest_filename = '';    

$d = dir($path);
while (false !== ($entry = $d->read())) {
  $filepath = "{$path}/{$entry}";
  // could do also other checks than just checking whether the entry is a file
  $timestampfile = fopen("timestampFile.txt","a+");
  if (is_file($filepath) && filectime($filepath)) {
  	 $latest_ctime = date("F d Y H:i:s.",filectime($filepath));
  	 $txt  = "name = " . $entry . " time of alive = " . $latest_ctime. "\n";
  	 //echo $txt;
     fwrite($timestampfile,$txt);
    
    // $latest_filename = $entry;
  
  }
}
?>