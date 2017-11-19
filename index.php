<?php
//use Contentful\Delivery\Client;
//use Contentful\Management\Client;
/*use Contentful\Delivery\Query;
use Contentful\Delivery\ContentType;
use Contentful\Delivery\Asset;
use Contentful\Delivery\SystemProperties;
use Contentful\Delivery\Space;
use Contentful\Delivery\ResourceBuilder;*/

//use Contentful\Delivery\Client;
//use Contentful\Management\Client;
//use Contentful\Management\Resource\Entry;
//use Contentful\Delivery\Client;
require_once('classes/View.php');
require_once('config.php');
$content['catalog']=CATALOG;

if(isset($_GET['logout'])){
    unset( $_SESSION['user']);
}



if(count($_POST)>0){
  if(!empty($_POST['email']) && !empty($_POST['password']) ){
       $result=$db::setCurl('/spaces/'.SPACE_ID.'/entries?access_token='.ACCESSTOKEN.'&content_type=user&fields.email[match]='.$_POST['email'].'&fields.password[match]='.md5($_POST['password']).'');
        
        //echo "<pre>";
        //print_r($result['items'][0]['fields']['email']);  
        if($result['total']==1 && $result['items'][0]['fields']['email']==$_POST['email'] ){
            $_SESSION['user']=$result;
        }
     /*   $entries = $client->entry->getAll();
        foreach($entries->getItems() as $val){
            $userArray=$val->getFields('en-US');
          if($userArray['email']==$_POST['email'] && $userArray['password']==md5($_POST['password']) ){
             $_SESSION['user']=$userArray;
            break;
          }
        }*/
  }
}


if(isset($_SESSION['user'])){
    $content['user']=$_SESSION['user'];
}
if(isset($_SESSION['user']['items'][0]['fields']['id'])){
    $content['user_id']=$_SESSION['user']['items'][0]['fields']['id'];
}else{
    $content['user_id']=0;
}

if(isset($_SESSION['user']['items'][0]['fields']['access_type'])){
    $content['user_access']=$_SESSION['user']['items'][0]['fields']['access_type'];
}else{
    $content['user_access']='';
}
if(isset($_SESSION['user']['items'][0]['fields']['name'])){
    $content['user_name']=$_SESSION['user']['items'][0]['fields']['name'];
}else{
    $content['user_name']='';
}




  $result=$db::setCurl('/spaces/'.SPACE_ID.'/entries?access_token='.ACCESSTOKEN.'&content_type=article');
  
  // $content['items']=$result['items'];
   $content['items']=array();
   foreach($result['items'] as $val){   
    
      $result_comm=$db::setCurl('/spaces/'.SPACE_ID.'/entries?access_token='.ACCESSTOKEN.'&content_type=comments&fields.articleid='.(int)$val['fields']['id'].'');
      $content['items'][]=array(
        'id'         => $val['fields']['id'],
        'name'       => $val['fields']['name'],
        'userid'     => $val['fields']['userid'],
        'addcreate'  => $val['fields']['addcreate'],
        'images'     => $val['fields']['images'],
        'descripton' => $val['fields']['descripton'],
        'commentary' => $result_comm
      );
        
  }   
  
  $db::setCurl('/spaces/'.SPACE_ID.'/sync?access_token='.ACCESSTOKEN.'&initial=true&type=Entry');   
 echo View::make('index', ['content' => $content]);
?>