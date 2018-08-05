<?php
  
  /*
    @doc
    facilitate database connection
  */
   class DbManager{
        private $db_name = "outsideb_tevarduino", $host = "localhost";
        private $password="IH4C@6_By.Y4", $user_name="outsideb_arduino";
        private $db_handle = null;

        public function __construct(
        	 $defaults=array('db_name'=> null, 'host'=>null, 'user_name'=>null, 'password'=>null)
        	){
           $this->db_name =  (empty($defaults['db_name']) ? $this->db_name : $defaults['db_name']);
           $this->host =  (empty($defaults['host']) ? $this->host : $defaults['host']);
           $this->password =  (empty($defaults['password']) ? $this->password : $defaults['password']);
           $this->user_name =  (empty($defaults['user_name']) ? $this->user_name : $defaults['user_name']);
        }

        // connect to db
        public function getHandle(){ 
           try{
               $han = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->user_name, $this->password);
               $han->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $this->db_handle = $han;
           }catch(PDOException $ex){ }

           if($this->db_handle == NULL){
              #echo("not connected <br>");
           }else{
              #echo("connected <br>");
           }


           return $this->db_handle;
        } 

        public function __destruct(){
        	$this->db_handle = null;
        }       


   }// end of class

?>