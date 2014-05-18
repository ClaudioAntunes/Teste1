<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;



$loader = require_once __DIR__.'/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();

$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope("request");
$container->set("request", Request::createFromGlobals());

use Forte\OsBundle\Entity\Os;

$os = new Os();
$os->setCliente("Mazzine");
$os->setProduto("PC");
$os->setDefeito("desligando");
$os->setStatus("pronto");

$os2 = new Os();
$os2->setCliente("Aneli");
$os2->setProduto("Notebook");
$os2->setDefeito("reiniciando");


$em = $container->get("doctrine")->getEntityManager();

$em->persist($os);
$em->persist($os2);
$em->flush();



