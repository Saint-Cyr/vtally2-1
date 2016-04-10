<?php

/* SonataAdminBundle:CRUD:list_percent.html.twig */
class __TwigTemplate_d0f89908dc2685ef0dec02829ae3fcd952342dd3ee373a48edbdb2d85eaffe9c extends Twig_Template
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
        return $this->loadTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"), "SonataAdminBundle:CRUD:list_percent.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b5fc1be52f13d6398f551244b3757fd1fed4026f3c1eb5fc5ec50de0cbf75fee = $this->env->getExtension("native_profiler");
        $__internal_b5fc1be52f13d6398f551244b3757fd1fed4026f3c1eb5fc5ec50de0cbf75fee->enter($__internal_b5fc1be52f13d6398f551244b3757fd1fed4026f3c1eb5fc5ec50de0cbf75fee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:list_percent.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b5fc1be52f13d6398f551244b3757fd1fed4026f3c1eb5fc5ec50de0cbf75fee->leave($__internal_b5fc1be52f13d6398f551244b3757fd1fed4026f3c1eb5fc5ec50de0cbf75fee_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_b7a8449e58811939ab8c79834f47cd49706711b618f41b3f3fc4873bfa603943 = $this->env->getExtension("native_profiler");
        $__internal_b7a8449e58811939ab8c79834f47cd49706711b618f41b3f3fc4873bfa603943->enter($__internal_b7a8449e58811939ab8c79834f47cd49706711b618f41b3f3fc4873bfa603943_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        echo "    ";
        $context["value"] = ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")) * 100);
        // line 16
        echo "    ";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
        echo " %
";
        
        $__internal_b7a8449e58811939ab8c79834f47cd49706711b618f41b3f3fc4873bfa603943->leave($__internal_b7a8449e58811939ab8c79834f47cd49706711b618f41b3f3fc4873bfa603943_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_percent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 16,  39 => 15,  33 => 14,  18 => 12,);
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
/*     {% set value = value * 100 %}*/
/*     {{ value }} %*/
/* {% endblock %}*/
/* */
