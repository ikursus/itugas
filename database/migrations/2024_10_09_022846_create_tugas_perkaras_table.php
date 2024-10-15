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
        Schema::create('tugas_perkaras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tugas_id');
            $table->unsignedBigInteger('perkara_id')->nullable();
            $table->boolean('tindakan')->default(false);
            $table->string('catatan')->nullable();
            $table->timestamps();

            // Link kan column tugas_id ke table tugas
            // tugas_id adalah column yang menyimpan data yang diambil daripada column id pada table tugas
            $table->foreign('tugas_id')->references('id')->on('tugas')->cascadeOnDelete();

            // Linkkan column perkara_id ke table perkara TETAPI
            // Jika mahu tetapkan data pada perkara_id menjadi null apabila rekod daripada
            // table perkara dihapus, maka perkara_id perlu allow nullable (baris 17 seperti diatas)
            $table->foreign('perkara_id')->references('id')->on('perkaras')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_perkaras');
    }
};
