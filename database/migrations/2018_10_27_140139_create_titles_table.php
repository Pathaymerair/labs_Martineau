<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('bigLogo');
            $table->string('slogan');
            $table->text('introSlogan');
            $table->text('overIntroSlogan');
            $table->text('introSloganDeux');
            $table->text('introUn');
            $table->text('introDeux');
            $table->string('introButton');
            $table->string('testiTitle');
            $table->string('servicesTitle');
            $table->string('overServicesTitle');
            $table->string('servicesTitleDeux');
            $table->string('servicesButton');
            $table->string('teamTitle');
            $table->string('overTeamTitle');
            $table->string('teamTitleDeux');
            $table->string('promoTitle');
            $table->text('promoDesc');
            $table->string('promoButton');
            $table->string('placeholderName');
            $table->string('placeholderMail');
            $table->string('placeholderSubject');
            $table->string('placeholderMsg');
            $table->string('mailButton');
            $table->string('contactTitle');
            $table->text('contactDesc');
            $table->string('contactInfo');
            $table->text('contactAdress');
            $table->string('contactPhone');
            $table->string('contactMail');
            $table->text('copyright');
            $table->string('servicesPage');
            $table->string('homeRef');
            $table->string('servicesRef');
            $table->string('newsletterTitle');
            $table->string('newsletterPlaceholder');
            $table->string('newsletterButton');
            $table->string('blogPage');
            $table->string('blogRef');
            $table->string('searchPlaceholder');
            $table->string('categoriesTitle');
            $table->string('instaTitle');
            $table->string('tagsTitle');
            $table->string('quoteTitle');
            $table->text('quoteDesc');
            $table->string('addTitle');
            $table->string('addImage');
            $table->string('contactPage');
            $table->string('contactRef');
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
        Schema::dropIfExists('titles');
    }
}
