<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ChangeUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:change-user-password {email} {newPassword}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $newPassword = $this->argument('newPassword');
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->password = Hash::make($newPassword);
            $user->save();
            $this->info('Şifre güncelleme başarılı');
        } else {
            $this->error('Kullanıcı bulunamadı.');
        }
    }
}
