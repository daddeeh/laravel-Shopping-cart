<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $product = new \App\Product([

     'imagePath' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxok69plWG5-6qiXdARktakn_uaHh2h9khuBoByTYmoXjtahix8IwmdJJuDqOQn6ojqeINvAFm&usqp=CAc',
     'title'     => 'any thing1',
     'description' => 'any description1',
     'price'      => 10000
  ]);
  $product->save();
  $product = new \App\Product([

     'imagePath' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYIDHYxDISZOgJLc6DfX5n8lgAZcIoa7IdjkdCjD2eXDYdz-8qRYMOEJUo3do0hgWs5PZzgKc0&usqp=CAc',
     'title'     => 'any thing2',
     'description' => 'any description2',
     'price'      => 8000
  ]);
  $product->save();

  $product = new \App\Product([

     'imagePath' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPMwFFafzyizdQQof32w5CIgBiTJl6rEMhqZK-dE8fBiREe0dhXdY_Crc7S39AlCtsAPeC7rE&usqp=CAc',
     'title'     => 'any thing3',
     'description' => 'any description3',
     'price'      => 5000
  ]);
  $product->save();

  $product = new \App\Product([

     'imagePath' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRG3rhACGoqUJh7T4QEPjjWWCQQt4JfM9bdDQ3yxf8AcR6maYyY-Q8D4y9IGJFtxwtevNWteY&usqp=CAc',
     'title'     => 'any thing4',
     'description' => 'any description4',
     'price'      => 5000
  ]);
  $product->save();
}

}
