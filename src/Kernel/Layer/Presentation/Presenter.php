<?php

namespace Kernel\Layer\Presentation;

interface Presenter
{
    public function present(mixed $response);
    public function viewModel(): ViewModel;
}
