<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->text('description');
            $table->text('target');
            $table->boolean('has_coding_language');
            $table->string('coding_language')->nullable()->default('');
            $table->boolean('has_buildup');
            $table->string('buildup_file')->nullable()->default('');
            $table->boolean('is_buildup_by_code_expert')->nullable()->default(false);
            $table->date('buildup_date')->nullable();
            $table->boolean('has_design');
            $table->string('design_file')->nullable()->default('');
            $table->boolean('is_design_by_code_expert')->nullable()->default(false);
            $table->date('design_date')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id');
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
        Schema::dropIfExists('projects');
    }
}
