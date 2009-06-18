<?php

// +---------------------------------------------------------------------------+
// | This file is part of the Agavi package.                                   |
// | Copyright (c) 2005-2009 the Agavi Project.                                |
// |                                                                           |
// | For the full copyright and license information, please view the LICENSE   |
// | file that was distributed with this source code. You can also view the    |
// | LICENSE file online at http://www.agavi.org/LICENSE.txt                   |
// |   vi: set noexpandtab:                                                    |
// |   Local Variables:                                                        |
// |   indent-tabs-mode: t                                                     |
// |   End:                                                                    |
// +---------------------------------------------------------------------------+

require_once(dirname(__FILE__) . '/AgaviTask.php');

/**
 * Creates the methods to handle requests for an agavi action.
 *
 * @package    agavi
 * @subpackage build
 *
 * @author     Felix Gilcher <felix.gilcher@bitextender.com>
 * @copyright  Authors
 * @copyright  The Agavi Project
 *
 * @since      1.1.0
 *
 * @version    $Id$
 */
class AgaviGenerateActionMethodsTask extends AgaviTask
{
	
	protected $property = null;
	protected $methods = '';
	protected $isSimple = false;
	protected $requestMethodTemplate;
	protected $simpleMethodTemplate;
	
	/**
	 * Sets the property that this task will modify.
	 *
	 * @param      string The property to modify.
	 */
	public function setProperty($property)
	{
		$this->property = $property;
	}
	
	/**
	 * Sets the methods to generate code for.
	 *
	 * @param      string a space separated list of methodnames.
	 */
	public function setMethods($methodNames)
	{
		if ("" == trim($methodNames)) {
			$this->methods = array();
		} else {
			$this->methods = explode(" ", $methodNames);
		}		
	}
	
	/**
	 * Sets if the action should be simple.
	 *
	 * @param      boolean true if the action is simple.
	 */
	public function setSimple($flag)
	{
		$this->isSimple = 'y' == $flag;
	}
	
	/**
	 * Sets the template to use for the request method handling methods.
	 *
	 * @param      string the template path
	 */
	public function setRequestMethodTemplate($path)
	{
		$this->requestMethodTemplate = $path;
	}
	
	/**
	 * Sets the template to use for the isSimple() method.
	 *
	 * @param      string the template path
	 */
	public function setSimpleMethodTemplate($path)
	{
		$this->simpleMethodTemplate = $path;
	}
	
	/**
	 * Executes the task.
	 */
	public function main()
	{
		if($this->property === null) {
			throw new BuildException('The property attribute must be specified');
		}
		
		if(count($this->methods) > 0 && $this->isSimple) {
			throw new BuildException('An action cannot serve request methods and be simple at the same time.');
		}
		
		$template = file_get_contents($this->requestMethodTemplate);
		
		$methodDeclarations = '';
		foreach($this->methods as $methodName) {
			$methodDeclarations .= str_replace('%%METHOD_NAME%%', ucfirst($methodName), $template);
		}
		
		if($this->isSimple) {
			$methodDeclarations .= file_get_contents($this->simpleMethodTemplate);
		}
	
		$this->project->setUserProperty($this->property, $methodDeclarations);
		return;
	}
}

?>