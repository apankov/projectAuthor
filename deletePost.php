<?php
	require_once('config.php');
$content['catalog']=CATALOG;
$str='';

if(!isset($_SESSION['user']['items'][0]['fields']['id'])){
    header ("Location: index.php");  
}


if (isset($_GET['delete'])){
    if(is_numeric($_GET['delete']))   {
       $result_edit=$db::setCurl('/spaces/'.SPACE_ID.'/entries?access_token='.ACCESSTOKEN.'&content_type=article&fields.id='.(int)$_GET['delete'].'');
    }
}

if(isset($result_edit['items'][0]['sys']['id'])){
    $id=$result_edit['items'][0]['sys']['id'];
    $entry=$db::insert('article');    
    $entry = $client->entry->get($id);
    $entry->unpublish();
    $entry->delete();
    header ("Location: index.php");  
}




?>