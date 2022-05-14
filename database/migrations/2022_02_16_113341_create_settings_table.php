<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nav_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('new_collection_banner')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('about_story_heading')->nullable();
            $table->longText('about_story_description')->nullable();
            $table->longText('about_story_quote')->nullable();
            $table->string('about_story_top_photo')->nullable();
            $table->string('about_story_bottom_photo')->nullable();
            $table->string('about_shop_heading')->nullable();
            $table->longText('about_shop_description')->nullable();
            $table->string('about_shop_top_photo')->nullable();
            $table->string('about_shop_bottom_photo')->nullable();
            $table->longText('map')->nullable();
            $table->longText('terms_conditions')->nullable();
            $table->longText('privecy_policy')->nullable();
            $table->longText('return_refund')->nullable();
            $table->string('payment_getway_image')->nullable();
            $table->text('social_link')->nullable();
            $table->string('office_time_day')->nullable();
            $table->string('office_time_hour')->nullable();
            $table->string('contact_detail_heading')->nullable();
            $table->longText('contact_detail_description')->nullable();
            $table->string('copyright')->nullable();
            $table->string('footer_about_heading')->nullable();
            $table->longText('footer_about_description')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_bg')->nullable();
            $table->string('arraivle_title')->nullable();
            $table->string('arraivle_bg')->nullable();
            $table->string('wish_banner_heading')->nullable();
            $table->string('wish_banner_bg')->nullable();
            $table->string('blog_heading')->nullable();
            $table->string('blog_detail_related_heading')->nullable();
            $table->string('blog_recent_post')->nullable();
            $table->string('new_product_heading')->nullable();
            $table->string('best_product_heading')->nullable();
            $table->string('product_detail_related_heading')->nullable();
            $table->string('serch_banner_heading')->nullable();
            $table->string('serch_banner_bg')->nullable();
            $table->string('insta_heading')->nullable();
            $table->string('insta_profile')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
