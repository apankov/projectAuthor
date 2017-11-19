<?php
	require_once(DOCROOT.'views/header.php'); 
    

?>

<br />
<div class="container">
 <div class="row">
  <div class="col-md-12">
                 <h2 style="text-align: center;">Создать статью блога </h2>
   <div style="text-align: right;">
       <a href="/projectauthor">Вернуться на главную</a>
   </div>
 </div>
</div>
    <?php if(isset($content['success'])){ ?>
<div class="container">
  <div class="row">
    <div class="col-sm-12 ">   
     <div class="success"><?php echo $content['success'];?></div>   
    </div>   
 </div>   
</div>     
<?php } ?>   
<div class="container">
 <div class="row">
  <div class="col-md-10">
    <div class="add-article">

          <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI'];?>" >

              <div class="col-md-5">
                 <label>Название статьй <span style="color: red;">*</span> </label>
                 <input type="text" name="name" id="inputName" class="form-control" value="<?php echo $content['name'];?>" >
              </div>
               <div class="col-md-8">
                 <label>Описание статьй<span style="color: red;">*</span></label>
                 <textarea name="description" class="form-control" ><?php echo $content['descripton'];?></textarea>
               </div>
                <div class="col-md-5">
                 <label>Название изображения</label>
                 <input type="file" name="filename" id="inputName" class="form-control"   >
               </div>
               <div class="col-md-5">
               <br />
                <?php if($content['type']=="add") { ?>
                  <button class="btn btn-lg btn-outline-primary" type="submit">Добавить</button>    
                <?php } else { ?> 
                  <button class="btn btn-lg btn-outline-primary" type="submit">Сохранить</button>      
                <?php } ?>  
              </div>
              <input type="hidden" name="id" value="<?php echo $content['id']; ?>" />
              <input type="hidden" name="type" value="<?php echo $content['type']; ?>" />
              <?php if(!empty($content['error'])){   echo $content['error'];    }?>
          </form>

      </div>
    </div>   
 </div>
</div>

<?php
	require_once(DOCROOT.'views/footer.php'); 
?>