<?php

namespace App\Console\Commands;

use App\Member;
use App\Notifications\NotloggedinUser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UserNotLoggedIn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UserNotLoggedin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command  that runs daily​ that will send an email
            notification to users ​ who didn’t login from the past month​';

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

        $today = Carbon::now()->setTimezone('Africa/Cairo');

        $members = Member::where('last_login' ,'<' ,$today->subDays(30)->toDateTimeString())->get();
        foreach ($members as $member)
        {
            $member->notify(new NotloggedinUser());
        }



    }
}
