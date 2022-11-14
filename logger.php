<?php

class Logger
{

  /**
   * Simple logger class    
   * 
   * Logs can be added with the following:
   * Logger::debug($logEntry)
   * Logger::warning($logEntry)
   * Logger::info($logEntry)
   * Logger::error($logEntry)
   * 
  */
  
  public static $writeToFile = true;
  public static $writeToScreen = true;
  public static $logFileName ="app.log";


  //Logs the message to file or screen as needed
  private static function log($logEntry, $logType)
  {
      //Preparing the log entry in the appropriate format
      $logEntry = self::formatLogEntry($logEntry, $logType);

      //Writing each log to file or screen depending on setting
      if(self::$writeToFile) file_put_contents(self::$logFileName, $logEntry, FILE_APPEND);
      if(self::$writeToScreen) file_put_contents("php://output", $logEntry, FILE_APPEND);

  }

  // To log diagnostic message
  public static function debug($logEntry)
  {
    self::log($logEntry, "DEBUG");
  }

  // To log why something might go wrong
  public static function warning($logEntry)
  {
    self::log($logEntry, "WARNING");
  }

  // To log an information message
  public static function info($logEntry)
  {
    self::log($logEntry, "INFO");
  }

  // To log why program crashed
  public static function error($logEntry)
  {
    self::log($logEntry, "ERROR");
  }

  //Takes the user log message and formats appropriately.
  private static function formatLogEntry($logEntry, $logType)
  {
    $curTime = date("h:i:sa");
    $curIP = $_SERVER["REMOTE_ADDR"];
  
    $logEntry = $curIP . " " . $curTime . " [$logType] " . $logEntry . PHP_EOL;
    
    return $logEntry;
  }

  //Clears all logs
  public static function clearLogs()
  {
    self::$logEntries = [];
  }
}