<?php
namespace Package\R3m\Io\Example\Trait;

use R3m\Io\App;
use R3m\Io\Config;

use R3m\Io\Module\Dir;
use R3m\Io\Module\Core;
use R3m\Io\Module\Event;
use R3m\Io\Module\File;
use R3m\Io\Module\Host;
use R3m\Io\Module\Parse;
use R3m\Io\Module\Sort;

use R3m\Io\Node\Model\Node;

use Exception;

use R3m\Io\Exception\DirectoryCreateException;
use R3m\Io\Exception\ObjectException;
trait Configure {

    /**
     * @throws DirectoryCreateException
     * @throws Exception
     */
    public function site($options=[]): void
    {
        $options = Core::object($options, Core::OBJECT_OBJECT);
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return;
        }
        $command = Core::binary($object) .
            ' r3m_io/basic apache2 site create' .
            ' -server.admin=development@universeorange.com' .
            ' -server.name=example.com' .
            ' -development'
        ;
        foreach($options as $key => $value){
            if($value === true){
                $command .= ' -' . $key;
            } else {
                $command .= ' -' . $key . '=' . $value;
            }
        }
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = Core::binary($object) .
            ' r3m_io/basic apache2 site enable' .
            ' -server.name=example.local'
        ;
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = Core::binary($object) . ' r3m_io/basic apache2 reload';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
    }
}