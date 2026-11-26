<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OnboardingFormTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OnboardingFormTemp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name'); 
            $table->string('user_id'); 
            $table->string('user_email'); 
            $table->string('user_phone'); 
            $table->string('eligibility_type'); 
            $table->string('institution_name'); 
            $table->string('app_code'); 
            $table->string('company_address')->nullable();
            $table->string('direct_line')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_tax_number')->nullable();
            $table->string('company_reg_number')->nullable();
            $table->string('company_reg_date')->nullable();
            $table->string('settlement_bank')->nullable();
            $table->string('settlement_bank_account_number')->nullable(); 
            $table->string('lei_code')->nullable();
            $table->string('switt_code')->nullable();
            $table->string('managing_director_name')->nullable();
            $table->string('managing_director_email')->nullable();
            $table->string('managing_director_phone')->nullable();
            $table->string('managing_director_bvn')->nullable();
            $table->string('managing_director_nin')->nullable();
            $table->string('principal_director_name1')->nullable();
            $table->string('principal_director_phone1')->nullable();
            $table->string('principal_director_email1')->nullable();
            $table->string('principal_director_bvn1')->nullable();
            $table->string('principal_director_nin1')->nullable();
            $table->string('principal_director_designation1')->nullable();
            $table->string('principal_director_name2')->nullable();
            $table->string('principal_director_phone2')->nullable();
            $table->string('principal_director_email2')->nullable();
            $table->string('principal_director_bvn2')->nullable();
            $table->string('principal_director_nin2')->nullable();
            $table->string('principal_director_designation2')->nullable();
            $table->string('compliance_director_name')->nullable();
            $table->string('compliance_director_phone')->nullable();
            $table->string('compliance_director_email')->nullable();
            $table->string('compliance_director_bvn')->nullable();









            $table->string('compliance_director_nin')->nullable();
            $table->string('managing_director_nationality')->nullable();
            $table->string('principal_director_nationality1')->nullable();
            $table->string('principal_director_nationality2')->nullable();
            $table->string('general_correspondence_email')->nullable();
            $table->string('operations_team_email')->nullable();
            $table->string('other_groups_email')->nullable();
            $table->string('memorandumand_articles_of_association')->nullable();
            $table->string('board_resolution')->nullable();
            $table->string('signature_mandate_form')->nullable();
            $table->string('declaration_form')->nullable();
            $table->string('evidence_of_securities_and_exchange_commission')->nullable();
            $table->string('evidence_of_trading_exchange_license')->nullable();
            $table->string('certificate_of_incorporation')->nullable();
            $table->string('particulars_of_directors')->nullable();
            $table->string('means_of_identification1')->nullable();
            $table->string('means_of_identification2')->nullable();
            $table->string('means_of_identification3')->nullable();
            $table->string('means_of_identification4')->nullable();
            $table->string('name_of_company_secretary')->nullable();



            
            $table->string('Partner_BPID')->nullable();
            $table->string('Client_BPID')->nullable();
            $table->string('invoice_doc')->nullable();
            $table->string('receipt_doc')->nullable();
            $table->string('home_address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('purpose_for_securities')->nullable();
            $table->string('beneficial')->nullable();
            $table->string('source_of_fund')->nullable();
            $table->string('current_position')->nullable();
            $table->string('occupation')->nullable();
            $table->string('bvn')->nullable();
            $table->string('nim')->nullable();
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
