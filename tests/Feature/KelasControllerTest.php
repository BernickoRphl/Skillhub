<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Kelas;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KelasControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_kelas_index()
    {
        Kelas::factory()->count(3)->create();

        $response = $this->get(route('kelas.index'));

        $response->assertStatus(200);
        $response->assertViewIs('kelas.index');
        $response->assertViewHas('kelas');
    }

    /** @test */
    public function it_can_store_a_new_kelas()
    {
        $data = [
            'nama_kelas' => 'Kelas Laravel',
            'deskripsi' => 'Belajar Laravel',
            'instruktur' => 'Budi'
        ];

        $response = $this->post(route('kelas.store'), $data);

        $response->assertRedirect(route('kelas.index'));
        $this->assertDatabaseHas('kelas', $data);
    }

    /** @test */
    public function it_can_show_detail_kelas()
    {
        $kelas = Kelas::factory()->create();

        $response = $this->get(route('kelas.show', $kelas->id));

        $response->assertStatus(200);
        $response->assertViewIs('kelas.show');
        $response->assertViewHas('kelas');
    }

    /** @test */
    public function it_can_update_kelas()
    {
        $kelas = Kelas::factory()->create();

        $data = [
            'nama_kelas' => 'Updated Class Name',
            'deskripsi' => 'Updated',
            'instruktur' => 'Updated Teacher'
        ];

        $response = $this->put(route('kelas.update', $kelas->id), $data);

        $response->assertRedirect(route('kelas.index'));
        $this->assertDatabaseHas('kelas', $data);
    }

    /** @test */
    public function it_can_delete_kelas()
    {
        $kelas = Kelas::factory()->create();

        $response = $this->delete(route('kelas.destroy', $kelas->id));

        $response->assertRedirect(route('kelas.index'));
        $this->assertDatabaseMissing('kelas', ['id' => $kelas->id]);
    }
}
