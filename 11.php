<?php
	$spaceID = 'ziizox3s0nca';
$accessToken = 'd43cde4691f28484e7efc4c19257f471514808586fd77341423094966d373155';

//Uid* 50596fdfcba72a5f347f9b235c50c8ec6c0f72aa43479594449829fdae4ba944
//Secret* e47568ec8ab410b44512116e7df4266330cef2596e7e6414aa9a4da52bd70fd1

/*public function testReviveJsonEntry()
{
    $space = '{"sys": {"type": "Space","id": "cfexampleapi"},"name": "Contentful Example API","locales": [{"code": "en-US","default": true,"name": "English"},{"code": "tlh","default": false,"name": "Klingon"}]}';
    $ct = '{"fields": [{"id": "name","name": "Name","type": "Text","required": true,"localized": true},{"id": "likes","name": "Likes","type": "Array","required": false,"localized": false,"items": {"type": "Symbol"}},{"id": "color","name": "Color","type": "Symbol","required": false,"localized": false},{"id": "bestFriend","name": "Best Friend","type": "Link","required": false,"localized": false,"linkType": "Entry"},{"id": "birthday","name": "Birthday","type": "Date","required": false,"localized": false},{"id": "lifes","name": "Lifes left","type": "Integer","required": false,"localized": false,"disabled": true},{"id": "lives","name": "Lives left","type": "Integer","required": false,"localized": false},{"id": "image","name": "Image","required": false,"localized": false,"type": "Link","linkType": "Asset"}],"name": "Cat","displayField": "name","description": "Meow.","sys": {"space": {"sys": {"type": "Link","linkType": "Space","id": "cfexampleapi"}},"type": "ContentType","id": "cat","revision": 2,"createdAt": "2013-06-27T22:46:12.852Z","updatedAt": "2013-09-02T13:14:47.863Z"}}';
    $json = '{"fields": {"name": {"en-US": "Nyan Cat","tlh": "Nyan vIghro\'"},"likes": {"en-US": ["rainbows","fish"]},"color": {"en-US": "rainbow"},"bestFriend": {"en-US": {"sys": {"type": "Link","linkType": "Entry","id": "happycat"}}},"birthday": {"en-US": "2011-04-04T22:00:00.000Z"},"lives": {"en-US": 1337},"image": {"en-US": {"sys": {"type": "Link","linkType": "Asset","id": "nyancat"}}}},"sys": {"space": {"sys": {"type": "Link","linkType": "Space","id": "cfexampleapi"}},"type": "Entry","contentType": {"sys": {"type": "Link","linkType": "ContentType","id": "cat"}},"id": "nyancat","revision": 5,"createdAt": "2013-06-27T22:46:19.513Z","updatedAt": "2013-09-04T09:19:39.027Z"}}';
    $this->client->reviveJson($space);
    $this->client->reviveJson($ct);
    $obj = $this->client->reviveJson($json);
    $this->assertJsonStringEqualsJsonString($json, json_encode($obj));
}*/

$client = new Client($spaceID,$accessToken);
$entries = $client->getEntries();

if (count($entries) === 0) {
   echo "Ups, you got no entries in your space. How about creating some?<br />";
} else {
   echo "You have entries with these IDs:<br />";
    foreach ($entries as $entry) {
      echo $entry->getId().'<br>';
    }
}
$contentTypes = $client->getContentTypes();


    echo "<pre>";  
    print_r($client);
/*$space = $client->getSpace();
    echo "<pre>";  
    print_r($space);*/


//Space ID
//ziizox3s0nca

//Content Delivery API - access token
//d43cde4691f28484e7efc4c19257f471514808586fd77341423094966d373155

//Content Preview API - access token
//baabb4daf7e5070395a0f2875375543754364673e490c66c90b085b408c9eee0
/*$client = new Client($accessToken, $spaceID);
$query =  new Query();
$spaces = $client->space->getAll();
echo "<pre>";  
    print_r($spaces);
$resultContent=$client->getContentType('user');*/
 //   echo "<pre>";
    //    print_r($resultContent->getFields());     

/*$resultSyst=$query->where('sys.contentType', true);
    echo "<pre>";  
    print_r($resultSyst);*/     
    
 /*   $resultSyst=$query->select(array('sys.contentType'));
    $resultEntries=$client->getEntries($resultSyst) ;
    foreach($resultEntries as $val){
        echo "<pre>";  
        print_r($val->getId());   
   

    }*/
  
   // $entrys = $client->getEntry('psUoyu1fvEii8Wqe6wGi0');
  /* $query = $query->setContentType('2wKn6yEnZewu2SCCkus4as')->select(array('fields'));

     $entriesSlug = $client->getEntries($query);
      foreach($entriesSlug as $val){
        echo "<pre>";  
        print_r($val->jsonSerialize());   
   

    } 
   
   $query = $query->setContentType('user')
    ->where('sys.id', '<value>');

$entries = $client->getEntries($query);
   */
   
         echo '<br><hr>';
               //  print_r($entrys->getDisplayField()); 
   
        echo "<pre>";  
    //print_r($resultEntries->getTotal());  
     //   print_r($resultEntries->getItems());  
               // print_r($resultEntries->jsonSerialize());  
        

 //echo $entry->getproductName();  
   echo "<pre>";  
  //  print_r($entrys);
  
