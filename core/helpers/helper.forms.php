<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

/**
 * Forms Helper
 *
 * 
 *
 * @package		ZanPHP
 * @subpackage	Core
 * @category	Helpers 
 * @author		MilkZoft
 * @link		http://www.milkzoft.com
 */

/**
 * formCheckbox
 * 
 * Sets a specific <input /> type Checkbox tag and its attributes
 * 
 * @param string  $text     = NULL
 * @param string  $position = "Right"
 * @param string  $name
 * @param string  $value
 * @param string  $ID       = NULL
 * @param boolean $checked  = FALSE
 * @param string  $events   = NULL
 * @param boolean $disabled = FALSE
 * @return string value
 */		
function formCheckbox($attributes = FALSE) {
	if(isset($attributes) and is_array($attributes)) {
		$attrs = NULL;
		
		foreach($attributes as $attribute => $value) {
			if($attribute !== "position" and $attribute !== "text" and $attribute !== "type") {
				$attrs .= ' '. strtolower($attribute) .'="'. encode($value) .'"';
			} else {
				$$attribute = strtolower(encode($value));
			}
		}
		
		if(isset($position) and $position === "left" and isset($text)) {
			return $text . ' <input' . $attrs . ' type="checkbox" />';
		} elseif(isset($position) and $position === "right" and isset($text)) {
			return '<input' . $attrs . ' type="checkbox" /> ' . $text;
		} elseif(isset($text)) {
			return $text . ' <input' . $attrs . ' type="checkbox" />';
		} else {
			return '<input' . $attrs . ' type="checkbox" />';
		}
	} else {
		return NULL;
	}
}

/**
 * formClose
 * 
 * Closes a Basic Form structure
 * 
 * @returns string $HTML
 */	
function formClose() {
	$HTML  = char("\t") . "</fieldset>" . char("\n");
	$HTML .= "</form>";		
	
	return $HTML;
}

function formField($a = NULL, $text, $raquo = TRUE) {
	$raquo = ($raquo === TRUE) ? "&raquo; " : "";
	
	if(!is_null($a)) {
		$HTML  = '<p class="field">' . char("\n");
		$HTML .= char("\t") . '<a '. $a .'>'. $raquo . $text .'</a>' . char("\n");
		$HTML .= '</p>' . char("\n");
	} else {
		$HTML  = '<p class="field">' . char("\n");
		$HTML .= char("\t") . $raquo . $text . char("\n"); 
		$HTML .= '</p>' . char("\n");
	}
	
	return $HTML;
}	
	
/**
 * formInput
 * 
 * Sets an <input /> tag with a custom attributes.
 * 
 * @param mixed   $p      = "Yes"
 * @param string  $text   = NULL
 * @param string  $name   = NULL
 * @param string  $value  = NULL
 * @param string  $class  = "input"
 * @param string  $type   = "text"
 * @param string  $ID     = NULL
 * @param string  $events = NULL
 * @param string  $src    = NULL
 * @param boolean $raquo  = NULL
 * @returns string $HTML
 */		
function formInput($attributes = FALSE) {	
	if(isset($attributes) and is_array($attributes)) {
		$attrs = NULL;
		
		foreach($attributes as $attribute => $value) {
			if($attribute === "events") {
				$attrs .= ' '. $value .' ';
			} elseif($attribute !== "type") {
				$attrs .= ' '. strtolower($attribute) .'="'. encode($value) .'"';
			} else {
				$$attribute = strtolower(encode($value));
			}
		}
		
		if(isset($type)) {
			if($type === "text") {
				return '<input'. $attrs .' type="text" /> ';
			} elseif($type === "password") {
				return '<input'. $attrs .' type="password" /> ';
			} elseif($type === "submit") {
				return '<input'. $attrs .' type="submit" /> ';
			} elseif($type === "button") {
				return '<input'. $attrs .' type="button" /> ';
			} elseif($type === "checkbox") {
				return '<input'. $attrs .' type="checkbox" /> ';
			} elseif($type === "radio") {
				return '<input'. $attrs .' type="radio" /> ';
			} elseif($type === "file") {
				return '<input'. $attrs .' type="file" /> ';
			} elseif($type === "hidden") {
				return '<input'. $attrs .' type="hidden" /> ';
			} elseif($type === "image") {
				return '<input'. $attrs .' type="image" /> ';
			} elseif($type === "reset") {
				return '<input'. $attrs .' type="reset" /> ';
			} else {
				return '<input'. $attrs .' type="text" /> ';
			}
		} else {
			return '<input ' . $attrs . ' type="text" /> ';
		}
	} else {
		return NULL;
	}
}

/**
 * formLabel
 * 
 * Sets a <label> tag.
 * 
 * @param string  $for
 * @param string  $value
 * @param boolean $br = TRUE
 * @returns string $HTML
 */
function formLabel($for, $text, $br = TRUE) {
	$HTML = "<label for=\"$for\">$text: </label>";
	
	if($br == TRUE) {
		$HTML .= "<br />" . char("\n");
	}
	
	return $HTML;
}

