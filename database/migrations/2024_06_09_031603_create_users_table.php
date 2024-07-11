<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

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
            $table->string('nombre', 255);
            $table->date('fechaNacimiento');
            $table->string('telefono', 15);
            $table->string('email');
            $table->string('password');
            $table->string('tipoUsuario', 15);
            $table->string('especialidad', 30)->nullable();
            $table->string('area', 30)->nullable();
            $table->timestamps(); // Añade las columnas created_at y updated_at
            $table->rememberToken();
        });

        DB::table('users')->insert([
            [
                'nombre' => 'Fabián Montes',
                'fechaNacimiento' => '1990-07-13',
                'telefono' => '834-123-4567',
                'email' => 'fabianmontes@gmail.com',
                'password' => Hash::make('12345678'),
                'tipoUsuario' => 'doctor',
                'especialidad' => 'Dermatología',
                'area' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Damaris Espinosa',
                'fechaNacimiento' => '1990-12-13',
                'telefono' => '834-123-4567',
                'email' => 'damarisespinosa@gmail.com',
                'password' => Hash::make('12345678'),
                'tipoUsuario' => 'admin',
                'especialidad' => null,
                'area' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Luisa García',
                'fechaNacimiento' => '1990-07-13',
                'telefono' => '834-123-4567',
                'email' => 'luisagarcia@gmail.com	',
                'password' => Hash::make('12345678'),
                'tipoUsuario' => 'secretaria',
                'especialidad' => null,
                'area' => 'Laboratorios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
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
