<?php echo $this->element('Admin/header');
echo $this->element('Admin/sidebar');
  ?>  <div id="page-content-wrapper">
  <div class="row">
  <div class="col-lg-12">
 <h1 class="page-header">
    <i class="fa fa-users"></i><?= __('Roles') ?>
       <ol class="breadcrumb">
            <li>
               <?php echo $this->Html->link('Dashboard',array('controller'=>'Admin','action'=>'index','admin' => false),array('escape' => FALSE)); ?>
            </li>

            <li>
              <?php echo $this->Html->link('Roles',array('controller'=>'roles','action'=>'index','admin' => FALSE),array('escape' => FALSE)); ?>
            </li>
            <li class="active">
                Add Role
            </li>
        </ol>

        </h1>
</div>

 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
     <h2 class="sub-header"><?= __('Add Role') ?></h2>
     <?= $this->Form->create($role) ?>
   
         
            <div class="form-group">
                <label>Role Name</label>
                <?php echo $this->Form->input('role', ARRAY('label' => false, 'div' => false, 'class' => 'form-control', 'id' => '','maxlength' => '50', 'placeholder' => 'Enter Role Name')); ?>
            </div>

             <?= $this->Form->button(__('Submit'),['class' => 'btn btnGreenBlue']); ?>
             <?= $this->Form->end() ?>
    </div>


    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right small-mbtm20 ">
       <h2 class="sub-header"><?= __('Actions') ?></h2>
       <ul class="listing">
            <li> <?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?>  </li>
       </ul>
    </div>

</div>
</div>

