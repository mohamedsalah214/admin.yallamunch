<?php

namespace App\Filament\Resources\ProductWeights\Pages;

use App\Filament\Resources\ProductWeights\ProductWeightResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProductWeight extends EditRecord
{
    protected static string $resource = ProductWeightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
