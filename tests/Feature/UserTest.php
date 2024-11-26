<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Infrastructure\Persistence\Eloquent\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Este test verifica la funcionalidad del modelo de usuario.
     * Dado que hemos movido la carpeta del modelo de usuario, 
     * este test asegura que todas las funcionalidades relacionadas 
     * con el usuario siguen funcionando correctamente.
     */
    #[Test]
    public function puede_crear_un_usuario()
    {
        $user = User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => bcrypt('secret'),
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'juan@example.com',
        ]);
    }

    #[Test]
    public function puede_actualizar_un_usuario()
    {
        $user = User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => bcrypt('secret'),
        ]);

        $user->update([
            'name' => 'Juan Actualizado',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Juan Actualizado',
        ]);
    }

    #[Test]
    public function puede_eliminar_un_usuario()
    {
        $user = User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => bcrypt('secret'),
        ]);

        $userId = $user->id;
        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $userId,
        ]);
    }
}