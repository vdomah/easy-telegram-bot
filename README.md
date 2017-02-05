# easy-telegram-bot
This is a plugin for OctoberCMS which allows to make bots for Telegram
##Setup and using.
###About: 
###The plugin uses [irazasyed/telegram-bot-sdk](https://github.com/irazasyed/telegram-bot-sdk)
Documentation for all methods which you can use in steps is  [there](https://telegram-bot-sdk.readme.io/docs)
###Variables and functions in steps:
Variable  | Using for
------------- | -------------
$user_id  | ID of Telegram user
$user_name  | Name of Telegram user
$user_message  | Message of Telegram user
$chat_id  | Chat ID where message from
$next_dialog  | Jump to another dialog
$next_step  | Jump to another step in current dialog (if you want to jump to exact step in exact dialog, use both variables)
$user  | Object of User model class
$telegram  | Object of Telegram\Bot\Api class

Function  | Using for
------------- | -------------
set_variable($variable_name, $variable_value, $user)  | You can set custom variable for user
get_variable($variable_name, $user)  | You can get variable that you have set
delete_variable($variable_name, $user)  | You can delete variable that you have set
####Tutorial: 
####Create a new bot via BotFater. 
There are a lot of tutorials on how to do it.
####Set a webHook.
To set webHook just go to this address:
~~~~
https://api.telegram.org/bot123456789:ABCDIFGHIGKLMNOpqrstuvwxyz/setWebhook?url=https://example.com/eugenetolok/bot/
~~~~
Where 
1. "123456789:ABCDIFGHIGKLMNOpqrstuvwxyz" is example token, so replace it with your own token.
2. https://example.com/eugenetolok/bot/ - example bot url. If you didn't change routes.php, just replace domain. 

*Note:* you need ssl enabled on your site to use webhooks in this plugin! 
####Add API key to settings
Go to the settings and type in the field API key your token. There you can also write the "welcome message" which user will see only once after /start.
####Make your first three steps:
1. Press on step and then press button "Create"
2. Name this step. I recommend to name it like: "Home: Send main keyboard". Where "Home" is dialog name.
3. Insert php code:
~~~~
$share_location_button['text'] = 'Share location';
$share_location_button['request_location'] = true;
$share_location_keyboard = [
    [(object)$share_location_button]
];
$share_location_markup = $telegram->replyKeyboardMarkup([
    'keyboard' => $share_location_keyboard, 
    'resize_keyboard' => true, 
    'one_time_keyboard' => true
]);
$telegram->sendMessage([
'chat_id' => $chat_id, 
'text' => "Share your location to find a distance between cities",
'reply_markup' => $share_location_markup
]);
~~~~
4. Save and close
Do the same with two other steps, but insert other php codes:
~~~~
if (null !== $telegram->getWebhookUpdates()->getMessage()->getLocation()->getLatitude() && null !== $telegram->getWebhookUpdates()->getMessage()->getLocation()->getLongitude())
{
    set_variable("latitude",$telegram->getWebhookUpdates()->getMessage()->getLocation()->getLatitude(),$user);
    set_variable("longitude",$telegram->getWebhookUpdates()->getMessage()->getLocation()->getLongitude(),$user);
    
    $category_keyboard = [
    	    ['Moscow'],
    	    ['Los Angeles']
    	];
    
    $category_reply_markup = $telegram->replyKeyboardMarkup([
    	    'keyboard' => $category_keyboard, 
    	    'resize_keyboard' => true, 
    	    'one_time_keyboard' => true
    ]);
    
    $telegram->sendMessage([
        'chat_id' => $chat_id, 
        'text' => "Ok, choose a place!",
        'reply_markup' => $category_reply_markup
    ]);
}
else
{
    $share_location_button['text'] = 'Share location';
    $share_location_button['request_location'] = true;
    
	$share_location_keyboard = [
	    [(object)$share_location_button]
	];

	$share_location_markup = $telegram->replyKeyboardMarkup([
	    'keyboard' => $share_location_keyboard, 
	    'resize_keyboard' => true, 
	    'one_time_keyboard' => true
	]);
	
    $telegram->sendMessage([
        'chat_id' => $chat_id, 
        'text' => "Didn't understand location... Try again!",
        'reply_markup' => $share_location_markup
    ]);
    $next_step = 2;
}
~~~~
And:
~~~~
if($user_message == "Moscow")
{
    $distance = distance((float)get_variable("latitude", $user), (float)get_variable("longitude", $user), (float)"55.7558", (float)"37.6173");
    $telegram->sendMessage([
    'chat_id' => $chat_id, 
    'text' => "You are " . $distance . " m from Moscow"
	]);
}
else
{
    $distance = distance((float)get_variable("latitude", $user), (float)get_variable("longitude", $user), (float)"34.0522", (float)"118.2437");
    $telegram->sendMessage([
    'chat_id' => $chat_id, 
    'text' => "You are " . $distance . " KM from Los Angeles"
	]);
}
function distance($lat1, $lon1, $lat2, $lon2) {
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  return ($miles * 1.609344);
}
delete_variable("latitude", $user);
delete_variable("longitude", $user);
~~~~

####Create your first dialog
Name it and then add steps in order from this tutorial.
####Set default Dialog ID and Step ID (in our case it is 1 and 1).
We are finished! Our bot calculating the distance between you and Moscow or Los Angeles. As you can see you can do whatever you want with Easy Telegram Bot and October CMS and php libraries!
