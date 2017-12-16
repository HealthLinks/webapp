<?php echo $this->element('Admin/header');
echo $this->element('Admin/sidebar');
  ?>
<div id="page-content-wrapper">
    <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-lock"></i><?= __('Change Password') ?>
                   <ol class="breadcrumb">
                        <li>
                           <?php echo $this->Html->link('Dashboard',array('controller'=>'Admin','action'=>'index','admin' => false),array('escape' => FALSE)); ?>
                        </li>
                        <li class="active">
                            Change Password
                        </li>
                    </ol>
                </h1>
            </div>
            
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <?= $this->Form->create($user) ?>
        			 <div class="form-group">
        			 <label>Old Password</label>
                 		<?= $this->Form->input('old_password',['type' => 'password' , 'label'=>false,'div' => false, 'class' => 'form-control', 'placeholder' => 'Enter Old Password'])?>
                 	</div>

                 	 <div class="form-group">
        			 <label>New Password</label>
                 		<?= $this->Form->input('password1',['type' => 'password' , 'label'=>false,'div' => false, 'class' => 'form-control', 'placeholder' => 'Enter New Password'])?>
                 	</div>

        			<div class="form-group">
        			<label>Confirm Password</label>
                 		<?= $this->Form->input('password2',['type' => 'password' , 'label'=>false,'div' => false, 'class' => 'form-control', 'placeholder' => 'Confirm Password'])?>
                 	</div>
        			   
                     <?= $this->Form->button(__('Submit'),['class' => 'btn btnGreenBlue']); ?>
                    <?php echo $this->Form->end() ?>
            </div>

    </div>
</div>