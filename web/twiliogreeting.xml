<?php


require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return 'Hello?  Is it me you\'re looking for?';
});

$app->run();


/*
<Response>
<Say voice="alice">
O M G.  D must have done it.
</Say>
<Pause length="1"/>
<Say voice="man">
Whose D?
</Say>
<Pause length="1"/>
<Say voice="alice">Deez nuts
</Say>
<Pause length="1"/>
	<Say voice="man">
	ha ha ha ha.  Very funny!
	</Say>
</Response>
*/

?>
