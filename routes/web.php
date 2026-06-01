<?php

use Illuminate\Support\Facades\Route;
use App\Models\DeploymentRecord;
use App\Jobs\ProcessCloudDeployment;

// مسار الصفحة الرئيسية (يعرض الواجهة والسجلات معاً)
Route::get('/', function () {
    // جلب السجلات من الأحدث للأقدم
    $records = DeploymentRecord::latest()->get();
    return view('welcome', compact('records'));
});

// مسار تشغيل المهمة (عند الضغط على الزر)
Route::post('/simulate-deployment', function () {
    // إرسال المهمة للطابور للعمل في الخلفية
    ProcessCloudDeployment::dispatch();

    // إعادة المستخدم لنفس الصفحة مع رسالة نجاح
    return back()->with('success', 'تم إرسال أمر النشر! جاري التنفيذ في الخلفية...');
})->name('simulate.deploy');

// مسار صفحة (لوحة التحكم)
Route::get('/home', function () {
    return view('home');
});

// مسار صفحة من نحن
Route::get('/about', function () {
    return view('about');
});
