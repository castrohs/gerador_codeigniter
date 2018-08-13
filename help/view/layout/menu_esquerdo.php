 <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="inicial.php" class="site_title"><img src="imagens/logo_gescom_neg.png"></a>
            </div>

            <div class="clearfix"></div>
			
			
			
            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="uploads/usuario/<?php echo $linhauser['id_usuario']; ?>.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem vindo,</span>
               <h2><?php echo $linhauser['nome']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include "sidebar_menu.php"; ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
<!--            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>