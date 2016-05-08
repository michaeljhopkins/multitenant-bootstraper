<?php namespace Multi\Http\Controllers;

use Multi\Http\Requests;
use Multi\Http\Requests\CreateOrderRequest;
use Multi\Http\Requests\UpdateOrderRequest;
use Multi\Services\OrderService;
use Multi\Http\Controllers\Controller as BaseController;
use Flash;

class OrderController extends BaseController
{

    /**
     * @var  OrderService
     */
    private $orderService;

    function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the Order.
     *
     * @return Response
     */
    public function index()
    {
        $orders = $this->orderService->paginate(10);

        return view('orders.index')->with(compact('orders'));
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();

        $order = $this->orderService->create($input);

        Flash::success('Order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->exist($id);

        return view('orders.show')->with(compact('order'));
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->exist($id);

        return view('orders.edit')->with(compact('order'));
    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $this->exist($id);

        $this->orderService->update($id, $request->all());

        Flash::success('Order updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->exist($id);

        $this->orderService->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * check if a record exist
     *
     * @param  int $id
     * @return Eloquent
     */
    private function exist($id)
    {
        try {
            $order = $this->orderService->findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return $order;
    }
}
