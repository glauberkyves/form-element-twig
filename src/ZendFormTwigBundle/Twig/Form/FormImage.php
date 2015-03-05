<?php

class FormImage extends FormElement
{
    /**
     * Generates an 'image' element.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are extracted in place of added parameters.
     *
     * @param mixed $value The source ('src="..."') for the image.
     *
     * @param array $attribs Attributes for the element tag.
     *
     * @return string The element XHTML.
     */
    public function formImage($name, $value = null, $attribs = null)
    {
        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable

        // Determine if we should use the value or the src attribute
        if (isset($attribs['src'])) {
            $src = ' src="' . $this->escape($attribs['src']) . '"';
            unset($attribs['src']);
        } else {
            $src = ' src="' . $this->escape($value) . '"';
            unset($value);
        }

        // Do we have a value?
        if (isset($value) && !empty($value)) {
            $value = ' value="' . $this->escape($value) . '"';
        } else {
            $value = '';
        }

        // Disabled?
        $disabled = '';
        if ($disable) {
            $disabled = ' disabled="disabled"';
        }

        // build the element
        $xhtml = '<input type="image"'
            . ' name="' . $this->escape($name) . '"'
            . ' id="' . $this->escape($id) . '"'
            . $src
            . $value
            . $disabled
            . $this->_htmlAttribs($attribs)
            . $this->getClosingBracket();

        return $xhtml;
    }
}
