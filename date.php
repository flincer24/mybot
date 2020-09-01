<?php 
$token = '1323827765:AAHT2kyp9AKP6Alt9urlfavy65xmH_H4Gms';
// read incoming info and grab the chatID 
$json = file_get_contents('php://input');
$telegram = urldecode ($json);
$telegram = str_replace ('jason=','',$telegram); //Just for Teletter.net
$results = json_decode($telegram); 


$message = $results->message;
$text = $message->text;
$chat = $message->chat;
$user_id = $chat->id;

function tgmsg ($txt,$token,$user_id){
	 $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$user_id.'&text='.$txt;
     file_get_contents($url);
}

switch ($text) {
	case '/start':
	$txt = 'سلام کاربر گرامی' ;
	tgmsg ($txt,$token,$user_id);
	$txt = '/start' ;
	tgmsg ($txt,$token,$user_id);
	$txt = '/date' ;
	tgmsg ($txt,$token,$user_id);
	$txt = 'سلام' ;
	tgmsg ($txt,$token,$user_id);
	$txt = '/id' ;
	tgmsg ($txt,$token,$user_id);
	$txt = '/second' ;
	tgmsg ($txt,$token,$user_id);
	break;
	case '/date':
	date_default_timezone_set("Iran"); 
	$txt = "امروز" ;
	tgmsg ($txt,$token,$user_id);
	$txt = 'ساعت'.'='.'      '. date("h:i:sa"); 
	tgmsg ($txt,$token,$user_id);
	$txt = 'یا به عبارتی'.'='.'      '. date("H:i:s"); 
	tgmsg ($txt,$token,$user_id);
	$txt = "تاریخ" .'='.'      '. date("Y-m-d") ;
	tgmsg ($txt,$token,$user_id);
	$txt = "روز هفته" .'='.'      '. date("l") ;
	tgmsg ($txt,$token,$user_id);
	break;
	case 'سلام':
	$txt = 'سلام علیکم' ;
	tgmsg ($txt,$token,$user_id);
	break;
	case '/id':
	$txt = $user_id ;
	tgmsg ($txt,$token,$user_id);
	break;
	case '/second':
	$txt = date("s");
	tgmsg ($txt,$token,$user_id);
	break;
	default:
	$txt = '?'.$text.'یعنی مخای بگی';
	tgmsg ($txt,$token,$user_id);
	}












// if ($text == 'salam') {
	// $message = 'سلام';
// } else if ($text == 'چطوری') {
	// $message = 'خوبم';
// } else {
	// $message = 'نمیدونم';
// }

// // send reply
// $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$user_id.'&text='.$message.'&reply_to_message_id=224';
// file_get_contents($url);






// websima_sendmessage ($user_id,$message,$token);
// //Send Text Message 
// function websima_sendmessage ($user_id,$message,$token) {
	// $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$user_id.'&text='.$message;
	// $update = file_get_contents($url);
// }



?>
