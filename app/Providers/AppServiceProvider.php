<?php

namespace App\Providers;

use App\Models\ActivityLog;
use App\Services\Chart\ChartByMonthCountInterface;
use App\Services\Chart\ChartByMonthCountService;
use App\Services\Chart\ChartByRelationCountInterface;
use App\Services\Chart\ChartByRelationCountService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ChartByMonthCountInterface::class, ChartByMonthCountService::class);
        $this->app->bind(ChartByRelationCountInterface::class, ChartByRelationCountService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ActivityLog::saving(function (ActivityLog $activity) {
            if (! $activity->causer_id && Auth::check()) {
                $activity->causer_id = Auth::id(); // أو auth()->id()
                $activity->causer_type = get_class(Auth::user());
            }
        });
        
    }
}
