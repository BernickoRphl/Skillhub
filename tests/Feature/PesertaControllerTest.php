<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Peserta;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PesertaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_peserta_index()
    {
        Peserta::factory()->count(3)->create();

        $response = $this->get(route('peserta.index'));

        $response->assertStatus(200);
        $response->assertViewIs('peserta.index');
        $response->assertViewHas('pesertas');
    }

    /** @test */
    public function it_can_show_create_form()
    {
        $response = $this->get(route('peserta.create'));

        $response->assertStatus(200);
        $response->assertViewIs('peserta.create');
    }

    /** @test */
    public function it_can_store_a_new_peserta()
    {
        $data = [
            'nama' => 'John Doe',
            'email' => 'john@example.com',
            'telepon' => '08123456789',
            'alamat' => 'Surabaya',
        ];

        $response = $this->post(route('peserta.store'), $data);

        $response->assertRedirect(route('peserta.index'));
        $this->assertDatabaseHas('pesertas', $data);
    }

    /** @test */
    public function it_validates_store_request()
    {
        $response = $this->post(route('peserta.store'), [
            'nama' => '',
            'email' => 'invalid',
        ]);

        $response->assertSessionHasErrors(['nama', 'email']);
    }

    /** @test */
    public function it_can_show_detail_peserta()
    {
        $peserta = Peserta::factory()->create();

        $response = $this->get(route('peserta.show', $peserta->id));

        $response->assertStatus(200);
        $response->assertViewIs('peserta.show');
        $response->assertViewHas('peserta');
    }

    /** @test */
    public function it_can_show_edit_form()
    {
        $peserta = Peserta::factory()->create();

        $response = $this->get(route('peserta.edit', $peserta->id));

        $response->assertStatus(200);
        $response->assertViewIs('peserta.edit');
        $response->assertViewHas('peserta');
    }

    /** @test */
    public function it_can_update_peserta()
    {
        $peserta = Peserta::factory()->create();

        $data = [
            'nama' => 'Updated Name',
            'email' => 'updated@example.com',
            'telepon' => '089999999',
            'alamat' => 'Updated Address',
        ];

        $response = $this->put(route('peserta.update', $peserta->id), $data);

        $response->assertRedirect(route('peserta.index'));
        $this->assertDatabaseHas('pesertas', $data);
    }

    /** @test */
    public function it_validates_update_request()
    {
        $peserta = Peserta::factory()->create();

        $response = $this->put(route('peserta.update', $peserta->id), [
            'email' => 'invalid-email'
        ]);

        $response->assertSessionHasErrors(['nama', 'email']);
    }

    /** @test */
    public function it_can_delete_peserta()
    {
        $peserta = Peserta::factory()->create();

        $response = $this->delete(route('peserta.destroy', $peserta->id));

        $response->assertRedirect(route('peserta.index'));
        $this->assertDatabaseMissing('pesertas', ['id' => $peserta->id]);
    }
}
