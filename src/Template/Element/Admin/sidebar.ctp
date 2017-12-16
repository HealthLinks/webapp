    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation"><!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
			<?php echo $this->Html->image('user-dummy.png',["class"=>"img-circle", "alt"=>"User Image"]); ?>
           </div>
            <div class="pull-left info">
              <p><?php echo $this->request->session()->read('Auth.User.username'); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
       <ul class="nav sidebar-nav">
              <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if(($this->request->params['controller']=='Admin')
                                   && ($this->request->params['action']=='index')
                                ){
                                    echo 'active';
                                  } ?>" >
            <?php echo $this->Html->link('<i class="fa fa-dashboard"></i> Dashboard',array('controller'=>'Admin','action'=>'index','admin' => false),array('escape' => FALSE));
                 ?>
            </li>
            <li class="<?php if(($this->request->params['controller']=='Users')
                                   && ($this->request->params['action']=='index' || $this->request->params['action']=='edit' || $this->request->params['action']=='add' || $this->request->params['action']=='view' )
                                ){
                                    echo 'active';
                                  } ?>" >
                 <?php echo $this->Html->link('<i class="fa fa-group"></i> Users',array('controller'=>'Users','action'=>'index','admin' => false),array('escape' => FALSE));
                 ?>
            </li>
			<li class="<?php if(($this->request->params['controller']=='Roles')
                                   && ($this->request->params['action']=='index' || $this->request->params['action']=='edit' || $this->request->params['action']=='add')
                                ){
                                    echo 'active';
                                  } ?>" >
                 <?php echo $this->Html->link('<i class="fa fa-group"></i> Roles',array('controller'=>'Roles','action'=>'index','admin' => false),array('escape' => FALSE));
                 ?>
            </li>
           
        </ul>
    </nav>
    <!-- /.navbar-collapse -->


    <script>
$(document).ready(function () {
  var trigger = $('.hamburger'),
    isClosed = false;
    trigger.click(function () {
   hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
         trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
       trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});
</script>

