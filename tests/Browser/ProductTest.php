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
        $admin = $this->createAdmin();
        $this->browse(function (Browser $browser) use($admin){
            $browser->loginAs($admin)
                ->visitRoute('admin.products.index')
                ->press('Create Product')
                ->waitFor('#createProductModal',5)
                ->whenAvailable('#createProductModal',function ($modal){
                    $modal->type('name', 'My first product')
                        ->press('Create')
                        ->pause(1000);
                })
            // Test a user is redirected to the product edit after creating it.
             ->assertPathIs('/admin/products/1/edit');

        });
        $this->assertDatabaseHas('products',[
            'name'=>'My First Product',
        ]);
    }

    /**
     * @throws \Throwable
     */
    public function test_admin_user_can_complete_product_creation()
    {
        $admin = $this->createAdmin();
        $product = factory(Product::class)->create([
                'name' => 'My first Product',
                'code' => null,
                'description' => null,
                'image' => null,
                'price' => null,
                'user_id' =>$admin->id
        ]);

        $this->browse(function (Browser $browser) use($admin,$product){
            $browser->loginAs($admin)
                ->visitRoute('admin.products.edit',$product)
                ->type('name', $product->name)
                ->type('code', 'A100')
                ->type('description', 'My first product Text')
                ->type('image', UploadedFile::fake()->image('random.jpg'))
                ->type('price','200.50')
                ->press('Submit Information');
        });
        $this->assertDatabaseHas('products',[
            'name'=>'My First Product',
            'code' => 'A100'
        ]);
    }


    public function test_admin_user_can_delete_product()
    {
        $admin = $this->createAdmin();
        factory(Product::class)->create([
            'name' => 'My First Product'
            ]);

        $this->browse(function (Browser $browser) use($admin){
            $browser->loginAs($admin)
                ->visitRoute('admin.products.index')
                ->press('Del');
        });
        $this->assertDatabaseMissing('products',[
            'name'=>'My First Product',
        ]);
    }

}
