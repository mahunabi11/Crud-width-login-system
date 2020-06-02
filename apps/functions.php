
<?php
  
 function fileUpload($file, $location = '', $file_format =['jpg'], $file_type = null){
     
     $file_name = $file['name'];
     $file_name_tmp = $file['tmp_name'];
     
     
//     File Info
     
   $file_array =  explode('.', $file_name);
   $file_extension_name = strtolower(end($file_array));
     
 
     
//   File Name Type
     
  if(!isset($file_type['type'])){
      $file_type['type'] = 'image';
  }
     if(!isset($file_type['file_name'])){
      $file_type['file'] = '';
  }
     if(!isset($file_type['fname'])){
      $file_type['fname'] = '';
  }
     if(!isset($file_type['lname'])){
      $file_type['lname'] = '';
  } 
   
    
//     File name Genarate 
     
     if($file_type['type'] == 'image'){
           
         $file_name = md5(time(). rand(1, 10000)) . '.' . $file_extension_name;
     
     }elseif($file_type['type'] == 'file'){
         
         $file_name = date('d_m_Y_g_h_s_').$file_type['file_name']. '_' .  $file_type['fname'] . '_' . $file_type['lname']. '.' . $file_extension_name;
     }
     
     $mess = '';
     if(in_array($file_extension_name, $file_format)==false){
         
          $mess = '<p class="alert alert-danger">Invaild file formats !<button data-dismiss="alert" class="close">&times;</button></p>';
     }else{
         
          move_uploaded_file($file_name_tmp, $location . $file_name);
     
     }
     return [
         'mess' => $mess,
         'file_name' => $file_name
     ];
 }

  

// Data check
  function dataCheck($conn, $col_name, $data, $table){
      $sql="SELECT $col_name FROM $table WHERE $col_name = '$data'";
    $data =  $conn -> query($sql);
     $num = $data ->num_rows;
      
      if($num > 0){
        return false;
      }else{
          return true;
      }
  }

//Old form data stay

  function old($file_name){
      if(isset($file_name)){
          if(isset($_POST[$file_name])){
              echo $_POST[$file_name];
          }
      }
  }
//Flash Message
  function setMsg($msg){
      setcookie('msg', $msg, time() + 10);
  }


  function getMsg(){
      if(isset($_COOKIE['msg'])){
          echo "<p class='alert alert-success'>" . $_COOKIE['msg'] .  "<button class='close' data-dismiss='alert'>&times;</button></p>";
      }
      
  }









?>