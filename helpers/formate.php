<?php

class formate{
      public function formateDate($date){
           return date('F j, Y,g:i a', strtotime($date));
      }

      
      public function readmore ($text, $limit =400){
            $text= $text." ";
            $text=  substr($text, 0 , $limit);
            $text= $text."....";
            return $text;

      }
      
public function validation($data){
      $data= trim($data);
      $data= stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}
public function title(){
      $path= $_SERVER["SCRIPT_FILENAME"];
      $title= basename($path,".php");
      if ($title== "index") {
            $title="Home";
      }elseif($title=="contact"){
            $title= "contact";
      }
      return $title=ucwords($title);

}
}


?>