<?php
require_once('config.php');
$content['catalog']=CATALOG;
$str='';

if(!isset($_SESSION['user']['items'][0]['fields']['id'])){
    header ("Location: index.php");  
}

/*
$entry=$db::insert('article');    
$entry = $client->entry->get('31i1eDHtgQ2ae0qm64uWis');
$entry->setField('name', 'en-US', '5555');
$entry->update();*/
if (isset($_GET['edit'])){
    if(is_numeric($_GET['edit']))   {
       $result_edit=$db::setCurl('/spaces/'.SPACE_ID.'/entries?access_token='.ACCESSTOKEN.'&content_type=article&fields.id='.(int)$_GET['edit'].'');
    }
}        

if(isset($result_edit['items'][0]['sys']['id'])){
    $content['id']=$result_edit['items'][0]['sys']['id'];
    $content['type']="update";
}else{
    $content['id']='';
    $content['type']="add";
}

if(isset($result_edit['items'][0]['fields']['name'])){
    $content['name']=$result_edit['items'][0]['fields']['name'];
}else{
    $content['name']='';
}

if(isset($result_edit['items'][0]['fields']['descripton'])){
    $content['descripton']=$result_edit['items'][0]['fields']['descripton'];
}else{
    $content['descripton']='';
}

if(isset($result_edit['items'][0]['fields']['images'])){
    $content['images']=$result_edit['items'][0]['fields']['images'];
}else{
    $content['images']='';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(!empty($_POST['name']) && !empty($_POST['description'])){
        $images="";
        $uploadfile = DIR_IMAGE . basename($_FILES['filename']['name']);

        if($_FILES['filename']['error']==0){
            $types = array('image/gif', 'image/png', 'image/jpeg');
            if (!in_array($_FILES['filename']['type'], $types)){
              $str .= '<p class="error"> Запрещённый тип файла. </p>'; 
            }else{
                //echo basename($_FILES['filename']['tmp_name']).'<br>';
                if (@move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
                    $images="/images/".$_FILES['filename']['name'];
                        //echo "Файл корректен и был успешно загружен.";
                } else {
                     $str .= '<p class="error">Ошибка загрузки! </p>';
                }
            }
       }
       
           

           

       if($_POST['type']=='add'){
           $entry=$db::insert('article');     
           $userId=(int)$_SESSION['user']['items'][0]['fields']['id'];
           $result=$db::setCurl('/spaces/'.SPACE_ID.'/entries?access_token='.ACCESSTOKEN.'&content_type=article');//&order=sys.id&limit=1
            $max=0;
            foreach($result['items'] as $val){
               // echo $val['fields']['id'].'>'.$max.'<br>';
                if($val['fields']['id']>$max){
                    $max=$val['fields']['id'];
                }
            }

           $total=$max+1; 
                     //  echo $total;
          //  exit();
           $entry->setField('id', 'en-US', $total);
           $entry->setField('name', 'en-US', $_POST['name']);
           $entry->setField('descripton', 'en-US', $_POST['description']);
           if(!empty($images)){
            $entry->setField('images', 'en-US', $images);
           }
           $entry->setField('userid', 'en-US', $userId);
           $entry->setField('addcreate', 'en-US', date("c"));
           $client->entry->create($entry);
           $entry->publish();
           
           $db::setCurl('/spaces/'.SPACE_ID.'/sync?access_token='.ACCESSTOKEN.'&initial=true&type=Entry');
           
           if(empty($str)){
             $content['success']='Статья добавлена';
           }
           
       }else{
           $entry=$db::insert('article');    
           $entry = $client->entry->get($_POST['id']);
           $entry->setField('name', 'en-US', $_POST['name']);
           $entry->setField('descripton', 'en-US', $_POST['description']);
           if(!empty($images)){
            $entry->setField('images', 'en-US', $images);
           }
           $entry->update();
           $entry->publish();
           if(empty($str)){
             $content['success']='Статья обновлена';
           }
           
       }
       

       
    }else{
        $str .= '<p class="error">Проверка заполнения формы...</p>'; 
    }
 /* Array ( 
  [name] => test 
  [description] => 111 ) 
  Array ( [filename] => Array ( [name] => closse.png [type] => image/png 
  [tmp_name] => D:\OpenServer\userdata\temp\phpA176.tmp [error] => 0 [size] => 1202 ) ) */
  //  print_r($_POST);  
   // print_r($_FILES);  
    
    
}

$content['error']=$str;

echo View::make('addPost', ['content' => $content]);

?>