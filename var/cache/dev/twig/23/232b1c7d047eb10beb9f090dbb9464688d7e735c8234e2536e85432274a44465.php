<?php

/* FOSUserBundle:Registration:email.txt.twig */
class __TwigTemplate_159509043c309f4e5afbf2ad9294909289ec073bcb6bbc22b22449dcbe345001 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'subject' => array($this, 'block_subject'),
            'body_text' => array($this, 'block_body_text'),
            'body_html' => array($this, 'block_body_html'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3f2250fbb5680024c74c48238db59cb28b6e2a76accc89f06f44c9296576a504 = $this->env->getExtension("native_profiler");
        $__internal_3f2250fbb5680024c74c48238db59cb28b6e2a76accc89f06f44c9296576a504->enter($__internal_3f2250fbb5680024c74c48238db59cb28b6e2a76accc89f06f44c9296576a504_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Registration:email.txt.twig"));

        // line 2
        $this->displayBlock('subject', $context, $blocks);
        // line 7
        $this->displayBlock('body_text', $context, $blocks);
        // line 12
        $this->displayBlock('body_html', $context, $blocks);
        
        $__internal_3f2250fbb5680024c74c48238db59cb28b6e2a76accc89f06f44c9296576a504->leave($__internal_3f2250fbb5680024c74c48238db59cb28b6e2a76accc89f06f44c9296576a504_prof);

    }

    // line 2
    public function block_subject($context, array $blocks = array())
    {
        $__internal_7a2a9daad61dcd66a7244a757409befa7e4b2fc195aadbf07bd2f96d0003c8ab = $this->env->getExtension("native_profiler");
        $__internal_7a2a9daad61dcd66a7244a757409befa7e4b2fc195aadbf07bd2f96d0003c8ab->enter($__internal_7a2a9daad61dcd66a7244a757409befa7e4b2fc195aadbf07bd2f96d0003c8ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "subject"));

        // line 4
        echo $this->env->getExtension('translator')->trans("registration.email.subject", array("%username%" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username", array()), "%confirmationUrl%" => (isset($context["confirmationUrl"]) ? $context["confirmationUrl"] : $this->getContext($context, "confirmationUrl"))), "FOSUserBundle");
        echo "
";
        
        $__internal_7a2a9daad61dcd66a7244a757409befa7e4b2fc195aadbf07bd2f96d0003c8ab->leave($__internal_7a2a9daad61dcd66a7244a757409befa7e4b2fc195aadbf07bd2f96d0003c8ab_prof);

    }

    // line 7
    public function block_body_text($context, array $blocks = array())
    {
        $__internal_22fdff35dc1c07328a0d26912914149a4202d8d480007a03b2a8e7a1ff4513b4 = $this->env->getExtension("native_profiler");
        $__internal_22fdff35dc1c07328a0d26912914149a4202d8d480007a03b2a8e7a1ff4513b4->enter($__internal_22fdff35dc1c07328a0d26912914149a4202d8d480007a03b2a8e7a1ff4513b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_text"));

        // line 9
        echo $this->env->getExtension('translator')->trans("registration.email.message", array("%username%" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username", array()), "%confirmationUrl%" => (isset($context["confirmationUrl"]) ? $context["confirmationUrl"] : $this->getContext($context, "confirmationUrl"))), "FOSUserBundle");
        echo "
";
        
        $__internal_22fdff35dc1c07328a0d26912914149a4202d8d480007a03b2a8e7a1ff4513b4->leave($__internal_22fdff35dc1c07328a0d26912914149a4202d8d480007a03b2a8e7a1ff4513b4_prof);

    }

    // line 12
    public function block_body_html($context, array $blocks = array())
    {
        $__internal_e93b8e1492b1f38cf64bc447196d7b98efedb523f6aaae90220b5aaefd193f4a = $this->env->getExtension("native_profiler");
        $__internal_e93b8e1492b1f38cf64bc447196d7b98efedb523f6aaae90220b5aaefd193f4a->enter($__internal_e93b8e1492b1f38cf64bc447196d7b98efedb523f6aaae90220b5aaefd193f4a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_html"));

        
        $__internal_e93b8e1492b1f38cf64bc447196d7b98efedb523f6aaae90220b5aaefd193f4a->leave($__internal_e93b8e1492b1f38cf64bc447196d7b98efedb523f6aaae90220b5aaefd193f4a_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:email.txt.twig";
    }

    public function getDebugInfo()
    {
        return array (  66 => 12,  57 => 9,  51 => 7,  42 => 4,  36 => 2,  29 => 12,  27 => 7,  25 => 2,);
    }
}
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* {% block subject %}*/
/* {% autoescape false %}*/
/* {{ 'registration.email.subject'|trans({'%username%': user.username, '%confirmationUrl%': confirmationUrl}) }}*/
/* {% endautoescape %}*/
/* {% endblock %}*/
/* {% block body_text %}*/
/* {% autoescape false %}*/
/* {{ 'registration.email.message'|trans({'%username%': user.username, '%confirmationUrl%': confirmationUrl}) }}*/
/* {% endautoescape %}*/
/* {% endblock %}*/
/* {% block body_html %}{% endblock %}*/
/* */
