<?php

/* PhotoPoolPoolBundle::layout.html.twig */
class __TwigTemplate_a2fd0cb40d24e609789a2462d6c49adc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "    <h1><a href=\".\">Manuel Devier</a></h1>
      <ul id=\"menu\">
        ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "pool"), "getCategories", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 7
            echo "          <li class=\"expand\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cat"), "name"), "html", null, true);
            echo "
            <ul style=\"display: none\" id=\"l_";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cat"), "id"), "html", null, true);
            echo "\">
          ";
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "cat"), "sub"));
            foreach ($context['_seq'] as $context["_key"] => $context["subcat"]) {
                // line 10
                echo "            <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subcat"), "path"), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subcat"), "id"), "html", null, true);
                echo "\" class=\"gallerie\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subcat"), "name"), "html", null, true);
                echo "</a></li>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subcat'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 12
            echo "          </ul>
          </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 15
        echo "      </ul>
";
    }

    public function getTemplateName()
    {
        return "PhotoPoolPoolBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 15,  63 => 12,  50 => 10,  46 => 9,  42 => 8,  37 => 7,  33 => 6,  29 => 4,  26 => 3,);
    }
}
