<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * @author  arie
 */

abstract class Cumi_Converter
{
    /**
     * Converter Factory
     *
     * @param   string      $component
     * @return  Converter
     */
    public static function factory($component)
    {
        $class = 'Converter_'. $component;
        $class = new $class();

        if (! ($class instanceof Converter))
        {
            throw new Kohana_Exception('Unknown converter: :component', array(
                ':component' => $component
            ));
        }

        return $class;
    }

    public function __construct()
    {}

    /**
     * Run the converter
     *
     * @return void
     */
    public function run()
    {
        $this->_run();
    }

    /**
     * Revert converter
     *
     * @return void
     */
    public function revert()
    {
        $this->_revert();
    }

    abstract protected function _run();

    abstract protected function _revert();
}