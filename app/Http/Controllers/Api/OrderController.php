<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\CommonControllerTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Services\Abstracts\OrderInterface;
use Illuminate\Http\Response;

/**
 * class OrderController
 */
class OrderController extends Controller
{

    use CommonControllerTrait;

    /**
     * @var OrderInterface
     */
    protected $orderService;

    /**
     * @param OrderInterface $orderService
     */
    public function __construct(OrderInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->toResponse(OrderResource::collection($this->orderService->list()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return OrderResource
     */
    public function store(OrderRequest $request): OrderResource
    {
        $fields = $request->validated();

        return OrderResource::make(
            $this->orderService->createOrder($fields['user_full_name'], $fields['price'], $fields['address']
            )
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return OrderResource
     */
    public function show(int $id): OrderResource
    {
        return OrderResource::make(
            $this->orderService->getOrder($id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderRequest $request
     * @param int $id
     * @return OrderResource
     */
    public function update(OrderRequest $request, int $id): OrderResource
    {
        $fields = $request->validated();
        return OrderResource::make($this->orderService->updateOrder($fields['user_full_name'], $fields['price'], $fields['address'], $id));
    }

}
