<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Milebits\Eloquent\Filters\Concerns\Enableable;
use Milebits\Eloquent\Filters\Concerns\Filterable;
use Milebits\Eloquent\Filters\Concerns\Nameable;
use Milebits\Eloquent\Filters\Concerns\Sluggable;

/**
 * @mixin IdeHelperPackage
 */
class Package extends Model
{
    use HasFactory, SoftDeletes, Nameable, Sluggable, Enableable, Filterable;

    protected $fillable = [
        'max_addon_domains', 'max_databases', 'max_email_accounts', 'max_email_errors_per_domain',
        'max_email_list', 'max_ftp_accounts', 'max_hourly_relayed_emails_per_domain', 'max_parked_domains',
        'max_quota_per_email', 'max_subdomains', 'monthly_bandwidth', 'panel_theme_id', 'cgi_access', 'shell_access',
        'two_factor_auth_security', 'disk_quota', 'dedicated_ip', 'local',
    ];

    /**
     * @return BelongsToMany
     */
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(PackageFeature::class);
    }

    /**
     * @return BelongsTo
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(PanelTheme::class);
    }
}
