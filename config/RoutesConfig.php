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
$router->get("/search", "Search#index", "search.index");
$router->post("/search", "Search#index", "search.index");
$router->get("/search/:query", "Search#alternate", "search.alternate");

//PDF
$router->get("/pdf-card/:id", "pdf#index", "pdf.index");
$router->get("/pdf-generator", "pdf#generator", "pdf.generator");
$router->post("/pdf-delete", "pdf#delete", "pdf.delete");


//ERROR
$router->get("/error", "Error", "error.index");
