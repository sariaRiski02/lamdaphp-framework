<?php

namespace Lamda\Core\Console\Commands;

class MakeMiddleware
{
    public function execute(array $arguments): int
    {
        if (empty($arguments)) {
            echo "Usage: php lamda make:middleware <MiddlewareName>\n";
            echo "Example: php lamda make:middleware AuthMiddleware\n";
            return 1;
        }

        $middlewareName = $arguments[0];

        // Validasi nama Middleware
        if (!preg_match('/^[A-Z][a-zA-Z0-9]*$/', $middlewareName)) {
            echo "Error: Middleware name harus CamelCase\n";
            echo "Example: AuthMiddleware, LoggingMiddleware\n";
            return 1;
        }

        $basePath = dirname(dirname(dirname(dirname(__DIR__))));
        $middlewarePath = $basePath . '/app/Middleware/' . $middlewareName . '.php';
        $middlewareDir = dirname($middlewarePath);

        // Buat direktori jika belum ada
        if (!is_dir($middlewareDir)) {
            mkdir($middlewareDir, 0755, true);
        }

        // Cek file sudah ada
        if (file_exists($middlewarePath)) {
            echo "Error: Middleware '$middlewareName' sudah ada di $middlewarePath\n";
            return 1;
        }

        // Generate template middleware
        $template = $this->generateTemplate($middlewareName);

        // Tulis file
        if (file_put_contents($middlewarePath, $template) === false) {
            echo "Error: Gagal membuat file middleware\n";
            return 1;
        }

        echo "✓ Middleware '$middlewareName' berhasil dibuat di app/Middleware/$middlewareName.php\n";
        return 0;
    }

    protected function generateTemplate(string $middlewareName): string
    {
        return <<<PHP
<?php

namespace App\Models;

use Lamda\Core\Model\Model;

class $middlewareName
{
    public function handle(){
        
        // buat logic anda disini untuk middleware atau melidungi route
        
    }
}
PHP;
    }
}
