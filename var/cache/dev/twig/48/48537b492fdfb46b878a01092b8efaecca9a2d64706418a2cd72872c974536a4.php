<?php

/* @Framework/Form/form_rows.html.php */
class __TwigTemplate_1df18ac059651e0b081c43548a8981f66c0d86c8445fe06e36acbb7653623afc extends Twig_Template
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
        $__internal_7442475d993f746630037278c3cf5c6e066678ac28adea2947853d31671fc6b5 = $this->env->getExtension("native_profiler");
        $__internal_7442475d993f746630037278c3cf5c6e066678ac28adea2947853d31671fc6b5->enter($__internal_7442475d993f746630037278c3cf5c6e066678ac28adea2947853d31671fc6b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rows.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child) : ?>
    <?php echo \$view['form']->row(\$child) ?>
<?php endforeach; ?>
";
        
        $__internal_7442475d993f746630037278c3cf5c6e066678ac28adea2947853d31671fc6b5->leave($__internal_7442475d993f746630037278c3cf5c6e066678ac28adea2947853d31671fc6b5_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rows.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php foreach ($form as $child) : ?>*/
/*     <?php echo $view['form']->row($child) ?>*/
/* <?php endforeach; ?>*/
/* */
