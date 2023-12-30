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
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return;
        }
        ddd($options);


        //php and apache2 should be installed by docker.
        //if there is a different sury package, there are multiple versions
        $dir = new Dir();
        $read = $dir->read('/etc/php/');
        $read = Sort::list($read)->with(['name' => 'desc']);
        $file_old = false;
        if(count($read) === 1){
            $file = current($read);
        } else {
            $file = current($read);
            $file_old = end($read);
        }
        $fpm = 'php' . $file->name . '-fpm';
        if($file_old){
            $php = 'php' . $file_old->name;
        } else {
            $php = 'php' . $file->name;
        }
        Dir::create('/run/php');
        $command = 'a2enmod proxy_fcgi setenvif';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enconf ' . escapeshellarg($fpm);
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2dismod ' . escapeshellarg($php);
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2dismod mpm_prefork';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod mpm_event';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod http2';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod rewrite';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod ssl';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod md';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = '. /etc/apache2/envvars';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
    }
}