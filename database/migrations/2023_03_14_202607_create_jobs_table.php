<?php

use App\Models\Company\Company;
use App\Models\Disabilities\Disabilities;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class,'company_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Disabilities::class,'disability_id')->constrained('disabilities')->cascadeOnDelete();
            $table->string('title');
            $table->string('status');
            $table->text('job_desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
