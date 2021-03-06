<?php

// to access this page, you need to be an administrator
require(__DIR__ . "/../inc/global.php");
require_admin();

// TODO need to implement a UI for running tests using phpunit
// require_once(__DIR__ . "/../vendor/lastcraft/simpletest/autorun.php");

set_time_limit(180);  // make it long, but not too long

class AllTests extends TestSuite {

  function __construct() {
    parent::__construct();

    $only = require_get("only", false);

    // we just load all PHP files within this directory
    if ($handle = opendir('.')) {
      while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && substr(strtolower($entry), -4) == ".php" && strtolower($entry) != 'index.php') {
          if ($only && $entry !== $only) {
            continue;
          }
          $this->addFile($entry);
        }
      }
      closedir($handle);
    }
  }

  function run($reporter) {

    $only = require_get("only", false);

    // we just load all PHP files within this directory
    if ($handle = opendir('.')) {
      echo "<ul style=\"padding: 10px; list-style: none;\">";
      echo "<li style=\"display: inline-block; margin-right: 5px;\"><a href=\"" . url_for('tests/') . "\"><b>All tests</b></a></li>\n";
      while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && substr(strtolower($entry), -4) == ".php" && strtolower($entry) != 'index.php') {
          echo "<li style=\"display: inline-block; margin-right: 5px;\"><a href=\"" . url_for('tests/', array('only' => $entry)) . "\">" . htmlspecialchars($entry) . "</a></li>\n";
        }
      }
      echo "</ul>";
      closedir($handle);
    }

    parent::run($reporter);

  }

}
