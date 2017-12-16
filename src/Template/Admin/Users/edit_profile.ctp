<?php echo $this->element('Admin/header');
echo $this->element('Admin/sidebar');
  ?>
<div id="page-content-wrapper">
    <div class="row">
      <div class="col-lg-12">

            <h1 class="page-header">
                <i class="fa fa-user"></i><?= __('Update Profile') ?>
                   <ol class="breadcrumb">
                        <li>
                           <?php echo $this->Html->link('Dashboard',array('controller'=>'Admin','action'=>'index','admin' => false),array('escape' => FALSE)); ?>
                        </li>

                        <li class="active">
                            Update Profile
                        </li>
                    </ol>
            </h1>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <?= $this->Form->create($user) ?>
                <div class="form-group">
                    <label>User Name</label>
                    <?php echo $this->Form->input('username', ARRAY('label' => false, 'div' => false, 'class' => 'form-control', 'id' => '','maxlength' => '50', 'placeholder' => 'Enter Username')); ?>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <?php echo $this->Form->input('email', ARRAY('label' => false, 'div' => false, 'class' => 'form-control', 'disabled' => 'true' ,'id' => '','maxlength' => '50', 'placeholder' => 'Enter Email')); ?>
                </div>
                <div class="form-group">
                    <label>User Role</label>
                    <?php echo $this->Form->select('role', ['admin'=>'Admin','user'=>'User'],['class' => 'select-style smallSelect']); ?>
                </div>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btnGreenBlue']); ?>
                <?php echo $this->Form->end() ?>
        </div>
    
 
    </div> 
</div>