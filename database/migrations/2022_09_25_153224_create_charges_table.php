<?php

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
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name_workload');
            $table->string('description_workload');
            $table->time('hrIni');
            $table->time('hrF');
            $table->time('IniBreak1');
            $table->time('fimBreak1');
            $table->time('IniBreak2')->nullable();
            $table->time('fimBreak2')->nullable();
            $table->time('IniBreak3')->nullable();
            $table->time('fimBreak3')->nullable();
            $table->string('Period')->nullable();
            $table->boolean('dom')->nullable()->default(0);
            $table->boolean('seg')->nullable()->default(0);
            $table->boolean('ter')->nullable()->default(0);
            $table->boolean('qua')->nullable()->default(0);
            $table->boolean('qui')->nullable()->default(0);
            $table->boolean('sex')->nullable()->default(0);
            $table->boolean('sab')->nullable()->default(0);
            $table->string('numdaywork')->nullable();
            $table->string('numdayvacation')->nullable();
            $table->string('sc_ir_days_work')->nullable();
            $table->string('sc_ir_days_vac')->nullable();
            $table->time('tolerance_mark')->nullable();
            $table->time('tolerance_work')->nullable();
            $table->boolean('STATUS')->default(0);

            //analytics

            $table->time('total_break_day');
            $table->time('total_work_day');
            $table->time('time_work_week');
            $table->string('num_days_reg_scale');
            $table->string('total_work_day_ireg')->nullable();
            $table->time('timetolerancepoint')->nullable();
            $table->time('timetolerance');
            $table->boolean('blocked')->nullable()->default(false);
            $table->softDeletes();



    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charges');
    }
};
