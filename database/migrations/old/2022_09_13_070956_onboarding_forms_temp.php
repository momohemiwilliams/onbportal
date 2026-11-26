<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OnboardingFormsTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OnboardingFormsTemp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name'); 
            $table->string('user_id');
            $table->string('user_email');
            $table->string('user_phone'); 
            $table->string('eligibility_type'); 
            $table->string('institution_id'); 
            $table->string('app_code'); 
            $table->string('company_address')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_reg_number')->nullable();
            $table->string('company_reg_date')->nullable();
            $table->string('settlement_bank')->nullable();
            $table->string('settlement_bank_account_number')->nullable(); 
            $table->string('lei_code')->nullable();
            $table->string('switt_code')->nullable();
            $table->string('managing_director_name')->nullable();
            $table->string('managing_director_email')->nullable();
            $table->string('managing_director_phone')->nullable();
            $table->string('principal_director_name')->nullable();
            $table->string('principal_director_phone')->nullable();
            $table->string('principal_director_email')->nullable();
            $table->string('compliance_director_name')->nullable();
            $table->string('compliance_director_phone')->nullable();
            $table->string('compliance_director_email')->nullable();
            $table->string('memorandumand_articles_of_association')->nullable();
            $table->string('board_resolution')->nullable();
            $table->string('signature_mandate_form')->nullable();
            $table->string('evidence_of_securities_and_exchange_commission')->nullable();
            $table->string('evidence_of_trading_exchange_license')->nullable();
            $table->string('name_of_company_secretary')->nullable();
            $table->string('company_secretary_signature')->nullable();
            $table->string('company_secretary_signature_date')->nullable();
            $table->string('name_of_company_managing_director')->nullable();
            $table->string('company_managing_director_signature')->nullable();
            $table->string('company_managing_director_signature_date')->nullable();
            $table->string('name_of_institution1')->nullable();
            $table->string('name_of_signatory1')->nullable();
            $table->string('signature_specimen1')->nullable();
            $table->string('signature_class1')->nullable();
            $table->string('recent_passport_photpgraph1')->nullable();
            $table->string('name_of_institution2')->nullable();
            $table->string('name_of_signatory2')->nullable();
            $table->string('signature_specimen2')->nullable();
            $table->string('signature_class2')->nullable();
            $table->string('recent_passport_photpgraph2')->nullable();
            $table->string('name_of_institution3')->nullable();
            $table->string('name_of_signatory3')->nullable();
            $table->string('signature_specimen3')->nullable();
            $table->string('signature_class3')->nullable();
            $table->string('recent_passport_photpgraph3')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
