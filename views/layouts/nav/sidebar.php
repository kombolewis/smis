<?php

/** @var yii\web\View $this */
/** @var string $content */
use kartik\sidenav\SideNav;
# https://stackoverflow.com/a/51372660/19408762 ---Implement Variable passing to determine Sidebar Menu
//print_r(Yii::$app->controller->module->id);exit;
//$menuCtx = $this->params['menu'];
$menu = require Yii::$app->layoutPath . '/menu/site-menu.php';
//exit($menu);
//print_r($menu);exit;
?>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-2">
            <?php
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'encodeLabels' => false,
                'containerOptions' => ['class'=>'border-0'],
//    'heading' => '<i class="fas fa-cog"></i> ' . $menuCtx,
                'items' => $menu[Yii::$app->controller->module->id],
            ]);
            ?>
        </div>
    </nav>
<?php
$this->registerCss(
<<<CSS

/*
 * Sidebar
 */

.sidebar {
  position: fixed;
  top: 0;
  /* rtl:raw:
  right: 0;
  */
  bottom: 0;
  /* rtl:remove */
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
  background-color: navy !important;
}

@media (max-width: 767.98px) {
  .sidebar {
    top: 5rem;
  }
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

/*.sidebar .nav-link {*/
/*  font-weight: 500;*/
/*  color: #333;*/
/*}*/

/*.sidebar .nav-link .feather {*/
/*  margin-right: 4px;*/
/*  color: #727272;*/
/*}*/

/*.sidebar .nav-link.active {*/
/*  color: #2470dc;*/
/*}*/

/*.sidebar .nav-link:hover .feather,*/
/*.sidebar .nav-link.active .feather {*/
/*  color: inherit;*/
/*}*/

/*.sidebar-heading {*/
/*  font-size: .75rem;*/
/*  text-transform: uppercase;*/
/*}*/

CSS

);