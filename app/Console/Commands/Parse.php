<?php

namespace App\Console\Commands;

use App\Services\IParser;
use Illuminate\Console\Command;

class Parse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parse feed from given url';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(IParser $parser): void
    {
        $parser->parse($this->argument('url'));
        $this->info("Parsing complete.");
    }
}
