<?php

namespace App\Controllers;

use App\Models\CatalogModel;
use CodeIgniter\Controller;

class Catalog extends Controller
{
    protected $session;

    public function index(): string
    {
        $request = service('request');
        $this->session = \Config\Services::session();
        $model = new CatalogModel();
        $perPage = 12;
        $pageInput = $request->getGet('page');
        $searchInput = $request->getGet('q');
        $categoryInput = $request->getGet('category');
        $page = max(1, is_scalar($pageInput) ? (int) $pageInput : 1);
        $search = is_string($searchInput) ? trim($searchInput) : '';
        $search = mb_substr($search, 0, 100);
        $categoryId = max(0, is_scalar($categoryInput) ? (int) $categoryInput : 0);
        $result = $model->getProducts(
            $search,
            $categoryId,
            $page,
            $perPage,
            $model->getDefaultPriceTypeId()
        );


        return view('catalog/index', [
            'config' => config('App'),
            'categories' => $model->getCategories(),
            'products' => $result['products'],
            'total' => $result['total'],
            'page' => $page,
            'perPage' => $perPage,
            'search' => $search,
            'categoryId' => $categoryId,
            'pageCount' => (int) ceil($result['total'] / $perPage),
        ]);
    }
}
