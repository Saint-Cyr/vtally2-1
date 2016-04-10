<?php

/* SonataAdminBundle:CRUD:edit_file.html.twig */
class __TwigTemplate_c3baec0b54b446ba34a8452122b026074605d6bd5b3382be5c580140500ba069 extends Twig_Template
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
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:edit_file.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e2f59c7773f120c7330feddf69e986f5bbc77d5489f81f80eaca7546472eee70 = $this->env->getExtension("native_profiler");
        $__internal_e2f59c7773f120c7330feddf69e986f5bbc77d5489f81f80eaca7546472eee70->enter($__internal_e2f59c7773f120c7330feddf69e986f5bbc77d5489f81f80eaca7546472eee70_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:edit_file.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e2f59c7773f120c7330feddf69e986f5bbc77d5489f81f80eaca7546472eee70->leave($__internal_e2f59c7773f120c7330feddf69e986f5bbc77d5489f81f80eaca7546472eee70_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_0f5395e12587068d17ab019fbd0a1b0b55a85a2f8c674db0df0eaa3ed4b3873a = $this->env->getExtension("native_profiler");
        $__internal_0f5395e12587068d17ab019fbd0a1b0b55a85a2f8c674db0df0eaa3ed4b3873a->enter($__internal_0f5395e12587068d17ab019fbd0a1b0b55a85a2f8c674db0df0eaa3ed4b3873a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'widget', array("attr" => array("class" => "title")));
        
        $__internal_0f5395e12587068d17ab019fbd0a1b0b55a85a2f8c674db0df0eaa3ed4b3873a->leave($__internal_0f5395e12587068d17ab019fbd0a1b0b55a85a2f8c674db0df0eaa3ed4b3873a_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:edit_file.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 14,  18 => 12,);
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
/* {% extends base_template %}*/
/* */
/* {% block field %}{{ form_widget(field_element, {'attr': {'class' : 'title'}}) }}{% endblock %}*/
/* */
