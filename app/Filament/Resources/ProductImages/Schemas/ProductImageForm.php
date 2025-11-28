<?php

namespace App\Filament\Resources\ProductImages\Schemas;

use Filament\Schemas\Schema;

class ProductImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->relationship('product', 'name->en')
                    ->required(),
                FileUpload::make('image_path')->directory('product_images')->image()->required(),
            ]);
    }
}
