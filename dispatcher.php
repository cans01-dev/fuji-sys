<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
  $r->addRoute('GET', '/', 'index');
  $r->addRoute('GET', '/contact', 'contact_get');
  $r->addRoute('POST', '/contact', 'contact_post');
  $r->addRoute('GET', '/form', 'form_get');
  // $r->addRoute('POST', '/form', 'form_post');
  $r->addRoute('GET', '/survey', 'survey_get');
  // $r->addRoute('POST', '/survey', 'survey_post');

  $r->addRoute('GET', '/privacy-policy', 'privacy_policy');
  $r->addRoute('GET', '/mansions', 'mansions_index');
  $r->addRoute('GET', '/mansions/{id:\d+}', 'mansions_show');
  $r->addRoute('GET', '/posts', 'posts_index');
  $r->addRoute('GET', '/posts/{id:\d+}', 'posts_show');

  $r->addGroup('/admin', function ($r) {
    $r->addRoute('GET', '/login', 'admin_login_get');
    $r->addRoute('POST', '/login', 'admin_login_post');
    $r->addRoute('POST', '/logout', 'admin_logout');
    $r->addRoute('GET', '/mansions', 'admin_mansions_index');
    $r->addRoute('GET', '/mansions/create', 'admin_mansions_create');
    $r->addRoute('POST', '/mansions', 'admin_mansions_store');
    $r->addRoute('GET', '/mansions/{id:\d+}/edit', 'admin_mansions_edit');
    $r->addRoute('PUT', '/mansions/{id:\d+}', 'admin_mansions_update');
    $r->addRoute('DELETE', '/mansions/{id:\d+}', 'admin_mansions_delete');

    $r->addRoute('GET', '/posts', 'admin_posts_index');
    $r->addRoute('GET', '/posts/create', 'admin_posts_create');
    $r->addRoute('POST', '/posts', 'admin_posts_store');
    $r->addRoute('GET', '/posts/{id:\d+}/edit', 'admin_posts_edit');
    $r->addRoute('PUT', '/posts/{id:\d+}', 'admin_posts_update');
    $r->addRoute('DELETE', '/posts/{id:\d+}', 'admin_posts_delete');
  });
});
