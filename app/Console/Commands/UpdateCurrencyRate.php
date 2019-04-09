<?php

namespace app\Console\Commands;

use Illuminate\Console\Command;
use app\MyClasses\Cbr;

class UpdateCurrencyRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updatecurrencyrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily update curremcy rate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Cbr::get();
    }
}
