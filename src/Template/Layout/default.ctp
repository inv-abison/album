<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
	<?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('bootstrap-responsive.css') ?>
        <?= $this->Html->css('style.css') ?>
        <?= $this->Html->css('../color/default.css') ?>
        <?= $this->Html->css('lightgallery.min.css') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
        <?= $this->Html->script("jquery.js"); ?>
         <?= $this->Html->script("jquery.scrollTo.js"); ?>
         <?= $this->Html->script("jquery.nav.js"); ?>
         <?= $this->Html->script("jquery.localScroll.js"); ?>
         <?= $this->Html->script("bootstrap.js"); ?>
         <?= $this->Html->script("lightgallery-all.min.js"); ?>
         <?= $this->Html->script("animate.js"); ?>
         <?= $this->Html->script("custom.js"); ?>
        <?= $this->fetch('script') ?>

        <!-- =======================================================
    Theme Name: Maxim
    Theme URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
        ======================================================= -->
    </head>
    <body>
        <!-- navbar -->
        <div class="navbar-wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <!-- Responsive navbar -->
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </a>
                        <h1 class="brand"><a href="index.html">Album</a></h1>
                        <!-- navigation -->
                        <nav class="pull-right nav-collapse collapse">
                            <ul id="menu-main" class="nav">
                                <li><a title="works" href="#works">About</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header area -->
	 <?= $this->Flash->render() ?>
	<?php  echo $this->fetch('content'); ?>   

        <footer>
            <div class="container">
                <div class="row">
                    <div class="span6 offset3">
                        <ul class="social-networks">
                            <li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
                            <li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
                            <li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
                            <li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
                        </ul>
                        <p class="copyright">
                            &copy; All rights reserved.
                        <div class="credits">
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <!-- ./container -->
        </footer>
        <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>


    </body>
</html>
