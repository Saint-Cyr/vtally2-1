<?php

/* SonataAdminBundle:CRUD:edit_text.html.twig */
class __TwigTemplate_e5ece6119e258a92089001c777170b2e49b300f7434d7548b81d313818b00c2b extends Twig_Template
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
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:edit_text.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d43f8f944d4d2e4c2219bbad31f5f8f632adf02ba7c847e2c0c01c04128a40fc = $this->env->getExtension("native_profiler");
        $__internal_d43f8f944d4d2e4c2219bbad31f5f8f632adf02ba7c847e2c0c01c04128a40fc->enter($__internal_d43f8f944d4d2e4c2219bbad31f5f8f632adf02ba7c847e2c0c01c04128a40fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:edit_text.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d43f8f944d4d2e4c2219bbad31f5f8f632adf02ba7c847e2c0c01c04128a40fc->leave($__internal_d43f8f944d4d2e4c2219bbad31f5f8f632adf02ba7c847e2c0c01c04128a40fc_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_28bff36f91ce2b3fdf16d397e206349e6105d64ef6e958c0c988e08ebd028e8c = $this->env->getExtension("native_profiler");
        $__internal_28bff36f91ce2b3fdf16d397e206349e6105d64ef6e958c0c988e08ebd028e8c->enter($__internal_28bff36f91ce2b3fdf16d397e206349e6105d64ef6e958c0c988e08ebd028e8c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'widget', array("attr" => array("class" => "title")));
        
        $__internal_28bff36f91ce2b3fdf16d397e206349e6105d64ef6e958c0c988e08ebd028e8c->leave($__internal_28bff36f91ce2b3fdf16d397e206349e6105d64ef6e958c0c988e08ebd028e8c_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:edit_text.html.twig";
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
