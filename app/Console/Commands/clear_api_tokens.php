<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class clear_api_tokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api_tokens:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears expired api tokens in Database';

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
        DB::table('oauth_refresh_tokens')->where('expires_at','<',Carbon::today())->delete();
        $oauth_access_tokens = DB::table('oauth_access_tokens')->where('expires_at','<',Carbon::today())->get();
        foreach($oauth_access_tokens as $oauth_access_token){
            if(!DB::table('oauth_refresh_tokens')->where('access_token_id',$oauth_access_token->id)->exists()){
                DB::table('oauth_access_tokens')->where('id',$oauth_access_token->id)->delete();
            }
        }
    }
}
