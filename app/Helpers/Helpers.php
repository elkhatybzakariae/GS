<?php

namespace App\Helpers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\Expense;
use App\Models\Payment;
use App\Models\Person;
use App\Models\POS;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Returns;
use App\Models\Role;
use App\Models\Sale;
use App\Models\StockAdjustment;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\Transfer;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Str;
class Helpers
{
    public static function generateIdU()
    {
        $idU = Str::random(15);
        while (User::where('id_U', $idU)->exists()) {
            $idU = Str::random(15);
        }
        return $idU;
    }
    public static function generateIdRole()
    {
        $id_R = Str::random(15);
        while (Role::where('id_R', $id_R)->exists()) {
            $id_R = Str::random(15);
        }
        return $id_R;
    }

    public static function generateIdCat()
    {
        $idCat = Str::random(15);
        while (Category::where('id_Cat', $idCat)->exists()) {
            $idCat = Str::random(15);
        }
        return $idCat;
    }
    public static function generateIdExp()
    {
        $idExp = Str::random(15);
        while (Expense::where('id_Expense', $idExp)->exists()) {
            $idExp = Str::random(15);
        }
        return $idExp;
    }
    public static function generateIdDisc()
    {
        $idDisc = Str::random(15);
        while (Discount::where('id_Discount', $idDisc)->exists()) {
            $idDisc = Str::random(15);
        }
        return $idDisc;
    }
    public static function generateIdUnit()
    {
        $idUnit = Str::random(15);
        while (Unit::where('id_Unit', $idUnit)->exists()) {
            $idUnit = Str::random(15);
        }
        return $idUnit;
    }
    public static function generateIdBrand()
    {
        $idBrand = Str::random(15);
        while (Brand::where('id_Brand', $idBrand)->exists()) {
            $idBrand = Str::random(15);
        }
        return $idBrand;
    }
    public static function generateIdProduct ()
    {
        $idProduct = Str::random(15);
        while (Product::where('id_Product', $idProduct)->exists()) {
            $idProduct = Str::random(15);
        }
        return $idProduct;
    }
    public static function generateIdCountry ()
    {
        $idCountry = Str::random(15);
        while (Country::where('id_Country', $idCountry)->exists()) {
            $idCountry = Str::random(15);
        }
        return $idCountry;
    }
    public static function generateIdCity ()
    {
        $idCity = Str::random(15);
        while (City::where('id_City', $idCity)->exists()) {
            $idCity = Str::random(15);
        }
        return $idCity;
    }
    public static function generateIdPers()
    {
        $idP = Str::random(15);
        while (Person::where('id_P', $idP)->exists()) {
            $idP = Str::random(15);
        }
        return $idP;
    }
    public static function generateIdCus()
    {
        $idCus = Str::random(15);
        while (Customer::where('id_Cus', $idCus)->exists()) {
            $idCus = Str::random(15);
        }
        return $idCus;
    }
    public static function generateIdSupp()
    {
        $idSupp = Str::random(15);
        while (Supplier::where('id_Supplier', $idSupp)->exists()) {
            $idSupp = Str::random(15);
        }
        return $idSupp;
    }
    public static function generateIdReturn()
    {
        $idRet = Str::random(15);
        while (Returns::where('id_Ret', $idRet)->exists()) {
            $idRet = Str::random(15);
        }
        return $idRet;
    }
    public static function generateIdStore()
    {
        $idStore = Str::random(15);
        while (Store::where('id_Store', $idStore)->exists()) {
            $idStore = Str::random(15);
        }
        return $idStore;
    }
    public static function generateIdTransfer()
    {
        $idTransfer = Str::random(15);
        while (Transfer::where('id_Transfer', $idTransfer)->exists()) {
            $idTransfer = Str::random(15);
        }
        return $idTransfer;
    }
    public static function generateIdPurchase()
    {
        $Purchase = Str::random(15);
        while (Purchase::where('id_Purchase', $Purchase)->exists()) {
            $Purchase = Str::random(15);
        }
        return $Purchase;
    }
    public static function generateIdSale()
    {
        $idSale = Str::random(15);
        while (Sale::where('id_Sale', $idSale)->exists()) {
            $idSale = Str::random(15);
        }
        return $idSale;
    }
    public static function generateIdPayment()
    {
        $idPayment = Str::random(15);
        while (Payment::where('id_Payment', $idPayment)->exists()) {
            $idPayment = Str::random(15);
        }
        return $idPayment;
    }
    public static function generateIdPOS()
    {
        $idPOS = Str::random(15);
        while (POS::where('id_pos', $idPOS)->exists()) {
            $idPOS = Str::random(15);
        }
        return $idPOS;
    }
    public static function generateIdStockAdjustment()
    {
        $idSA = Str::random(15);
        while (StockAdjustment::where('id_SA', $idSA)->exists()) {
            $idSA = Str::random(15);
        }
        return $idSA;
    }
    
}
