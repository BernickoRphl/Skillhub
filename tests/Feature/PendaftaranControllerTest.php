<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Peserta;
use App\Models\Kelas;
use App\Models\Pendaftaran;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PendaftaranControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_index()
    {
        Peserta::factory()->create();

        $response = $this->get(route('pendaftaran.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pendaftaran.index');
        $response->assertViewHas('peserta');
    }

    /** @test */
    public function it_can_display_create_form()
    {
        $peserta = Peserta::factory()->create();
        Kelas::factory()->count(3)->create();

        $response = $this->get(route('pendaftaran.create', ['peserta_id' => $peserta->id]));

        $response->assertStatus(200);
        $response->assertViewIs('pendaftaran.create');
        $response->assertViewHas(['peserta', 'kelas']);
    }

    /** @test */
    public function it_can_store_pendaftaran()
    {
        $peserta = Peserta::factory()->create();
        $kelas = Kelas::factory()->count(2)->create();

        $data = [
            'peserta_id' => $peserta->id,
            'kelas_id' => $kelas->pluck('id')->toArray()
        ];

        $response = $this->post(route('pendaftaran.store'), $data);

        $response->assertRedirect(route('peserta.show', $peserta->id));

        foreach ($kelas as $k) {
            $this->assertDatabaseHas('pendaftarans', [
                'peserta_id' => $peserta->id,
                'kelas_id' => $k->id,
            ]);
        }
    }

    /** @test */
    public function it_can_delete_pendaftaran()
    {
        $peserta = Peserta::factory()->create();
        $kelas = Kelas::factory()->create();

        $pendaftaran = Pendaftaran::create([
            'peserta_id' => $peserta->id,
            'kelas_id' => $kelas->id,
            'registered_at' => now(),
        ]);

        $response = $this->delete(route('pendaftaran.destroy', $pendaftaran->id));

        $response->assertRedirect(route('peserta.show', $peserta->id));
        $this->assertDatabaseMissing('pendaftarans', ['id' => $pendaftaran->id]);
    }
}
