<?php

/* SonataBlockBundle:Block:block_exception.html.twig */
class __TwigTemplate_27da133d19dd934cdaa40e272dd4736c2dd114151caee1c0604320502e5df0c3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate($this->getAttribute($this->getAttribute((isset($context["sonata_block"]) ? $context["sonata_block"] : $this->getContext($context, "sonata_block")), "templates", array()), "block_base", array()), "SonataBlockBundle:Block:block_exception.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5e095dbe662f464efe53440ad68dcc9d9d64bb42cc48d617e10570c7e121ea4c = $this->env->getExtension("native_profiler");
        $__internal_5e095dbe662f464efe53440ad68dcc9d9d64bb42cc48d617e10570c7e121ea4c->enter($__internal_5e095dbe662f464efe53440ad68dcc9d9d64bb42cc48d617e10570c7e121ea4c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataBlockBundle:Block:block_exception.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5e095dbe662f464efe53440ad68dcc9d9d64bb42cc48d617e10570c7e121ea4c->leave($__internal_5e095dbe662f464efe53440ad68dcc9d9d64bb42cc48d617e10570c7e121ea4c_prof);

    }

    // line 14
    public function block_block($context, array $blocks = array())
    {
        $__internal_fa11b0d448079f4ba1809ce594cc8b2bc8592506b5fb982fef355794b3a95df2 = $this->env->getExtension("native_profiler");
        $__internal_fa11b0d448079f4ba1809ce594cc8b2bc8592506b5fb982fef355794b3a95df2->enter($__internal_fa11b0d448079f4ba1809ce594cc8b2bc8592506b5fb982fef355794b3a95df2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "block"));

        // line 15
        echo "    <div class=\"cms-block-exception\">
        <h2>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "name", array()), "html", null, true);
        echo "</h2>
        <h3>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo "</h3>
    </div>
";
        
        $__internal_fa11b0d448079f4ba1809ce594cc8b2bc8592506b5fb982fef355794b3a95df2->leave($__internal_fa11b0d448079f4ba1809ce594cc8b2bc8592506b5fb982fef355794b3a95df2_prof);

    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 17,  42 => 16,  39 => 15,  33 => 14,  18 => 12,);
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
/* */
/* {% extends sonata_block.templates.block_base %}*/
/* */
/* {% block block %}*/
/*     <div class="cms-block-exception">*/
/*         <h2>{{ block.name }}</h2>*/
/*         <h3>{{ exception.message }}</h3>*/
/*     </div>*/
/* {% endblock %}*/
/* */
