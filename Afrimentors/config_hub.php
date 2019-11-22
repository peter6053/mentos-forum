<?php   
 //config_hub.php  
 class Databases{  
      public $connect;  
      public $error;  
      public function __construct()  
      {  
           $this->connect = mysqli_connect("localhost", "root", "", "afrimentors");  
           if(!$this->connect)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->connect);  
           }  
      }  
      public function required_validation($field)  
      {  
           $count = 0;  
           foreach($field as $key => $value)  
           {  
                if(empty($value))  
                {  
                     $count++;  
                     $this->error .= "<p>" . $key . " is required</p>";  
                }  
           }  
           if($count == 0)  
           {  
                return true;  
           }  
      }  
      public function can_login($table_name, $where_condition)  
      {  
           $condition = '';  
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . " = '".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           /*This code will convert array to string like this-  
           input - array(  
                'id'     =>     '5'  
           )  
           output = id = '5'*/  
           $query = "SELECT * FROM hubs WHERE hub_email = :hub_email AND password = :password"; 
           $result = mysqli_query($this->connect, $query);  
           if(mysqli_num_rows($result))  
           {  
                return true;  
           }  
           else  
           {  
                $this->error = "Wrong Data";  
           }  
      }       
 }  
 ?> 