<?php

// FRONT-END ROUTES
$router->get("/", "Members#index", "member.index");
$router->get("/register", "Members#index", "member.index");


//BACK-END ROUTES
$router->get("/add", "Members#add", "member.add");
$router->post("/add", "Members#add", "member.add");
$router->get("/edit/:id", "Members#edit", "member.edit");
$router->post("/edit/:id", "Members#edit", "member.edit");
$router->post("/delete", "Members#delete", "member.delete");
$router->get("/search", "Search", "search.index");


//ERROR
$router->get("/error", "Error", "error.index");
