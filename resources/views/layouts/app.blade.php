namespace App\Providers;

use Illuminate\Support\Facades\URL; // This line is vital!
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Force HTTPS so Railway doesn't block your CSS
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
