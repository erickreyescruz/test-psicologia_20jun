<!DOCTYPE html>
<html ng-app="App">
  <head>
    <meta charset="utf-8">
    <title>Test</title>
    <link rel="stylesheet" href="js/core/node_modules/angular-material/angular-material.css" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="js/core/node_modules/angular-material-data-table/dist/md-data-table.min.css">
    <link rel="stylesheet" href="js/core/node_modules/angular-material-icons/angular-material-icons.css" charset="utf-8">
    <link rel="stylesheet" href="css/styles.css" charset="utf-8">
  </head>
  <body ng-controller="headerCtrl">
    <?php
    session_start();
    ?>
    <div ui-view="header"></div>
    <div ui-view="content"></div>
    <script type="text/javascript" src="js/core/node_modules/angular/angular.min.js"></script>
    <script type="text/javascript" src="js/core/node_modules/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script type="text/javascript" src="js/core/node_modules/angular-aria/angular-aria.min.js"></script>
    <script type="text/javascript" src="js/core/node_modules/angular-animate/angular-animate.min.js"></script>
    <script type="text/javascript" src="js/core/node_modules/angular-material/angular-material.min.js"></script>
    <script type="text/javascript" src="js/core/node_modules/angular-material-icons/angular-material-icons.min.js"></script>
    <script type="text/javascript" src="js/core/node_modules/angular-material-data-table/dist/md-data-table.min.js"></script>
    <script type="text/javascript" src="js/home/myApp.js"></script>
    <script type="text/javascript" src="js/home/header.js"></script>
    <script type="text/javascript" src="js/home/home.js"></script>
    <script type="text/javascript" src="js/home/admin.js"></script>
    <script type="text/javascript" src="js/home/supervisor.js"></script>
    <script type="text/javascript" src="js/home/test.js"></script>
    <script type="text/javascript" src="js/home/user.js"></script>
  </body>
</html>
