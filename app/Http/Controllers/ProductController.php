<?php namespace Multi\Http\Controllers;

use Multi\Http\Requests;
use Multi\Http\Requests\CreateProductRequest;
use Multi\Http\Requests\UpdateProductRequest;
use Multi\Services\ProductService;
use Multi\Http\Controllers\Controller as BaseController;
use Flash;

class ProductController extends BaseController
{

    /**
     * @var  ProductService
     */
    private $productService;

    function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the Product.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->productService->paginate(10);

        return view('pages.products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $product = $this->productService->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->exist($id);

        return view('products.show')->with(compact('product'));
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->exist($id);

        return view('products.edit')->with(compact('product'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $this->exist($id);

        $this->productService->update($id, $request->all());

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->exist($id);

        $this->productService->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
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
            $product = $this->productService->findOrFail($id);
        } catch(ModelNotFoundException $e) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return $product;
    }
}
