<?php 
   
$str="Akhter Hussain Bhat";
 $res= explode(" ", $str);
 $val= $res['0'];
 echo "This is my first name ".$val."<br>";
 
 //print_r($res);
  $from2= array_splice($res,1);
    $lastval=implode(" ",$from2);
	echo "This is my name after lastname ".$lastval;
 
  
?>
   
   
 