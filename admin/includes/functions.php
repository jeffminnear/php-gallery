<?php

  function classAutoLoad($class) {
    $class = strtolower($class);

    $path = "/includes/{$class}.php";

    if (is_file($path) && !class_exists($class)) {
      include $path;
    }
  }

  spl_autoload_register("classAutoLoad");

  function set_object_vars($object, $vars) {
    $props = get_object_vars($object);
    foreach ($props as $key => $value) {
      $object->$key = isset($vars[$key]) ? $vars[$key] : NULL;
    }
  }

  function redirect($location) {
    header("Location: {$location}");
  }

  function show_success($msg) {
    echo "<h4 class=\"alert alert-success\">$msg</h4>";
  }

  function show_error($msg) {
    echo "<h4 class=\"alert alert-danger\">$msg</h4>";
  }

  function show_warning($msg) {
    echo "<h4 class=\"alert alert-warning\">$msg</h4>";
  }

  function show_info($msg) {
    echo "<h4 class=\"alert alert-info\">$msg</h4>";
  }

?>
