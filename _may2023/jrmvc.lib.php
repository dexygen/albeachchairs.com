<?php /* see: https://raw.githubusercontent.com/dexygen/jackrabbitmvc/master/jrmvc.lib.php */ ?>
<?php
  /*
   * jrMvc (JackRabbitMvc -- formerly barebonesmvc-php) 
   * is a one-file MVC micro-framework for PHP 5+ (supports 7)
   * 
   * Copyright (c) 2007-2023, George M. Jempty
   *
   * "Perfection is attained not when there is nothing left to add,
   *  but when there is nothing left to take away."
   * (Antoine de Saint-Exupéry)
   *
   * LICENSE: https://opensource.org/licenses/MIT
   *
   * USAGE:
   *
   <?php
     require('jrmvc.lib.php');                              // 1) require library                           

     class DemoMTO extends JrMvcMTO {                       // 1a) optionally extend MTO for non-template output, e.g. JSON
       function onNullTemplate() {
         echo json_encode($this->model);                    
         // Instead a binary such as an xls or pdf could be sent
       }
     }

     class DemoController extends AbstractJrMvcController { // 2) extend Controller  
        function applyInputToModel() {                      // 3) implement only required method
           // Sample demo.tpl.php content: <pre>$model: <?php print_r($model); ?></pre>
           $mto = new JrMvcMTO('demo.tpl.php');             // 4) instantiate
           // To output json instead use extended MTO above: $mto = new DemoMTO(JrMvcMTO::NULL_TPL);
           // Or in PHP 7 you can use an inner class instead of defining DemoMTO above this class:
           /*
           $mto = new class(JrMvcMTO::NULL_TPL) extends JrMvcMTO {
               function onNullTemplate() {
                   echo json_encode($this->model);
               }
           };
           *//*
                     
           $mto->setModelValue('Su', 'Sunday');             // 5) assignments              
           $mto->setModelValue('Mo', 'Monday');
           $mto->setModelValue('Tu', 'Tuesday');
           $mto->setModelValue('We', 'Wednesday');
           $mto->setModelValues(['Th'=>'Thursday', 'Fr'=>'Friday', 'Sa'=>'Saturday']);

           return $mto;                                     // 6) return MTO
        }
      }

     DemoController::sendResponse(new DemoController());    // 7) send response
   *
   * OUTPUT:
   *
     $model: Array
      (
      [Su] => Sunday
      [Mo] => Monday
      [Tu] => Tuesday
      [We] => Wednesday
      [Th] => Thursday
      [Fr] => Friday
      [Sa] => Saturday
      )
   */ 

  interface IJrMvcController {
    function setMto(IModelXfer $mto);
    static function sendResponse(IJrMvcController $controller);
    function applyInputToModel();
  }
  
  abstract class AbstractJrMvcController implements IJrMvcController {
    protected $mto;
    
    function setMto(IModelXfer $mto) {
      $this->mto = $mto;
    }
    
    static function sendResponse(IJrMvcController $controller) {
      $controller->setMto($controller->applyInputToModel());
      $controller->mto->applyModelToView();
    }
  }
  
  interface IModelXfer {
    function setView($view);
    function setModel($model);
    function setModelValue($key, $value);
    function applyModelToView();
  }

  abstract class AbstractMTO implements IModelXfer {
    protected $view;
    protected $model;
    const NULL_TPL = null;
    
    function setView($view) {
      $this->view = $view;    
    }
    
    function setModel($model) {
      $this->model = $model;
    }
    
    function setModelValue($key, $value) {
      $this->model[$key] = $value;
    }
    
    function setModelValues($arr) {
      foreach ($arr as $key => $value) {
        $this->model[$key] = $value;
      }
    }
    
    protected function unsetNonSessionGlobals() {
      if (array_key_exists('_SESSION', $GLOBALS)) {
        $session = $GLOBALS['_SESSION'];
      }
      unset($GLOBALS);
      if (isset($session)) {
        $GLOBALS['_SESSION'] = $session;  
      }    
    }
    
    protected function onNullTemplate() {}
  }
  
  class JrMvcMto extends AbstractMTO {    
    function __construct($view) {
      $this->setView($view);
    }
    
    function applyModelToView() {
      # Ensures view does not have access to get/post variables, thus encouraging
      # all access to them to occur within controller's applyInputToModel method
      $this->unsetNonSessionGlobals();
      
      if (empty($this->view)) {
        $this->onNullTemplate();
      }
      else {
        $model = $this->model;
        include($this->view); 
      }
    }    
  }
