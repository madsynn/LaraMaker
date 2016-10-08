 public function store(Request $request)
    {

        //$product = Product::create();

//        return $this->update($product, $request);
       // $product = $this->flatten($request->all());

       // $product->updateOrCreate($attributes = [], $values = []);





        $product = Product::create($request->all());
        $request->file('thumbnail')->move(public_path('images'), $request->file('thumbnail')->getClientOriginalName());
        $request->file('thumbnail2')->move(public_path('images'), $request->file('thumbnail2')->getClientOriginalName());

        $data = $request->except(['thumbnail']);
        $data['thumbnail'] = public_path('images') . '/' . $request->file('thumbnail')->getClientOriginalName();
        $data = $request->except(['thumbnail2']);
        $data['thumbnail2'] = public_path('images') . '/' . $request->file('thumbnail2')->getClientOriginalName();

        $product->create($data);



//        $product()->price->create($data);




        if ($product->id) {
        //    dd($request);

//            $combinations = $product->getAttributeCombinations($this->product->id);
//            $comb_array = array();



        }

        if (!empty($request->parameter_name)) {
            foreach ($request->attribute_name as $key => $item) {
                $productPrice = new Price();
               // $productPrice->price['price'] = $item;
                $productPrice->quantity = $item;
//                $productPrice->model = $item;
//                $productPrice->sku = $item;
//                $productPrice->upc = $item;
               // $productPrice->product_attribute_value = $request->product_attribute_value[$key];
                $product->prices()->save($productPrice);
            }
        }

//        if ($request->has('prices')) {
//            foreach ($request->prices as $price) {
//                if (!empty($pricing['price'][0]){
//                    $pricing = Price::create([
//                        'price' => $pricing['price'],
//                        'product_id' => $product->id
//                    ]);
////                    foreach ($option_details['values'] as $value) {
////                        OptionValue::create([
////                            'value' => $value,
////                            'option_id' => $option->id
////                        ]);
////                    }
//                }
//            }
//        }


//        if ($request->has('options')) {
//            foreach ($request->options as $option_details) {
//                if (!empty($option_details['name']) && !empty($option_details['values'][0])) {
//                    $option = Option::create([
//                        'name' => $option_details['name'],
//                        'product_id' => $product->id
//                    ]);
//                    foreach ($option_details['values'] as $value) {
//                        OptionValue::create([
//                            'value' => $value,
//                            'option_id' => $option->id
//                        ]);
//                    }
//                }
//            }
//        }

        if (!empty($request->attribute_name)) {
            foreach ($request->attribute_name as $key => $item) {
                $productVariant = new ProductVariant();
                $productVariant->attribute_name = $item;
                $productVariant->product_attribute_value = $request->product_attribute_value[$key];
                $product->productVariants()->save($productVariant);
            }
        }
//
        if (!empty($request->feature_name)) {
            foreach ($request->feature_name as $feature) {
                $productFeature = new ProductFeature();
                $productFeature->feature_name = $feature;
                $product->productFeatures()->save($productFeature);
            }
        }







        //dd($product);
    }

//        $data = $this->flatten($request->all());
//
//        if ($request->has('price')) {  dd($data);}
//
//        $product = Product::create($data);


//
//        if ($request->has('prices')) {
//            foreach ($request->options as $option_details) {
//                if (!empty($option_details['name']) && !empty($option_details['values'][0])) {
//                    $option = Option::create([
//                        'name' => $option_details['name'],
//                        'product_id' => $product->id
//                    ]);
//                    foreach ($option_details['values'] as $value) {
//                        OptionValue::create([
//                            'value' => $value,
//                            'option_id' => $option->id
//                        ]);
//                    }
//                }
//            }
//        }

//        if (!empty($request->attribute_name)) {
//            foreach ($request->attribute_name as $key => $item) {
//                $productVariant = new ProductVariant();
//                $productVariant->attribute_name = $item;
//                $productVariant->product_attribute_value = $request->product_attribute_value[$key];
//                $product->productVariants()->save($productVariant);
//            }
//        }

       // $product->price = Price::create($data);
       // $product->priceProduct = PriceProduct::create($data);
        //$product->feature = ProductFeature::create($data);
       // $product->prices()->save($data);

//        $price = $price[];
//        $price = $request->input('price');
//        $price = $request->input('quantity');
//        $price = $request->input('model');
//        $price = $request->input('sku');
//        $price = $request->input('upc');
//        echo $price;
//        //'title' => $request->input('title') ,
//        Product::create([
//            'name' => $request->name,
//           // Price::create([
//                'price' => $request->price,
//                'quantity' => $request->quantity,
//                'model' => $request->model,
//                'sku' => $request->sku,
//                'upc' => $request->upc
//           // ])
//        ]);

//        foreach ($request->all() as $key => $value) {
//            // dd($request);
//
////            echo "<pre>";
//            print_r($key);
////            echo "</pre>";
////            echo "<pre>";
//            print_r($value);
////            echo "</pre>";
//        }

   //     foreach ($request->all() as $key => $value){};

//    }
