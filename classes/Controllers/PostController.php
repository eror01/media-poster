<?php

class PostController {
  public $postClass;

  public function __construct() {
    $this->postClass = new Post();
  }

  public function savePost($postUserId, $postImage, $postContent, $postTopic, $postVisibility) {
    $this->postClass->createPost($postUserId, $postImage, $postContent, $postTopic, $postVisibility);
  }
}