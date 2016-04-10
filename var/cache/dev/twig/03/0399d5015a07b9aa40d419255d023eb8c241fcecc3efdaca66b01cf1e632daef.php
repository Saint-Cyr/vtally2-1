<?php

/* SonataAdminBundle:CRUD:edit_integer.html.twig */
class __TwigTemplate_c19a4d24cb3b2f9b0875a11bb4fb5cdd25ff743cb5271017267eb2a3443046ff extends Twig_Template
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
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:edit_integer.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6399f96e417af8eddd5c886666f82543fcca9ac38ab4eaa4568de13c08627973 = $this->env->getExtension("native_profiler");
        $__internal_6399f96e417af8eddd5c886666f82543fcca9ac38ab4eaa4568de13c08627973->enter($__internal_6399f96e417af8eddd5c886666f82543fcca9ac38ab4eaa4568de13c08627973_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:edit_integer.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6399f96e417af8eddd5c886666f82543fcca9ac38ab4eaa4568de13c08627973->leave($__internal_6399f96e417af8eddd5c886666f82543fcca9ac38ab4eaa4568de13c08627973_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_78d65d31f49d1766ef53f398b52421142dcfc3cae2e16b8bef769703f57d785d = $this->env->getExtension("native_profiler");
        $__internal_78d65d31f49d1766ef53f398b52421142dcfc3cae2e16b8bef769703f57d785d->enter($__internal_78d65d31f49d1766ef53f398b52421142dcfc3cae2e16b8bef769703f57d785d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'widget', array("attr" => array("class" => "title")));
        
        $__internal_78d65d31f49d1766ef53f398b52421142dcfc3cae2e16b8bef769703f57d785d->leave($__internal_78d65d31f49d1766ef53f398b52421142dcfc3cae2e16b8bef769703f57d785d_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:edit_integer.html.twig";
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
