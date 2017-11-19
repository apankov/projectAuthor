<?php
    use Contentful\Management\Client;
    use Contentful\Management\Resource\Entry;
    
    require_once __DIR__ . '/vendor/autoload.php';
    require_once('classes/View.php');
    require_once('classes/db.php');
   

	define('SPACE_ID', 'ziizox3s0nca');
    define('ACCESSTOKEN', '931e7ebd9dd5bfc8d783a3d4b5776d71bac5a345fa13e7bc5a1371ef3448a02f');
    define('TOKENMENEGER','77021c6fc3fd9332c73cb572f6b9a366b7d1d7a7cac92ca5b8869cedea096219');
    define('SPACE_ID', 'ziizox3s0nca');
    define('CATALOG', dirname(__FILE__));
    define('DIR_IMAGE', 'd:\OpenServer\domains\projectAuthor\projectAuthor\images'.'\\');
    define('EXT', '.php');
    define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);
    $views = 'views';
    if ( ! is_dir($views) AND is_dir(DOCROOT.$views))
        $views = DOCROOT.$views;
    define('VIEWPATH', realpath($views).DIRECTORY_SEPARATOR);
    unset($views);
    session_start();
    $client = new Client(TOKENMENEGER, SPACE_ID);

   /*  $clients = new Contentful\Delivery\Client(SPACE_ID, ACCESSTOKEN);
     $syncManager = $clients->getSynchronizationManager();
     $result = $syncManager->startSync(); */

     
     class Db extends Entry {
            public function __construct(){
             
            }
            
            static function insert($nameTable){
                $entry = new Entry($nameTable);
                
                return $entry;
            }
    
            static function setCurl($parametr){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://cdn.contentful.com/".$parametr);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                $response = curl_exec($ch);
                curl_close($ch);
               /* echo "<pre>";
                print_r(json_decode($response,true));    */
                
                return json_decode($response,true);
            }
           
        
      } 
      $db= New Db($client);           
   /* function sdfsd($entryTable){
      $entry = new Entry($entryTable);
       print_r($entry);
    }*/

   /* echo $entryTable;
    if(!empty($entryTable)){
       $entry = new Entry($entryTable);
    } */
    

     
?>