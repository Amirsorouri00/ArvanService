<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;                                                                         
use Jackiedo\DotenvEditor\DotenvEditor;


class GenerateJwtSecretCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arvan:generate-jwt-secret';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the JWTAuth secret key used to sign the tokens';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DotenvEditor $dotenvEditor)
    {
        parent::__construct();
        $this->dotenvEditor = $dotenvEditor;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (config('jwt.secret')) {                                                                 
            $this->comment('JWT secret exists -- skipping');                                        
                                                                                                    
            return;                                                                                 
        }                                                                                           
                                                                                                    
        $this->info('Generating JWT secret');                                                       
        $this->dotenvEditor->setKey('JWT_SECRET', Str::random(32))->save();
        return 0;
    }
}
