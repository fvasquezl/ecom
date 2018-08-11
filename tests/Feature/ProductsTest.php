<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function an_admin_user_can_create_a_product()
    {
        $this->withExceptionHandling();
        $product = [
            'name' => 'My First Product',
            'code' => 'a100',
            'description' => 'This is my first Product',
            'image' => UploadedFile::fake()->image('random.jpg'),
            'price' => '10.50'
        ];
        $admin = $this->createAdmin();

        $this->actingAs($admin)
            ->post(route('admin.products.store'), $product)
            ->assertRedirect('admin/product/my-first-product');
           //->assertSee('My First Product');

        $this->assertDatabaseHas('products', [
            'user_id' => $admin->id,
            'name' => "My First Product",
            'slug' => 'my-first-product',
            'code' => 'a100',
            'image' => 'product-images/random.jpg',
            'description' => 'This is my first Product',
            'price' => '10.50'
        ]);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function an_admin_user_can_lists_products()
    {
        $this->withExceptionHandling();
        $admin = $this->createAdmin();
        factory(Product::class,10)->create();
        $this->actingAs($admin)
            ->get(route('admin.products.index'))
            ->assertSee('Product List');

        //->assertSee('My First Product');


    }

}
