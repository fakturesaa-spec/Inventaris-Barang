<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProdukRoutesTest extends TestCase
{
    /**
     * Test that the product resource routes are registered.
     */
    public function test_produk_routes_are_registered(): void
    {
        $this->assertNotNull(route('produk.index'));
        $this->assertNotNull(route('produk.create'));
        $this->assertNotNull(route('produk.store'));
        $this->assertNotNull(route('produk.edit', ['produk' => 1]));
        $this->assertNotNull(route('produk.update', ['produk' => 1]));
        $this->assertNotNull(route('produk.destroy', ['produk' => 1]));
    }
}
