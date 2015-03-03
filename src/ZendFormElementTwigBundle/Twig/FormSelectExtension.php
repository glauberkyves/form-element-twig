<?php
/**
 * Created by PhpStorm.
 * User: Glauber
 * Date: 30/01/15
 * Time: 10:34
 */

namespace ZendFormElementTwigBundle\Twig;

class FormSelectExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('formSelect', array($this, 'formSelect')),
        );
    }

    public function getName()
    {
        return 'form_select_extension';
    }

    public function formSelect($name, $value = null, $attribs = null, $options = null, $listsep = "<br />\n")
    {
        $formSelect = new \Zend_View_Helper_FormSelect();

        return $formSelect->formSelect($name, $value = null, $attribs = null, $options = null, $listsep = "<br />\n");
    }

}