<?php
/**
 * Trivial HTTP PUT helper - for App Engine scale demo
 *
 * @author Tom Walder
 */

// Build Firebase URL
$str_endpoint = 'https://conf-demo-81c7e.firebaseio.com/instance-' . $_SERVER['INSTANCE_ID'] . '/request.json';

// Update Firebase with the instance info
file_get_contents($str_endpoint, false, stream_context_create(['http' => [
    'method' => 'PUT',
    'header' => 'Content-type: application/json',
    'content' => json_encode((object)[
        'tsp' => date('Y-m-d H:i:s'),
        'svr' => $_SERVER
    ])
]]));

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Scaling Demo - App Engine, Firebase</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css">
    <style>
        body,h1,h2,h3,h4,h5,h6,td,p,div,a,footer { font-family: 'Open Sans', sans-serif; font-weight: 300; }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Hello, IPC 2016!</h1>
            <p>Instance ID: <code><?php echo $_SERVER['INSTANCE_ID']; ?></code></p>
        </div>
        <div class="col-xs-12">
            <h2>Geo</h2>
            <p>HTTP_X_APPENGINE_CITY: <code><?php echo $_SERVER['HTTP_X_APPENGINE_CITY']; ?></code></p>
            <p>HTTP_X_APPENGINE_CITYLATLONG: <code><?php echo $_SERVER['HTTP_X_APPENGINE_CITYLATLONG']; ?></code></p>
            <p>HTTP_X_APPENGINE_COUNTRY: <code><?php echo $_SERVER['HTTP_X_APPENGINE_COUNTRY']; ?></code></p>
            <p>HTTP_X_APPENGINE_REGION: <code><?php echo $_SERVER['HTTP_X_APPENGINE_REGION']; ?></code></p>
        </div>
        <div class="col-xs-12">
            <p>CURRENT_VERSION_ID: <code><?php echo $_SERVER['CURRENT_VERSION_ID']; ?></code></p>

        </div>
    </div>
</div>
</body>