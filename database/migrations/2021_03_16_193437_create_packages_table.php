<?php

use App\ManageEL;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('enabled')->default(true);
            $table->bigInteger('disk_quota')->default(ManageEL::gigaBytes(10));
            $table->bigInteger('monthly_bandwidth')->default(ManageEL::teraBytes());
            $table->bigInteger('max_ftp_accounts')->default(0);
            $table->bigInteger('max_email_accounts')->default(0);
            $table->bigInteger('max_quota_per_email')->default(ManageEL::megaBytes());
            $table->bigInteger('max_email_list')->default(0);
            $table->bigInteger('max_databases')->default(0);
            $table->bigInteger('max_subdomains')->default(0);
            $table->bigInteger('max_parked_domains')->default(0);
            $table->bigInteger('max_addon_domains')->default(0);
            $table->bigInteger('max_hourly_relayed_emails_per_domain')->default(0);
            $table->bigInteger('max_email_errors_per_domain')->default(100);
            $table->boolean('dedicated_ip')->default(false);
            $table->boolean('shell_access')->default(false);
            $table->boolean('cgi_access')->default(false);
            $table->boolean('two_factor_auth_security')->default(false);
            $table->foreignId('panel_theme_id')->default(1);
            $table->string('local')->default('en_US');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
