<?php

namespace App\Filament\Resources\PaymentNewestResource\Pages;

use App\Filament\Resources\PaymentNewestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentNewests extends ListRecords
{
    protected static string $resource = PaymentNewestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
