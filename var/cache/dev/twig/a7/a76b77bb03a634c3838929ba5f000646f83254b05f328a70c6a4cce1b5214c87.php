<?php

/* @Framework/Form/collection_widget.html.php */
class __TwigTemplate_b93cac951f301ee756bfc5bc83bb62ee8015ad09209b3a8d1e218f6a60c858a4 extends Twig_Template
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
        $__internal_d8f2fd73c550559dd4132d29d1b93f849cd6cbb0d843efefbf72be8cd1c416d9 = $this->env->getExtension("native_profiler");
        $__internal_d8f2fd73c550559dd4132d29d1b93f849cd6cbb0d843efefbf72be8cd1c416d9->enter($__internal_d8f2fd73c550559dd4132d29d1b93f849cd6cbb0d843efefbf72be8cd1c416d9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/collection_widget.html.php"));

        // line 1
        echo "<?php if (isset(\$prototype)): ?>
    <?php \$attr['data-prototype'] = \$view->escape(\$view['form']->row(\$prototype)) ?>
<?php endif ?>
<?php echo \$view['form']->widget(\$form, array('attr' => \$attr)) ?>
";
        
        $__internal_d8f2fd73c550559dd4132d29d1b93f849cd6cbb0d843efefbf72be8cd1c416d9->leave($__internal_d8f2fd73c550559dd4132d29d1b93f849cd6cbb0d843efefbf72be8cd1c416d9_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/collection_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (isset($prototype)): ?>*/
/*     <?php $attr['data-prototype'] = $view->escape($view['form']->row($prototype)) ?>*/
/* <?php endif ?>*/
/* <?php echo $view['form']->widget($form, array('attr' => $attr)) ?>*/
/* */
