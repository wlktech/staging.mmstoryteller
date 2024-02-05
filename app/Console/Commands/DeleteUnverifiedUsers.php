<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteUnverifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';
    protected $signature = 'users:delete-unverified';
    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Delete users with email_verified_at set to null.';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Delete unverified users
        $deletedCount = User::whereNull('email_verified_at')->delete();
        if ($deletedCount > 0) {
            $this->info('Unverified users deleted successfully.');
        } else {
            $this->info('No unverified users found.');
        }
        return Command::SUCCESS;
    }
}
