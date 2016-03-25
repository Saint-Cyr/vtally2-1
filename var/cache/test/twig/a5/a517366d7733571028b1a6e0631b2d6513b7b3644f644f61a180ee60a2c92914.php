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
        $__internal_aff12fdff830340aad9ee48ddc4c91ba9df4c2f45a230bbe6250afec87a2560b = $this->env->getExtension("native_profiler");
        $__internal_aff12fdff830340aad9ee48ddc4c91ba9df4c2f45a230bbe6250afec87a2560b->enter($__internal_aff12fdff830340aad9ee48ddc4c91ba9df4c2f45a230bbe6250afec87a2560b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_aff12fdff830340aad9ee48ddc4c91ba9df4c2f45a230bbe6250afec87a2560b->leave($__internal_aff12fdff830340aad9ee48ddc4c91ba9df4c2f45a230bbe6250afec87a2560b_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_0c894559659e66d5b975dc1f1eafd6f0f6207401ad4ece43107fc577718568c2 = $this->env->getExtension("native_profiler");
        $__internal_0c894559659e66d5b975dc1f1eafd6f0f6207401ad4ece43107fc577718568c2->enter($__internal_0c894559659e66d5b975dc1f1eafd6f0f6207401ad4ece43107fc577718568c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_0c894559659e66d5b975dc1f1eafd6f0f6207401ad4ece43107fc577718568c2->leave($__internal_0c894559659e66d5b975dc1f1eafd6f0f6207401ad4ece43107fc577718568c2_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_db417cfb6f2e969576c8c158b53acb272a49c44c1acfe6dd72353439dbb8a8fd = $this->env->getExtension("native_profiler");
        $__internal_db417cfb6f2e969576c8c158b53acb272a49c44c1acfe6dd72353439dbb8a8fd->enter($__internal_db417cfb6f2e969576c8c158b53acb272a49c44c1acfe6dd72353439dbb8a8fd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_db417cfb6f2e969576c8c158b53acb272a49c44c1acfe6dd72353439dbb8a8fd->leave($__internal_db417cfb6f2e969576c8c158b53acb272a49c44c1acfe6dd72353439dbb8a8fd_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_359084cb0d2260adbea0ce47ad57598a9cd72e2a5bb77b39b980884caeb6875d = $this->env->getExtension("native_profiler");
        $__internal_359084cb0d2260adbea0ce47ad57598a9cd72e2a5bb77b39b980884caeb6875d->enter($__internal_359084cb0d2260adbea0ce47ad57598a9cd72e2a5bb77b39b980884caeb6875d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_359084cb0d2260adbea0ce47ad57598a9cd72e2a5bb77b39b980884caeb6875d->leave($__internal_359084cb0d2260adbea0ce47ad57598a9cd72e2a5bb77b39b980884caeb6875d_prof);

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
