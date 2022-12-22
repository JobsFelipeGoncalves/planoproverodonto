<?php

if(!defined('BASE_DEV')){
  define('BASE_DEV','');
}

if(!defined('BASE')){
   // define('BASE','http://localhost/proverodonto/');
   define('BASE','http://www.proverodonto.com.br/novo/');
}

if(!defined('BASE_IMG')){
  define('BASE_IMG', BASE.'require/img/');
}

if(!defined('BASE_VIDEO')){
  define('BASE_VIDEO', BASE.'require/videos/');
}

if(!defined('BASE_CSS')){
  define('BASE_CSS', BASE.'require/css/');
}

if(!defined('BASE_JS')){
  define('BASE_JS', BASE.'require/js/');
}

if(!defined('PROJECT_DIR'))
  // define('PROJECT_DIR', 'proverodonto');
  define('PROJECT_DIR', 'novo');

if(!defined('APPLICATION_DIR'))
  define('APPLICATION_DIR', 'app');

if(!defined('REQUEST_URI'))
  define('REQUEST_URI',str_replace('/'.PROJECT_DIR,'',$_SERVER['REQUEST_URI']));

function url_response($urlpatterns) {
  foreach ($urlpatterns as $pcre => $app) {
    if(preg_match("@^{$pcre}$@", REQUEST_URI, $_GET)) {
      include(APPLICATION_DIR.'/'.$app);
      exit();
    } else {
      $erro = true;
    }
  }
  if(isset($erro) && $erro == true){
    include("app/404.php");
  }
  return;
}

?>
