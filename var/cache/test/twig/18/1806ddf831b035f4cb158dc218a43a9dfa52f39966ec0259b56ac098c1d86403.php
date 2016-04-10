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
        $__internal_5f9fa20d771c2f07781534f693dd3145e84b475f59a6ca7dc63e9145dc25b6bb = $this->env->getExtension("native_profiler");
        $__internal_5f9fa20d771c2f07781534f693dd3145e84b475f59a6ca7dc63e9145dc25b6bb->enter($__internal_5f9fa20d771c2f07781534f693dd3145e84b475f59a6ca7dc63e9145dc25b6bb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:list__batch.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5f9fa20d771c2f07781534f693dd3145e84b475f59a6ca7dc63e9145dc25b6bb->leave($__internal_5f9fa20d771c2f07781534f693dd3145e84b475f59a6ca7dc63e9145dc25b6bb_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_99ea4c0237909d5e0c42d2ca4cb4889fdcba7f2040f10287f208e0a2e87f3664 = $this->env->getExtension("native_profiler");
        $__internal_99ea4c0237909d5e0c42d2ca4cb4889fdcba7f2040f10287f208e0a2e87f3664->enter($__internal_99ea4c0237909d5e0c42d2ca4cb4889fdcba7f2040f10287f208e0a2e87f3664_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        echo "    <input type=\"checkbox\" name=\"idx[]\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"), "html", null, true);
        echo "\">
";
        
        $__internal_99ea4c0237909d5e0c42d2ca4cb4889fdcba7f2040f10287f208e0a2e87f3664->leave($__internal_99ea4c0237909d5e0c42d2ca4cb4889fdcba7f2040f10287f208e0a2e87f3664_prof);

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
