<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Contracts\VoucherCodeFormat;
use App\Output\MixedCharacters;

use App\Models\Offer;
use App\Models\Voucher;
use App\Models\Recipient;


class OfferController extends Controller
{
    public function getAll(Request $request, Response $response)
    {
        $offers = Offer::all();
        return response()->json([
            'offers' => $offers
        ], 200);
    }


    /**
   *==============================================
   * Adding new Special Offer
   *==============================================
   */
  public function addNewOffer(Request $request, Response $response)
  {

    $data = $request->all();
    /**
     * Creating new Offer record
     */
    $offer = new Offer;
    $offer->name = $data['name'];
    $offer->exp_date = $data['exp_date'];
    $offer->fixed_percentage = $data['fixed_percentage'];
    $offer->save();
    /**
     *Looping through all Registered Recipients to and create unique voucher code
     *which is associated with the offer id and Recipient id
     * LATER we can use queues to reduce response time
     */
    $recipients = Recipient::all();
    foreach ($recipients as $recipient) {
      $voucher = new Voucher;
      $voucher->recipient_id = $recipient->id;
      $voucher->offer_id = $offer->id;
      $voucher->exp_date = $data['exp_date'];

      /**
       *MixedCharacters is implementation for the VoucherCodeFormat Interface
       *you can Swap between ( MixedCharacters and OnlyDigits )
       */
      $voucher->code = $this->generateVoucherCode(new MixedCharacters);
      $voucher->save();
    }

    /**
     *return Json response
     */
    return response()->json([
        'Message' => " Offer created succefuly ",
        'offer' => $offer
    ], 200);

  }

  /**
   *==============================================
   * Calling the VoucherCodeFormat Interface which is located in app/Contracts/VoucherCodeFormat
   *==============================================
   */


  public function generateVoucherCode(VoucherCodeFormat $formatter)
  {

    $voucherCode = $formatter->output(8); // <== "output($length)" param for the max length
    if ($this->voucherCodeExists($voucherCode))
    {
        $voucherCode =  $formatter->output(8); // <== "output($length)" param for the max length
    }
    return $voucherCode;
  }
  /**
   *==============================================
   * Check if Voucher Code already Exists
   *==============================================
   */

  public  function voucherCodeExists($code)
   {
       return Voucher::where("code",$code)->exists();
   }
}
