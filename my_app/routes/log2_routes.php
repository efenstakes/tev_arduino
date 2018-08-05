<?php
  
   include_once 'logs.php';


   $app->get('/logs/ui[/]', function($request, $response, $args){
    
       $all_logs = logs();

       return $this->view->render($response, "logs.twig", ['logs'=> $all_logs]);
   });

   $app->get('/logs[/]', function($request, $response, $args){
    
       $all_logs = logs();

       return json_encode($all_logs);

   });





?>