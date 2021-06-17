<?php

namespace Kernel\Layer\Domain;

use Kernel\Layer\Presentation\Presenter;

interface UseCase
{
    public function execute($request, Presenter $output);
}
