
<?php   
 //database.php  
 class Databases{  
      public $con;  
      public $error;  
      public function __construct()  
      {  
           $this->con = mysqli_connect("localhost", "root", "", "beauty_parlour");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      } 
        public function insert($table_name, $data)  
        {  
           $string = "INSERT INTO ".$table_name." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')"; 
           if(mysqli_query($this->con, $string))  
           {  
            return true;  
           }  
           else  
           {  
            echo mysqli_error($this->con);  
           }    
        }




       







      public function editData($table_name,$condition_arr,$where_field,$where_value)
      {
        
        if($condition_arr!='') 
        {
          $sql="UPDATE $table_name SET";
          $c = count($condition_arr);
          $i=1;
          foreach ($condition_arr as $key => $val) 
          {
            if($i == $c)
            {
              $sql.="$key='$val'";
            }
            else
            {
              $sql.="$key='$val' and"; 
            }
            $i++; 
          }
          $sql.="where $where_field='$where_value'";
          $result=mysqli_query($this->con, $sql);
        }
      }
      //Update 
      public function updateData($table_name,$condition_arr,$id,$where_value)
      {
       if($condition_arr!='')
       {
          $sql = "UPDATE $table_name set ";
          $c = count($condition_arr);
          $i=1;
          foreach ($condition_arr as $key => $val) 
          {
            if($i == $c)
            {
              $sql.="$key = '$val'";
            }
            else
            {
              $sql.="$key = '$val' , "; 
            }
            $i++; 
          }
          $sql.= " where $id = '$where_value' ";
          mysqli_query($this->con, $sql);
       }
      }
      public function deleteData($table_name, $condition_arr)
      {
       if($condition_arr!='')
       {
          $sql = "DELETE FROM $table_name where ";
          $c = count($condition_arr);
          $i=1;
          foreach ($condition_arr as $key => $val) 
          {
            if($i == $c)
            {
              $sql.="$key='$val'";
            }
            else
            {
              $sql.="$key='$val' and"; 
            }
            $i++; 
          }
        $result=mysqli_query($this->con, $sql);
       }
      }
      public function getData($table_name,$field,$condition_arr='',$order_by_field='',$order_by_type='desc',$limit='')
  {
      $sql = "SELECT $field FROM $table_name";
      if($condition_arr!='')
      { 
        $sql.= " where ";
        $c = count($condition_arr);
        $i=1;
        foreach($condition_arr as $key => $val) 
        {
          if($i==$c)
          {
            $sql.="$key='$val'";
          }
          else
          {
            $sql.="$key='$val' and ";
          }
          $i++;
        }
      }
      if($order_by_field!='')
      {
        $sql.="order by $order_by_field $order_by_type";
      }
      // Rersult
      $result = mysqli_query($this->con, $sql);
      
      if($result->num_rows>0)
      {
        $arr = array();
        while ($row = $result->fetch_assoc()) 
        {
          $arr[] = $row;
        }
        return $arr;
      }
      else{
        return 0;
      }   
  }
      public function get_safe_str($str)
      {
        if($str!='')
        {
          return (mysqli_real_escape_string($this->con,$str));
        }
      }
 }  
 ?>