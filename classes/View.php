<?php

class View
{
    protected $_data;
    protected $_path;
    
    public static function make($path,array $data = null){
        $view = new View();
        $view->setPath($path);
        if($data)
        $view->setData($data);
        return $view;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->_data = $data;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->_path = $path;
    }
    
    public function render(){
        if(!empty($this->_data))
            foreach ($this->_data as $key => $val) {
                $$key = $val;
            }
        ob_start();
        require_once VIEWPATH.ltrim($this->_path,'/').EXT;
        return ob_get_clean();
    }

    public function __toString()
    {
        return $this->render();
    }
}