<?php

/* SonataAdminBundle:CRUD:history_revision_timestamp.html.twig */
class __TwigTemplate_823403944e21fdca02c915eb2477d2c5de6d12c99db1223f93e2bbd0c6e381b7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8502f08cb1e8cda915abb87e97624674da72813644a090e4de4dd2c88add8a34 = $this->env->getExtension("native_profiler");
        $__internal_8502f08cb1e8cda915abb87e97624674da72813644a090e4de4dd2c88add8a34->enter($__internal_8502f08cb1e8cda915abb87e97624674da72813644a090e4de4dd2c88add8a34_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:history_revision_timestamp.html.twig"));

        // line 11
        echo "
";
        // line 12
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["revision"]) ? $context["revision"] : $this->getContext($context, "revision")), "timestamp", array())), "html", null, true);
        echo "
";
        
        $__internal_8502f08cb1e8cda915abb87e97624674da72813644a090e4de4dd2c88add8a34->leave($__internal_8502f08cb1e8cda915abb87e97624674da72813644a090e4de4dd2c88add8a34_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:history_revision_timestamp.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 12,  22 => 11,);
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
/* {{ revision.timestamp | date }}*/
/* */
