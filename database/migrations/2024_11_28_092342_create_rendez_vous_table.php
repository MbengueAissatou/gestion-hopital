<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousTable extends Migration
{
    public function up()
    {
        Schema::create('rendez_vous', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id'); 
            $table->unsignedBigInteger('medecin_id'); 
            $table->dateTime('date_heure'); 
            $table->string('status')->default('En attente'); 
            $table->text('remarques')->nullable(); 
            $table->timestamps();

            
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('medecin_id')->references('id')->on('medecins')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rendez_vous');
    }
}