<?php

function cus_or_sys_msg($Custom_Message ,&$Errorlist,$System_Message)
{
    if($Custom_Message!="" && $Custom_Message!=null)
    {
    $err=$Custom_Message;
    array_push($Errorlist,$Custom_Message);
    print_r($err);
    print_r($Errorlist);
    echo 'Test';
    }
    else
    {
    echo 'System msg';
    $err=$System_Message;
    array_push($Errorlist,$System_Message);
    print_r($err);
    }
}
//*************************************Check TIME********************************
 
 function ChkTime($Element_type,$Element_id,$Screen_parameter,$Element_value,$Custom_Message,$DIV_Id,&$Errorlist)
 { 
   $st=array();
   $n=array();
   //Separate hour,minute & second
   $st = strtok($Element_value, "/.:- ");
        while ($st !== false) 
         {
           array_push($n, $st);
           $st = strtok(" /.:-");
         }
        if(count($n)==3)
        {
                   
              $h=$n[2];
              $m=$n[1];
              $s=$n[0];

              //check for hour
                   if($h>24)
                   {
                       $System_Message=$Screen_parameter." Invalid Hours Enetered";
                       cus_or_sys_msg($Custom_Message,$Errorlist,$System_Message );
                   }
                   //check for minute
                   else if($m>60){
                      $System_Message=$Screen_parameter." Invalid Minits Entered";
                      cus_or_sys_msg($Custom_Message,$Errorlist,$System_Message );
                   }
                   //check for seconds
                   else if($s>60){
                      $System_Message=$Screen_parameter." Invalid Seconds Enetered";
                      cus_or_sys_msg($Custom_Message,$Errorlist,$System_Message );
                    }
         }
         else 
         {
            $System_Message=$Screen_parameter. " Invalid Time Entered";
            cus_or_sys_msg($Custom_Message,$Errorlist,$System_Message ); 
         }
   
 } 
 
//*************************************End Check TIME********************************
 
 //*************************************CONVERT TIME********************************
 
function convertTime($time)
{
       $st=array();
       $n=array();
       if($time != "" && $time !=null){
        $st = strtok($time, "/.:- ");
        while ($st !== false) 
         {
           array_push($n, $st);
           $st = strtok(" /.:-");
         }
          if(count($n)!=3)
        {
              return null;
        }
         return $n[0].$n[1].$n[2];
       }
       else{
           return null;
       }
      
      
}
 //*************************************END OF CONVERT TIME*************************
 
 //*************************************Check Negative*************************
 
function ChkNegative($Element_type, $Element_id,$Screen_parameter,$Element_value,$Custom_Message,$DIV_Id,&$Errorlist){
	if($Element_value==null||$Element_value=="")
		return;  
	if((int)$Element_value<0){
		$System_Message=$Screen_parameter." Please Enter Positive value";
	   	cus_or_sys_msg($Custom_Message,$Errorlist,$System_Message);
	}
}
 //*************************************END OF Check Negative*************************
 
 //$Custom_Message="Custom msg Out Time is invalid";
 $errorList=array();
//ChkTime("Text","1","Out Time","61:11:24","","10",$errorList );
$tm="61:11:24";
$var=convertTime($tm);
echo 'Time formated='.$var;
$para=-1;
ChkNegative("Text","1","NO OF Count",$para,"","10",$errorList );
?>

