<?php

namespace App\Filament\Resources\ProductWeights\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class ProductWeightForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->relationship('product', 'name->en')
                    ->required(),
                TextInput::make('label')->label('Weight Label')->required(),
                TextInput::make('price')->numeric()->required(),
            ]);
    }
}
