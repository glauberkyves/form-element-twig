<?php
/**
 * Created by PhpStorm.
 * User: Glauber
 * Date: 30/01/15
 * Time: 10:34
 */

namespace GlauberKyves\ZendFormTwigBundle\Twig;

class AbstractExtension extends \Twig_Extension
{
    protected $class;

    public function __construct()
    {
        $this->class = str_replace(array(__NAMESPACE__, 'Extension', '\\'), array('', '', ''), get_class($this));
    }

    public function getFunctions()
    {
        return array(
            lcfirst($this->class) => new \Twig_Function_Method($this, lcfirst($this->class), array(
                'is_safe' => array('html')
            ))
        );
    }

    public function getName()
    {
        return strtolower($this->class) . '_extension';
    }

    public function __call($method, $args)
    {
        if (strtolower($this->class) == strtolower($method)) {
            require_once __DIR__ . '/Form' . '/' . $this->class . '.php';
            $class = new $this->class($args);

            return call_user_func_array(array($class, $method), $args);
        }
    }
}