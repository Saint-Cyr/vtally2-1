<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_0053e4bb721fd908533e0a12add404c534df52b0b03993680c313d8612a9cb0e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c84dbd47705371c115cf8fcd2511ceeef5e3bbf548a8c6b1e0bc0e3cbb45eebe = $this->env->getExtension("native_profiler");
        $__internal_c84dbd47705371c115cf8fcd2511ceeef5e3bbf548a8c6b1e0bc0e3cbb45eebe->enter($__internal_c84dbd47705371c115cf8fcd2511ceeef5e3bbf548a8c6b1e0bc0e3cbb45eebe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c84dbd47705371c115cf8fcd2511ceeef5e3bbf548a8c6b1e0bc0e3cbb45eebe->leave($__internal_c84dbd47705371c115cf8fcd2511ceeef5e3bbf548a8c6b1e0bc0e3cbb45eebe_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_7e3913e39bb1d3d288ca4e6b0877e2a2dc3d663a9e2f50297797c454c267f0b9 = $this->env->getExtension("native_profiler");
        $__internal_7e3913e39bb1d3d288ca4e6b0877e2a2dc3d663a9e2f50297797c454c267f0b9->enter($__internal_7e3913e39bb1d3d288ca4e6b0877e2a2dc3d663a9e2f50297797c454c267f0b9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_7e3913e39bb1d3d288ca4e6b0877e2a2dc3d663a9e2f50297797c454c267f0b9->leave($__internal_7e3913e39bb1d3d288ca4e6b0877e2a2dc3d663a9e2f50297797c454c267f0b9_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_8a3e5b5dbc5b8094bf21fc7fa3f859a1563d2d460731fd6ac37fd536b0201b0a = $this->env->getExtension("native_profiler");
        $__internal_8a3e5b5dbc5b8094bf21fc7fa3f859a1563d2d460731fd6ac37fd536b0201b0a->enter($__internal_8a3e5b5dbc5b8094bf21fc7fa3f859a1563d2d460731fd6ac37fd536b0201b0a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_8a3e5b5dbc5b8094bf21fc7fa3f859a1563d2d460731fd6ac37fd536b0201b0a->leave($__internal_8a3e5b5dbc5b8094bf21fc7fa3f859a1563d2d460731fd6ac37fd536b0201b0a_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_b8278280eb3eca8c68116fade129d7859e2bd90531feeee3de97af357d604f3c = $this->env->getExtension("native_profiler");
        $__internal_b8278280eb3eca8c68116fade129d7859e2bd90531feeee3de97af357d604f3c->enter($__internal_b8278280eb3eca8c68116fade129d7859e2bd90531feeee3de97af357d604f3c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_b8278280eb3eca8c68116fade129d7859e2bd90531feeee3de97af357d604f3c->leave($__internal_b8278280eb3eca8c68116fade129d7859e2bd90531feeee3de97af357d604f3c_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
