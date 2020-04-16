<?php
include('LanguageBatchBo.php');
include('Config.php');
include('Apicall.php');


$languageBatchBo = new \Language\LanguageBatchBo();
$languageBatchBo->generateLanguageFiles();
$languageBatchBo->generateAppletLanguageXmlFiles();
