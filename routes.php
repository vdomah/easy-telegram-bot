<?php
use Telegram\Bot\Api;
use EugeneTolok\Telegram\Models\User;
use EugeneTolok\Telegram\Models\Dialog;
use EugeneTolok\Telegram\Models\Step;
use EugeneTolok\Telegram\Models\Settings;

Route::post('eugenetolok/bot', function () {
	$API_KEY = Settings::get('tg_api_key');
	$telegram = new Api($API_KEY);
	$user_id 		= $telegram->getWebhookUpdates()->getMessage()->getFrom()->getId();
	$user_name 		= $telegram->getWebhookUpdates()->getMessage()->getFrom()->getFirstName();
	$chat_id 		= $telegram->getWebhookUpdates()->getMessage()->getChat()->getId();
	$user_message 	= $telegram->getWebhookUpdates()->getMessage()->getText();
	$user;
	function set_variable($variable_name, $variable_value, $user){
		$decoded_json;
		try{
			$decoded_json = json_decode($user->varibles, true);
			$decoded_json[$variable_name] = $variable_value;
			$user->variables = json_encode($decoded_json);
		}
		catch( Exception $ErrorHandle ){
			$decoded_json = array($variable_name => $variable_value);
			$user->variables = json_encode($decoded_json);
		}
	}
	function get_variable($variable_name, $user){
		$decoded_json;
		try{
			$decoded_json = json_decode($user->variables, true);
			$t_r = $decoded_json[$variable_name];
			return $t_r;
		}
		catch( Exception $ErrorHandle ){
			return "The variable is not set...";
		}
	}
	function delete_variable($variable_name, $user){
		$decoded_json;
		try{
			$decoded_json = json_decode($user->variables, true);
			unset($decoded_json[$variable_name]);
			$user->variables = json_encode($decoded_json);
		}
		catch( Exception $ErrorHandle ){
			return "The variable is not set...";
		}
	}
	try{
		$user = User::findOrFail($chat_id);
	}
	catch(Illuminate\Database\Eloquent\ModelNotFoundException $e)
	{
		$user = new User;
		$user->id = $user_id;
		$user->first_name = $user_name;
		$user->dialog_id 	= 1;
		$user->step_count 	= 1;
		$user->save();
		$telegram->sendMessage([
			  'chat_id' => $chat_id, 
			  'text' => Settings::get('welcome_text')
			]);
	}
	try{
		$dialog 		= Dialog::findOrFail($user->dialog_id);
		$steps_order = array_combine(range(1, count($dialog->steps_order)), array_values($dialog->steps_order));
		$step 			= Step::findOrFail($steps_order[$user->step_count]['step']);
		$next_dialog 		= "";
		$next_step			= "";
		eval($step->code);
		if ($next_dialog == "" && count($dialog->steps_order) == $user->step_count && $next_step == "")
		{
			$user->dialog_id 	= Settings::get('dialog_id');
			$user->step_count 	= Settings::get('step_id');
			$user->save();
		}
		else if($next_dialog != "" && $next_step == "")
		{
			$user->dialog_id  = $next_dialog;
			$user->step_count = Settings::get('step_id');
			$user->save();
		}
		else if($next_dialog != "" && $next_step != "")
		{
			$user->dialog_id  = $next_dialog;
			$user->step_count = $next_step;
			$user->save();
		}
		else if ($next_step != "")
		{
			$user->step_count = $next_step;
			$user->save();
		}
		else if ($next_step == "")
		{
			$user->step_count = $user->step_count + 1;
			$user->save();
		}

	}
	catch(Illuminate\Database\Eloquent\ModelNotFoundException $e){
		eval(Step::find(Settings::get('step_id'))->code);
	}
	return ("it's ok");
});
