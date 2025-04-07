<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('column_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('table_key');
            $table->json('hidden_columns');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('column_preferences');
    }
};
