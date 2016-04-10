<?php

/* @Framework/Form/button_widget.html.php */
class __TwigTemplate_66cba283a05a25da3346f07cba10279a14e317b365465eb4bc6261dbfe952a59 extends Twig_Template
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
        $__internal_f902bc811099a58a015c1f13c7787d27b55c57739c3810a3e2f4a10b0e206f9c = $this->env->getExtension("native_profiler");
        $__internal_f902bc811099a58a015c1f13c7787d27b55c57739c3810a3e2f4a10b0e206f9c->enter($__internal_f902bc811099a58a015c1f13c7787d27b55c57739c3810a3e2f4a10b0e206f9c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_widget.html.php"));

        // line 1
        echo "<?php if (!\$label) { \$label = isset(\$label_format)
    ? strtr(\$label_format, array('%name%' => \$name, '%id%' => \$id))
    : \$view['form']->humanize(\$name); } ?>
<button type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'button' ?>\" <?php echo \$view['form']->block(\$form, 'button_attributes') ?>><?php echo \$view->escape(false !== \$translation_domain ? \$view['translator']->trans(\$label, array(), \$translation_domain) : \$label) ?></button>
";
        
        $__internal_f902bc811099a58a015c1f13c7787d27b55c57739c3810a3e2f4a10b0e206f9c->leave($__internal_f902bc811099a58a015c1f13c7787d27b55c57739c3810a3e2f4a10b0e206f9c_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/button_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (!$label) { $label = isset($label_format)*/
/*     ? strtr($label_format, array('%name%' => $name, '%id%' => $id))*/
/*     : $view['form']->humanize($name); } ?>*/
/* <button type="<?php echo isset($type) ? $view->escape($type) : 'button' ?>" <?php echo $view['form']->block($form, 'button_attributes') ?>><?php echo $view->escape(false !== $translation_domain ? $view['translator']->trans($label, array(), $translation_domain) : $label) ?></button>*/
/* */
