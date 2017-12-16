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
		<li class="active">
		    Users
		</li>
		</ol>
        </h1>

 <div class="row">
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?php echo $this->Html->link(__('Add New User'), array('action' => 'add'),['class'=> 'btn btnGreenBlue']); ?> 
</div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 alignrtl" >
        <?= $this->Form->create($users) ?>
            <?php echo 'Show'.' '.$this->Form->select('page',['5'=>'5','10'=>'10','15'=>'15'],['onchange'=>'this.form.submit()','class'=>'select-style smallSelect']).' '.' &nbsp;&nbsp;records per page'; ?>
            <?= $this->Form->end() ?>
        </div> 
        </div>
     <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <!-- <th><?= $this->Paginator->sort('password') ?></th> -->
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('role') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                   <!--  <td><?= h($user->password) ?></td> -->
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->role->role) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],['class'=>' viewIcon actionIcon']) ?>
                    <?php if($user['role'] != 'admin') { ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class'=>' editIcon actionIcon']) ?>

                        <?= $this->Form->button('Delete', array(
                        'type' => 'button',
                        'class'=>"deleteIcon actionIcon",
                        'onclick' => "deleteID($user->id);",
                        ));  ?>
                    <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>

       
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
      
        </div>
   
    </div>
</div>
   </div>

<script type="text/javascript">
function deleteID(id)
{
  swal({
  title: "Are you sure?",
  text: "You will not be able to recover this User!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    if(document.domain == 'localhost'){
       var url = '/health-link/admin/users/delete/'+id;
    }else{
        var url = '/admin/users/delete/'+id;
    }
    swal("Deleted!", "User has been deleted.", "success");
    window.location.href = url;
    }else {
    swal("Cancelled", "Your User is safe", "error");
  }
});

}
</script>