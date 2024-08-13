<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JulioOrtaHdz\LaravelMt5\LaravelMt5;
use JulioOrtaHdz\PhpMeta\Entities\User;
use JulioOrtaHdz\PhpMeta\Entities\Trade;


class ApisController extends Controller
{
    //
    public function test(){

       $api = new LaravelMt5();
$trade = new Trade();
$trade->setLogin(6000189);
$trade->setAmount(100);
$trade->setComment("Deposit");
$trade->setType(Trade::DEAL_BALANCE);
$result = $api->trade($trade);
return $result;
    }
}
