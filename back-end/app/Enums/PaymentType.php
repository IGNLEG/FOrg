<?php
namespace App\Enums;

enum PaymentType: string {
    case CARD = 'card';
    case CASH = 'cash';
}
