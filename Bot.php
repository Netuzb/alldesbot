<?php 

$API_KEY = '923129117:AAHyzavZncLCG-FbRzcRoBVy4VnmclexTs4';

define('API_KEY',$API_KEY);

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

 

 function sendaction($chat_id, $action){

 bot('sendchataction',[

 'chat_id'=>$chat_id,

 'action'=>$action

 ]);

 }

$update = json_decode(file_get_contents('php://input'));

$message = $update->message;

$from_id = $message->from->id;

$mid = $message->message_id;

$uid = $message->from->id;

$chat_id = $message->chat->id;

$cid = $message->chat->id;

$tx = $message->text;

$text = $message->text;

$keyin = file_get_contents("keyin/$user_id.txt");

$step = file_get_contents("test/$user_id.txt");

$yosh = file_get_contents("yosh/$user_id.txt");

$admin = "605778538";

$fayl=file_get_contents("step/$uid.txt");

mkdir("step");

mkdir("ism");

mkdir("ism2");

mkdir("elon");

mkdir("manzil");

mkdir("raqam");

mkdir("elon2");

mkdir("manzil2");

mkdir("raqam2");

mkdir("budjet");

if($text=="/on" and $cid=="605778538"){

file_put_contents("aktivlik.txt","yoqilgan");

bot('SendMessage',[

'chat_id'=>$cid,

'text'=>"Yoqildi✅",

]);

}

if($text=="/off" and $cid=="605778538"){

file_put_contents("aktivlik.txt","ochirilgan");

bot('SendMessage',[

'chat_id'=>$cid,

'text'=>"O'chirildi❌",

]);

}

$aktiv=file_get_contents("aktivlik.txt");

if($aktiv=="yoqilgan"){

if($tx=="/start"){

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"*Salom! hurmatli bot foydalanuvchisi.* 

Botimiz orqali siz buyurtma berishingiz yoki buyurtma qabul qilishingiz mumkin. 

*E'lon turini tanlang *👇

Buyurtma /olish

Buyurtma /berish",

'parse_mode'=>"markdown"

]);

}

if($tx=="/olish"){

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Tushunarli, buyurtma berishni boshlasak ham bo'ladi... /boshlash'ni bosib davom ettiramiz",

]);

}

if($tx=="/berish"){

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Tushunarli, buyurtma olishni boshlasak ham bo'ladi... /boshIash'ni bosib davom ettiramiz",

]);

}

if($tx=="/xato"){

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"😳 Ehhe, shuncha ma'lumot kuydi, qaytadan ro'yxatdan o'ting endi... ",

]);

}

if($tx=="/boshlash" or $tx=="/xato"){

file_put_contents("step/$uid.txt","ism");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Ho'sh, to'liq ismingiz nima? ",

]);

}

if($tx=="/togrlash"){

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"😳 Ehhe, shuncha ma'lumot kuydi, qaytadan ro'yxatdan o'ting endi... ",

]);

}

if($tx=="/boshIash" or $tx=="/togrlash"){

file_put_contents("step/$uid.txt","ism2");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Ho'sh, to'liq ismingiz nima? ",

]);

}

if($fayl=="ism2"){

file_put_contents("ism2/$uid.txt",$tx);

file_put_contents("step/$uid.txt","elon2");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"E'lon qanday bo'lishi, nima haqida, muddati, talab qilinuvchi omillari, hamma hammasini yozing",

]);

}

if($fayl=="elon2"){

file_put_contents("elon2/$uid.txt",$tx);

file_put_contents("step/$uid.txt","raqam2");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Zo'r 👍 Endi qo'l telefon raqamingizni yozing (qo'rqmang, tarqatmayman ☺️)",

]);

}

if($fayl=="raqam2"){

file_put_contents("raqam2/$uid.txt",$tx);

file_put_contents("step/$uid.txt","budjet");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Xaxa raqamlarni dodasi ekan.

Qancha budjet belgilangan? ",

]);

}

