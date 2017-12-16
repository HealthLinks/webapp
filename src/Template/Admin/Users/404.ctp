<!DOCTYPE html>
<html>
<head>
	<title>Test Site</title>
<meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1, maximum-scale = 1.0 , user-scalable = no"/>

<?php echo $this->Html->css('bio-sys/css/font'); ?>
<?php echo $this->Html->css('bio-sys/css/bootstrap'); ?>
<?php echo $this->Html->css('bio-sys/css/style'); ?>
<?php echo $this->Html->css('bio-sys/css/font-awesome'); ?>
</head>
<body class="loginPanel">

 <!--wrapper starts here-->
 <div class="loginWrapper">
    <div class="logo">
          <?php echo $this->Html->image('Biosyn_Logo.jpg', array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?>
    </div>

   <!--form starts here--> 
<?= $this->Form->create('User',['class' => 'loginForm']) ?>
  <div class="form-group">
     <label for="exampleInputEmail1">Email</label>
       <div class="input-group">
        <span class="input-group-addon" >
        <i class="fa fa-envelope"></i>
        </span>
        <?= $this->Form->input('email',['class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => 'Enter Email','required' => 'required','label' => false, 'div' => false]) ?>
       </div>
  </div>
  <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <div class="input-group">
      <span class="input-group-addon" >
      <i class="fa fa-lock"></i>
      </span>
      <?= $this->Form->input('password',['class' => 'form-control','id' => 'exampleInputPassword1','placeholder' => 'Enter Password','required' => 'required','label' => false, 'div' => false]) ?>
  </div>
  </div>
 <div class="form-group"> 
         <?= $this->Html->link(__('Forgot Password'), ['action' => 'resetpwd','class' => 'forgotLink']) ?>
           
           <?= $this->Form->button('Login',['class' => 'btn redColor alignRight']) ?>

     </div>
<?= $this->Form->end() ?>
<!--form ends here--> 

</div>

<!--wrapper ends here-->
</body>
</html>