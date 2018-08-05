<?php
   
   $app->get('/logs/ui[/]', function($request, $response, $args){
       $module_logs = new ModuleLogs(); 

       $all_logs = $module_logs->getAll();

       return $this->view->render($response, "logs.twig", ['logs'=> $all_logs]);
   });


   $app->get('/log/:id[/]', function($request, $response, $args){
       $module_log = new ModuleLog(); 
       
       $log_id = $args['id'];
    
       $log_details = $module_log->setID($log_id)->setProperties()->getProperties();

       return json_encode($log_details);

   });

   $app->map(['GET', 'POST'], '/log/add[/]', function($request, $response){
       $new_log = new ModuleLog();
       $return = array('added'=> false);
       
       $states = array();

       $temp = $request->getParam('temparature');
       $humidity = $request->getParam('humidity');
       $states['led1'] = $request->getParam('led1');
       $states['led2'] = $request->getParam('led2');
       $states['led3'] = $request->getParam('led3');
       $states['led4'] = $request->getParam('led4');
       $states['frontdoor'] = $request->getParam('frontdoor');
       $states['garagedoor'] = $request->getParam('garagedoor');
       $states['fan'] = $request->getParam('fan');
       
       
       $new_log->setTemparature($temp)
               ->setHumidity($humidity)
               ->setOtherStates($states)
               ->setTime( (new DateTime())->format('Y-m-d h:i:s') )
               ->save();
       
      $return['added'] = true;

       return json_encode($return);

   });

  

   $app->get('/logs[/]', function($request, $response, $args){
       $module_logs = new ModuleLogs(); 

       $all_logs = $module_logs->getAll();

       return json_encode($all_logs);

   });



?>