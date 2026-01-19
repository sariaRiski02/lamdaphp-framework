<?php

namespace Lamda\Core\Console\Commands;

class MakeController
{
    public function execute(array $arguments): int
    {
        if (empty($arguments)) {
            echo "Usage: php lamda make:controller <ControllerName>\n";
            echo "Example: php lamda make:controller GuestController\n";
            return 1;
        }

        $controllerName = $arguments[0];

        // Validasi nama controller
        if (!preg_match('/^[A-Z][a-zA-Z0-9]*Controller$/', $controllerName)) {
            echo "Error: Controller name harus CamelCase dan diakhiri 'Controller'\n";
            echo "Example: GuestController, UserController\n";
            return 1;
        }

        $basePath = dirname(dirname(dirname(dirname(__DIR__))));
        $controllerPath = $basePath . '/app/Http/Controllers/' . $controllerName . '.php';
        $controllerDir = dirname($controllerPath);

        // Buat direktori jika belum ada
        if (!is_dir($controllerDir)) {
            mkdir($controllerDir, 0755, true);
        }

        // Cek file sudah ada
        if (file_exists($controllerPath)) {
            echo "Error: Controller '$controllerName' sudah ada di $controllerPath\n";
            return 1;
        }

        // Generate template controller
        $template = $this->generateTemplate($controllerName);

        // Tulis file
        if (file_put_contents($controllerPath, $template) === false) {
            echo "Error: Gagal membuat file controller\n";
            return 1;
        }

        echo "✓ Controller '$controllerName' berhasil dibuat di app/Http/Controllers/$controllerName.php\n";
        return 0;
    }

    protected function generateTemplate(string $controllerName): string
    {
        return <<<PHP
<?php

namespace App\Http\Controllers;

use Lamda\Core\Http\Controller;

class $controllerName extends Controller
{
    //
}
PHP;
    }
}
