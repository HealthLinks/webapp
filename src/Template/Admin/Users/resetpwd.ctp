<body class="loginPanel">

 <!--wrapper starts here-->
 <div class="loginWrapper">
    <div class="logo">
	<br>
          <?php echo $this->Html->image('admin/logo.png', array('alt' => 'HealthLink', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?>
		  <br><br>
    </div>

   <!--form starts here--> 
<?= $this->Form->create('User',['class' => 'loginForm']) ?>
  <div class="form-group">
       <div class="input-group">
        <span class="input-group-addon" >
        <i class="fa fa-envelope"></i>
        </span>
        <?= $this->Form->input('email',['class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => 'Enter Email','required' => 'required','label' => false, 'div' => false]) ?>
       </div>
  </div>
  
 <div class="form-group"> 
         
      
           <?= $this->Form->button('Reset Password',['class' => 'btn btnGreenBlue alignRight']) ?>
           <?php echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Login',array('action'=>'login','admin' => false),array('escape' => FALSE)); ?>
     </div>
<?= $this->Form->end() ?>
<!--form ends here--> 

</div>

<!--wrapper ends here-->
</body>
