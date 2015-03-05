<?php

abstract class HtmlElement
{
    /**
     * EOL character
     */
    const EOL = "\n";

    /**
     * The tag closing bracket
     *
     * @var string
     */
    protected $_closingBracket = null;

    /**
     * Get the tag closing bracket
     *
     * @return string
     */
    public function getClosingBracket()
    {
        if (!$this->_closingBracket) {
            if ($this->_isXhtml()) {
                $this->_closingBracket = ' />';
            } else {
                $this->_closingBracket = '>';
            }
        }

        return $this->_closingBracket;
    }

    /**
     * Is doctype XHTML?
     *
     * @return boolean
     */
    protected function _isXhtml()
    {
        $doctype = $this->view->doctype();
        return $doctype->isXhtml();
    }

    /**
     * Is doctype HTML5?
     *
     * @return boolean
     */
    protected function _isHtml5()
    {
        $doctype = $this->view->doctype();
        return $doctype->isHtml5();
    }

    /**
     * Is doctype strict?
     *
     * @return boolean
     */
    protected function _isStrictDoctype()
    {
        $doctype = $this->view->doctype();
        return $doctype->isStrict();
    }

    /**
     * Converts an associative array to a string of tag attributes.
     *
     * @access public
     *
     * @param array $attribs From this array, each key-value pair is
     * converted to an attribute name and value.
     *
     * @return string The XHTML for the attributes.
     */
    protected function _htmlAttribs($attribs)
    {
        $xhtml = '';
        foreach ((array)$attribs as $key => $val) {
            $key = $this->escape($key);

            if (('on' == substr($key, 0, 2)) || ('constraints' == $key)) {
                // Don't escape event attributes; _do_ substitute double quotes with singles
                if (!is_scalar($val)) {
                    // non-scalar data should be cast to JSON first
                    $val = json_encode($val);
                }
                // Escape single quotes inside event attribute values.
                // This will create html, where the attribute value has
                // single quotes around it, and escaped single quotes or
                // non-escaped double quotes inside of it
                $val = str_replace('\'', '&#39;', $val);
            } else {
                if (is_array($val)) {
                    $val = implode(' ', $val);
                }
                $val = $this->escape($val);
            }

            if ('id' == $key) {
                $val = $this->_normalizeId($val);
            }

            if (strpos($val, '"') !== false) {
                $xhtml .= " $key='$val'";
            } else {
                $xhtml .= " $key=\"$val\"";
            }

        }
        return $xhtml;
    }

    /**
     * Normalize an ID
     *
     * @param  string $value
     * @return string
     */
    protected function _normalizeId($value)
    {
        if (strstr($value, '[')) {
            if ('[]' == substr($value, -2)) {
                $value = substr($value, 0, strlen($value) - 2);
            }
            $value = trim($value, ']');
            $value = str_replace('][', '-', $value);
            $value = str_replace('[', '-', $value);
        }
        return $value;
    }

    /**
     * Escapes a value for output in a view script.
     *
     * If escaping mechanism is one of htmlspecialchars or htmlentities, uses
     * {@link $_encoding} setting.
     *
     * @param mixed $var The output to escape.
     * @return mixed The escaped value.
     */
    public function escape($var)
    {
        if (in_array('htmlspecialchars', array('htmlspecialchars', 'htmlentities'))) {
            return call_user_func('htmlspecialchars', $var, ENT_COMPAT, 'UTF-8');
        }
    }
}
