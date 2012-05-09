<?php

/* ::base.html.twig */
class __TwigTemplate_daace18631cecf53e8dff1f042baa2db extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'sidebar' => array($this, 'block_sidebar'),
            'viewer' => array($this, 'block_viewer'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<!--[if lt IE 7]> <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>    <html class=\"no-js lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>    <html class=\"no-js lt-ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"en\"> <!--<![endif]-->
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
  <title></title>
  <meta name=\"description\" content=\"\">

  <meta name=\"viewport\" content=\"width=device-width\">
        ";
        // line 13
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>


    <div role=\"main\">
    <div id=\"sidebar\">
      ";
        // line 28
        $this->displayBlock('sidebar', $context, $blocks);
        // line 29
        echo "    </div>
    <div id=\"viewer\">
      ";
        // line 31
        $this->displayBlock('viewer', $context, $blocks);
        // line 32
        echo "      
    </div>

  </div>
  <footer>
    ";
        // line 37
        $this->displayBlock('footer', $context, $blocks);
        // line 38
        echo "  </footer>

        ";
        // line 40
        $this->displayBlock('javascripts', $context, $blocks);
        // line 50
        echo "    </body>
</html>";
    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 14
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
            <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
            <link href='http://fonts.googleapis.com/css?family=Sue+Ellen+Francisco' rel='stylesheet' type='text/css'>
          <link href='http://fonts.googleapis.com/css?family=Amatic+SC' rel='stylesheet' type='text/css'>
          <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/chocolat.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
          <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jquery.thumbnailScroller.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
        ";
    }

    // line 28
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 31
    public function block_viewer($context, array $blocks = array())
    {
    }

    // line 37
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 40
    public function block_javascripts($context, array $blocks = array())
    {
        // line 41
        echo "
        <script>window.jQuery || document.write('<script src=\"js/libs/jquery-1.7.1.min.js\"><\\/script>')</script>
        <script src=\"js/jquery-ui-1.8.13.custom.min.js\"></script>
        <script src=\"js/jquery.thumbnailScroller.js\"></script>
        <script src=\"js/jquery.chocolat.js\"></script>
        <script src=\"js/plugins.js\"></script>
        <script src=\"js/script.js\"></script>

  ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 41,  116 => 40,  111 => 37,  106 => 31,  101 => 28,  95 => 19,  91 => 18,  85 => 15,  80 => 14,  77 => 13,  72 => 50,  70 => 40,  66 => 38,  64 => 37,  57 => 32,  55 => 31,  51 => 29,  49 => 28,  38 => 21,  36 => 13,  22 => 1,  71 => 15,  63 => 12,  50 => 10,  46 => 9,  42 => 8,  37 => 7,  33 => 6,  29 => 4,  26 => 3,);
    }
}
