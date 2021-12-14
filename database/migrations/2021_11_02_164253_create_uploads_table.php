<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('originalName', 100);
            $table->string('path', 100);
            $table->string('mimeType', 100)->nullable();
            $table->char('title', 100)->default('');
            $table->text('content')->default(''); //64KB
            $table->foreignId('user_id')->default(1)->constrained();
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
        Schema::dropIfExists('uploads');
        Schema::table('uploads', function (Blueprint $table)
        {
            $table->dropForeign(['user_id']);
            $table->dropColumn('title');
            $table->dropColumn('content');
        });
    }
}
