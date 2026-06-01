<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\DeploymentRecord;

class ProcessCloudDeployment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        // محاكاة عملية بناء ونشر تأخذ 5 ثواني
        sleep(5);

        // إضافة سجل جديد في قاعدة البيانات بعد انتهاء الـ 5 ثواني
        DeploymentRecord::create([
            'status' => 'تمت عملية النشر بنجاح على الخادم السحابي - الوقت: ' . now()->format('H:i:s')
        ]);
    }
}
