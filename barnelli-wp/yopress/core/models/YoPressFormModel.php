<?php
/**
 * Model for generating forms in admin panel
 * 
 * TODO:
 * write some validation rules for fields
 */
class YoPressFormModel {
	private static $attr = null;
	const FORM_NAME = 'yopress';
	
	/**
	 * Return the name of field for form
	 * 
	 * @param string $name
	 * @return string
	 */
	public function fieldName($name) {
		return self::FORM_NAME.'['.$name.']';
	}
	
	public function fieldId($name) {
		return $name.'_id';
	}

	/**
	 * Returns the value of a field and set to $def in no value is retrived
	 * from db
	 * 
	 * @param string $name
	 * @param mixed $def
	 * @return mixed value
	 */
	public function fieldValue($name, $def = '') {
		return YoPressStorageModule::instance()->getOption($name, $def);
	}

	/**
	 * Return option value or empty string
	 * 
	 * @param string $optionName
	 * @return mixed
	 */
	public static function getOption($optionName, $def = '') {
		return YoPressStorageModule::instance()->getOption($optionName, $def);
	}
	
	/**
	 * Update single option
	 * 
	 * @param string $optionName
	 * @param mixed $value
	 */
	public static function updateOption($optionName, $value) {
		return YoPressStorageModule::instance()->updateOption($optionName, $value);
	}
	
	
}
?>