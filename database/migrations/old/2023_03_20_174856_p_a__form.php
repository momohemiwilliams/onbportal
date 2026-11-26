<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PAForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
        




            Schema::create('PA_Form', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_name'); 
                $table->string('user_id');
                $table->string('user_email');
                $table->string('user_phone'); 
                $table->string('eligibility_type'); 
                $table->string('name_private_account_holder'); 
                $table->string('app_code'); 
                $table->string('home_address')->nullable();
                $table->string('email_address')->nullable();
                $table->string('mobile_number')->nullable();
                $table->string('nationality'); 
                $table->string('name_of_bank')->nullable();
                $table->string('bank_account_number')->nullable(); 
                $table->string('bvi')->nullable();
                $table->string('nim')->nullable();
                $table->string('tin')->nullable();
                $table->string('purpose_for_account')->nullable();
                $table->string('beneficial')->nullable();
                $table->string('source_of_fund')->nullable();
                $table->string('occupation')->nullable();
                $table->string('office_address')->nullable();
                $table->string('current_position')->nullable();
                $table->string('signature_mandate_form')->nullable();
                $table->string('means_of_identification')->nullable();
                $table->string('Partner_BPID')->nullable();
                $table->string('Client_BPID')->nullable();
                $table->string('approval_status')->nullable();
                $table->string('invoice_doc')->nullable();
                $table->string('receipt_doc')->nullable();
                $table->timestamps();
            });
        }
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
