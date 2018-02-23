<?php

// FRONT-END ROUTES
$router->get("/", "Members#index", "member.index");
$router->get("/register", "Member#index", "member.index");


//BACK-END ROUTES
$router->get("/add", "Members#add", "member.add");
$router->post("/add", "Members#add", "member.add");
$router->get("/edit", "Members#edit", "member.edit");
$router->post("/edit", "Members#edit", "member.edit");
$router->post("/delete/:id", "Members#delete", "member.delete");
$router->get("/search", "Search", "search.index");


//ERROR
$router->get("/error", "Error", "error.index");
