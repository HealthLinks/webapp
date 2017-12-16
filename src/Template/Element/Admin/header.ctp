<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
    <div class="navbar-header">
       
        <div class="logo">
          <?php echo $this->Html->image('admin/logo.png', array('alt' => 'HealthLink', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?>

    </div>
    </div>
     <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas"> <span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span> </button>
    <!-- Top Menu Items -->
    <div id="navbar">
    <ul class="nav navbar-right top-nav">
           
             <li class="dropdown">
               <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-user"></i> 
<span>
                <?php echo '<b>Welcome</b> ','&nbsp';echo $this->request->session()->read('Auth.User.username'); ?></span>

                 <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <?php echo $this->Html->link('<i class="fa fa-fw fa-user"></i>Update Profile',array('controller'=>'Users','action'=>'editProfile','admin' => false),array('escape' => FALSE));
                 ?>
                </li>
                <li>
                    
                	<?php echo $this->Html->link('<i class="fa fa-fw fa-lock"></i>Change Password',array('controller'=>'Users','action'=>'changePassword','admin' => false),array('escape' => FALSE));
                	?>
                </li>
                <li class="divider"></li>
                <li>
                 <?php echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Log Out',array('controller'=>'Admin','action'=>'logout','admin' => true),array('escape' => FALSE));
                 ?>
                </li>
            </ul>
        </li>
        
        
    </ul>
    </div>
    </div>
    </nav>
