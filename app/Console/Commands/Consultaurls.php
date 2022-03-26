<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Url;
use App\Models\UrlMonitora;
use Exception;

class Consultaurls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consultaurls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
      $client = new \GuzzleHttp\Client();

      $url = URL::all();    
      foreach($url as $u){
        $url = new UrlMonitora();
        try{
          $res = $client->request('GET', $u->url);          
          $url->url_id = $u->id;
          $url->status_code = $res->getStatusCode();
          $url->response = urlencode($res->getBody()->getContents());         
         // $url->response = urlencode(file_get_contents($u->url));
        }      
        catch(Exception $e){          
          $url->url_id = $u->id;
          $url->status_code = 500;
          $url->response = $e->getMessage();    
        }
       
        $url->save();        
    }
    \Log::info("Cron is working fine!");
  }
}
