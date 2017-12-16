<?php echo $this->element('Admin/header');
echo $this->element('Admin/sidebar');
  ?>  <div id="page-content-wrapper">
  <div class="row">
<div class="col-lg-12">
 <h1 class="page-header">
<i class="fa fa-group"></i>  <?php echo __('Users'); ?>
    <ol class="breadcrumb">
            <li>
               <?php echo $this->Html->link('Dashboard',array('controller'=>'Admin','action'=>'index','admin' => false),array('escape' => FALSE)); ?>
            </li>

            <li>
                <?php echo $this->Html->link('Users',array('controller'=>'users','action'=>'index','admin' => FALSE),array('escape' => FALSE)); ?>
            </li>

            <li class="active">
                View User
            </li>
        </ol>
</h1> 
</div>

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
     <h2 class="sub-header">    <?php echo __('User Detail'); ?></h2>
  

    <div class="table-responsive">
    

        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Username') ?></th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Role') ?></th>
                <td><?= h($user->role->role) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($user->modified) ?></td>
            </tr>
            <tr>
                <th><?= __('Status') ?></th>
                <td><?= $user->status ? __('Active') : __('Inactive'); ?></td>
             </tr>
        </table>
    </div>

</div>


<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right small-mbtm20 ">
       <h2 class="sub-header"><?= __('Actions') ?></h2>
    
        <ul class="listing">
            <?php if($user['role'] != 'admin') { ?>
              <li> <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
                
              
            <?php } ?>
                
                
                <li> <?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
                 <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li> 
                
                </ul>
       
</div>
</div>
</div>