<?php

namespace App\Http\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermission('update.packages');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'slug' => ['required', 'string', 'max:255', 'min:3'],
            'enabled' => ['required', 'boolean'],
            'max_addon_domains' => ['required', 'min:0', 'integer'],
            'max_databases' => ['required', 'min:0', 'integer'],
            'max_email_accounts' => ['required', 'min:0', 'integer'],
            'max_email_errors_per_domain' => ['required', 'min:0', 'integer'],
            'max_email_list' => ['required', 'min:0', 'integer'],
            'max_ftp_accounts' => ['required', 'min:0', 'integer'],
            'max_hourly_relayed_emails_per_domain' => ['required', 'min:0', 'integer'],
            'max_parked_domains' => ['required', 'min:0', 'integer'],
            'max_quota_per_email' => ['required', 'min:0', 'integer'],
            'max_subdomains' => ['required', 'min:0', 'integer'],
            'monthly_bandwidth' => ['required', 'min:0', 'integer'],
            'panel_theme_id' => ['required', 'min:0', 'integer'],
            'cgi_access' => ['required', 'boolean'],
            'shell_access' => ['required', 'boolean'],
            'two_factor_auth_security' => ['required', 'boolean'],
            'disk_quota' => ['required', 'min:0', 'integer'],
            'dedicated_ip' => ['required', 'boolean'],
            'local' => ['required', 'string', 'max:255', 'min:3'],
        ];
    }
}
