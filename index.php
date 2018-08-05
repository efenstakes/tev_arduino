<?php 
   /*
     @author efen
     @first-writing 07/11/2017 d/m/y
     @doc the application entry page
     @todo define routes and handle them 
   */
    session_start();
    
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS'); 
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

    require_once("./vendor/autoload.php");
    use Slim\Http\Request;
    use Slim\Http\Response;
    use Slim\Http\UploadedFile;



    $app = new Slim\App;

    $container = $app->getContainer();

    // add view to the container
    // using slim template lang
    $container['view'] = function($cont){
        $template_dir = __DIR__ . "/my_app/views/";
        $cache = false;
        
        return new Slim\Views\Twig($template_dir, compact('cache')); 
    };



    $app->get('/about[/]', function($request, $response, $args){
       return $this->view->render($response, "about.twig", []);
    });

    $app->get('/api[/]', function($request, $response, $args){
       return $this->view->render($response, "api.twig", []);
    });

    // start handling routes
    include_once("./my_app/routes/log_routes.php");



    // @venues specific routes
    // @todo
    
    
    function has_session(){
       return (!empty($_SESSION['app_session']) && !empty($_SESSION['app_session']['user_id']));
    }

    function get_session(){
        return $_SESSION;
    }
    

    function delete_session(){
        unset($_SESSION['app_session']);
    }



    // run the app
    $app->run();

?>