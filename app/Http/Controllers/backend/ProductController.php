<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Components\Recusive;
use App\Components\RecusiveProduct;
use App\Components\StorageImage;
use App\Http\Requests\ProductAddRequest;
use App\Models\Backend\Category;
use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use App\Models\Backend\ProductTag;
use App\Models\Backend\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
class ProductController extends Controller
{
    //
    use StorageImage;
    private $category;
    private $product;
    private $productImage;
    private $productTag;
    private $tag;
    private $color;

    public function __construct(Category $category, Product $product, ProductImage $productImage,
     ProductTag $productTag , Tag $tag, Color $color)
    {
        $this->middleware('auth');
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->tag = $tag;
        $this->color = $color;
    }

    public function index() {
        $products = $this->product->latest()->paginate(5);
        return view('backend.product.index', compact('products'));
    }

    public function create() {
        $data = $this->category->all();
        $recusive = new Recusive();
        $htmlOption = $recusive->categoryRecusive($data, $parent_id = 0, $char = '', null);
        return view('backend.product.add', compact('htmlOption'));
    }

    public function store(ProductAddRequest $request) {

        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'discount' => $request->discount,
                'content' => $request->content,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
                'name' => $request->name,
            ];
            $dataUploadFeatureImage = $this->storageUpload($request, 'feature_image_path','products');
            if(!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
    
            $product = $this->product->create($dataProductCreate);
    
            // Insert data to product_images
            if($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageUploadMultiple($fileItem, 'products');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            };
    
            // Insert tags for product
            if(!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // Insert tags
                    $tagInstance =  $this->tag->firstOrCreate([
                        'name' => $tagItem
                    ]);
                    $tagIds[] = $tagInstance->id;
                }
            }

            // Insert colors
            if(!empty($request->colors)) {
                foreach ($request->colors as $colorItem) {
                    $product->colors()->create([
                        'product_id' => $product->id,
                        'name' => $colorItem,
                    ]);
                }
            }

            // Insert sizes
            if(!empty($request->sizes)) {
                foreach ($request->sizes as $sizeItem) {
                    $product->sizes()->create([
                        'product_id' => $product->id,
                        'name' => $sizeItem,
                    ]);
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('products.index');
        } catch(Exception $e) {
            DB::rollBack();
            Log::error('Message' . $e->getMessage() . 'line' . $e->getLine());
        }

    }

    public function edit($id) {
        $product = $this->product->find($id);
        $data = $this->category->all();
        $recusive = new RecusiveProduct();
        $htmlOption = $recusive->categoryProductRecusive($data, $parent_id = 0, $char = '',$product->category_id); 
        return view('backend.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'discount' => $request->discount,
                'content' => $request->content,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
                'name' => $request->name,
            ];
            $dataUploadFeatureImage = $this->storageUpload($request, 'feature_image_path','products');
            if(!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
    
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);


            if($request->hasFile('image_path')){
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageUploadMultiple($fileItem, 'products');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            };
    
 
            if(!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {

                    $tagInstance =  $this->tag->firstOrCreate([
                        'name' => $tagItem
                    ]);
                    $tagIds[] = $tagInstance->id;
                }
            }


            if(!empty($request->colors)) {
                $this->color->where('product_id', $id)->delete();
                foreach ($request->colors as $colorItem) {
                    $product->colors()->create([
                        'product_id' => $product->id,
                        'name' => $colorItem,
                    ]);
                }
            }

            if(!empty($request->sizes)) {
                $this->size->where('product_id', $id)->delete();
                foreach ($request->sizes as $sizeItem) {
                    $product->sizes()->create([
                        'product_id' => $product->id,
                        'name' => $sizeItem,
                    ]);
                }
            }

            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('products.index');
        } catch(Exception $e) {
            DB::rollBack();
            Log::error('Message' . $e->getMessage() . 'line' . $e->getLine());
        }        
    }

    public function delete($id) {
        try{
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        }catch(Exception $e) {
            Log::error('Message' . $e->getMessage() . 'line' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }  
    }    
}
