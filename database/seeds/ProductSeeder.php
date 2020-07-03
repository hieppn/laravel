<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $product = new Product();
       $product->name="Chào mào Long Phụng";
        $product->price=150000000;
        $product->oldprice=190000000;
       $product->quantity="1";
       $product->source="Nghệ nhân Long";
        $product->status="Còn";
       $product->id_category="1";
       $product->image="public/1WjJw4MK9ZeFFHgxFh7gR1y5SVdGrkT5T1R5fyFH.jpeg";
       $product->description="Tuyệt vời";
       $product->save();
       
       $product6 = new Product();
       $product6->name="Chích chòe Hà Lan";
        $product6->price=150000000;
        $product6->oldprice=190000000;
       $product6->quantity="12";
       $product6->source="Nghệ nhân Lực";
        $product6->status="Còn";
       $product6->id_category="2";
       $product6->image="/public/2.jpg";
       $product6->description="Tuyệt vời";
       $product6->save();
       $product1 = new Product();
       $product1->name="Chích chòe lửa bông";
        $product1->price=170000000;
        $product1->oldprice=190000000;
       $product1->quantity="1";
       $product1->source="Nghệ nhân Vinh";
        $product1->status="Còn";
       $product1->id_category="2";
       $product1->image="public\ivpg1USLvvCB07Cn5GsEn4L5dsn8Tjo6erU9FLfG.jpeg";
       $product1->description="Tuyệt vời";
       $product1->save();

       $product5 = new Product();
       $product5->name="Chích chòe ";
        $product5->price=150000000;
        $product5->oldprice=190000000;
       $product5->quantity="20";
       $product5->source="Nghệ nhân Lực";
        $product5->status="Còn";
       $product5->id_category="2";
       $product5->image="/public/1.jpg";
       $product5->description="Tuyệt vời";
       $product5->save();

       $product2 = new Product();
       $product2->name="Chào mào Kim";
        $product2->price=150000000;
        $product2->oldprice=190000000;
       $product2->quantity="1";
       $product2->source="Nghệ nhân Lực";
        $product2->status="Còn";
       $product2->id_category="1";
       $product2->image="\public\M4iSrpuWkdDLrGUgdkOP9MdRF7UxQ0JMdX3KMkgQ.jpeg";
       $product2->description="Tuyệt vời";
       $product2->save();
       $product6 = new Product();
       $product6->name="Chích chòe Hà Lan";
        $product6->price=150000000;
        $product6->oldprice=190000000;
       $product6->quantity="12";
       $product6->source="Nghệ nhân Lực";
        $product6->status="Còn";
       $product6->id_category="2";
       $product6->image="/public/2.jpg";
       $product6->description="Tuyệt vời";
       $product6->save();
       $product3 = new Product();
       $product3->name="Chào mào Huế";
        $product3->price=150000000;
        $product3->oldprice=190000000;
       $product3->quantity="1";
       $product3->source="Nghệ nhân Lực";
        $product3->status="Còn";
       $product3->id_category="1";
       $product3->image="/public/a.jfif";
       $product3->description="Tuyệt vời";
       $product3->save();

       $product4 = new Product();
       $product4->name="Chào mào Bình Định";
        $product4->price=150000000;
        $product4->oldprice=190000000;
       $product4->quantity="1";
       $product4->source="Nghệ nhân Lực";
        $product4->status="Còn";
       $product4->id_category="1";
       $product4->image="/public/d.jpg";
       $product4->description="Tuyệt vời";
       $product4->save();

       

      

       $product7 = new Product();
       $product7->name="Chích chòe Bình Định";
        $product7->price=150000000;
        $product7->oldprice=190000000;
       $product7->quantity="1";
       $product7->source="Nghệ nhân Lực";
        $product7->status="Còn";
       $product7->id_category="2";
       $product7->image="/public/7.jpg";
       $product7->description="Tuyệt vời";
       $product7->save();

       $product9 = new Product();
       $product9->name="Chích chòe Thái";
        $product9->price=150000000;
        $product9->oldprice=190000000;
       $product9->quantity="1";
       $product9->source="Nghệ nhân Lực";
        $product9->status="Còn";
       $product9->id_category="2";
       $product9->image="/public/8.jpg";
       $product9->description="Tuyệt vời";
       $product9->save();

       $product10 = new Product();
       $product10->name="Khuyên Thái";
        $product10->price=150000000;
        $product10->oldprice=190000000;
       $product10->quantity="1";
       $product10->source="Nghệ nhân Lực";
        $product10->status="Còn";
       $product10->id_category="3";
       $product10->image="/public/a1.jpg";
       $product10->description="Tuyệt vời";
       $product10->save();

       $product11 = new Product();
       $product11->name="Khuyên Đà Nẵng";
        $product11->price=150000000;
        $product11->oldprice=190000000;
       $product11->quantity="3";
       $product11->source="Nghệ nhân Lực";
        $product11->status="Còn";
       $product11->id_category="3";
       $product11->image="/public/a2.jpg";
       $product11->description="Tuyệt vời";
       $product11->save();

       $product8 = new Product();
       $product8->name="Khuyên Đà Lạt";
        $product8->price=150000000;
        $product8->oldprice=190000000;
       $product8->quantity="1";
       $product8->source="Nghệ nhân Lực";
        $product8->status="Còn";
       $product8->id_category="3";
       $product8->image="/public/a3.jpg";
       $product8->description="Tuyệt vời";
       $product8->save();

       $product12 = new Product();
       $product12->name="Phụ kiện Bình Định";
        $product12->price=150000000;
        $product12->oldprice=190000000;
       $product12->quantity="5";
       $product12->source="Nghệ nhân Lực";
        $product12->status="Còn";
       $product12->id_category="5";
       $product12->image="/public/pk1.jpg";
       $product12->description="Tuyệt vời";
       $product12->save();

       $product13 = new Product();
       $product13->name="Lồng Thái";
        $product13->price=150000000;
        $product13->oldprice=190000000;
       $product13->quantity="5";
       $product13->source="Nghệ nhân Lực";
        $product13->status="Còn";
       $product13->id_category="5";
       $product13->image="/public/pk3.jfif";
       $product13->description="Tuyệt vời";
       $product13->save();

    }
}