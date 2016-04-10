<?php

/* SonataAdminBundle:CRUD:edit_string.html.twig */
class __TwigTemplate_642af230efd4704d7794298a641d41b5bff32abd7a700dc392480ca3f244a746 extends Twig_Template
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
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:edit_string.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c003d9059156ae0442196241a671c1a28d8cd82457aee8968976d2ed861e2339 = $this->env->getExtension("native_profiler");
        $__internal_c003d9059156ae0442196241a671c1a28d8cd82457aee8968976d2ed861e2339->enter($__internal_c003d9059156ae0442196241a671c1a28d8cd82457aee8968976d2ed861e2339_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:edit_string.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c003d9059156ae0442196241a671c1a28d8cd82457aee8968976d2ed861e2339->leave($__internal_c003d9059156ae0442196241a671c1a28d8cd82457aee8968976d2ed861e2339_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_03e88cb7fd6f1f18db511444bfd56120b4297e5789b7624cef8183efcd78a9bf = $this->env->getExtension("native_profiler");
        $__internal_03e88cb7fd6f1f18db511444bfd56120b4297e5789b7624cef8183efcd78a9bf->enter($__internal_03e88cb7fd6f1f18db511444bfd56120b4297e5789b7624cef8183efcd78a9bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["field_element"]) ? $context["field_element"] : $this->getContext($context, "field_element")), 'widget', array("attr" => array("class" => "title")));
        
        $__internal_03e88cb7fd6f1f18db511444bfd56120b4297e5789b7624cef8183efcd78a9bf->leave($__internal_03e88cb7fd6f1f18db511444bfd56120b4297e5789b7624cef8183efcd78a9bf_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:edit_string.html.twig";
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