/*$query->setContentType('user')
    ->orderBy('fields.email');
   $productEntriesByPrice = $client->getEntries($query);
   
foreach ($productEntriesByPrice as $product) {
    echo $product, PHP_EOL;
}*/
  // print_r($productEntriesByPrice); 

//Синхронизация
/*$syncManager = $client->getSynchronizationManager();
$result = $syncManager->startSync();
$items = $result->getItems();  
$json = json_encode($items[0]);
$object = $client->reviveJson($json);
    $result = $syncManager->startSync();

while (!$result->isDone()) {
    $result = $syncManager->continueSync($result);
    echo "<pre>";  
    print_r($result);
}
$token = $result->getToken();
// Whenever you want to sync again
$result = $syncManager->continueSync($token);  
*/


/* 
      $json = json_encode($items[0]);
$object = $client->reviveJson($json);
   
  $result = $syncManager->startSync();

while (!$result->isDone()) {
    $result = $syncManager->continueSync($result);
    
       echo "<pre>";  
    print_r($result);  
}

$token = $result->getToken();

// Whenever you want to sync again

$result = $syncManager->continueSync($token);*/


//select=sys.id,fields.productName&content_type=user
//$query->select(array());


//$syncManager = $client->getSynchronizationManager();


//   echo "<pre>";
     //   print_r($resultContent->getId());
        

//$resultEntry=$client->getSpace()->jsonSerialize();
//$query->select('user', true);
//$entry = $client->getContentTypes($query);



//$entryId = '1kUEViTN4EmGiEaaeC6ouY';
//$entry = $client->getEntry($entryId);
//echo $entry->getproductName();

 /*$Properties =  new SystemProperties(); 
 
   echo "<pre>";
        print_r($Properties);
        
        
   $Space =  new  Space();       
   echo "<pre>";
        print_r($Space);*/
//$query =  new ContentType();


/*
$resultSpace=$client->getSpace()->getId();
 echo "<pre>";
       print_r($resultSpace);
$query =  new Query();
//$query =  new ContentType();
 $query->setContentType('Author');
 


 
 $queryAsset =  new Asset('1','2','3');
 $resultSpaceTitle=$queryAsset->getTitle();
  echo "<pre>";
       print_r($resultSpaceTitle);*/
/*
 $result=$query->select();
 echo "<pre>";
       print_r($result);*/
//$entry = $client->getEntry('Author');
//$query =  new Query();
//$result=$client->getAssets($query);
 //echo "<pre>";
     //   print_r($entry);
// $entrys = $client->getEntry($id);
//echo $entrys->getproductName();

/*

$query->setContentType('Author');
$result = $client->getEntries($query);
        echo "<pre>";
        print_r($result);
foreach ($result as $product) {
    echo $product->getproductName(), PHP_EOL;
}*/













-------------------

/*
$client = new Client($accessToken, $spaceID);

$entries = $client->getEntries();
if (count($entries) === 0) {
    echo "Ups, you got no entries in your space. How about creating some?<br />";
} else {
    echo "You have entries with these IDs:<br />";
    foreach ($entries as $entry) {
        echo $entry->getId() . "<br />";
    }
}*/



//$contentTypes = $client->getContentTypes();
/*
$client = new Client($accessToken);
$space = $client->space->get($spaceID);
$space->setName('New name11');
$space->update();*/


//$client = new Client($accessToken, $spaceID);
//$contentTypes = $client->contentType->getAll();
//$contentType = $client->contentType->get('user');
/*
$contentType = new ContentType('New Content Type');
$contentType->setDescription('Content type description')
    ->setDisplayField('name')
    ->addNewField('symbol', 'name', 'Name');

$client->contentType->create($contentType, 'newContentType');

$contentType->setName('New content type name');
$contentType->update();*/

//$editorInterface = $client->editorInterface->get('user');

/*
$editorInterface = $client->editorInterface->get('user');
$editorInterface->getControl('title')->setWidgetId('singleLine');
$editorInterface->update();*/

//$entries = $client->entry->getAll();
//$entry = $client->entry->get('2VS3Fj7KU8eAU0UumM8qmc');
/*$entry->unpublish();
$entry->publish();
$entry->delete();*/
/*

$entry = new Entry('user');
$entry = $client->entry->get('2VS3Fj7KU8eAU0UumM8qmc');
$entry->setField('id', 'en-US',9);
$entry->setField('password', 'en-US', '785545');
$entry->setField('email', 'en-US', 'ggg555@tu.by');
$entry->setField('registerDate', 'en-US', "2017-11-09T00:00+03:00");
$entry->update();
//$client->entry->create($entry);
$entry->publish();*/


/*
$entry = new Entry('user');
$entry->setField('id', 'en-US', '7');
$client->entry->create($entry);
$entry->setField('id', 'en-US', '8');
$entry->update();*/
/*
echo "<pre>";
print_r($entry);
*/
?>