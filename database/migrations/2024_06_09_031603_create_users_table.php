<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->string('password');
            $table->string('correo', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('area', 50)->nullable();
            $table->string('tipoUsuario', 15);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'nombre' => 'Damaris',
                'apellidos' => 'Espinosa',
                'password' => Hash::make('12345678'),
                'correo' => 'damarisespinosa@gmail.com',
                'telefono' => '8342737255',
                'area' => 'Dermatología',
                'tipoUsuario' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('correo')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
}
