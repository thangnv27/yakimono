<?php
/**
 * @property YoPressFlexiSlider $YoPressFlexiSlider FlexSlider
 * @property YoPressNivoSlider $YoPressNivoSlider NivoSlider
 * @property YoPressComponentSwitcher $YoPressComponentSwitcher Component switcher
 * 
 * - from now components must call run() manualy i.e 
 * YoPressBase::instance()->component->FlexiSlider->run();
 * - components can call without YoPress and with
 */
class YoPressComponentManager {
	/*
	 * Cached components classes
	 */
	private $components = array();

	/**
	 * Magic getter for components called strictly i.e
	 * YoPressBase::instance()->component->FlexiSlider->run();
	 * 
	 * @param string $name Name of component
	 * @return YoPressComponent
	 */
	public function __get($name) {
		if(strpos($name, 'YoPress') === false){
			$name = 'YoPress'.$name;
		}
		
		$component = $this->getComponent($name);
		if($component == null){
			if (class_exists($name)) {
				YoPressBase::log('Make new component '.$name);
				/** @var $component YoPressComponent */
				
				//TODO: przekazac config z wywolania widgeta
				$component = new $name(array());
				$this->addComponent($name, $component);
			}
		} else {
			//YoPressBase::log('Compoennt from cache '.$name);
		}
		
		return $component;
	}
	
	/**
	 * Creates new instance of components or get cached object
	 * and register its hooks, to load scripts and styles
	 * 
	 * @param string $dependency Name of component to load
	 * @param string $action name of current page
	 */
	public function registerComponents($dependency, $action) {
		foreach($dependency as $dep=>$config) {
			/*@var $depObj YoPressComponent */
			// TODO: add cache!
			//$depObj = $this->getComponent($dep);

			if (is_array($config) && key_exists('multi', $config)) {
				foreach ($config['configs'] as $c) {
					$this->loadComponent($dep, $c, $action);
				}
			} else {
				$this->loadComponent($dep, $config, $action);
			}
		}
	}

	
	/**
	 * Return omponent that can be runed on user side
	 * 
	 * @param string $componentName Primary name of component
	 * @param string $componentSubtype Subtype name for multiinstance
	 * @return YoPressComponent
	 * @throws Exception
	 */
	public function get($componentName, $componentSubtype = null) {
		YoPressBase::log('Getting component :'.$componentName.' submodule:'.$componentSubtype);
		if (key_exists($componentName, $this->components)) {
			if (is_array($this->components[$componentName])) {
				if (key_exists($componentSubtype, $this->components[$componentName])) {
					return $this->components[$componentName][$componentSubtype];
				} else {
					throw new Exception('Component name not exists: '.$componentName.' submodule '.$componentSubtype);
				}
			} else {
				YoPressBase::log('Returning component :'.$componentName.' submodule: null');
				return $this->components[$componentName];
			}
		} else {
			throw new Exception('Component name not exists: '.$componentName);
		}
	}
	
	/**
	 * Load single component and add it to the cached components array
	 * 
	 * @param type $dep Name of Component
	 * @param type $config Config
	 * @param type $action Name of current page
	 * @return YoPressComponent
	 * @throws Exception
	 */
	private function loadComponent($dep, $config, $action) {
		if(isset($config['adminOnly']) && $config['adminOnly'] == true && !is_admin()) return;
		
		$depObj = null;
		
		if(class_exists($dep)) {
			$depObj = new $dep($config);

		} else {
			echo ('Notice: Class '.$dep.' not found! Try adding include path in config');
			throw new Exception();
		}

		/* @var $depObj YoPressComponent */
		if($depObj) {
			/* call this only once per component */

			if(!$depObj->registered()){
				
				$avaliableActions = isset($config['avaliableActions']) ?  $config['avaliableActions'] : array();
				$depObj->registerHooks($action, $avaliableActions);
			}

			if(is_admin() && $action == YoPressBase::instance()->getAdminPageId()) {
				$depObj->registerAdminSettings();
			}

			$this->addComponent($dep, $depObj);
		}

		return $depObj;
	}

	/**
	 * Get the cached component
	 * 
	 * @param string $componentName
	 * @return YoPressComponent or null
	 */
	private function getComponent($componentName) {
		if(isset($this->components[$componentName])) {
			return $this->components[$componentName];
		} else return null;
	}
	
	/**
	 * Add component to cached components array
	 * 
	 * @param string $name Name of Compoennt Class
	 * @param YoPressComponent $component Component object
	 */
	private function addComponent($name, $component) {
		if (key_exists($name, $this->components)) {
			if (is_array($this->components[$name])) {
				$n = $component->componentName();
				$this->components[$name][$n] = $component;
			} else {
				/** @var YoPressComponent */
				$c = $this->components[$name];
				$this->components[$name] = array($c->componentName()=>$c, $component->componentName()=>$component);
			}
		} else {
			$this->components[$name] = $component;
		}
	}
}