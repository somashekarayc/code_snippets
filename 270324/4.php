<?php

Schema::create('category_post', function (Blueprint $table) {
    $table->id();
    $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
    $table->foreignId('post_id')->references('id')->on('posts')->onDelete('cascade');
    $table->timestamps();
});