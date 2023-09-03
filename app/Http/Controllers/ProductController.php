<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, ProductDataTable $dtaTable)
    {
        return $dtaTable->render('product.index');
    }
}
