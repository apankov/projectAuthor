<?php
	require_once(DOCROOT.'views/header.php'); 
    

?>

<div class="container">
 <div class="row">
  
 
      <form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>" class="form-signin">
        <h2 class="form-signin-heading">Регистрация</h2>
        <input type="text" name="name" id="inputName" class="form-control" placeholder="Имя" required="" autofocus="">
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Почтовый ящик" required="" autofocus="">
        <input type="password" name="password"  id="inputPassword" class="form-control" placeholder="Пароль" required="">
       
        <div>
        <h5>Права доступа</h5>
         <input type="radio" id="writer-id" name="access" value="writer" checked /> 
         <label for="writer-id">Для записи</label>
         <input type="radio" name="access" id="guest-id" value="guest" /> 
         <label for="guest-id">Для просмотра</label> 
          <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>       
        </div>
          <?php if(!empty($content['error'])){   echo $content['error'];    }?>
      </form>
 </div>
</div>

<?php
	require_once(DOCROOT.'views/footer.php'); 
?>