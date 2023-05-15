<?php

namespace App\Console\Commands;

use App\Models\LichSuDat;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoChangeStatusOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'autochangestatusorder:cron';

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
        $now = Carbon::now()->isoFormat('DD/MM/YYYY HH:mm:ss');
        $parts = explode(' ', $now);

        $datePart = $parts[0];
        $timePart = $parts[1];
        $bookHistory = LichSuDat::join('SuatChieu as SC', 'SC.maSuatChieu', '=', 'LichSuDat.maSuatChieu')
            ->where('LichSuDat.trangThai', '1')
            ->where('SC.ngayChieu', '<', $datePart)
            ->orWhere(function ($query) use ($datePart, $timePart) {
                $query->where('SC.ngayChieu', $datePart)
                    ->where('SC.gioChieu', '<', $timePart);
            })
            ->get();

        foreach ($bookHistory as $bookingHistory) {
            $bookingHistory->trangThai = '2';
            $bookingHistory->save();
        }
    }
}
