<?php

namespace App\Console\Commands;

use App\Mail\weeklyDigest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending a weekly mail to all users';

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
        $users = User::all();
        $date = date('Y-m-d');
        $from = Carbon::parse($date)->subWeek()->format('Y-m-d');
        $to = Carbon::parse($date)->addday()->format('Y-m-d');
        $thisWeekArticles = Article::whereBetween('created_at', [$from, $to])->get();
     
        foreach($users as $user){
            Mail::to($user->email)->send(new weeklyDigest($user, $thisWeekArticles));
        }
        
    }
}
