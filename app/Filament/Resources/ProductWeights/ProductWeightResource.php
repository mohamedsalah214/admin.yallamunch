<?php

namespace App\Filament\Resources\ProductWeights;

use App\Filament\Resources\ProductWeights\Pages\CreateProductWeight;
use App\Filament\Resources\ProductWeights\Pages\EditProductWeight;
use App\Filament\Resources\ProductWeights\Pages\ListProductWeights;
use App\Filament\Resources\ProductWeights\Schemas\ProductWeightForm;
use App\Filament\Resources\ProductWeights\Tables\ProductWeightsTable;
use App\Models\ProductWeight;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductWeightResource extends Resource
{
    protected static ?string $model = ProductWeight::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProductWeightForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductWeightsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductWeights::route('/'),
            'create' => CreateProductWeight::route('/create'),
            'edit' => EditProductWeight::route('/{record}/edit'),
        ];
    }
}
