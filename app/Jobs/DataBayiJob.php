<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Imports\DataBayiImport;
use Illuminate\Support\Str;
use App\Models\DataBalita;
use Illuminate\Support\Facades\Storage;

class DataBayiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filename;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $files = (new DataBayiImport)->toArray(storage_path('app/public/uploads/' . $this->filename));

        foreach ($files[0] as $row) {
            DataBalita::create([
                'nama' => $row[1],
                'jk' => $row[2],
                'umur' => $row[3],
                'berat_badan' => $row[4],
                'tinggi_badan' => $row[5],
                'status' => $row[6],
            ]);
        }

        Storage::delete(storage_path('app/public/uploads/' . $this->filename));
    }
}
