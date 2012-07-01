<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php print ($title ? $title . ' | ' : '') . $options['sitename']; ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?php print base_url('static'); ?>/css/bootstrap.min.css">
	<style>
  /* Special grid styles
-------------------------------------------------- */
  .show-grid {
    margin-top: 10px;
    margin-bottom: 20px;
  }
  .show-grid [class*="span"] {
    background-color: #eee;
    
    -webkit-border-radius: 3px;
       -moz-border-radius: 3px;
            border-radius: 3px;
    min-height: 30px;
    line-height: 30px;
  }
  .show-grid:hover [class*="span"] {
    background: #ddd;
  }
  .show-grid .show-grid {
    margin-top: 0;
    margin-bottom: 0;
  }
  .show-grid .show-grid [class*="span"] {
    background-color: #ccc;
  }

  /* Custom */
  .primary-menu { margin-top: 80px; }
  .nav-tabs .caption { font-weight: bold; padding: 8px 12px; }
  
	</style>
	<link rel="stylesheet" href="<?php print base_url('static'); ?>/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="<?php print base_url('static'); ?>/css/style.css">

	<script src="<?php print base_url('static'); ?>/js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
</head>
<body>
    <div class="container">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <img class="logo" src="<?php print base_url($options['logo']); ?>" alt="Click to homepage" />
        </div>
        <div class="span8">
          <div class="primary-menu">
            <ul class="nav nav-pills">
              <li class="active">
                <a href="#">Home</a>
              </li>
              <li><a href="#">Catalog</a></li>
              <li><a href="#">Payment</a></li>
              <li><a href="#">Members</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="span4">
          <ul class="nav nav-list well nav-member">
<?php
          if (Member::get_current_profile(FALSE)):
?>
            <li class="nav-header">Your account</li>
            <li>
              <h4>aimakun</h4>
              <span>aimakung@gmail.com</span>
            </li>
            <li>
              <div class="row">
                <div class="span3">
                  <br />
                  <a class="btn btn-danger" href="#">
                    <i class="icon-wrench icon-white"></i> Admin dashboard</a>
                </div>
              </div>
            </li>
            <li class="divider"></li>
            <li><a href="#">
              <i class="icon-user"></i> Change profile / password</a></li>
            <li>
              <a href="#"><i class="icon-list"></i> My orders</a></li>
            <li><a href="#"><i class="icon-shopping-cart"></i> My bills</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="icon-off"></i> Logout</a></li>
<?php
          else:
?>
            <li class="nav-header">Member account</li>
            <li>
              
              <form>
                <fieldset>
                <div class="control-group">

                      <!-- Text input-->
                      <label class="control-label" for="login_email">E-mail</label>
                      <div class="controls">
                        <input type="text" id="login_email" name="login_email" placeholder="" class="input-medium">
                      </div>
                    </div><div class="control-group">

                      <!-- Text input-->
                      <label class="control-label" for="input01">Password</label>
                      <div class="controls">
                        <input type="password" id="login_password" name="login_password" placeholder="" class="input-medium">
                      </div>
                    </div><div class="control-group">
                      <label class="control-label"></label>

                      <!-- Button -->
                      <div class="controls">
                        <button class="btn btn-primary">Log in</button>
                      </div>
                    </div></fieldset>
              </form>

              <a href="#">Create new account</a>
              <a href="#">Forgot password</a>
            </li>
<?php
          endif;
?>
          </ul>
          &nbsp;
          <ul class="nav nav-list well">
            <li class="nav-header">Catalog</li>
            <li><a href="#"><i class="icon-th"></i> All products</a></li>
            <li><a href="#"><i class="icon-star"></i> Sales</a></li>
            <li class="divider"></li>
            <li><a href="#">Shirts</a></li>
            <li><a href="#">Shorts</a></li>
            <li><a href="#">Garments</a></li>
            <li><a href="#">Shoes / Bags</a></li>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">Misc</a></li>
          </ul>
        </div>
        <div class="span8 main">
<?php
        if (!empty($messages)):
          foreach ($message as $type => $messages):
?>
          <div class="alert <?php print ($type != '' ? 'alert-' . $type : ''); ?> fade in">
            <a class="close" data-dismiss="alert" href="#">&times;</a>
            <?php print implode('<br />' . $messages); ?>
          </div>
<?php
          endforeach;
        endif;
?>
<?php
        if ($page_title):
?>
          <h2><?php print $page_title; ?></h2>
<?php
        endif;
?>
          <div class="content">
            <?php print $content; ?>
          </div>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->
<script>window.jQuery || document.write('<script src="<?php print base_url('static'); ?>/js/libs/jquery-1.7.2.min.js"><\/script>')</script>

<script src="<?php print base_url('static'); ?>/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php print base_url('static'); ?>/js/libs/bootstrap/alert.js"></script>

<script src="<?php print base_url('static'); ?>/js/script.js"></script>
</body>
</html>
