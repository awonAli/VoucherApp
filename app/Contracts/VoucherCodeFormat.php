<?php
namespace App\Contracts;

interface VoucherCodeFormat
{
  public function output($length);
}
