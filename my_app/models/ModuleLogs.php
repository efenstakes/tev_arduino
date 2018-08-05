<?php
  require_once("DbManager.php");
  require_once("ModuleLog.php");

  class ModuleLogs{
    private $db_handle = null;

    public function __construct(){
      $db_manager = new DbManager();
      $this->db_handle = $db_manager->getHandle(); 
    }

    /*
      get events by no criteria
      return event objects in an array
    */
    public function getAll($offset=0, $limit = 25){
      $logs = array();

      try{
         $this->db_handle->beginTransaction();

         $query = "select * from module_logs limit $limit offset $offset";
         $stmt = $this->db_handle->prepare($query);
         $stmt->execute(); 
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

         $logs = array_map(function($log_data){
                      return ModuleLog::make($log_data)->getProperties();
                   }, $result);


         $this->db_handle->commit();
      }catch(PDOException $e){  }

     return $logs;
    }


    //set db_obj to null
    public function __destruct(){
      $this->db_handler = null;
    }

  }//end of class


?>
