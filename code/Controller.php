<?php

class Controller {

    private $_template = 'main';
    private $_pars = array();
    private $_scripts = array();

    public function run($action) {
        if (!method_exists($this, $action . 'Action')) {
            $action = 'e404';
        }

        $this->_template = $action;

        $action = $action . 'Action';
        $this->$action();
        $this->_render();
    }

    public function e404Action() {
        
    }

    protected function _addScript($script) {
        $this->_scripts[] = $script;
    }

    protected function _addPar($name, $value) {
        $this->_pars[$name] = $value;
    }

    private function _render() {
        global $mainCfg;
        $this->_addPar('script_version', $mainCfg['script_version']);

        require_once TF_CODE_DIR . '/View/layout.php';
        exit;
    }

}
