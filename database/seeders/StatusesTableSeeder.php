<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'id' => 1,
                'created_at' => '2025-02-24 21:19:21',
                'updated_at' => '2025-03-02 23:00:45',
                'status_name' => 'Order Received',
                'status_description' => 'The order has been registered in the system and forwarded for further processing.',
                'order' => 1,
                'active' => 1,
            ],
            [
                'id' => 2,
                'created_at' => '2025-02-24 21:20:15',
                'updated_at' => '2025-03-02 23:01:14',
                'status_name' => 'File Approval',
                'status_description' => 'The submitted files have been checked for correctness and approved for printing. After approval, they proceed to production.',
                'order' => 2,
                'active' => 1,
            ],
            [
                'id' => 3,
                'created_at' => '2025-02-24 21:21:21',
                'updated_at' => '2025-03-02 23:01:38',
                'status_name' => 'Printing',
                'status_description' => 'The prints for the campaign are produced using the technology that matches the order specifications.',
                'order' => 3,
                'active' => 1,
            ],
            [
                'id' => 7,
                'created_at' => '2025-02-24 21:23:36',
                'updated_at' => '2025-03-02 23:02:31',
                'status_name' => 'Distribution',
                'status_description' => 'The prints are delivered to the final recipients.',
                'order' => 4,
                'active' => 1,
            ],
        ]);
    }
}
