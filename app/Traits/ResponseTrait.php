<?php

namespace App\Traits;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

trait ResponseTrait
{
    /**
     * Status code of response
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * Fractal manager instance
     *
     * @var Manager
     */
    protected $fractal;

    /**
     * Set fractal Manager instance
     *
     * @param Manager $fractal
     * @return void
     */
    public function setFractal(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
     * Getter for statusCode
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    protected function respondWithCollection($collection, $callback)
    {
        $resource = new Collection($collection, $callback);
        //set empty data pagination
        if (empty($collection)) {
            $collection = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
            $resource = new Collection($collection, $callback);
        }
        $rootScope = $this->fractal->createData($resource);
        return $this->respondWithArray($rootScope->toArray());
    }

    /**
     * Return single item response from the application
     *
     * @param Model $item
     * @param \Closure|TransformerAbstract $callback
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithItem($item, $callback)
    {
        $resource = new Item($item, $callback);
        $rootScope = $this->fractal->createData($resource);

        return $this->respondWithArray($rootScope->toArray());
    }

    /**
     * Return a json response from the application
     *
     * @param array $array
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithArray(array $array, array $headers = [])
    {
        return response()->json($array, $this->statusCode, $headers);
    }
}

