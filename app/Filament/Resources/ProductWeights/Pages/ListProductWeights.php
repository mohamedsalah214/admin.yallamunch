<?php

namespace App\Filament\Resources\ProductWeights\Pages;

use App\Filament\Resources\ProductWeights\ProductWeightResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductWeights extends ListRecords
{
    protected static string $resource = ProductWeightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
