<?php
/**
 * @file page.php
 *
 * Template view for front-end pages.
 *
 * Available variables:
 * $html_preload: client-side resource loader as HTML for local actions which need to load before render any content.
 * $header: HTML blocks which shown above global header elements (logo, accessibility helper, main menu, etc.)
 * $menu: Rendered main menu block with active menu in current page.
 * $content: Rendered content for current page, they may be rendered from another view.
 * $sidebar_menu: Rendered side menu block with active menu in current page.
 * $footer: HTML blocks which show in the end of the page.
 * $html_postload: client-side resource loaders as HTML for local actions, they may not need to load before content has been rendered.
 * 
 * Note for developers:
 * Any variables could be rendered from another views as data (set the last parameter with boolean TRUE), for example:
 * $output['html_preload'] = $this->load->view('anotherview', $some_parameters, TRUE);
 * // Another variables render here.
 * $this->load->view('frontend_page', $output);
 * 
 */
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php print !empty($page_title) ? $page_title . ' | ' : ''; ?>aishop</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="<?php print base_url('static/css/base.css'); ?>">
  <link rel="stylesheet" href="<?php print base_url('static/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php print base_url('static/css/style.css'); ?>">

  <script src="<?php print base_url('static/js/libs/modernizr-2.5.3.min.js'); ?>"></script>
  <script src="<?php print base_url('static/js/libs/jquery-1.7.1.min.js'); ?>"></script>
  <script src="<?php print base_url('static/js/bootstrap.min.js'); ?>"></script>
  <?php
  if (isset($html_preload))
  {
    print $html_preload;
  }
  ?>
</head>
<body class="container">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header class="row">
    <?php 
    if (isset($header))
    {
        print $header;
    }
    ?>
    <div class="accessibility">
        <a href="#main">Skip to main content</a>
    </div>
    <div class="logo span3">
        <a href="<?php print base_url(); ?>"><img src="<?php print base_url('static/img/logo.jpg'); ?>" alt="Back to homepage" title="Click here to homepage" /></a>
    </div>
    <nav class="menu span9">
        <?php
        if (isset($menu))
        {
            print $menu;
        }
        ?>
    </nav>
  </header>
  <div id="main" class="row" role="main">      
    <aside class="span3">
        <nav>
            <?php 
            if (isset($sidebar_menu))
            {
                print $sidebar_menu;
            }
            ?>
        </nav>
    </aside>
    <div class="main-content span9">
        <?php
        // Show status message from session flashdata (one-time message).
        
        $status_message = $this->session->flashdata('status_message');
        if ($status_message): 
            foreach ($status_message as $type => $message):
        ?>
        <div class="alert alert-<?php print $type; ?>">
            <?php print $message; ?>
        </div>
        <?php
            endforeach;
        endif;
        ?>
    <?php if (isset($members_block)): ?>
        <div id="members_block">
            <?php print $members_block; ?>
        </div>
    <?php endif; ?>
        <?php if (!empty($page_title)): ?>
        <h1><?php print $page_title; ?></h1>
        <?php endif; ?>
    <?php
    if (isset($content))
    {
        print $content;
    }
    ?>
    </div>
  </div>
  <footer>
    <?php
    if (isset($footer))
    {
        print $footer;
    }
    ?>
  </footer>
  
  <script src="<?php print base_url('static/js/plugins.js'); ?>"></script>
  <script src="<?php print base_url('static/js/script.js'); ?>"></script>

  <script>
      /*
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
    */
  </script>
  <?php
  if (isset($html_postload))
  {
    print $html_postload;
  }
  ?>
</body>
</html>
