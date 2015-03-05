<?php

class FormReset extends FormElement
{
    /**
     * Generates a 'reset' button.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are extracted in place of added parameters.
     *
     * @param mixed $value The element value.
     *
     * @param array $attribs Attributes for the element tag.
     *
     * @return string The element XHTML.
     */
    public function formReset($name = '', $value = 'Reset', $attribs = null)
    {
        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable

        // check if disabled
        $disabled = '';
        if ($disable) {
            $disabled = ' disabled="disabled"';
        }

        // Render button
        $xhtml = '<input type="reset"'
            . ' name="' . $this->escape($name) . '"'
            . ' id="' . $this->escape($id) . '"'
            . $disabled;

        // add a value if one is given
        if (!empty($value)) {
            $xhtml .= ' value="' . $this->escape($value) . '"';
        }

        // add attributes, close, and return
        $xhtml .= $this->_htmlAttribs($attribs) . $this->getClosingBracket();
        return $xhtml;
    }
}
