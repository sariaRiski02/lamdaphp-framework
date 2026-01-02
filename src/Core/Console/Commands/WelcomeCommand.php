<?php

namespace Lamda\Core\Console;

class WelcomeCommand
{
    public function show(): string
    {
        $welcome = "
╔════════════════════════════════════════════════════════════╗
║                                                            ║
║           🚀 Welcome to LamdaPHP Framework! 🚀             ║
║                                                            ║
║                    a silly project                         ║
║                                                            ║
║                Framework by Rizky Saria                    ║
║                                                            ║
╚════════════════════════════════════════════════════════════╝

✓ Installation successful!
✓ Start building amazing applications with LamdaPHP

📚 Documentation: https://github.com/sariaRiski02/lamdaphp-framework
💬 Author: Rizky Saria

Happy Coding! 🎉

";
        return $welcome;
    }
}