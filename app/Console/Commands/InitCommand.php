<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exceptions\InstallationFailedException;                                                     
use App\User;                                                                                
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

    private $artisan;                                                                               
    private $dotenvEditor;                                                                          
    private $hash;                                                                                  
    private $db;                                                                                    


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
        parent::__construct();

        $this->dotenvEditor = $dotenvEditor;
        $this->artisan = $artisan;                                                                  
        $this->hash = $hash;                                                                        
        $this->db = $db;                                                                            
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
            // $this->compileFrontEndAssets();
        } catch (Exception $e) {
            echo($e);
            $this->error("Oops! ArvanService installation or upgrade didn't finish successfully.");
            $this->error('Please try again, or visit '.config('abr.misc.docs_url').' for manual installation.');
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
            $this->artisan->call('arvan:generate-jwt-secret');
        } else {
            $this->comment('JWT secret exists -- skipping');
        }
    }

        /**
     * Prompt user for valid database credentials and set up the database.
     */
    private function setUpDatabase(): void
    {
        $config = [
            'DB_CONNECTION' => '',
            'DB_HOST' => '',
            'DB_PORT' => '',
            'DB_DATABASE' => '',
            'DB_USERNAME' => '',
            'DB_PASSWORD' => '',
        ];

        $config['DB_CONNECTION'] = $this->choice(
            'Your DB driver of choice',
            [
                'mysql' => 'MySQL/MariaDB',
                'pgsql' => 'PostgreSQL',
                'sqlsrv' => 'SQL Server',
                'sqlite-e2e' => 'SQLite',
            ],
            'mysql'
        );

        if ($config['DB_CONNECTION'] === 'sqlite-e2e') {
            $config['DB_DATABASE'] = $this->ask('Absolute path to the DB file: ./database/AbrDB.db');
        } else {
            $config['DB_HOST'] = $this->anticipate('DB host', ['127.0.0.1', 'localhost']);
            $config['DB_PORT'] = (string) $this->ask('DB port (leave empty for default)');
            $config['DB_DATABASE'] = $this->anticipate('DB name', ['koel']);
            $config['DB_USERNAME'] = $this->anticipate('DB user', ['koel']);
            $config['DB_PASSWORD'] = (string) $this->ask('DB password');
        }

        foreach ($config as $key => $value) {
            $this->dotenvEditor->setKey($key, $value);
        }

        $this->dotenvEditor->save();

        // Set the config so that the next DB attempt uses refreshed credentials
        config([
            'database.default' => $config['DB_CONNECTION'],
            "database.connections.{$config['DB_CONNECTION']}.host" => $config['DB_HOST'],
            "database.connections.{$config['DB_CONNECTION']}.port" => $config['DB_PORT'],
            "database.connections.{$config['DB_CONNECTION']}.database" => $config['DB_DATABASE'],
            "database.connections.{$config['DB_CONNECTION']}.username" => $config['DB_USERNAME'],
            "database.connections.{$config['DB_CONNECTION']}.password" => $config['DB_PASSWORD'],
        ]);
    }

    private function setUpAdminAccount(): void
    {
        $this->info("Let's create the admin account.");

        [$name, $email, $phone, $username, $password] = $this->gatherAdminAccountCredentials();

        User::create([
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'phone' => $phone,
            'password' => $this->hash->make($password),
            'is_admin' => true,
        ]);
    }

        /** @return array<string> */
        private function gatherAdminAccountCredentials(): array
        {
            if ($this->inNoInteractionMode()) {
                return [config('arvan.admin.name'), config('arvan.admin.email'), config('arvab.admin.password')];
            }
    
            $name = $this->ask('Your name', config('arvan.admin.name'));
            $username = $this->ask('Your username', config('arvan.admin.username'));
            $email = $this->ask('Your email address', config('arvan.admin.email'));
            $phone = $this->ask('Your phone number address', config('arvan.admin.phoneNumber'));
            $passwordConfirmed = false;
            $password = null;
    
            while (!$passwordConfirmed) {
                $password = $this->secret('Your desired password');
                $confirmation = $this->secret('Again, just to make sure');
    
                if ($confirmation !== $password) {
                    $this->error("That doesn't match. Let's try again.");
                } else {
                    $passwordConfirmed = true;
                }
            }
    
            return [$name, $email, $phone, $username, $password];
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
        echo(User::count());
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
