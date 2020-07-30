<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exceptions\InstallationFailedException;                                                     
use App\Model\User;                                                                                
use Exception;                                                                                      
use Illuminate\Contracts\Console\Kernel as Artisan;                                                 
use Illuminate\Contracts\Hashing\Hasher as Hash;                                                    
use Illuminate\Database\DatabaseManager as DB;                                                      
use Jackiedo\DotenvEditor\DotenvEditor;


class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arvan:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install pre-requisits of this web-service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        Artisan $artisan,                                                                           
        Hash $hash,                                                                                 
        DotenvEditor $dotenvEditor,                                                                 
        DB $db 
    ) {
        $this->artisan = $artisan;                                                                  
        $this->hash = $hash;                                                                        
        $this->db = $db;                                                                            
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->comment('Attempting to install or upgrade Koel.');                                   
        $this->comment('Remember, you can always install/upgrade manually following the guide here:');
        $this->info('📙  '.config('abr.misc.docs_url').PHP_EOL);

        if ($this->inNoInteractionMode()) {
            $this->info('Running in no-interaction mode');
        }

        try {
            $this->maybeGenerateAppKey();
            $this->maybeGenerateJwtSecret();
            $this->maybeSetUpDatabase();
            $this->migrateDatabase();
            $this->maybeSeedDatabase();
            $this->compileFrontEndAssets();
        } catch (Exception $e) {
            $this->error("Oops! Koel installation or upgrade didn't finish successfully.");
            $this->error('Please try again, or visit '.config('koel.misc.docs_url').' for manual installation.');
            $this->error('😥 Sorry for this. You deserve better.');

            return;
        }

        return 0;
    }

    private function inNoInteractionMode(): bool                                                    
    {                                                                                               
        return (bool) $this->option('no-interaction');                                              
    } 

    private function maybeGenerateAppKey(): void
    {
        if (!config('app.key')) {
            $this->info('Generating app key');
            $this->artisan->call('key:generate');
        } else {
            $this->comment('App key exists -- skipping');
        }
    }

    private function maybeGenerateJwtSecret(): void
    {
        if (!config('jwt.secret')) {
            $this->info('Generating JWT secret');
            $this->artisan->call('koel:generate-jwt-secret');
        } else {
            $this->comment('JWT secret exists -- skipping');
        }
    }

    private function maybeSetUpDatabase(): void
    {
        $dbSetUp = false;

        while (!$dbSetUp) {
            try {
                // Make sure the config cache is cleared before another attempt.
                $this->artisan->call('config:clear');
                $this->db->reconnect()->getPdo();
                $dbSetUp = true;
            } catch (Exception $e) {
                $this->error($e->getMessage());
                $this->warn(PHP_EOL."AbrService cannot connect to the database. Let's set it up.");
                $this->setUpDatabase();
            }
        }
    }

    private function maybeSeedDatabase(): void
    {
        if (!User::count()) {
            $this->setUpAdminAccount();
            $this->info('Seeding initial data');
            $this->artisan->call('db:seed', ['--force' => true]);
        } else {
            $this->comment('Data seeded -- skipping');
        }
    }

    private function migrateDatabase(): void
    {
        $this->info('Migrating database');
        $this->artisan->call('migrate', ['--force' => true]);
    }

    private function compileFrontEndAssets(): void
    {
        $this->info('Now to front-end stuff');

        // We need to run several yarn commands:
        // - The first to install node_modules in the resources/assets submodule
        // - The second and third for the root folder, to build Koel's front-end assets with Mix.

        chdir('./resources/assets');
        $this->info('├── Installing Node modules in resources/assets directory');

        $runOkOrThrow = static function (string $command): void {
            passthru($command, $status);
            throw_if((bool) $status, InstallationFailedException::class);
        };

        $runOkOrThrow('yarn install --colors');

        chdir('../..');
        $this->info('└── Compiling assets');

        $runOkOrThrow('yarn install --colors');
        $runOkOrThrow('yarn production --colors');
    }
}
