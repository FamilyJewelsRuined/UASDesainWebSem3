<?php

namespace App\Filament\Resources\PaymentNewestResource\Pages;

use App\Filament\Resources\PaymentNewestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentNewest extends EditRecord
{
    protected static string $resource = PaymentNewestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
