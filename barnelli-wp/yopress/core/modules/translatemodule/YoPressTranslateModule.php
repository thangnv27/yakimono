<?php

/**
 * Echo translated text in theme text domain
 * 
 * @param string $text
 */
function _t($text){
	_e($text, YoPressBase::instance()->getTextDomain());
}

/**
 * Return translated text in theme text domain
 * 
 * @param string $text
 * @return string
 */
function __t($text){
	return __($text, YoPressBase::instance()->getTextDomain());
}
?>