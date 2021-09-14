<?php
$context = Timber::context();
$context['sidebar'] = Timber::get_sidebar('sidebar.php');

Timber::render('index.twig', $context);
