<?php

/* PhotoPoolPoolBundle:Page:index.html.twig */
class __TwigTemplate_26c522cad1a628d78b39488a5b2319f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("PhotoPoolPoolBundle::layout.html.twig");

        $this->blocks = array(
            'viewer' => array($this, 'block_viewer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PhotoPoolPoolBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_viewer($context, array $blocks = array())
    {
        // line 4
        echo "    <h2 id=\"serieTitle\"></h2>
      
      <div id=\"photos\"></div>

      <div id=\"scroller\" class=\"jThumbnailScroller\">
        <div class=\"jTscrollerContainer\">
          <div id=\"thumbs\" class=\"jTscroller\"></div>
        </div>
      </div>
";
    }

    public function getTemplateName()
    {
        return "PhotoPoolPoolBundle:Page:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 4,  26 => 3,);
    }
}
