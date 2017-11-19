<?php
	require_once('config.php');
    
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

   //  $_POST['id']
   //  $_POST['text']
     
    // $content['user_name']
if ($_SERVER['REQUEST_METHOD'] == 'POST') {     
    if($content['user_id']>0){
        if(!empty($_POST['text'])){
           $db::setCurl('/spaces/'.SPACE_ID.'/sync?access_token='.ACCESSTOKEN.'&initial=true&type=Entry');
           $entry=$db::insert('comments');      
           $result=$db::setCurl('/spaces/'.SPACE_ID.'/entries?access_token='.ACCESSTOKEN.'&content_type=comments');
                     $max=0;
            foreach($result['items'] as $val){
                if($val['fields']['id']>$max){
                    $max=$val['fields']['id'];
                }
            }
   
           $total=$max+1; 
           $entry->setField('id', 'en-US', (int)$total);
           $entry->setField('articleid', 'en-US', (int)$_POST['id']);
           $entry->setField('userid', 'en-US', (int)$content['user_id']);
           $entry->setField('text', 'en-US', $_POST['text']);
           $entry->setField('author', 'en-US', $content['user_name']);
           $client->entry->create($entry);
           $entry->publish(); 
           
           $html ="";
           $html .='<div class="mediabody">';
           $html .='    <h5 class="mt-0 mb-1">'.$content['user_name'].'</h5>';
           $html .='  '.$_POST['text'].'  ';
           $html .='</div>';
           

           echo $html; 
        }else{
            
            
        }
        
    }
}
     
     exit();
?>