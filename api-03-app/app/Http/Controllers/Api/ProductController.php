<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repository\ProductRepository;

class ProductController extends Controller
{

    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $products = $this->product;

        $productRepository = new ProductRepository($products);

        if ($request->has('conditions')) {
            $productRepository->selectConditions($request->get('conditions'));
        }

        if ($request->has('fields')) {
            $productRepository->selectFilter($request->get('fields'));
        }


        return new ProductCollection($productRepository->getResult()->paginate(5));
    }

    public function show($id)
    {
        $product = $this->product->find($id);

        // return response()->json($product);
        return new ProductResource($product);
    }

    public function save(ProductRequest $request)
    {
        $data = $request->all();

        $data['Baeare'] = $request->headers->get('Baeare');

        // $product = $this->product->create($data);

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $product = $this->product->find($data['id']);
        $product->update($data);

        return response()->json($product);
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();

        return response()->json(['data' => ['msg' => 'Produto removido com sucesso']]);
    }


}
