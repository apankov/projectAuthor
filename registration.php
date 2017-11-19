<?php
require_once('config.php');
$content['catalog']=CATALOG;
$str='';
  /*  [name] => test
    [email] => test@te.by
    [password] => 123123
    [access] => writer */
    


if(count($_POST)>0){
    if(validate($_POST)==true ){

        $entry=$db::insert('user');    
        $result=$db::setCurl('/spaces/'.SPACE_ID.'/entries?access_token='.ACCESSTOKEN.'&content_type=user');
        $total=$result['total']+1;
        $entry->setField('id', 'en-US', $total);
        $entry->setField('password', 'en-US',Setpass($_POST['password']) );
        $entry->setField('name', 'en-US', $_POST['name']);
        $entry->setField('email', 'en-US', $_POST['email']);
        $entry->setField('access_type', 'en-US', $_POST['access']);
        $entry->setField('registerDate', 'en-US', date("c"));
        $client->entry->create($entry);
        $entry->publish();

       $content['success']='Пользователь зарегитрирован';

    }
}
     /* echo "<pre>";
       print_r($content);
      exit();*/
//escape()

function Setpass($pass){
  return  md5($pass);
}
  function genRandomPassword($length = 8)
	{
		$salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$base = strlen($salt);
		$makepass = '';
		$random = JCrypt::genRandomBytes($length + 1);
		$shift = ord($random[0]);

		for ($i = 1; $i <= $length; ++$i)
		{
			$makepass .= $salt[($shift + ord($random[$i])) % $base];
			$shift += ord($random[$i]);
		}

		return $makepass;
	}
function validate($data){
     global $str;
    if ((strlen($data['name']) < 1) || (strlen($data['name']) > 32)) {
      		$str .= '<p class="error">Поле имя не заполнено</p>'; 
    	}
   
   	if ((strlen($data['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $data['email'])) {
           	$str .= '<p class="error">Email не верный или пустой</p>';
   	}
    
    if ((strlen($data['password']) < 4) || (strlen($data['password']) > 20)) {
      		$str .= '<p class="error">Пароль должен быть больше 4 символов</p>';
   	}
 
    if(empty($str)){
        return true;
    }else{
        return false;
    }
}
    
$content['error']=$str;
 if(isset($content['success'])){
   //echo View::make('index', ['content' =>$content ]);
   header ("Location: index.php");  
 }else{   
   echo View::make('registration', ['content' => $content]);
 }
?>
