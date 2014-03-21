<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Obfuscatedformfield
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'revision6',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Forms
	'revision6\FormHiddenObfuscated' => 'system/modules/obfuscatedformfield/forms/FormHiddenObfuscated.php',
));