if($fayl=="budjet"){

file_put_contents("budjet/$uid.txt",$tx);

file_put_contents("step/$uid.txt","manzil2");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Manzilingiz? ",

]);

}

if($fayl=="manzil2"){

file_put_contents("manzil2/$uid.txt",$tx);

file_put_contents("step/$uid.txt","");

$ism2=file_get_contents("ism2/$uid.txt");

$elon2=file_get_contents("elon2/$uid.txt");

$manzil2=file_get_contents("manzil2/$uid.txt"); 

$raqam2=file_get_contents("raqam2/$uid.txt");

$budjet=file_get_contents("budjet/$uid.txt");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"

Ro'yxat to'g'ri to'ldirilgan bo'lsa /tasdiqIash'ni bosing. Agar xato bo'lsa /togrlash'ni bosing

Ismingiz: <b>$ism2</b>

=======

E'longiz: <b>$elon2</b>

=======

Budjet: <b>$budjet</b>

=======

Raqamingiz: <b>$raqam2</b>

=======

Manzilingiz: <b>$manzil2</b>", 

'parse_mode'=>'html'

]);

}

$name = $message->from->first_name;

if($tx=="/tasdiqIash"){

$ism2=file_get_contents("ism2/$uid.txt");

$elon2=file_get_contents("elon2/$uid.txt");

$manzil2=file_get_contents("manzil2/$uid.txt"); 

$raqam2=file_get_contents("raqam2/$uid.txt");

$budjet=file_get_contents("budjet/$uid.txt");

bot('sendmessage',[

'chat_id'=>$admin,

'text'=>"<a href='tg://user?id=$uid' >$name</a> nomli shaxs #Buyurtma e'lon qiladi:

Ismi: <b>$ism2</b>

=======

E'loni: <b>$elon2</b>

=======

Budjet: <b>$budjet</b>

=======

Raqami: <b>$raqam2</b>

=======

Manzili: <b>$manzil2</b>", 

'parse_mode'=>"html"

]);

}

if($tx=="/tasdiqIash"){

    bot('sendmessage',[

        'chat_id'=>$cid, 

        'user_id'=>$uid, 

        'message_id'=>$mid, 

        'text'=>"Iltimos, kuting..."

        ]);

bot('editmessagetext',[

   'chat_id'=>$cid,

   'user_id'=>$uid,

   'message_id'=>$mid + 1,

   'text'=>"Adminga yuborildi ✔️",

  ]);

} 

sleep(4);

if($tx=="/tasdiqIash"){

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"*Ro'yxatingiz 24-48 soat ichida ko'rib chiqiladi. *

> Agar normal holatda to'ldirgan bo'lsangiz 

kanalga joylanadi ✔️ 

> Agar o'yin sifatida ko'rib to'ldirgan bo'lsangiz 

kanalga joylanmaydi ❌",

'parse_mode'=>"markdown"

]);

}

if($fayl=="ism"){

file_put_contents("ism/$uid.txt",$tx);

file_put_contents("step/$uid.txt","elon");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Yo'nalishingizni kiriting...

Masalan: logo, art, corel draw",

]);

}

if($fayl=="elon"){

file_put_contents("elon/$uid.txt",$tx);

file_put_contents("step/$uid.txt","raqam");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Zo'r 👍 Endi qo'l telefon raqamingizni yozing (qo'rqmang, tarqatmayman ☺️)",

]);

}

if($fayl=="raqam"){

file_put_contents("raqam/$uid.txt",$tx);

file_put_contents("step/$uid.txt","manzil");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Xaxa raqamlarni dodasi ekan, qayerda istiqomat qilasiz?",

]);

}