/**
 * formOpen
 * 
 * Sets and Opens a basic form structure
 *
 * @param string $ID      = NULL
 * @param string $text    = NULL
 * @param string $action
 * @param string $class   = "forms"
 * @param string $method  = "post"
 * @param string $enctype = "multipart/form-data"
 * @returns string $HTML
 */	
function formOpen($ID = NULL, $legend = NULL, $action, $class = "Forms", $method = "post", $enctype = "multipart/form-data") {	
	$ID     = (isset($ID))     ? ' id="'.$ID.'"' 			  			 : NULL;
	$legend = (isset($legend)) ? "<legend>$legend</legend>" . char("\n") : NULL;
	
	$HTML  = '<form' . $ID . ' action="' . $action . '" method="' . $method . '" class="' . $class . '" enctype="' . $enctype . '">' . char("\n\t");
	$HTML .= '<fieldset>' . char("\n\t\t");
	$HTML .= $Legend . char("\n");			

	return $HTML;
}

/**
 * formRadio
 * 
 * Sets a <input /> type Radio tag and its attributes 
 *
 * @param string  $text     = NULL
 * @param string  $position = "Right"
 * @param string  $name
 * @param string  $value
 * @param string  $ID       = NULL
 * @param boolean $checked  = FALSE
 * @param string  $events   = NULL
 * @param boolean $disable  = FALSE 
 * @returns string value
 */	
function formRadio($attributes) {
	if(isset($attributes) and is_array($attributes)) {
		$attrs = NULL;
		
		foreach($attributes as $attribute => $value) {
			if($attribute != "position" and $attribute != "text" and $attribute != "type") {
				$attrs .= ' ' . strtolower($attribute) . '="' . encode($value) . ' "';
			} else {
				$$attribute = strtolower(encode($value));
			}
		}
		
		if(isset($position) and $position === "left" and isset($text)) {
			return $text . ' <input ' . $attrs . ' type="radio" />';
		} elseif(isset($position) and $position === "right" and isset($text)) {
			return '<input ' . $attrs . ' type="radio" /> ' . $text;
		} elseif(isset($text)) {
			return $text . ' <input ' . $attrs . ' type="radio" />';
		} else {
			return '<input ' . $attrs . ' type="radio" />';
		}
	} else {
		return NULL;
	}
}	

/**
 * formSelect
 * 
 * Sets a <select> tag and its attributes
 *
 * @param boolean $p        = TRUE
 * @param string  $text
 * @param string  $name
 * @param mixed   $options
 * @param string  $class    = "Select"
 * @param string  $selected = NULL
 * @param string  $ID       = NULL
 * @param string  $size     = "1"
 * @param boolean $raquo    = TRUE 
 * @returns string $HTML
 */	
function formSelect($attributes = FALSE, $options = FALSE, $select = FALSE) {
	if(isset($attributes) and is_array($attributes)) {
		$attrs = NULL;
		
		foreach($attributes as $attribute => $value) {
			$attrs .= ' '. strtolower($attribute) .'="'. encode($value) .'"';
		}
		
		$HTML = char("\t") . '<select'. $attrs . '>'. char("\n");
		
		if(is_array($options)) {
			foreach($options as $option) {
				if($select) {
					$HTML .= $select;
					
					$select = FALSE;
				}
				
				$selected = (isset($option["selected"]) and $option["selected"] === TRUE) ? ' selected="selected"' : NULL;
				$value    = (isset($option["value"]))  ? $option["value"]  : NULL;
				$text 	  = (isset($option["option"])) ? $option["option"] : NULL;
				
				$HTML .= char("\t\t") . '<option value="' . $value . '"' . $selected . '>' . $text . '</option>' . char("\n");				
			}
		}
		
		$HTML .= char("\t") . '</select>' . char("\n");
		
		unset($options);
		
		return $HTML;
	} else {
		return NULL;
	}
}	

/**
 * formTextarea
 * 
 * Sets a <textarea> tag and its attributes
 *
 * @param boolean $p        = TRUE
 * @param string  $text
 * @param string  $name
 * @param string  $value    = NULL
 * @param string  $class    = "textarea"
 * @param string  $selected = NULL
 * @param string  $ID       = NULL
 * @param int     $rows     = 25
 * @param int     $cols     = 90 
 * @param boolean $raquo    = TRUE
 * @returns string $HTML
 */	
function formTextarea($attributes = FALSE) {
	if(isset($attributes) and is_array($attributes)) {
		$attrs = NULL;
		
		foreach($attributes as $key => $val) {
			if($key != "type" and $key != "value") {
				$attrs .= ' ' . strtolower($key) . '="' . encode($val) . ' "';
			} else {
				$$key = encode($val);
			}
		}
		
		return '<textarea ' . $attrs . '>' . isset($value) ? $value : NULL . '</textarea>';
	} else {
		return NULL;
	}								
}

function formUploadFrame($value, $events = NULL) {
	$HTML  = '<input type="file" name="'. $value .'File" /> ';
	$HTML .= '<input type="submit" class="small-submit" name="'. $value .'Upload" value="'. __("Upload") .'" '. $events .' /><br />';
	$HTML .= '<iframe name="'. $value .'Upload" class="no-display"></iframe>';
	
	return $HTML;
}