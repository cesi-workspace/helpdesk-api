<?php

namespace Kernel\Layer\Presentation;

interface View
{
    public function generate(ViewModel $viewModel);
}
