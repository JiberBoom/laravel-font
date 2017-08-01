<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('字体名字');
            $table->integer('size')->unsigned()->comment('字体大小');
            $table->string('thumb_url')->comment('字体缩略图');
            $table->string('preview_url')->comment('字体预览图');
            $table->integer('download')->unsigned();
            $table->string('language')->comment('字体所属语种');
            $table->string('author')->nullable()->comment('作者');
            $table->string('desc')->nullable()->comment('字体描述');
            $table->tinyInteger('tags')->default(0)->comment('字体标签:0-正常,1-最新,2-最热');
            $table->tinyInteger('status')->default(0)->comment('字体状态:0-下架，1-上架');
            $table->string('font_url');
            $table->integer('rank');
            $table->string('md5');
            $table->tinyInteger('is_pay')->default(0)->comment('是否付费:0-否,1-是');
            $table->decimal('price',10,2)->comment('字体价格');
            $table->string('unique_str');
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
        Schema::dropIfExists('fonts');
    }
}
