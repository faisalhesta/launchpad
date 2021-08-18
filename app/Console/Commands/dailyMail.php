<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Models\User;

class dailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will send list of unapproved user to admin in mail';

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
     * @return int
     */
    public function handle()
    {
        $admins = User::where('user_type','0')->get()->toArray();
        $users = User::where('user_type','!=','0')->where('email_verified_at',null)->get()->toArray();
        foreach($admins as $admin){
            $data = ['name'=>$admin['name'],'users'=>$users,'data'=>"Hey admin please check the list of unapproved users!",'email'=>'faisal@mailinator.com'];
            Mail::send('mail.users', $data, function ($message) use($admin) {
                $message->to($admin['email']);
                $message->subject('Approval Request');
            });
        }
        echo "Mail done";
    }
}
