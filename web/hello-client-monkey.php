<?php
include '/twilio-php-master/Services/Twilio/Capability.php';
 
// put your Twilio API credentials here
$accountSid = 'ACf4566188e7d366fab5ada7abad226113';
$authToken  = '716eb03bb6e8b4ed2d5a4a08222a932f';
 
$capability = new Services_Twilio_Capability($accountSid, $authToken);
$capability->allowClientOutgoing('APf62a9b9efd940f4741a46b706a36d6b4');
$capability->allowClientIncoming('jenny');
$token = $capability->generateToken();
?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Hello Client Monkey 1</title>
    <script type="text/javascript"
      src="//static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>
    <script type="text/javascript"
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>
    <link href="http://static0.twilio.com/packages/quickstart/client.css"
      type="text/css" rel="stylesheet" />
    <script type="text/javascript">
 
      Twilio.Device.setup("<?php echo $token; ?>");
 
      Twilio.Device.ready(function (device) {
        $("#log").text("Ready");
      });
 
      Twilio.Device.error(function (error) {
        $("#log").text("Error: " + error.message);
      });
 
      Twilio.Device.connect(function (conn) {
        $("#log").text("Successfully established call");
      });
 
      Twilio.Device.disconnect(function (conn) {
        $("#log").text("Call ended");
      });
	  
      function call() {
          // get the phone number to connect the call to
          params = {"PhoneNumber": $("#number").val()};
          Twilio.Device.connect(params);
      }
	  
      function hangup() {
        Twilio.Device.disconnectAll();
      }
	  
    </script>
  </head>
  <body>
    <button class="call" onclick="call();">
      Call
    </button>
 
 <button class="hangup" onclick="hangup();">
   Hangup
 </button>
 
 <input type="text" id="number" name="number"
   placeholder="Enter a phone number to call"/>
   
    <div id="log">Loading pigeons...</div>
  </body>
</html>