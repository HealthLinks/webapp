<?php echo $this->element('Admin/header');
echo $this->element('Admin/sidebar');
  ?>
 <div id="page-content-wrapper">
  <div class="row">
  <div class="col-lg-12">

        <h1 class="page-header">
            <i class="fa fa-users"></i><?= __('Users') ?>
               <ol class="breadcrumb">
                    <li>
                       <?php echo $this->Html->link('Dashboard',array('controller'=>'Admin','action'=>'index','admin' => false),array('escape' => FALSE)); ?>
                    </li>

                    <li>
                      <?php echo $this->Html->link('Users',array('controller'=>'users','action'=>'index','admin' => FALSE),array('escape' => FALSE)); ?>
                    </li>
                    <li class="active">
                        Edit User
                    </li>
                </ol>
        </h1>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
     <h2 class="sub-header"><?= __('Edit User') ?></h2>

        <?= $this->Form->create($user) ?>

            <div class="form-group">
                <label>User Name</label>
                <?php echo $this->Form->input('username', ARRAY('label' => false, 'div' => false, 'class' => 'form-control', 'id' => '','maxlength' => '50', 'placeholder' => 'Enter Username')); ?>
            </div>

            <div class="form-group">
                <label>Email</label>
                <?php echo $this->Form->input('email', ARRAY('label' => false, 'div' => false, 'class' => 'form-control', 'id' => '', 'disabled' => 'true' ,'maxlength' => '50', 'placeholder' => 'Enter Email')); ?>
            </div>  

             <div class="form-group">
                <label>User Role</label>
                <?php 
				$options = [];
				foreach ($roles as $role) {
					$options[$role->id]=$role->role;
				}
				echo $this->Form->select('role_id',$options,['class'=>'select-style']); ?>
            </div>

            <div class="form-group">
            <label>Status</label>
            <?php echo $this->Form->checkbox('status', ARRAY('label' => false, 'div' => false, 'class' => 'checkbox')); ?>
            </div>
             <?= $this->Form->button(__('Submit'),['class' => 'btn btnGreenBlue']); ?>
                 <?php echo $this->Form->end() ?>


     </div>


 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right small-mbtm20 ">
       <h2 class="sub-header"><?= __('Actions') ?></h2>
       <ul class="listing">
        <?php if($user['role'] != 'admin') { ?>
            <li> <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $user->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
                    ) ?>  </li>
                    <?php } ?>
            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>



       </ul>
    </div>

</div>
</div>


