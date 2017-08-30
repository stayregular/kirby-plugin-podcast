<?php

// This is a controller file that contains the logic for the podcasts template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {

  $perpage  = $page->perpage()->int();

  if($page->category()->html() != '') {
    $page_url = 'podcast/'.$page->category()->html();
    $podcasts = page($page_url)->children()
                               ->visible()
                               ->flip();
  } else {
    // fetch the basic set of articles
    $podcasts = $page->grandChildren()->visible()->flip();
  }
  // add the tag filter
  if($tag = param('tag')) {
    $podcasts = $podcasts->filterBy('tags', $tag, ',');
  }

  // add the author filter
  if($author = param('author')) {
    $podcasts = $podcasts->filterBy('author', $author);
  }

  // apply pagination
  $podcasts = $podcasts->paginate(($perpage >= 1)? $perpage : 5);

  return [
    'podcasts'   => $podcasts,
    'pagination' => $podcasts->pagination()
  ];

};
