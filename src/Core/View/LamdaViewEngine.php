<?php


namespace Lamda\Core\View;


use RuntimeException;

class LamdaViewEngine
{
    protected string $viewsPath;
    protected string $cachePath;

    public function __construct(string $viewsPath, string $cachePath)
    {
        $this->viewsPath = $viewsPath;
        $this->cachePath = $cachePath;
        

        if(!is_dir($this->viewsPath)){
            throw new RuntimeException("Views path does not exist: {$this->viewsPath}");
        }

        if(!is_dir($this->cachePath)){
            mkdir($this->cachePath, 0755, true);
        }

    }

    /**
     * 
     * Render view .lamda.php menjadi HTML string
     */
    public function render(string $view, array $rawsData = []): string
    {
        
        $compiledFile = $this->compile($view);
        extract($rawsData, EXTR_SKIP);
        ob_start();
        include $compiledFile;
        return ob_get_clean();

    }


    /**
     * Compile: resources/views/home.lamda.php => storage/cache/home.lamda.php
     */

    protected function compile(string $view):string {
        // support nested folder: 'home/index', 'admin/users/index' ...
        $view = str_replace('.','/',$view);
        $viewFile = $this->viewsPath . '/' . $view . '.lamda.php';
        if(!file_exists($viewFile)){
            throw new RuntimeException("View Not Found: {$viewFile}");
        }

        // make miror parsing template
        $compiledFile = $this->cachePath . '/' . $view . '.lamda.php';
        

        // make sure directory cache already exists
        $compiledDir = dirname($compiledFile);
        if(!is_dir($compiledDir)){
            mkdir($compiledDir, 0777, true);
        }

        if(!file_exists($compiledFile) || filemtime($viewFile) > filemtime($compiledFile)){
            $raw = file_get_contents($viewFile);
            $parsed = $this->parseTemplate($raw);
            file_put_contents($compiledFile, $parsed);
        }

        return $compiledFile;

    }

    /**
     * 
     * 
     * Brain of templating Lamda
     * - {{ $var }}      -> escaped echo
     * - {!! $var !!}    -> raw echo
     * - @if/@elseif/@else/@endif
     * - @foreach/@endforeach
     * 
     * 
     */


    protected function parseTemplate(string $content): string
    {

        // {{ $var }} -> escaped
        $content = preg_replace_callback(
            '/\{\{\s*(.+?)\s*\}\}/s',
            fn($m) => '<?=  htmlspecialchars('.$m[1]. ', ENT_QUOTES, \'UTF-8\') ?>',
            $content
        );

        // {!! $var !!}
        $content = preg_replace_callback(
            '/\{\!\!\s*(.+?)\s*\!\!\}/s',
            fn($m) => '<?= '.$m[1].' ?>',
            $content
        );

        // @if (...)
        $content= preg_replace(
            '/@if\s*\((.+?)\)\s*$/m',
            '<?php if ($1): ?>',
            $content
        );

        // @elseif (...)
        $content = preg_replace(
            '/@elseif\s*\((.+?)\)\s*$/m',
            '<?php elseif ($1): ?>',
            $content
        );

        // @else
        $content = preg_replace(
            '/@else\s*$/m',
            '<?php else: ?>',
            $content
        );

        // @endif
        $content = preg_replace(
            '/@endif\s*$/m',
            '<?php endif; ?>',
            $content
        );

        //  @foreach (...)
        $content = preg_replace(
            '/@foreach\s*\((.+?)\)\s*$/m',
            '<?php foreach ($1): ?>',
            $content
        );

        // @endforeach
        $content = preg_replace(
            '/@endforeach\s*$/m',
            '<?php endforeach; ?>',
            $content
        );

        return $content;

    }
    

}