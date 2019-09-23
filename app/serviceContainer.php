<?php

use DI\Container;
use service\ConfigurazioneService;

return function (Container $container) {

    $container->set('configurazioneService', function () {
        return new ConfigurazioneService();
    });

};