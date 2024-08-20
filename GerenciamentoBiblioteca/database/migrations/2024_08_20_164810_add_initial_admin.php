<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddInitialAdmin extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Verifique se o administrador já existe para evitar duplicação
        if (DB::table('usuarios')->where('email', '123@admin.com')->doesntExist()) {
            DB::table('usuarios')->insert([
                'nome' => 'Administrador',
                'email' => '123@admin.com',
                'password' => Hash::make('admin123'), // Defina uma senha segura
                'tipo' => 'administrador', // Define o tipo como admin
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Opcional: remover o administrador se necessário
        DB::table('usuarios')->where('email', '123@admin.com')->delete();
    }
}
