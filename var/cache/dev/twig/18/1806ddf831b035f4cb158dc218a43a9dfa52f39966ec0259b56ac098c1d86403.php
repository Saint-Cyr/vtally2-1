<?php

/* SonataAdminBundle:CRUD:list__batch.html.twig */
class __TwigTemplate_b6931ae31a77cb8b6879b81b92555e47ca5c96d35f29a69893f45e90fb4c1b23 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"), "SonataAdminBundle:CRUD:list__batch.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a54b75ea489b816f8ba3e82643d047eb09c9d8f1db3db1cd449ec12330b04430 = $this->env->getExtension("native_profiler");
        $__internal_a54b75ea489b816f8ba3e82643d047eb09c9d8f1db3db1cd449ec12330b04430->enter($__internal_a54b75ea489b816f8ba3e82643d047eb09c9d8f1db3db1cd449ec12330b04430_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:list__batch.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a54b75ea489b816f8ba3e82643d047eb09c9d8f1db3db1cd449ec12330b04430->leave($__internal_a54b75ea489b816f8ba3e82643d047eb09c9d8f1db3db1cd449ec12330b04430_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_14396c3789ce2758fb66b41a808db392c057b4e556e49d996c822358ac2ee7a6 = $this->env->getExtension("native_profiler");
        $__internal_14396c3789ce2758fb66b41a808db392c057b4e556e49d996c822358ac2ee7a6->enter($__internal_14396c3789ce2758fb66b41a808db392c057b4e556e49d996c822358ac2ee7a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        echo "    <input type=\"checkbox\" name=\"idx[]\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"), "html", null, true);
        echo "\">
";
        
        $__internal_14396c3789ce2758fb66b41a808db392c057b4e556e49d996c822358ac2ee7a6->leave($__internal_14396c3789ce2758fb66b41a808db392c057b4e556e49d996c822358ac2ee7a6_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list__batch.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 15,  33 => 14,  18 => 12,);
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
/* {% extends admin.getTemplate('base_list_field') %}*/
/* */
/* {% block field %}*/
/*     <input type="checkbox" name="idx[]" value="{{ admin.id(object) }}">*/
/* {% endblock %}*/
/* */
