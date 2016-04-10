<?php

/* SonataAdminBundle:Core:user_block.html.twig */
class __TwigTemplate_b396bfdfe1dba797ea16eeb6cdc00a9d3de84af5c634ee47f4800daff3925c1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'user_block' => array($this, 'block_user_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f861dade964ad65cdabc93305b39378517a4337dca9aa993997355eeaeebcfcf = $this->env->getExtension("native_profiler");
        $__internal_f861dade964ad65cdabc93305b39378517a4337dca9aa993997355eeaeebcfcf->enter($__internal_f861dade964ad65cdabc93305b39378517a4337dca9aa993997355eeaeebcfcf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Core:user_block.html.twig"));

        // line 1
        $this->displayBlock('user_block', $context, $blocks);
        
        $__internal_f861dade964ad65cdabc93305b39378517a4337dca9aa993997355eeaeebcfcf->leave($__internal_f861dade964ad65cdabc93305b39378517a4337dca9aa993997355eeaeebcfcf_prof);

    }

    public function block_user_block($context, array $blocks = array())
    {
        $__internal_8b4cfcddb4ef0a3a61221b0a93a0fa8a72a2efb3b21bad80461f0e3dc50719a3 = $this->env->getExtension("native_profiler");
        $__internal_8b4cfcddb4ef0a3a61221b0a93a0fa8a72a2efb3b21bad80461f0e3dc50719a3->enter($__internal_8b4cfcddb4ef0a3a61221b0a93a0fa8a72a2efb3b21bad80461f0e3dc50719a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "user_block"));

        
        $__internal_8b4cfcddb4ef0a3a61221b0a93a0fa8a72a2efb3b21bad80461f0e3dc50719a3->leave($__internal_8b4cfcddb4ef0a3a61221b0a93a0fa8a72a2efb3b21bad80461f0e3dc50719a3_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Core:user_block.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }
}
/* {% block user_block %}{# Customize this value #}{% endblock %}*/
/* */
