<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Test Site :: ADMIN Panel';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		// Bootstrap Core CSS
	    echo $this->Html->css(HOME_URL.'/vendor/bootstrap/css/bootstrap.min.css');
    
		// MetisMenu CSS
		echo $this->Html->css(HOME_URL.'/vendor/metisMenu/metisMenu.min.css');

		// Custom CSS
		echo $this->Html->css(HOME_URL.'/dist/css/sb-admin-2.css');
		
		// Morris Charts CSS
		echo $this->Html->css(HOME_URL.'/vendor/morrisjs/morris.css');
		
		// Custom Fonts
		echo $this->Html->css(HOME_URL.'/vendor/font-awesome/css/font-awesome.min.css');
		?>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php

        echo $this->Html->css('admin/custom-style');
        echo $this->Html->css('sweetalert.css');
		
 		echo $this->Html->script(HOME_URL.'/vendor/jquery/jquery.min.js');
 		// Bootstrap Core JavaScript
        echo $this->Html->script(HOME_URL.'/vendor/bootstrap/js/bootstrap.min.js');
		
		// Metis Menu Plugin JavaScript
		echo $this->Html->script(HOME_URL.'/vendor/metisMenu/metisMenu.min.js');
		
		// Morris Charts JavaScript
		echo $this->Html->script(HOME_URL.'/vendor/raphael/raphael.min.js');
		echo $this->Html->script(HOME_URL.'/vendor/morrisjs/morris.min.js');
		echo $this->Html->script(HOME_URL.'/data/morris-data.js');
		
		// Custom Theme JavaScript
		echo $this->Html->script(HOME_URL.'/dist/js/sb-admin-2.js');
		
		// Sweetalert JavaScript
        echo $this->Html->script('sweetalert.min.js');
  
?>
</head>

<body>

<div id="wrapper" class="toggled">
<div id="page-wrapper">

<!-- Sidebar.ctp in Elements -->
<?php if(isset($loggedIn) && $loggedIn === true): //check whether a user logged in or not
?>

<?php echo $this->element('Admin/header');
echo $this->element('Admin/sidebar');
  ?>
 
    <div class="container-fluid">
     <!-- Page Heading -->
        <div class="row">

      
         <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-dashboard"></i><?= __('Dashboard') ?>
                   <ol class="breadcrumb">
                        <li class="active">
                            Dashboard
                        </li>
                    </ol>
            </h1>
        </div>
       
        </div>
        <!-- /.row -->
         <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
   
<!-- /#wrapper -->
<?php else: ?>

    <div class="container-fluid">
     <!-- Page Heading -->
         <div class="row">
            <div class="col-lg-12">
            </div>
        </div> 
        <!-- /.row -->

         <?= $this->Flash->render() ?>

         <?= $this->fetch('content') ?>
     </div> 

<?php endif; ?>   
 <!-- /.container-fluid -->
	</div>
<!-- /#page-wrapper -->

</div>

<?php //echo $this->element('sql_dump'); ?>



</body>
</html>