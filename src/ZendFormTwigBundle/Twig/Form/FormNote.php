<?php

class FormNote extends FormElement
{
    /**
     * Helper to show a "note" based on a hidden value.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are extracted in place of added parameters.
     *
     * @param array $value The note to display.  HTML is *not* escaped; the
     * note is displayed as-is.
     *
     * @return string The element XHTML.
     */
    public function formNote($name, $value = null)
    {
        $info = $this->_getInfo($name, $value);
        extract($info); // name, value, attribs, options, listsep, disable
        return $value;
    }
}
