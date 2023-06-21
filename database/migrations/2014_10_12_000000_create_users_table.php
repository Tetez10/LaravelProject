<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('email')->default('')->nullable();            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('role')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'UsersTableSeeder',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
