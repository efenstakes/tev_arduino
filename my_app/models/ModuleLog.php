<?php
  
  include_once("DbManager.php");
  
  /*
    contain data that has to do with a user.. 
    acts as the superclass for user-related classes
  */
  class ModuleLog{
    private $id = NULL;
    private $time = NULL, $temparature = NULL, $humidity = NULL;
    private $otherstates =array('led1'=> NULL, 'led2'=> NULL,'led3'=> NULL, 'led4'=> NULL,'frontdoor'=> NULL, 'garagedoor'=> NULL,'fan'=> NULL);
    private $db_handle = NULL;


    // set the default values for the object variables
    public function __construct(){
        $db_manager = new DbManager();
        $this->db_handle = $db_manager->getHandle();
    }  

    // 
    public function __toString(){
       return "log id :". $this->getID() ." , temparature :". $this->getTemparature() ." , humidity ". $this->getHumidity();
    } 
      
      
    /**
        setter methods
    **/

    // update the object's about me property
    public function setID($id){
      	$this->id = $id;
      	return $this;
    }

    // update the object's about me property
    public function setTemparature($temp){
        $this->temparature = $temp;
        return $this;
    }

    // update the object's about me property
    public function setHumidity($hum){
        $this->humidity = $hum;
        return $this;
    }
    
    // update the object's about me property
    public function setTime($time){
        $this->time = $time;
        return $this;
    }
    public function setOtherStates($state){
        $this->otherstates = $state;
        return $this;
    }

    /** 
        the getter methods
    **/


    // get the object's about me property
    public function getID(){
      	return $this->id;
    }

    // get the object's about me property
    public function getTemparature(){
        return $this->temparature;
    }
    
    // get the object's about me property
    public function getHumidity(){
        return $this->humidity;
    }

    // get the object's about me property
    public function getTime(){
        return $this->time;
    }
    public function getOtherStates(){
        return $this->otherstates;
    }


    // add an event to the database
    public function save(){
      try{
         $this->db_handle->beginTransaction();

         //insert basic event details
         $query = "insert into module_logs (temperature, led1, led2, led3, led4, frontdoor, garagedoor, fan, humidity, added_at) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

         $stmt = $this->db_handle->prepare($query);

         $db_data = array($this->getTemparature(), $this->getOtherStates()['led1'], $this->getOtherStates()['led2'], $this->getOtherStates()['led3'], $this->getOtherStates()['led4'], $this->getOtherStates()['frontdoor'], $this->getOtherStates()['garagedoor'], $this->getOtherStates()['fan'], $this->getHumidity(), $this->getTime());
         
         // actual save
         $stmt->execute($db_data);
         
         // get the saved id
         $event_id = $this->db_handle->lastInsertId();


          $this->db_handle->commit();
        }catch(PDOException $e){
           echo($e->getMessage());
           $this->db_handle->rollBack();
        }

        return $this;
    }



    // check if this user exists by id
    public function exists(){
      $exists = false;
        $query = "select * from module_logs where id = ?";


        $stmt = $this->db_handle->prepare($query);
        $stmt->execute(array($this->getID()));

        if($stmt->rowCount()>0){
           $exists = true;
        }

        return $exists;
    }


    // get event properties
    public function getProperties(){
       $properties = array();

       $properties['id'] = $this->getID();
       $properties['temparature'] = $this->getTemparature();
       $properties['humidity'] = $this->getHumidity();
       $properties['time'] = $this->getTime();
       $properties['otherstates'] = $this->getOtherStates();
       
       return $properties;
    }


    // set user data from db
    public function setProperties(){
      $module_log = new ModuleLog();
      $combined_properties = array();

      try{

        //get primary event details like name etc
        $primary_query = "select * from module_info where id = ?";
        $primary_stmt = $this->db_handle->prepare($primary_query);
        $primary_stmt->execute(array($this->getID()));
        $combined_properties = $primary_stmt->fetch(PDO::FETCH_ASSOC);
  
        $module_log = ModuleLog::make($combined_properties);

        }catch(PDOException $e){
          echo($e->getMessage());
        }

        return $module_log;
      }


      // creates an event instance given the events properties
      public static function make($combined_properties){
        $module_log = new ModuleLog();

        $log_properties = $combined_properties;

         $module_log->setID($log_properties['id'])
              ->setTemparature($log_properties['temperature'])
              ->setHumidity($log_properties['humidity'])
              ->setTime($log_properties['added_at'])
              ->setOtherStates(array(
                  'led1'=> $log_properties['led1'], 'led2'=> $log_properties['led2'], 'led3'=> $log_properties['led3'], 
                  'led4'=> $log_properties['led4'],'frontdoor'=> $log_properties['frontdoor'], 'garagedoor'=> $log_properties['garagedoor'],
                  'fan'=> $log_properties['fan']));
              
         return $module_log;
    }


    
    // delete a user given their name
    public function delete(){
       $query = "delete from module_logs where id = ?";
       $stmt = $this->db_handle->prepare($query);
       $stmt->execute(array($this->getID()));
    }
    
 



      

    // free resources that this object is using
    public function __destruct(){ }


  }// end of class


?>