<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_83ab7a01b98596f09c5793a7c471bdea26864e63af6e0fa65022a0308aa34e3b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9a93fe2137ea4c3891908837309b5b3185d0b00076a7a98dcf41e1a67fd56fa1 = $this->env->getExtension("native_profiler");
        $__internal_9a93fe2137ea4c3891908837309b5b3185d0b00076a7a98dcf41e1a67fd56fa1->enter($__internal_9a93fe2137ea4c3891908837309b5b3185d0b00076a7a98dcf41e1a67fd56fa1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9a93fe2137ea4c3891908837309b5b3185d0b00076a7a98dcf41e1a67fd56fa1->leave($__internal_9a93fe2137ea4c3891908837309b5b3185d0b00076a7a98dcf41e1a67fd56fa1_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_ce2d559bdfcd39230cae86d9113453077c8ba3bc53063112bde60da577a10aec = $this->env->getExtension("native_profiler");
        $__internal_ce2d559bdfcd39230cae86d9113453077c8ba3bc53063112bde60da577a10aec->enter($__internal_ce2d559bdfcd39230cae86d9113453077c8ba3bc53063112bde60da577a10aec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_ce2d559bdfcd39230cae86d9113453077c8ba3bc53063112bde60da577a10aec->leave($__internal_ce2d559bdfcd39230cae86d9113453077c8ba3bc53063112bde60da577a10aec_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_2dace0ba11421bbdc52d120384e5724b4fa66d0c7097c9ff49b5dcd4b597ed72 = $this->env->getExtension("native_profiler");
        $__internal_2dace0ba11421bbdc52d120384e5724b4fa66d0c7097c9ff49b5dcd4b597ed72->enter($__internal_2dace0ba11421bbdc52d120384e5724b4fa66d0c7097c9ff49b5dcd4b597ed72_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_2dace0ba11421bbdc52d120384e5724b4fa66d0c7097c9ff49b5dcd4b597ed72->leave($__internal_2dace0ba11421bbdc52d120384e5724b4fa66d0c7097c9ff49b5dcd4b597ed72_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_665b8b52d28e6f66045e9137f9610452e36bca0cbd447626d0d1d60aed25dd45 = $this->env->getExtension("native_profiler");
        $__internal_665b8b52d28e6f66045e9137f9610452e36bca0cbd447626d0d1d60aed25dd45->enter($__internal_665b8b52d28e6f66045e9137f9610452e36bca0cbd447626d0d1d60aed25dd45_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_665b8b52d28e6f66045e9137f9610452e36bca0cbd447626d0d1d60aed25dd45->leave($__internal_665b8b52d28e6f66045e9137f9610452e36bca0cbd447626d0d1d60aed25dd45_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 33,  114 => 32,  108 => 28,  106 => 27,  102 => 25,  96 => 24,  88 => 21,  82 => 17,  80 => 16,  75 => 14,  70 => 13,  64 => 12,  54 => 9,  48 => 6,  45 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     {% if collector.hasexception %}*/
/*         <style>*/
/*             {{ render(path('_profiler_exception_css', { token: token })) }}*/
/*         </style>*/
/*     {% endif %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block menu %}*/
/*     <span class="label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}">*/
/*         <span class="icon">{{ include('@WebProfiler/Icon/exception.svg') }}</span>*/
/*         <strong>Exception</strong>*/
/*         {% if collector.hasexception %}*/
/*             <span class="count">*/
/*                 <span>1</span>*/
/*             </span>*/
/*         {% endif %}*/
/*     </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     <h2>Exceptions</h2>*/
/* */
/*     {% if not collector.hasexception %}*/
/*         <div class="empty">*/
/*             <p>No exception was thrown and caught during the request.</p>*/
/*         </div>*/
/*     {% else %}*/
/*         <div class="sf-reset">*/
/*             {{ render(path('_profiler_exception', { token: token })) }}*/
/*         </div>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
