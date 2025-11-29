<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\Select;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name->en')
                    ->required(),
                Tabs::make('Language Tabs')
                    ->tabs([
                        Tab::make('English')->schema([
                            TextInput::make('name.en')
                                ->label('Name (English)')
                                ->required(),
                            Textarea::make('description.en')
                                ->label('Description (English)'),
                        ]),
                        Tab::make('العربية')->schema([
                            TextInput::make('name.ar')
                                ->label('الاسم بالعربية')
                                ->required(),
                            Textarea::make('description.ar')
                                ->label('الوصف بالعربية'),
                        ]),
                    ]),
                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->required(),
                FileUpload::make('image')
                    ->label('Product Image')
                    ->directory('products')
                    ->disk('main_site')
                    ->image()
                    ->visibility('public')
                    ->maxSize(5048),
                TextInput::make('price')->numeric()->required(),
                TextInput::make('discount_price')->numeric()->nullable(),
                TextInput::make('stock')->numeric()->default(0),
                Toggle::make('status')->label('Active')->default(true),
            ]);
    }
}
