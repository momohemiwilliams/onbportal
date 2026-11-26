<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWrdRevampColumnsToOnboardingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onboardingformtemp', function (Blueprint $table) {
            if (!Schema::hasColumn('onboardingformtemp', 'eligibility_sub_type')) {
                $table->string('eligibility_sub_type')->nullable()->after('eligibility_type');
            }
            if (!Schema::hasColumn('onboardingformtemp', 'eligibility_other')) {
                $table->text('eligibility_other')->nullable()->after('eligibility_sub_type');
            }
            if (!Schema::hasColumn('onboardingformtemp', 'max_step_completed')) {
                $table->unsignedTinyInteger('max_step_completed')->default(0)->after('approval_status');
            }
            foreach (['nin_slip1', 'nin_slip2', 'nin_slip3', 'nin_slip4'] as $col) {
                if (!Schema::hasColumn('onboardingformtemp', $col)) {
                    $table->text($col)->nullable();
                }
            }
            foreach (['data_consent1', 'data_consent2', 'data_consent3', 'data_consent4'] as $col) {
                if (!Schema::hasColumn('onboardingformtemp', $col)) {
                    $table->text($col)->nullable();
                }
            }
            if (!Schema::hasColumn('onboardingformtemp', 'evidence_of_sec_renewal')) {
                $table->text('evidence_of_sec_renewal')->nullable();
            }
            if (!Schema::hasColumn('onboardingformtemp', 'deferral_request_doc')) {
                $table->text('deferral_request_doc')->nullable();
            }
            if (!Schema::hasColumn('onboardingformtemp', 'certified_correct')) {
                $table->boolean('certified_correct')->default(false);
            }
            if (!Schema::hasColumn('onboardingformtemp', 'payment_confirmed')) {
                $table->boolean('payment_confirmed')->default(false);
            }
            if (!Schema::hasColumn('onboardingformtemp', 'rejected_by_role')) {
                $table->string('rejected_by_role', 50)->nullable();
            }
            if (!Schema::hasColumn('onboardingformtemp', 'rejection_reason')) {
                $table->text('rejection_reason')->nullable();
            }
            if (!Schema::hasColumn('onboardingformtemp', 'drc_doc')) {
                $table->text('drc_doc')->nullable();
            }
            if (!Schema::hasColumn('onboardingformtemp', 'application_report_doc')) {
                $table->text('application_report_doc')->nullable();
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'eligibility_sub_type')) {
                $table->string('eligibility_sub_type')->nullable()->after('eligibility_type');
            }
            if (!Schema::hasColumn('users', 'eligibility_other')) {
                $table->text('eligibility_other')->nullable()->after('eligibility_sub_type');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('onboardingformtemp', function (Blueprint $table) {
            $cols = [
                'eligibility_sub_type',
                'eligibility_other',
                'max_step_completed',
                'nin_slip1', 'nin_slip2', 'nin_slip3', 'nin_slip4',
                'data_consent1', 'data_consent2', 'data_consent3', 'data_consent4',
                'evidence_of_sec_renewal',
                'deferral_request_doc',
                'certified_correct',
                'payment_confirmed',
                'rejected_by_role',
                'rejection_reason',
                'drc_doc',
                'application_report_doc',
            ];
            foreach ($cols as $col) {
                if (Schema::hasColumn('onboardingformtemp', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        Schema::table('users', function (Blueprint $table) {
            foreach (['eligibility_sub_type', 'eligibility_other'] as $col) {
                if (Schema::hasColumn('users', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
}

