<?php
  require_once("logger.php");

  Logger::$writeToScreen = false;
  Logger::$logFileName = "logfile.log";
    
  Logger::debug("This is a debug message");
  Logger::warning("This is a warning message");
  Logger::error("This is an error message");
  Logger::info("This is a info message");

?>