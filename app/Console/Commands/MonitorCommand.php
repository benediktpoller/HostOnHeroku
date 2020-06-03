<?php

namespace App\Console\Commands;

use App\Models\Monitor as ModelsMonitor;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

use \App\Models\Monitor;
use Illuminate\Support\Facades\Http;

class MonitorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:run {interval : Site interval}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run monitors';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $interval = $this->argument('interval');

        // TODO limit monitor$monitors to server (server1 1-100, server2 101-200,...)
        $monitors = Monitor::orderBy('label', 'asc')->where('interval', $interval)->get();

        foreach ($monitors as $monitors) { 

            try {
                $client = new \GuzzleHttp\Client();
                $response = $client->get($monitors->url, [
                    'allow_redirects' => false,
                    'connect_timeout' => 3,
                    'on_stats' => function (\GuzzleHttp\TransferStats $stats) {
                        $this->info($stats->getEffectiveUri() . ' : ' . $stats->getTransferTime()); 
                        // dd($stats);

                        // $check->fill($stats);
                    }
                ]);
                $this->info($response->getStatusCode());
                
            } catch(\GuzzleHttp\Exception\ConnectException $e) {
                // Handle excpetion
                $this->info($e);
            }
        }
    }
}
