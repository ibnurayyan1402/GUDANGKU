<?

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('permintaan_barangs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
        $table->integer('jumlah_diminta');
        $table->string('status')->default('Pending'); 
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('permintaan_barangs');
    }
};