<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('parties', function (Blueprint $table) {
            // New Company Fields
            $table->string('company_name')->nullable()->after('party_type');
            $table->text('company_address')->nullable()->after('company_name');
            $table->enum('company_type', [
                'proprietor',
                'partnership', 
                'private_limited',
                'public_limited',
                'one_person_company',
                'limited_liability_partnership'
            ])->nullable()->after('company_address');
            
            $table->enum('vendor_type', ['customer', 'supplier', 'both'])->nullable()->after('company_type');
            $table->string('company_pan')->nullable()->after('vendor_type');
            $table->string('company_gst')->nullable()->after('company_pan');
            $table->string('company_tan')->nullable()->after('company_gst');
            $table->string('company_msme')->nullable()->after('company_tan');
            $table->date('date_of_incorporation')->nullable()->after('company_msme');
            $table->string('contact_person')->nullable()->after('date_of_incorporation');

            // Primary Contact Fields
            $table->string('primary_name')->nullable()->after('contact_person');
            $table->string('primary_email')->nullable()->after('primary_name');
            $table->string('primary_mobile')->nullable()->after('primary_email');
            $table->string('primary_whatsapp')->nullable()->after('primary_mobile');
            $table->date('primary_dob')->nullable()->after('primary_whatsapp');

            // Secondary Contact Fields
            $table->string('secondary_name')->nullable()->after('primary_dob');
            $table->string('secondary_email')->nullable()->after('secondary_name');
            $table->string('secondary_mobile')->nullable()->after('secondary_email');
            $table->string('secondary_whatsapp')->nullable()->after('secondary_mobile');
            $table->date('secondary_dob')->nullable()->after('secondary_whatsapp');

            // Bank Details
            $table->string('bank_name')->nullable()->after('secondary_dob');
            $table->string('bank_branch')->nullable()->after('bank_name');
            $table->string('bank_account_no')->nullable()->after('bank_branch');
            $table->string('ifsc_code')->nullable()->after('bank_account_no');
            $table->string('micr_code')->nullable()->after('ifsc_code');

            // Document paths (for file uploads)
            $table->string('pan_document')->nullable()->after('micr_code');
            $table->string('tan_document')->nullable()->after('pan_document');
            $table->string('gst_document')->nullable()->after('tan_document');
            $table->string('msme_document')->nullable()->after('gst_document');
            $table->string('cancelled_cheque')->nullable()->after('msme_document');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parties', function (Blueprint $table) {
            $table->dropColumn([
                'company_name', 'company_address', 'company_type', 'vendor_type',
                'company_pan', 'company_gst', 'company_tan', 'company_msme', 
                'date_of_incorporation', 'contact_person',
                'primary_name', 'primary_email', 'primary_mobile', 'primary_whatsapp', 'primary_dob',
                'secondary_name', 'secondary_email', 'secondary_mobile', 'secondary_whatsapp', 'secondary_dob',
                'bank_name', 'bank_branch', 'bank_account_no', 'ifsc_code', 'micr_code',
                'pan_document', 'tan_document', 'gst_document', 'msme_document', 'cancelled_cheque'
            ]);
        });
    }
};
