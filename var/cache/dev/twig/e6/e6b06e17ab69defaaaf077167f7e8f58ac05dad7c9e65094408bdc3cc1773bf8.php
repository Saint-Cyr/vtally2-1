<?php

/* :user:new.html.twig */
class __TwigTemplate_8aca539dee15ee705e445ee3239cb4e99fa21ade3c319d3484c121bd2752db3f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", ":user:new.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6a846204ed248451e2b63be1ffcb7da9cd00e628a7ca61de1a14202b108f38cf = $this->env->getExtension("native_profiler");
        $__internal_6a846204ed248451e2b63be1ffcb7da9cd00e628a7ca61de1a14202b108f38cf->enter($__internal_6a846204ed248451e2b63be1ffcb7da9cd00e628a7ca61de1a14202b108f38cf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":user:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6a846204ed248451e2b63be1ffcb7da9cd00e628a7ca61de1a14202b108f38cf->leave($__internal_6a846204ed248451e2b63be1ffcb7da9cd00e628a7ca61de1a14202b108f38cf_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_6f19597d430345cecce79142c8dae0c3a26e1da95954173c5e04a603d415ad29 = $this->env->getExtension("native_profiler");
        $__internal_6f19597d430345cecce79142c8dae0c3a26e1da95954173c5e04a603d415ad29->enter($__internal_6f19597d430345cecce79142c8dae0c3a26e1da95954173c5e04a603d415ad29_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>User creation</h1>

    ";
        // line 6
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        <input type=\"submit\" value=\"Create\" />
    ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

    <ul>
        <li>
            <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("user_index");
        echo "\">Back to the list</a>
        </li>
    </ul>
";
        
        $__internal_6f19597d430345cecce79142c8dae0c3a26e1da95954173c5e04a603d415ad29->leave($__internal_6f19597d430345cecce79142c8dae0c3a26e1da95954173c5e04a603d415ad29_prof);

    }

    public function getTemplateName()
    {
        return ":user:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 13,  53 => 9,  48 => 7,  44 => 6,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <h1>User creation</h1>*/
/* */
/*     {{ form_start(form) }}*/
/*         {{ form_widget(form) }}*/
/*         <input type="submit" value="Create" />*/
/*     {{ form_end(form) }}*/
/* */
/*     <ul>*/
/*         <li>*/
/*             <a href="{{ path('user_index') }}">Back to the list</a>*/
/*         </li>*/
/*     </ul>*/
/* {% endblock %}*/
/* */
