<?php

class FormPassword extends FormElement
{
    /**
     * Generates a 'password' element.
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
    public function formPassword($name, $value = null, $attribs = null)
    {
        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable

        // is it disabled?
        $disabled = '';
        if ($disable) {
            // disabled
            $disabled = ' disabled="disabled"';
        }

        // determine the XHTML value
        $valueString = ' value=""';
        if (array_key_exists('renderPassword', $attribs)) {
            if ($attribs['renderPassword']) {
                $valueString = ' value="' . $this->escape($value) . '"';
            }
            unset($attribs['renderPassword']);
        }

        // render the element
        $xhtml = '<input type="password"'
            . ' name="' . $this->escape($name) . '"'
            . ' id="' . $this->escape($id) . '"'
            . $valueString
            . $disabled
            . $this->_htmlAttribs($attribs)
            . $this->getClosingBracket();

        return $xhtml;
    }

}
