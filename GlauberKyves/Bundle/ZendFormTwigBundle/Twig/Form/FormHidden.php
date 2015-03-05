<?php

class FormHidden extends FormElement
{
    /**
     * Generates a 'hidden' element.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are extracted in place of added parameters.
     * @param mixed $value The element value.
     * @param array $attribs Attributes for the element tag.
     * @return string The element XHTML.
     */
    public function formHidden($name, $value = null, array $attribs = null)
    {
        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable
        if (isset($id)) {
            if (isset($attribs) && is_array($attribs)) {
                $attribs['id'] = $id;
            } else {
                $attribs = array('id' => $id);
            }
        }
        return $this->_hidden($name, $value, $attribs);
    }
}
