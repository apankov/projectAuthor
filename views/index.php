<?php
	require_once(DOCROOT.'views/header.php'); 
?>

<div  class="container">
  <div class="row">
    <div class="col-md-6">
        <?php  if (isset($content['user']) && $content['user_access']=='writer'){ ?>
         <div class="login-form">
          <a href="<?php echo str_replace('index.php','',$_SERVER['REQUEST_URI']).'addPost.php';?>">Добавить пост</a>
          </div>
         <?php } ?>  
    </div>
    <div class="col-md-6">
      <div class="login-form">
        <?php if (empty($content['user_name'])){ ?>
            <form method="post" action="<?php echo str_replace('index.php','',$_SERVER['REQUEST_URI']);?>" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2"  type="email" name="email" placeholder="Email">
              <input class="form-control mr-sm-2"  type="password" name="password" placeholder="Пароль">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Войти</button>
            </form>
            <div class="checkbox">
               <label>
                 <a href="/projectauthor/registration.php">Регистрация</a>
               </label>
            </div>
         <?php } else { ?>
          <div style="text-align: right;text-transform: uppercase;font-weight: bold;">Привет <?php echo $content['user_name'];?>!  <span> <a href="<?php echo $_SERVER['REQUEST_URI'].'?logout=exit';?>">Выйти</a></span> </div>
         <?php } ?>
       </div>     
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
        <h1 class="blog-title">Блог автора</h1>
</div>

<div class="container">
      <div class="row">
        <div class="col-sm-12 blog-main">

           <?php if(count($content['items'])>0){ ?>
             <?php foreach($content['items'] as $val){  ?>
                  <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $val['name']; ?></h2>
                    <p class="blog-post-meta"> <b style="color: gray;">Дата публикаций:</b>  <?php echo date('Y-m-d',strtotime($val['addcreate'])); ?></p>
                       <?php   if( !empty($content['user_id']) &&  $content['user_id']==$val['userid']){ ?>
                          <nav class="blog-pagination">
                            <a class="btn btn-outline-primary" href="<?php echo str_replace('index.php','',$_SERVER['REQUEST_URI']).'addPost.php?edit='.$val['id'];?>">Редактировать</a>
                            <a class="btn btn-outline-secondary " href="<?php echo str_replace('index.php','',$_SERVER['REQUEST_URI']).'deletePost.php?delete='.$val['id'];?>">Удалить</a>
                          </nav>
                        <?php } ?>  
                    <hr>
                    <?php if(!empty($val['images'])) { ?><div class="images"><img src="/projectauthor<?php echo $val['images']; ?>" alt="<?php echo $val['name']; ?>" /></div> <?php } ?>
                    <div class="description">
                      <?php echo $val['descripton']; ?>
                    </div>
                    <div class="comment_box">
                        <h3>Ваши комментарий</h3>
                        <div class="comment_container">
                             
                            <div class="media_box">
                              <?php if ($val['commentary']['total']>0) { ?>
                                   <?php foreach($val['commentary']['items'] as $Comval){  ?>
                                       <div class="mediabody">
                                         <h5 class="mt-0 mb-1"><?php echo $Comval['fields']['author'];?></h5>
                                         <?php echo $Comval['fields']['text'];?>
                                       </div> 
                                   <?php }?>   
                              <?php }?>      
                            </div>
                           <?php   if( !empty($content['user_id'])){ ?>
                                <div class="comment-form">
                                 <textarea name="text" class="form-control" placeholder="Оставте комментарий" ></textarea>
                                 <button type="button" class="btn btn-lg btn-outline-primary"  id="sendBtn" >Отправить</button>
    
                                  <input type="hidden" name="id" value="<?php echo $val['id']; ?>" />
                                  
                                </div>
                           <?php }?>       
                        </div>
                        <div class="add_comment">Комментарии (<?php echo $val['commentary']['total']; ?>)</div>
                    </div>
                  </div>
                  
            <?php }?>      
           <?php }?>


        </div>
      </div>
    </div>
<?php
	require_once(DOCROOT.'views/footer.php'); 
?>