if($fayl=="manzil"){

file_put_contents("manzil/$uid.txt",$tx);

file_put_contents("step/$uid.txt","");

$ism=file_get_contents("ism/$uid.txt");

$elon=file_get_contents("elon/$uid.txt");

$manzil=file_get_contents("manzil/$uid.txt"); 

$raqam=file_get_contents("raqam/$uid.txt");

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"Oho, zo'r joylarku... 

Ro'yxat to'g'ri to'ldirilgan bo'lsa /tasdiqlash'ni bosing. Agar xato bo'lsa /xato'ni bosing

Ismingiz: <b>$ism</b>

=======

Yo'nalishingiz: <b>$elon</b>

=======

Raqamingiz: <b>$raqam</b>

=======

Manzilingiz: <b>$manzil</b>", 

'parse_mode'=>'html'

]);

}

$name = $message->from->first_name;

if($tx=="/tasdiqlash"){

$ism=file_get_contents("ism/$uid.txt");

$elon=file_get_contents("elon/$uid.txt");

$manzil=file_get_contents("manzil/$uid.txt"); 

$raqam=file_get_contents("raqam/$uid.txt");

bot('sendmessage',[

'chat_id'=>$admin,

'text'=>"<a href='tg://user?id=$uid' >$name</a> nomli shaxs e'lon qiladi:

Ismi: <b>$ism</b>

=======

Yo'nalishi: <b>$elon</b>

=======

Raqami: <b>$raqam</b>

=======

Manzili: <b>$manzil</b>", 

'parse_mode'=>"html"

]);

}

if($tx=="/tasdiqlash"){

    bot('sendmessage',[

        'chat_id'=>$cid, 

        'user_id'=>$uid, 

        'message_id'=>$mid, 

        'text'=>"Iltimos, kuting..."

        ]);

} 

if($tx=="/tasdiqlash"){

bot('editmessagetext',[

   'chat_id'=>$cid,

   'user_id'=>$uid,

   'message_id'=>$mid + 1,

   'text'=>"Adminga yuborildi ✔️",

  ]);

} 

sleep(4);

if($tx=="/tasdiqlash"){

bot('sendmessage',[

'chat_id'=>$cid,

'text'=>"*Ro'yxatingiz 24-48 soat ichida ko'rib chiqiladi. *

> Agar normal holatda to'ldirgan bo'lsangiz 

kanalga joylanadi ✔️ 

> Agar o'yin sifatida ko'rib to'ldirgan bo'lsangiz 

kanalga joylanmaydi ❌",

'parse_mode'=>"markdown"

]);

}

$type = $message->chat->type;

$gruppa = file_get_contents("gruppa.db");

$lichka = file_get_contents("lichka.db");

$xabar = file_get_contents("xabarlar.txt");

$gxabar = file_get_contents("gxabarlar.txt");

if($type=="supergroup"){

mkdir("data");

mkdir("data/$cid");

if(strpos($gruppa,"$cid") !==false){

}else{

file_put_contents("gruppa.db","$gruppa\n$cid");

}

}

if($type=="private"){

if(strpos($lichka,"$cid") !==false){

}else{

file_put_contents("lichka.db","$lichka\n$cid");

}

} 

$reply = $message->reply_to_message->text;

$rpl = json_encode([

            'resize_keyboard'=>false,

            'force_reply'=>true,

            'selective'=>true

        ]);

if($text=="/send" and $cid==$admin){

  bot('sendmessage',[

    'chat_id'=>$admin,

    'text'=>"Yuboriladigan xabar matnini kiriting!",'parse_mode'=>"html",'reply_markup'=>$rpl

]);

}

if($reply=="Yuboriladigan xabar matnini kiriting!"){

	file_put_contents("xabarlar.txt","$text");	$xabar = file_get_contents("xabarlar.txt");

  $lich = file_get_contents("lichka.db");

  $lichka = explode("\n",$lich);

foreach($lichka as $uid){

  bot("sendmessage",[

    'chat_id'=>$uid,

    'text'=>$xabar,

   'parse_mode'=>'MarkDown',

               'reply_markup'=>json_encode([

                'inline_keyboard'=>[

                    [

                        ['text'=>"Savol bor!",'url'=>"https://t.me/netuzb"],

                        ]

                ]

            ])

]);

   unlink("xabarlar.txt");

}

}

}
