<?php

namespace Tests\Browser;

use App\Product;
use Illuminate\Http\UploadedFile;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected $product;

    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
//    public function testExample()
//    {
//        $this->product=[
//            'name' => 'My First Product',
//            'code' => 'a100',
//            'description' => 'This is my first Product',
//            'price' => '10.50'
//        ];
//
//
//        $admin = $this->createAdmin();
//        $this->browse(function (Browser $browser) use($admin){
//            $browser->loginAs($admin)
//                ->visitRoute('admin.products.create')
//                ->assertSee('Add Product')
//                ->type('name',$this->product['name'])
//                ->type('code',$this->product['code'])
//                ->type('description',$this->product['description'])
//                //->attach('image',UploadedFile::fake()->image('random.jpg'))
//                ->type('price',$this->product['price'])
//                ->screenshot('image')
//                ->press('Submit');
//            // Test a user is redirected to the post details after creating it.
//            // ->assertPathIs('admin/product/my-first-product');
//            //->assertPathIs('/admin/products/create');
//        });
//        $this->assertDatabaseHas('products',[
//            'name'=>$this->product['name'],
//            'code'=>$this->product['code'],
//            'description'=>$this->product['description'],
//            'price'=>$this->product['price']
//        ]);
//    }
//

    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function test_admin_can_list_products_and_redirect_to_product_show_on_click_name_link()
    {
        $admin = $this->createAdmin();
        $this->product = factory(Product::class)->create([
           'name' => 'This is my first Product',
           'user_id' => $admin->id
        ]);

        $this->browse(function (Browser $browser) use($admin){
            $browser->loginAs($admin)
                ->visitRoute('admin.products.index')
                ->assertSeeIn('h2','Products List')
                ->assertSee($this->product->name)
                ->clickLink($this->product->name)
                ->assertPathIs('/admin/product/1-this-is-my-first-product');
        });
    }


    /**
     * @throws \Throwable
     */
    public function test_admin_user_can_create_product_and_redirect_to_edit()
    {
        $this->product=[
            'name' => 'My First Product',
        ];

        $admin = $this->createAdmin();
        $this->browse(function (Browser $browser) use($admin){
            $browser->loginAs($admin)
                ->visitRoute('admin.products.index')
                ->press('Create Product')
                ->type('name',$this->product['name'])
                ->press('Submit')
            // Test a user is redirected to the product edit after creating it.
             ->assertPathIs('admin/product/{product}/edit');

        });
        $this->assertDatabaseHas('products',[
            'name'=>$this->product['name'],
        ]);
    }

}
