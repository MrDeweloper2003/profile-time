<?php

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();
$anb8 = file_get_contents('http://obhavo.uz/andijan'); $ex1=explode("\n",$anb8);
$obh = file_get_contents('https://fa.weather.town/uz/forecast/uzbekistan/andijan/andijon/');
$ex = explode('title="Havo harorati"',$obh);
$exi = explode('right-container',$ex[1]);
$ubk = str_replace($exi[1],' ',$ex[1]);
$ubk1 = str_replace('dir="ltr">',' ',$ubk);
$ubk2 = str_replace('<div class="informer-main-page__container fleft right-container',' ',$ubk1);
$ubk3 = str_replace('&deg;C</div>',' ',$ubk2);
$ubk4 = str_replace('</div>',' ',$ubk3);
$obhavo = trim("$ubk4");
$time=date("H:i",strtotime("5 hour"));
$kun=date("d-m-20y",strtotime("5 hour"));
 $nik = ["Najmiddin", "Najmiddin"];
  $nikrand=array_rand($nik);
  $niktxt="$nik[$nikrand]";
$MadelineProto->account->updateProfile(['first_name'=>"$niktxt | $time",'about'=>"📆$kun</>
⏰$time</>⛅️ $obhavo"]);
$MadelineProto->account->updateStatus(['offline' => false, ]);
$yil = date("Y", strtotime("5 hour"));
$sana = date("d/m/Y", strtotime("5 hour"));
$logo = ["http://uzkod.ru/go.php?text=$time&type=green-neon-text-effect-874", "http://uzkod.ru/go.php?text=$time&type=neon-light-text-effect-online-882"];
  $logorand=array_rand($logo);
  $logopic="$logo[$logorand]";

if($yil == "2019"){
header('Content-type: image/jpg');
file_put_contents("got.jpg",file_get_contents($logopic));
$info = $MadelineProto->get_full_info('me');
$inputPhoto = ['_' => 'inputPhoto', 'id' => $info['User']['photo']['photo_id'], 'access_hash' => $info['User']['access_hash'], 'file_reference' => 'bytes'];
$deletePhoto = $MadelineProto->photos->deletePhotos(['id'=>[$inputPhoto]]);
}
$MadelineProto->photos->updateProfilePhoto(['file' => "got.jpg" ]);

