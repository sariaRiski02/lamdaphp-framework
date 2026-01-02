<?php


namespace Lamda\Core\Console;


use Lamda\Core\Console\Commands\MakeModel;
use Lamda\Core\Console\Commands\MakeController;
use Lamda\Core\Console\Commands\MakeMiddleware;

class Kernel{
    protected array $commands = [
        
        'make:controller' => MakeController::class,
        'make:model' => MakeModel::class,
        'make:middleware' => MakeMiddleware::class
    ];

    public function handle(array $argv): int{
        if(count($argv) < 2){
            $this->showHelp();
            return 0;
        }

        $command = $argv[1];
        $arguments = array_slice($argv, 2);

        if(!isset($this->commands[$command])){
            echo "Command $command tidak ditemukan.\n";
            $this->showHelp();
            return 1;
        }

        $commandClass = $this->commands[$command];
        $instance = new $commandClass();

        return $instance->execute($arguments);

    }
    protected function showHelp(): void{
        echo "LamdaPHP Command Line Interface\n";
        echo "\nAvailable Commands:\n";
        foreach ($this->commands as $name => $class) {
            echo "  php lamda $name\n";
        }
    }
}