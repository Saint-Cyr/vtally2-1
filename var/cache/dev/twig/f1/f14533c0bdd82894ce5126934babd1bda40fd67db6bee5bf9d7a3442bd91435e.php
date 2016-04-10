<?php

/* SonataBlockBundle:Block:block_base.html.twig */
class __TwigTemplate_2d320079508a9b167b609a4750d13ca0b38bb61810c8855c0c59856c740fd15c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_62b659870ac7993613b63565df85ac2d202c1f05fe8b59fb9a25effd9e826dec = $this->env->getExtension("native_profiler");
        $__internal_62b659870ac7993613b63565df85ac2d202c1f05fe8b59fb9a25effd9e826dec->enter($__internal_62b659870ac7993613b63565df85ac2d202c1f05fe8b59fb9a25effd9e826dec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataBlockBundle:Block:block_base.html.twig"));

        // line 11
        echo "<div id=\"cms-block-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id", array()), "html", null, true);
        echo "\" class=\"cms-block cms-block-element\">
    ";
        // line 12
        $this->displayBlock('block', $context, $blocks);
        // line 13
        echo "</div>
";
        
        $__internal_62b659870ac7993613b63565df85ac2d202c1f05fe8b59fb9a25effd9e826dec->leave($__internal_62b659870ac7993613b63565df85ac2d202c1f05fe8b59fb9a25effd9e826dec_prof);

    }

    // line 12
    public function block_block($context, array $blocks = array())
    {
        $__internal_8d7e5a8fb8d48b1d97a3ab61cf198b3c0a292bf23a4bef6852f8be370873ccdd = $this->env->getExtension("native_profiler");
        $__internal_8d7e5a8fb8d48b1d97a3ab61cf198b3c0a292bf23a4bef6852f8be370873ccdd->enter($__internal_8d7e5a8fb8d48b1d97a3ab61cf198b3c0a292bf23a4bef6852f8be370873ccdd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "block"));

        echo "EMPTY CONTENT";
        
        $__internal_8d7e5a8fb8d48b1d97a3ab61cf198b3c0a292bf23a4bef6852f8be370873ccdd->leave($__internal_8d7e5a8fb8d48b1d97a3ab61cf198b3c0a292bf23a4bef6852f8be370873ccdd_prof);

    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 12,  30 => 13,  28 => 12,  23 => 11,);
    }
}
/* {#*/
/* */
/* This file is part of the Sonata package.*/
/* */
/* (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>*/
/* */
/* For the full copyright and license information, please view the LICENSE*/
/* file that was distributed with this source code.*/
/* */
/* #}*/
/* <div id="cms-block-{{ block.id }}" class="cms-block cms-block-element">*/
/*     {% block block %}EMPTY CONTENT{% endblock %}*/
/* </div>*/
/* */
