<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use App\Traits\ResponseTrait;

class Controller extends BaseController
{
    use ResponseTrait;
    /**
     * Constructor
     *
     * @param Manager|null $fractal
     */
    public function __construct(Manager $fractal = null)
    {
        $fractal = $fractal === null ? new Manager() : $fractal;
        $this->setFractal($fractal);
    }

}
