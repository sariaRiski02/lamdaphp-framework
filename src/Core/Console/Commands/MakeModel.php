<?php

namespace Lamda\Core\Console\Commands;

class MakeModel
{
    public function execute(array $arguments): int
    {
        if (empty($arguments)) {
            echo "Usage: php lamda make:model <ModelName>\n";
            echo "Example: php lamda make:model User\n";
            return 1;
        }

        $modelName = $arguments[0];

        // Validasi nama model
        if (!preg_match('/^[A-Z][a-zA-Z0-9]*$/', $modelName)) {
            echo "Error: Model name harus CamelCase\n";
            echo "Example: User, Post, Comment\n";
            return 1;
        }

        $basePath = dirname(dirname(dirname(dirname(__DIR__))));
        $modelPath = $basePath . '/app/Models/' . $modelName . '.php';
        $modelDir = dirname($modelPath);

        // Buat direktori jika belum ada
        if (!is_dir($modelDir)) {
            mkdir($modelDir, 0755, true);
        }

        // Cek file sudah ada
        if (file_exists($modelPath)) {
            echo "Error: Model '$modelName' sudah ada di $modelPath\n";
            return 1;
        }

        // Generate template model
        $template = $this->generateTemplate($modelName);

        // Tulis file
        if (file_put_contents($modelPath, $template) === false) {
            echo "Error: Gagal membuat file model\n";
            return 1;
        }

        echo "✓ Model '$modelName' berhasil dibuat di app/Models/$modelName.php\n";
        return 0;
    }

    protected function generateTemplate(string $modelName): string
    {
        return <<<PHP
<?php

namespace App\Models;

use Lamda\Core\Model\Model;

class $modelName extends Model
{
    protected static string \$table = '<table_name>';

    // 
}
PHP;
    }
}
