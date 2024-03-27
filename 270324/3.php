<?php

public function up(): void
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('title', 2048);
        $table->string('slug', 2048);
        $table->timestamps();
    });
}