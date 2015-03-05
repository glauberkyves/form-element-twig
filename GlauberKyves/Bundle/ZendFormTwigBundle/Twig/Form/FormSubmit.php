<?php

class FormSubmit extends FormElement
{
    /**
     * Generates a 'submit' button.
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
    public function formSubmit($name, $value = null, $attribs = null)
    {
        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable, id
        // check if disabled
        $disabled = '';
        if ($disable) {
            $disabled = ' disabled="disabled"';
        }

        if ($id) {
            $id = ' id="' . $this->escape($id) . '"';
        }

        // Render the button.
        $xhtml = '<input type="submit"'
            . ' name="' . $this->escape($name) . '"'
            . $id
            . ' value="' . $this->escape($value) . '"'
            . $disabled
            . $this->_htmlAttribs($attribs)
            . $this->getClosingBracket();

        return $xhtml;
    }
}
