<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        // ข้อมูลส่วนตัว (1-8)
        $table->string('employee_code')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->enum('gender', ['Male', 'Female', 'Other']);
        $table->date('date_of_birth');
        $table->string('id_card_number')->unique();
        $table->string('email')->unique();
        $table->string('phone_number');
        
        // ข้อมูลที่อยู่ (9-12)
        $table->text('address');
        $table->string('district');
        $table->string('province');
        $table->string('postal_code');
        
        // ข้อมูลการทำงาน (13-16)
        $table->string('department');
        $table->string('position');
        $table->decimal('salary', 10, 2);
        $table->date('hire_date');
        
        // ข้อมูลติดต่อฉุกเฉิน (17-18)
        $table->string('emergency_contact_name');
        $table->string('emergency_contact_phone');
        
        $table->timestamps(); // สร้าง created_at และ updated_at อัตโนมัติ
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
