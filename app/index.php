<?php

require_once realpath('..').'/library/autoload/LibAutoloder.php';

initiate_application();

Application::run();

Application::shutDown();